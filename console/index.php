<?php
@session_start();

if(!$_SESSION['console-user'])
{
    header('location:/console/login.php');
    exit();
}

require_once $_SERVER['DOCUMENT_ROOT'].'/engine/classes/Admin.class.php';
$Admin = new Admin();

if(isset($_GET['action'])) $action = $_GET['action'];
else $action = 'index';

$console = $Admin->engine->query_result("SELECT `server` FROM `console` WHERE `nick` = '".$_SESSION['console-user']."' LIMIT 1");
$extra = $Admin->engine->query_result("SELECT * FROM `extradition` WHERE `id` = '".(int)$console->server."'");

$_SESSION['console-server_id'] = $extra->id;

?>

<!DOCTYPE HTML>
<html lang="ru">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?=$Admin->engine->cfg['server']['name']?> > Консоль</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../styles/css/fonts.css"/>
    <link rel="stylesheet" type="text/css" href="styles/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="styles/css/style.css">
    <script type="text/javascript" src="styles/js/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="styles/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="styles/js/jquery-ui-1.12.0.min.js"></script>
    <script type="text/javascript" src="styles/js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="styles/js/script.js" ></script>
    <script type="text/javascript" src="styles/js/account.js" ></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
    <header>
        <div class="container">
            <div class="header__container">
                <div class="twoForms">
                    <div class="server">
                        <p>Сервер: <span class="server_span"><?=$extra->name?></span></p>
                    </div>
                    <div class="account">
                        <p class="account_nick"><?=$_SESSION['console-user']?></p><i class="fas fa-chevron-down account_chev" id="account_chevron"></i>
                        <div id="account-info">
                            <div class="account__container">
                                <p class="accout-p" id="account_how" onclick="alert('Как использовать:\nВведите команду, к которой у вас есть доступ\nи обязательно после неё поставьте пробел,\nибо она не будет выполнена.');">Как использовать</p>
                                <p class="accout-p" id="account_cmd" onclick="alert('Доступные команды:\n<?=$Admin->cmd_alert($_SESSION['console-user'])?>');">Доступные команды</p>
                                <a href="logout.php" class="accout-p">Выйти</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <body>
        <div class="console">
            <div class="container-fluid" id="content">
                <div id="consoleRow">
                    <div class="panel panel-default" id="consoleContent">
                        <div class="panel-body">
                            <ul class="list-group" id="groupConsole"></ul>
                        </div>
                    </div>
                    <div class="inputend_sek">
                        <div class="input-group" id="consoleCommand">
                            <div id="txtCommandResults"></div>
                            <input type="text" placeholder="Введите команду" class="form-control input_commands" id="txtCommand" />
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-outline-primary btn__input" id="btnSend"><i class="fas fa-long-arrow-alt-right strelka_font"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>