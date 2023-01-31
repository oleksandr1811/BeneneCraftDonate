<?php @session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/engine/classes/Admin.class.php';
$Admin = new Admin();
require '../../engine/classes/Rcon.class.php';
$id = $_SESSION['console-server_id'];
$query = $Admin->engine->query_result("SELECT `ip`, `port`, `pass` FROM `extradition` WHERE `id` = " . (int)$id);
$commands = $Admin->engine->query_result("SELECT `commands` FROM `console` WHERE `nick` = '" . $_SESSION['console-user'] . "'");
$commands = $commands->commands;
$timeout = 3;
$rcon = new Rcon($query->ip, $query->port, $query->pass, $timeout);
if (!isset($_POST['cmd'])) return;
$cmds = explode(";", $commands);
$post = $_POST['cmd'];
$searchResult = array_reduce($cmds, function ($c, $item) use ($post) {
    return $c || strpos($_POST['cmd'], $item . " ") !== false;
});
if (!$searchResult & $commands !== '*') {
    echo (' !');
    return;
}
$Admin->add_log($_SESSION['console-user'], $post);
if ($rcon->connect()) {
    $rcon->send_command($_POST['cmd']);
    echo preg_replace("/./", "", $rcon->get_response());
}