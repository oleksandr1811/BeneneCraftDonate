<?php date_default_timezone_set('Europe/Moscow');
class Engine {
    public $db;
    public $cfg;
	private static $mVkCount = 0;
    public $messages = array();
    public function __construct() {
        require_once ($_SERVER['DOCUMENT_ROOT'] . '/engine/config.php');
        $this->cfg = $config;
        if (file_exists('installer.php')) {
            echo "<script>window.location.href='/installer.php'</script>";
            die('and so..');
        }
        $this->db = new mysqli($config['db']['db_host'], $config['db']['db_user'], $config['db']['db_pass'], $config['db']['db_name']);
        if ($this->db->connect_error) {
            die("Couldn't connect to MySQLi: " . $this->db->connect_error);
        }
        if (!$this->db->set_charset("utf8")) {
            die("     utf8: " . $this->db->error);
        }
        $this->checkMysql();
    }
    private function checkMysql() {
        if (file_exists('import.sql')) {
            $file = file_get_contents('import.sql');
            $data = explode(';', $file);
            foreach ($data as $el) {
                if ($el == '') {
                    continue;
                }
                $this->query($el);
            }
            unlink('import.sql');
        }
        $this->events();
    }
	private function events(){
		if(isset($_POST['buy'])) {
			$buy = explode("|", $this->buy_price($_POST['nickname'], $_POST['group'], $_POST['promo'], $_POST['srv_id'], $_POST['vk_id'], "buy"));
			if($buy[0] == "error") return $this->add_message($buy[3],true);
			return $this->add_message('Переходим к оплате...!');
		}
		if(isset($_REQUEST['success'])) $this->add_message('Вы успешно купили привилегию!');
		if(isset($_REQUEST['error'])) $this->add_message('Во время покупки привилегии произошла ошибка!',true);
	} 
	
    private function add_message($text, $err = false) {
        $this->messages[] = array('text' => $text, 'err' => $err);
    }
    public function colorName($int, $name) {
        return $title;
    }
    function showImg($path) {
        $html = '';
        foreach (glob($path . "*.{jpg,png,gif}", GLOB_BRACE) as $filename) {
            $html.= '<img class="donate-style" src="' . $filename . '" alt="#" />';
        }
        return $html;
    }
    public function query($query) {
        return $this->db->query($query);
    }
    public function query_result($query) {
        return $this->db->query($query)->fetch_object();
    }
    public function escape($str) {
        return $this->db->real_escape_string($str);
    }
    public function redirect($url) {
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . $url . '";';
        echo '</script>';
    }
	public function get_servers() {
		$i = 0;
		foreach($this->query("SELECT * FROM `servers` WHERE `status` = 1") as $s) {
			$i++;
			if($i == 1) $active = "col tab active"; else $active = "col tab";
			$form .= '<li class="row tabs" role="presentation"><a style="color: #4E3E95"  href="#tab'.$s['id'].'" class="'.$active.'" role="tab" data-toggle="tab">'.$s['name'].'</a></li>';
		}
		return $form;
	}

	public function get_form() {
		$i = 0;
		foreach($this->query("SELECT * FROM `servers` WHERE `status` = 1") as $s) {
			$i++;
			if($i == 1) $active = "active"; else $active = '';

			$form .= '<div role="tabpanel" class="tab-pane '.$active .'" id="tab'.$s['id'].'">';
			$form .= '<form action="/" method="post" id="phpmc">';
			$form .= '<input type="hidden" name="srv_id" class="input-srv_id"  value="'.$s['id'].'">';
			$form .= '<div class="form-group has-feedback">';
			$form .= '<label>Введите ваш ник:</label>';
			$form .= '<input type="text" name="nickname" id="nickname" placeholder="Введите ник">';
			$form .= '</div>';
			$form .= '<div class="form-group">';
			$form .= '<label for="group" class="control-label">Выберите товар:</label>';
			$form .= '<select id="group" name="group">';
			$form .= $this->groups($s['id']);
			$form .= '</select>';
			$form .= '</div>';
			$form .= '<button type="submit" name="buy" id="buy">Купить / Доплатить</button>';
			$form .= '</form>';
			$form .= '</div>';
		}
		return $form;
	}

