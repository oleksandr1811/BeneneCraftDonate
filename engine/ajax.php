<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/engine/classes/Main.class.php';

$Engine = new Engine;
function message($data,$err = false){
    return json_encode(array(
        'error' => $err,
        'data' => $data
    ));
}
if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/engine/ajax/' . $_GET['type'] . '.php')) {
    $type = $_GET['get'];
    include($_SERVER['DOCUMENT_ROOT'] . '/engine/ajax/' . $_GET['type'] . '.php');
} elseif($_REQUEST['nick'] && $_REQUEST['srv']) die($Engine->buy_price($_REQUEST['nick'],$_REQUEST['group'],$_REQUEST['promo'],$_REQUEST['srv'], "check")); 
else
    die("UNKNOW AJAX");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
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
	}
}