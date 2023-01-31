<?php include 'Main.class.php';
class Admin {
    public function __construct() {
        $this->engine = new Engine;
    }
    public function all_promo() {
        $query = $this->engine->query("SELECT * FROM `promo`");
        while ($q = $query->fetch_object()) {
            $return.= '<li class="list-group-item"> <p style="font-size: 20px;"> : ' . $q->name . ' <a href="?promo&type=edit&id=' . $q->id . '"><i class="fa fa-times" aria-hidden="true"></i></a> <a href="?=promo&type=remove&id=' . $q->id . '"><i class="fa fa-trash" aria-hidden="true"></i></a> </p> <span class="label label-success">: ' . $q->disc . '%</span> </li>';
        }
        return $return;
    }
	
    public function all_groups($server)
    {
        $query = $this->engine->query("SELECT * FROM `groups` WHERE `server` = '".(int)$server."'");
        while ($q = $query->fetch_object()) {
            if ($q->surcharge == 1)
                $s = '<span class="label label-success">С доплатой</span>';
            else
                $s = '<span class="label label-warning">Без доплаты</span>';

            $return .= '<li class="list-group-item">
                           <p style="font-size: 20px;">
                              ' . $q->name . '
                              <a href="?groups&type=edit&id=' . $q->id . '"><i class="fa fa-times" aria-hidden="true"></i></a>
                              <a href="?groups&type=remove&id=' . $q->id . '"><i class="fa fa-trash" aria-hidden="true"></i></a>
                           </p>
						   <span class="label label-warning">' . $q->price . ' РУБ</span>
						   ' . $s . '
						   ' . $c . '
						   <span class="label label-danger">' . $q->category . '</span>
                           <br><br><kbd style="background-color: #000000">' . $q->cmd . '</kbd>
                        </li>';
        }
        return $return;
    }

    public function all_servers() {
        $query = $this->engine->query("SELECT * FROM `servers`");
        while ($q = $query->fetch_object()) {
            $return.= '<li class="list-group-item"> <p style="font-size: 20px;"> : ' . $q->name . ' <a href="?server&type=edit&id=' . $q->id . '"><i class="fa fa-times" aria-hidden="true"></i></a> <a href="?server&type=remove&id=' . $q->id . '"><i class="fa fa-trash" aria-hidden="true"></i></a> </p> </li>';
        }
        return $return;
    }
    public function all_categ() {
        $query = $this->engine->query("SELECT * FROM `categ`");
        while ($q = $query->fetch_object()) {
            $return.= '<li class="list-group-item"> <p style="font-size: 20px;"> : ' . $q->name . ' <a href="?server&type=edit&id=' . $q->id . '"><i class="fa fa-times" aria-hidden="true"></i></a> <a href="?server&type=remove&id=' . $q->id . '"><i class="fa fa-trash" aria-hidden="true"></i></a> </p> </li>';
        }
        return $return;
    }
    public function all_admin() {
        $query = $this->engine->query("SELECT * FROM `admin`");
        while ($q = $query->fetch_object()) {
            $return.= '<li class="list-group-item"> <p style="font-size: 20px;"> : ' . $q->username . ' <a href="?=ad&type=edit&id=' . $q->id . '"><i class="fa fa-times" aria-hidden="true"></i></a> <a href="?=ad&type=remove&id=' . $q->username . '"><i class="fa fa-trash" aria-hidden="true"></i></a> </p> </li>';
        }
        return $return;
    }
    public function all_console_users() {
        $query = $this->engine->query("SELECT * FROM `console`");
        while ($q = $query->fetch_object()) {
            $return.= '<li class="list-group-item"> <p style="font-size: 20px;"> : ' . $q->nick . ' <a href="?=console&type=edit&id=' . $q->id . '"><i class="fa fa-times" aria-hidden="true"></i></a> <a href="?=console&type=remove&id=' . $q->id . '"><i class="fa fa-trash" aria-hidden="true"></i></a> </p> </li>';
        }
        return $return;
    }
    public function all_extradition() {
        $query = $this->engine->query("SELECT * FROM `extradition`");
        while ($q = $query->fetch_object()) {
            $return.= '<li class="list-group-item"> <p style="font-size: 20px;"> : ' . $q->name . ' <a href="?=extradition&type=edit&id=' . $q->id . '"><i class="fa fa-times" aria-hidden="true"></i></a> <a href="?=extradition&type=remove&id=' . $q->id . '"><i class="fa fa-trash" aria-hidden="true"></i></a> </p> <span class="label label-success">' . $q->ip . ':' . $q->port . '</span> </li>';
        }
        return $return;
    }
    public function all_servers_groups()
    {

        $query = $this->engine->query("SELECT * FROM `servers`");
        while ($q = $query->fetch_object()) {
            if ($q->status == 1)
                $s = '<span class="label label-success">Активирован</span>';
            else
                $s = '<span class="label label-warning">Не активирован</span>';
            $return .= '<li class="list-group-item">
                           <p style="font-size: 20px;">
                              Сервер: ' . $q->name . ' 
                           </p>
                           '.$s.'<br><br>
                              <a href="?groups=' . $q->id . '" class="btn btn-primary btn-xs btn-block">Перейти к группам</a>
                        </li>';
        }
        return $return;
    }