	public function groups($server){
		$groups = $this->query("SELECT * FROM `groups` WHERE `server` = ".(int)$server." ORDER BY `id` ASC");
		$list = array();
		while($el = mysqli_fetch_assoc($groups)) {
			if(!is_array($list[$el['category']])) $list[$el['category']] = array();
			$list[$el['category']][] = $el;
		}
		$form = '<option selected disabled>Выберите товар</option>';
		foreach($list as $cat=>$group){
			$form .= '<optgroup label="'.$cat.'">';
			foreach($group as $data){
				$form .= '<option data-price="'.$data['price'] .'" data-id="'.$data['id'] .'" value="'.$data['id'].'">'.$data['name'].' ➛ '.$data['price'] .' рублей</option>';
			}
			$form .= '</optgroup>';
		}
		return $form;
	}

	public function group($id){
		$query = $this->query_result("SELECT * FROM `groups` WHERE `id` = ".(int)$id." LIMIT 1");
		if($query == null) return false;
		return $query;
	}

	public function rcon_log($login, $cmd){
		$this->query("INSERT INTO `log` (`nick`, `message`) VALUES ('".$login."', '".$cmd."')");
	}

    public function surcharge($nick, $type = 'get', $price = '', $srv = ''){
        if($type == "get")
        {
            $replay = $this->query_result("SELECT * FROM surcharge WHERE nick = '" . $nick . "' ORDER BY id DESC LIMIT 1");
            if($replay == null) return false;
            return $replay;
        }
        elseif($type == "add") $this->query("INSERT INTO `surcharge`(`nick`, `price`, `server`) VALUES ('".$nick."', '".$price."', '".$srv."')");
	}

	public function promo($promo, $price){
		$promo = $this->escape(trim ( strip_tags ( $promo)));
		$price = (int)$price;
		$promo = $this->query_result("SELECT * FROM promo WHERE name = '{$promo}' LIMIT 1");
		if(!$promo) return $price;
		return $price - ceil(($price/100*$promo->disc));
	}

	public function buy_price($nick, $group, $promo = '', $server, $vk = '', $type = 'check'){
		$nick = $this->escape(trim ( strip_tags ( $nick)));
		$group = $this->escape(trim ( strip_tags ( $group)));
		$promo = $this->escape(trim ( strip_tags ( $promo)));
		$server = (int)$server;
		$vk = (int)$vk;

		if(empty($nick)) return "error|Ник не указан||Ник не указан";
		if(empty($group)) return "error|Купить / Доплатить||Группа не выбрана";
		$group = $this->group($group);
		if(!$group) return "error|Купить / Доплатить||Группа не обнаружена";
		$price = $group->price;
		$surcharge = $this->surcharge($nick);

		if ($group->surcharge == 1 && $surcharge->server == $server) {
			if ($surcharge != NULL) {
				$price = $price - $surcharge->price;
			}
		}

		if(!empty($promo)) $price = $this->promo($this->escape(trim(strip_tags($promo))), $price);

		if ($price > 0) {
			if($type == "check")
			{
				if ($surcharge == NULL || $group->surcharge == 0)
					return "ok|Купить за " . $price . " рублей|" . $this->alert("Вы собираетесь приобрести донат <b>{$group->name}</b> за <b>{$price}</b> рублей", "info")."|".$group->console;
				else
					return "ok|Доплатить за " . $price . " рублей|" . $this->alert("Вы собираетесь доплатить до доната <b>{$group->name}</b> за <b>{$price}</b> рублей", "info")."|".$group->console;
			}
			elseif($type == "buy") $this->buy($nick, $price, $group->id, $server);
			else return false;
		} else
			return "error|У вас имеется более высокий донат!|" . $this->alert("У вас уже имеется более высокий донат, выберите другой из списка!", "danger")."|У вас имеется более высокий донат!";
	}

