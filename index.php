<?php session_start();
require_once ('libs/smarty/Smarty.class.php');
include ('engine/classes/Main.class.php');
$engine = new Engine();
$smarty = new Smarty;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'] . '/templates/');
$smarty->assign('get_servers', $engine->get_servers());
$smarty->assign('get_form', $engine->get_form());
if ($_SESSION['audio']) $smarty->assign('audio', "off");
else {
    $smarty->assign('audio', "on");
    $_SESSION['audio'] = "off";
}
$smarty->assign('messages_list', $engine->messages);
$smarty->assign('cfg', $engine->cfg);
$smarty->assign('serverName_one', $engine->colorName(1, $engine->cfg['server']['name']));
$smarty->assign('serverName_two', $engine->colorName(2, $engine->cfg['server']['name']));
$smarty->assign('showImg', $engine->showImg('styles/img/donate/'));
$smarty->display('main.html');
define('SERVER_DIR', dirname ( __FILE__ ));
define('STYLE_DIR', SERVER_DIR.'/styles');