    public function all_donaters() {
        $query = $this->engine->query("SELECT * FROM `orders` WHERE status = 1 ORDER BY `id` DESC");
        while ($q = $query->fetch_object()) {
            $return.= '<tr> <td> ' . $q->id . ' </td> <td><b>' . $q->nick . '</b> [' . $this->engine->date($q->date . " " . $q->time) . ']</td> <td> ' . $q->group . ' </td> <td><span class="badge bg-green">' . $q->price . ' </span></td> </tr>';
        }
        return $return;
    }
    public function alert($text, $action) {
        return '<div class="alert show-alert alert-dismissible alert-' . $action . '"> <div class="show-alert-container"> <p>' . $text . '</p> </div> </div>';
    } /* GROUP */
    public function group($id) {
        $group = $this->engine->query_result("SELECT * FROM groups WHERE id = " . (int)$id . " LIMIT 1");
        if (!$group) return false;
        return $group;
    }
    public function remove_group($id) {
        $this->engine->query("DELETE FROM `groups` WHERE `id` = " . (int)$id);
    }
    public function add_group($group) {
        if (!$group['name'] || !$group['price'] || !$group['cmd'] || !$group['category'] || !$group['server']) return $this->alert("Ошибка", "danger");
        $this->engine->query("INSERT INTO `groups` (`name`, `price`, `surcharge`, `cmd`, `category`, `server`) VALUES ('" . $group['name'] . "', '" . $group['price'] . "', '" . $group['surcharge'] . "', '" . $group['cmd'] . "', '" . $group['category'] . "', '" . $group['server'] . "')");
        return $this->alert("Успешно", "success");
    }
    public function update_group($group, $id) {
        if (!$group['name'] || !$group['price'] || !$group['cmd'] || !$group['category'] || !$group['server']) return $this->alert("Ошибка", "danger");
        $this->engine->query("UPDATE `groups` SET `name`='" . $group['name'] . "',`price`='" . $group['price'] . "',`surcharge`='" . $group['surcharge'] . "',`cmd`='" . $group['cmd'] . "',`category`='" . $group['category'] . "',`server`='" . $group['server'] . "' WHERE id = " . (int)$id);
        return $this->alert("Успешно", "success");
    } /* CATEG */	
    public function categ($id) {
        $categ = $this->engine->query_result("SELECT * FROM categ WHERE id = " . (int)$id . " LIMIT 1");
        if (!$categ) return false;
        return $categ;
    }
    public function remove_categ($id) {
        $this->engine->query("DELETE FROM `categ` WHERE `id` = " . (int)$id);
    }
    public function add_categ($categ) {
        if (!$categ['name']) return $this->alert("Ошибка", "danger");
        $this->engine->query("INSERT INTO `categ`(`name`) VALUES ('{$categ['name']}')");
        return $this->alert("Успешно, перейди во вкладку главная", "success");
    }
    public function update_categ($categ, $id) {
        if (!$categ['name']) return $this->alert("Ошибка", "danger");
        $this->engine->query("UPDATE `categ` SET `name`='{$categ['name']}' WHERE id = " . (int)$id);
        return $this->alert("Успешно", "success");
    } /* SERVERS */
    public function server($id) {
        $server = $this->engine->query_result("SELECT * FROM servers WHERE id = " . (int)$id . " LIMIT 1");
        if (!$server) return false;
        return $server;
    }
    public function remove_server($id) {
        $this->engine->query("DELETE FROM `servers` WHERE `id` = " . (int)$id);
    }
    public function add_server($server) {
        if (!$server['name']) return $this->alert("Ошибка", "danger");
        $this->engine->query("INSERT INTO `servers`(`name`, `status`) VALUES ('{$server['name']}', '{$server['status']}')");
        return $this->alert("Успешно, перейди во вкладку главная", "success");
    }
    public function update_server($server, $id) {
        if (!$server['name']) return $this->alert("Ошибка", "danger");
        $this->engine->query("UPDATE `servers` SET `name`='{$server['name']}', `status`='{$server['status']}' WHERE id = " . (int)$id);
        return $this->alert("Успешно", "success");
    } /* EXTRA_SERVERS */
    public function extra($id) {
        $server = $this->engine->query_result("SELECT * FROM extradition WHERE id = " . (int)$id . " LIMIT 1");
        if (!$server) return false;
        return $server;
    }
    public function remove_extra($id) {
        $this->engine->query("DELETE FROM `extradition` WHERE `id` = " . (int)$id);
    }
    public function add_extra($server) {
        if (!$server['name'] || !$server['ip'] || !$server['port'] || !$server['pass']) return $this->alert("Ошибка", "danger");
        $this->engine->query("INSERT INTO `extradition`(`ip`, `port`, `pass`, `name`, `server`) VALUES ('{$server['ip']}', '{$server['port']}', '{$server['pass']}', '{$server['name']}', '{$server['server']}')");
        return $this->alert("Успешно", "success");
    }
    public function update_extra($server, $id) {
        if (!$server['name'] || !$server['ip'] || !$server['port'] || !$server['pass']) return $this->alert("Ошибка", "danger");
        $this->engine->query("UPDATE `extradition` SET `ip`='{$server['ip']}', `port`='{$server['port']}', `pass`='{$server['pass']}', `name`='{$server['name']}', `server`='{$server['server']}' WHERE id = " . (int)$id);
        return $this->alert("Успешно", "success");
    } /* ADMIN */
    public function admin($id) {
        $admin = $this->engine->query_result("SELECT * FROM admin WHERE id = " . (int)$id . " LIMIT 1");
        if (!$admin) return false;
        return $admin;
    }
    public function remove_admin($id) {
        $this->engine->query("DELETE FROM `admin` WHERE `id` = " . (int)$id);
    }
    public function add_admin($admin) {
        if (!$admin['username'] || !$admin['password']) return $this->alert("Ошибка", "danger");
        $this->engine->query("INSERT INTO `admin`(`username`, `password`) VALUES ('{$admin['username']}', '{$admin['password']}')");
        return $this->alert("Успешно", "success");
    }
    public function update_admin($admin, $id) {
        if (!$admin['username'] || !$admin['password']) return $this->alert("Ошибка", "danger");
        $this->engine->query("UPDATE `promo` SET `username`='" . $admin['username'] . "',`password`='" . $admin['password'] . "' WHERE id = " . (int)$id);
        return $this->alert("Успешно", "success");
    } /* PROMO */
    public function promo($id) {
        $promo = $this->engine->query_result("SELECT * FROM promo WHERE id = " . (int)$id . " LIMIT 1");
        if (!$promo) return false;
        return $promo;
    }
    public function remove_promo($id) {
        $this->engine->query("DELETE FROM `promo` WHERE `id` = " . (int)$id);
    }
    public function add_promo($promo) {
        if (!$promo['name'] || !$promo['disc']) return $this->alert("Ошибка", "danger");
        $this->engine->query("INSERT INTO `promo`(`name`, `disc`) VALUES ('{$promo['name']}', '{$promo['disc']}')");
        return $this->alert("Успешно", "success");
    }
    public function update_promo($promo, $id) {
        if (!$promo['name'] || !$promo['disc']) return $this->alert("Ошибка", "danger");
        $this->engine->query("UPDATE `promo` SET `name`='" . $promo['name'] . "',`disc`='" . $promo['disc'] . "' WHERE id = " . (int)$id);
        return $this->alert("Успешно", "success");
    } /* CONSOLE */
    public function console($id) {
        $console = $this->engine->query_result("SELECT * FROM `console` WHERE `id` = '" . (int)$id . "' LIMIT 1");
        if (!$console) return false;
        return $console;
    }
    public function update_console($console, $id) {
        if (!$console['name'] || !$console['pass'] || !$console['commands'] || !$console['server']) return $this->alert("Ошибка", "danger");
        $this->engine->query("UPDATE `console` SET `nick` = '" . $console['name'] . "', `password` = '" . $console['pass'] . "', `commands` = '" . $console['commands'] . "', `server` = '" . $console['server'] . "' WHERE `id` = '" . (int)$id . "'");
        return $this->alert("Успешно", "success");
    }
    public function remove_console($id) {
        $this->engine->query("DELETE FROM `console` WHERE `id` = " . (int)$id);
    }
    public function add_console($console) {
        if (!$console['name'] || !$console['pass'] || !$console['commands'] || !$console['server']) return $this->alert("Ошибка", "danger");
        $this->engine->query("INSERT INTO `console` (`nick`, `password`, `commands`, `server`) VALUES ('" . $console['name'] . "', '" . $console['pass'] . "', '" . $console['commands'] . "', '" . $console['server'] . "')");
        return $this->alert("Успешно", "success");
    }
    public function cmd_alert($nick) {
        $sql = $this->engine->query_result("SELECT `commands` FROM `console` WHERE `nick` = '" . $nick . "' LIMIT 1");
        $string = str_ireplace(";", '
', $sql->commands);
        return $string;
    }
    public function add_log($nick, $cmd) {
        $nick = htmlspecialchars(addslashes($nick));
        $cmd = htmlspecialchars(addslashes($cmd));
        $this->engine->query("INSERT INTO `console-logs` (`nick`, `cmd`) VALUES ('" . $nick . "', '" . $cmd . "')");
    }
}