	public function buy($nick, $price, $group, $server){
        $date = date("Y-m-d");
        $time = date("G:i:s");
        $month = date("n");
        $group = $this->group($group);
        $this->query("INSERT INTO `orders`(`groupid`, `group`, `price`, `nick`, `date`, `time`, `month`, `server`) VALUES ('" . $group->id . "','" . $group->name . "','" . $price . "','" . $nick . "', '" . $date . "', '" . $time . "', '" . $month . "', '" . $server . "')");
        $_SESSION['buy_id'] = $this->db->insert_id;
        $this->redirect('/select');
        $desc = "  " . $group->name . "   Minecraft";
        $signature = hash('SHA256', $this->db->insert_id . "*" . $nick . "{up}" . $desc . "{up}" . $price . "{up}" . $this->cfg['unitpay']['key']);
        $this->redirect("https://unitpay.money/pay/{$this->cfg['unitpay']['project_id']}/webmoney?sum={$price}&account={$this->db->insert_id}*{$nick}&desc={$desc}&signature={$signature}");
    }
	
    public function payment_replay($params, $message, $type = "error") {
        if ($type == "success") {
            return json_encode(array("jsonrpc" => "2.0", "result" => array("message" => $message), 'id' => $params['projectId']));
        } else {
            return json_encode(array("jsonrpc" => "2.0", "error" => array("code" => - 32000, "message" => $message), 'id' => $params['projectId']));
        }
    }
	
    private function get_sign($method, array $params) {
        $delimiter = '{up}';
        ksort($params);
        unset($params['sign']);
        unset($params['signature']);
        return hash('sha256', $method . $delimiter . join($delimiter, $params) . $delimiter . $this->cfg['unitpay']['key']);
    }
	
    public function payment_action($method, $params) {
        if ($params['signature'] != $this->get_sign($method, $params)) return $this->payment_replay($params, "  ");
        $account = explode("*", $params['account']);
        $data = $this->order((int)$account[0]);
        $group = $this->group($data->groupid);
        if (!$data) return $this->payment_replay($params, "  ");
        if ($method == 'check') {
            if ($params['sum'] != $data->price) return $this->payment_replay($params, "  ");
            return $this->payment_replay($params, "   ", "success");
        } elseif ($method == 'pay') {
            if ($data->status == 1) return $this->payment_replay($params, "  ");
            $this->query("UPDATE `orders` SET `status` = '1', `profit` = '" . (int)$params['profit'] . "' WHERE `id` = " . (int)$data->id);
            if ($group->surcharge == 1) $this->surcharge($data->nick, "add", $data->price, $group->server);
            $this->payment_rcon($data->nick, $data->groupid);
            return $this->payment_replay($params, "Счет успешно оплачен, выдаем донат...", "success");
        } else return $this->payment_replay($params, "  : " . $method);
    }

    private function order($id) {
        return $this->query_result("select * from `orders` where `id`=". $id . ";");
    }
	
    public function payment_action_qiwi($order, $sum) {
        $data = $this->order($order);
        $group = $this->group($data->groupid);
        $real_price = (int)$data->price;
        if ($real_price != (int)$sum) die();
        if ($data->status == 1) die();
        $this->query("UPDATE `orders` SET `status` = '1', `profit` = '" . (int)$data->price . "' WHERE `id` = " . (int)$data->id);
        if ($group->surcharge == 1) $this->surcharge($data->nick, "add", $data->price, $group->server);
        $this->payment_rcon($data->nick, $data->groupid);
    }
	
    public function payment_action_enot($order, $sum) {
    }

    public function payment_rcon($nick, $groupid){
        $group = $this->group($groupid);
        $arr = array("&lowbar;" => "_", " " => "");
        $nick = strtr($nick, $arr);
        require_once($_SERVER['DOCUMENT_ROOT'].'/engine/classes/Rcon.class.php');
        $servers = $this->query("SELECT * FROM `extradition` WHERE `server` = '{$group->server}'");

        $s = $servers->fetch_object();
        $rcon = new Rcon($s->ip, $s->port, $s->pass, 5);
        foreach (explode(';', $group->cmd) as $c) {
            $cmd = str_replace(array('[nick]'),array($nick), $c);
            if(@$rcon->connect()) {
                $rcon->send_command($cmd);
                $this->rcon_log($nick, "CONNECT: ".$rcon->get_response());
            } else $this->rcon_log($nick, "ERROR: ".$rcon->get_response());
        }
    }

	public function date($date){
		$time = explode(" ", $date);
		$month = explode("-", $time[0]);
		if($month[1] == 1) $month_t = "января";
		elseif($month[1] == 2) $month_t = "Февраля";
		elseif($month[1] == 3) $month_t = "марта";
		elseif($month[1] == 4) $month_t = "апреля";
		elseif($month[1] == 5) $month_t = "мая";
		elseif($month[1] == 6) $month_t = "июня";
		elseif($month[1] == 7) $month_t = "июля";
		elseif($month[1] == 8) $month_t = "августа";
		elseif($month[1] == 9) $month_t = "сентября";
		elseif($month[1] == 10) $month_t = "октября";
		elseif($month[1] == 11) $month_t = "ноября";
		elseif($month[1] == 12) $month_t = "декабря";
		else return $date;
		$sec = explode(":", $time[1]);
		if($time[0] == date("Y-m-d")) return "Сегодня в ".$sec[0].":".$sec[1];
		elseif($time[0] == date('Y-m-d', strtotime('-1 days'))) return "Вчера в ".$sec[0].":".$sec[1];
		else return $month[2]." ".$month_t." в ".$sec[0].":".$sec[1];
	}

	public function alert($text, $action){
		return '<div class="alert alert-dismissible alert-' . $action . '">
				  ' . $text . '
				</div>';
	}

	public function online($type = "online"){
		require_once($_SERVER['DOCUMENT_ROOT'].'/engine/classes/MCQuery.class.php');
		$mon = mcraftQuery_SE($this->cfg['server']['ip']);
		if(!$mon) return "0";
		if($type == "slots") return $mon['maxplayers'];
		else return $mon['numplayers'];
	}
	
	public function give($admin = false)
    {
        global $link, $config;

        if (!$this->payment_isset) return "Платёж не найден!";

        if (empty($this->data['stime'])) {
            $link->prepare("UPDATE `AD_PAYMENTS` SET `stime` = ? WHERE `id` = ? LIMIT 1")->execute([
                time(),
                $this->payment_id
            ]);
        }

        $data = json_decode($this->data['data'], true);
        $commands = json_decode($this->data2['commands'], true);

        $rcon = new RCON($this->data['server']);

        if (!@$rcon->connect()) {
            $link->prepare(
                "UPDATE `AD_PAYMENTS` SET `status` = 2, `log` = 'Нет подключения к серверу!' WHERE `id` = '{$this->payment_id}'"
            )->execute();

            if (!empty($config['vk']['accessToken'])) {
                $this->sendVkMessage(
                    'Не удалось подключиться к игровому серверу (' .
                    $config['servers'][$this->data['server']]['name'] .
                    ') по RCON! Платёж: #' . $this->payment_id,
                    array_values($config['vk']['accs'])
                );
            }


            return "Нет подключения к серверу!";
        }

        for ($i = 0; $i < count($commands); $i++) {
            $command = str_replace("{user}", $this->data['username'], $commands[$i]);
            $log[] = '> ' . $command;

            try {
                $command = str_replace("{mojang_uuid}",
                    self::getUUID($this->data['username'], 'mojang'), $command);
                $command = str_replace("{offline_uuid}",
                    self::getUUID($this->data['username'], 'offline'), $command);
                $command = str_replace("{custom_uuid}",
                    self::getUUID($this->data['username'], 'custom'), $command);
            } catch (Exception $ex) {
                $log[] = 'ОШИБКА UUID: ' . trim($ex->getMessage());
            }

            if (@substr($command, 0, 4) == "sql:") {
                $command = str_replace('\\\\\\u0027', "'", $command);
                $command = str_replace('\\\\', '', $command);
                $command = str_replace("\\'", "'", $command);

                try {
                    $link->prepare(substr($command, 4))->execute();
                    $log[] = "SQL-запрос успешно выполнен!";
                } catch (Exception $ex) {
                    $log[] = "ОШИБКА-SQL: " . trim($ex->getMessage());
                }
            } else {


                try {
                    $rcon->send_command($command);
                    $log[] = trim($rcon->get_response());
                } catch (Exception $ex) {
                    $log[] = "ОШИБКА: " . (empty($rcon->get_response()) ?
                            'Возможно не удалось дождаться ответа от сервера' : trim($rcon->get_response()));
                }
            }
        }

        $rcon->disconnect();
        $log = json_encode($log, JSON_UNESCAPED_UNICODE | JSON_HEX_QUOT | JSON_HEX_APOS);

        $link->prepare(
            "UPDATE `AD_PAYMENTS` SET `status` = 1, `log` = '{$log}' WHERE `id` = '{$this->payment_id}'"
        )->execute();
        $link->prepare(
            "INSERT INTO `AD_BUYERS` VALUES (NULL, :username, :good, :ctime, :exptime, :cost, :server)"
        )->execute(
            array(
                'username' => $this->data['username'],
                'good' => $this->data2['id'],
                'ctime' => time(), 'exptime' => 0,
                'cost' => $data['cost'],
                'server' => $this->data['server']
            )
        );

        if (!empty($config['vk']['accessToken'])) {
            $this->sendVkMessage(
                "Игрок {$this->data['username']} купил товар {$this->data2['name']}, за: {$data['cost']}руб. Платёж: #" . $this->payment_id,
                array_values($config['vk']['accs'])
            );
        }

        return true;
    }

    private function sendVkMessage($message, $uid)
    {
        global $config;
        if ((self::$mVkCount % 3) == 0) sleep(1);

        if (is_array($uid)) $uid = implode(',', $uid);

        $request_params = array(
            'message' => $message,
            'user_ids' => $uid,
            'access_token' => $config['vk']['accessToken'],
            'v' => '5.80'
        );

        @file_get_contents('https://api.vk.com/method/messages.send?' . http_build_query($request_params));

        self::$mVkCount++;
    }
}
	if (@$_GET['id'] == "links") {
		$config['links'] = array();
		$limit = 10;

		for ($i = 0; $i <= $limit ; $i++) {
			if (isset($_POST['link_name_' . $i]) &&
				isset($_POST['link_href_' . $i]) &&
				!empty($_POST['link_name_' . $i]) &&
				!empty($_POST['link_href_' . $i])
			) {
				if ($i == $limit &&
					isset($_POST['link_name_' . ($i + 1)]) &&
					!empty($_POST['link_name_' . ($i + 1)])
				) {
					$limit++;
				}

				$config['links'][]['name'] = $_POST['link_name_' . $i];
				$config['links'][(count($config['links']) - 1)]['href'] = $_POST['link_href_' . $i];

				if (isset($_POST['link_footer_' . $i])) {
					$config['links'][(count($config['links']) - 1)]['footer'] = true;
				} else {
					$config['links'][(count($config['links']) - 1)]['footer'] = false;
				}

				if (isset($_POST['link_blank_' . $i])) {
					$config['links'][(count($config['links']) - 1)]['blank'] = true;
				}
				else {
					$config['links'][(count($config['links']) - 1)]['blank'] = false;
				}
			}
		}
	} elseif (@$_GET['id'] == "design") {
        $config['db']['orders'] = (isset($_POST['orders'])) ? true : false;
	}
?>