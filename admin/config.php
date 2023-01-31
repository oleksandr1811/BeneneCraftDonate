<?php
@session_start();
if(!$_SESSION['username'])
{
    header('location:/admin/login.php');
    exit();
}
require_once $_SERVER['DOCUMENT_ROOT'].'/engine/classes/Admin.class.php';
$Admin = new Admin();

if($_POST['ip-bd']) {
    $Admin->engine->cfg['db']['db_host'] = $_POST['ip-bd'];
    $Admin->engine->cfg['db']['db_user'] = $_POST['user-bd'];
    $Admin->engine->cfg['db']['db_pass'] = $_POST['pass-bd'];
    $Admin->engine->cfg['db']['db_name'] = $_POST['name-bd'];
    $Admin->engine->cfg['server']['ip']  = $_POST['ip-server'];
    $Admin->engine->cfg['server']['name']= $_POST['name-server'];
    $Admin->engine->cfg['unitpay']['project_id'] = $_POST['plati-id'];
    $Admin->engine->cfg['unitpay']['key'] = $_POST['plati-key'];
	$Admin->engine->cfg['vk']['accessToken'] = $_POST['vktoken'];
	$Admin->engine->cfg['vk']['accs'] = $_POST['vkaccs'];
	$Admin->engine->cfg['links']['0']['href'] = $_POST['0href'];
	$Admin->engine->cfg['links']['1']['href'] = $_POST['1href'];
	$Admin->engine->cfg['links']['2']['href'] = $_POST['2href'];
    $Admin->engine->cfg['qiwi']['site_id'] = $_POST['site_id'];
    $Admin->engine->cfg['qiwi']['public_key'] = $_POST['public_key'];
    $Admin->engine->cfg['qiwi']['secret_key'] = $_POST['secret_key'];
    $Admin->engine->cfg['okno']['1'] = $_POST['okno1'];
    $Admin->engine->cfg['okno']['2'] = $_POST['okno2'];
    $Admin->engine->cfg['okno']['3'] = $_POST['okno3'];

    $txt  = '<?php' . PHP_EOL;
    $txt .= "//Generated with love!" . PHP_EOL;
    $txt .= '$config = '.var_export($Admin->engine->cfg, true).';' . PHP_EOL;

    define('LD_ROOT_DIR', dirname(__FILE__));
    file_put_contents(LD_ROOT_DIR . "../../engine/config.php", $txt);
    echo "<script>window.location.href='/admin/'</script>";
}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/admin/styles/css/installer.css">
    <link type="text/css" rel="stylesheet" href="/styles/css/fonts.css" />
    <title>Настройка сайта</title>
</head>
<style>
*,
*:after,
*:before {
    box-sizing: border-box;
}

p {
    margin: 0;
}

body {
    background: url("/styles/img/installer-bg.jpg") center no-repeat fixed;
    background-size: cover;
    font-family: 'MuseoSansCyrl-100', sans-serif;
    font-size: 18px;
}

.container {
    width: 100%;
    height: 100%;
}

.installer {
    background: #262635;
    width: 1000px;
    height: 2525px;
    border-radius: 50px;
    margin: 44px auto 0;
    box-shadow: 0 0 10px rgba(73,73,92,0.5);
}

.installer-container {
    width: 450px;
    height: 100%;
    margin: auto;
    display: flex;
    justify-content: center;
}

.installer-title {
    font-family: 'MuseoSansCyrl-900', sans-serif;
    margin-top: 90px;
    margin-bottom: 35px;
    font-size: 40px;
    color: white;
}

.dataForm {
    margin-bottom: 20px;
}

.dataForm input {
    font-size: 18px;
    background-color: #343448;
    border-radius: 15px;
    border: 1px solid #7b7b82;
    width: 450px;
    height: 60px;
    outline: none;
    padding: 25px;
    color: white;
}

.form__button {
    display: inline-block;
    vertical-align: top;
    padding: 20px 38px;
    cursor: pointer;
    font-family: 'MuseoSansCyrl-500', sans-serif;
    font-size: 20px;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    border: #7b7b82 2px solid;
    background-color: #343448;
    transition: background-color .1s linear;
}

.form__button:hover {
    background-color: #2f2f3e;
    color: #e0e0e0;
}

.mega__area {
    width: 100%;
    display: flex;
    justify-content: center;
}

.mega__area.button {
    margin-bottom: 30px;
}

.rules {
    text-decoration: none;
    border-bottom: 1px #c5c5c5 dashed;
    font-family: 'MuseoSansCyrl-300', sans-serif;
    color: #c5c5c5;
    font-size: 20px;
}

.rules:hover {
    color: #b6b6b7;
    border-bottom: 1px #b6b6b7 dashed;
}

.rules.instruction {
    margin-top: 8px;
}

.installer-title {
    font-family: 'MuseoSansCyrl-900', sans-serif;
    margin-top: 30px;
    margin-bottom: 25px;
}
</style>
<body>
<div class="container">
    <div class="installer">
        <div class="installer-container">
            <form method="post">
                <div class="mega__area">
                    <p class="installer-title">Настройка сайта</p>
                </div>
                <div class="dataForm">
                    <input type="text" name="ip-bd" maxlength="20" placeholder="Айпи базы-данных (в основном localhost)" value="<?=$Admin->engine->cfg['db']['db_host']?>" required>
                </div>
                <div class="dataForm">
                    <input type="text" name="name-bd" placeholder="Название базы-данных" value="<?=$Admin->engine->cfg['db']['db_name']?>" required>
                </div>
                <div class="dataForm">
                    <input type="text" name="user-bd" placeholder="Пользователь базы-данных" value="<?=$Admin->engine->cfg['db']['db_user']?>" required>
                </div>
                <div class="dataForm">
                    <input type="text" name="pass-bd" placeholder="Пароль базы-данных" value="<?=$Admin->engine->cfg['db']['db_pass']?>" required>
                </div>
                <div class="mega__area">
                    <p class="installer-title">Настройка сервера</p>
                </div>
                <div class="dataForm">
                    <input type="text" name="name-server" placeholder="Название майнкрафт-сервера" value="<?=$Admin->engine->cfg['server']['name']?>" required>
                </div>
                <div class="dataForm">
                    <input type="text" name="ip-server" placeholder="Айпи майнкрафт-сервера" value="<?=$Admin->engine->cfg['server']['ip']?>" required>
                </div>
				<div class="mega__area">
                    <p class="installer-title">Настройки оплаты Unitpay</p>
                </div>
                <div class="dataForm">
                    <input type="text" name="plati-id" placeholder="Номер проекта (в платёжной системе)" value="<?=$Admin->engine->cfg['unitpay']['project_id']?>" required>
                </div>
                <div class="dataForm">
                    <input type="text" name="plati-key" placeholder="Ключ проекта (в платёжной системе)" value="<?=$Admin->engine->cfg['unitpay']['key']?>" required>
                </div>
				<div class="mega__area">
                    <p class="installer-title">Настройки оплаты Qiwi</p>
                </div>
                <div class="dataForm">
                    <input type="text" name="site_id" placeholder="Номер проекта (в платёжной системе)" value="<?=$Admin->engine->cfg['qiwi']['site_id']?>" required>
                </div>
                <div class="dataForm">
                    <input type="text" name="public_key" placeholder="Ключ публичный (в платёжной системе)" value="<?=$Admin->engine->cfg['qiwi']['public_key']?>" required>
                </div>
                <div class="dataForm">
                    <input type="text" name="secret_key" placeholder="Ключ секретный (в платёжной системе)" value="<?=$Admin->engine->cfg['qiwi']['secret_key']?>" required>
                </div>
				<div class="mega__area">
                    <p class="installer-title">Настройки уведомлений VK</p>
                </div>
				<div class="dataForm">
                    <input type="text" name="vktoken" placeholder="Ключ доступа пользователи/сообщества от которого будут отправляться сообщения" value="<?=$Admin->engine->cfg['vk']['accessToken']?>" required>
                </div>
				<div class="dataForm">
                    <input type="text" name="vkaccs" placeholder="ID Аккаунта ВК на который будут отправляться уведомления" value="<?=$Admin->engine->cfg['vk']['accs']?>" required>
                </div>
				<div class="mega__area">
                    <p class="installer-title">Настройки правой стороны</p>
                </div>
				<div class="dataForm">
                    <input type="text" name="okno1" placeholder="Первая строка" value="<?=$Admin->engine->cfg['okno']['1']?>" required>
                </div>
				<div class="dataForm">
                    <input type="text" name="okno2" placeholder="Вторая строка" value="<?=$Admin->engine->cfg['okno']['2']?>" required>
                </div>
				<div class="dataForm">
                    <input type="text" name="okno3" placeholder="Третья строка Кейсы" value="<?=$Admin->engine->cfg['okno']['3']?>" required>
                </div>
				<div class="mega__area">
                    <p class="installer-title">Настройки ссылок</p>
                </div>
				<div class="dataForm">
                    <input type="text" name="0href" placeholder="Правила ссылка" value="<?=$Admin->engine->cfg['links']['0']['href']?>" required>
                </div>
				<div class="dataForm">
                    <input type="text" name="1href" placeholder="Описание привелегий ссылка" value="<?=$Admin->engine->cfg['links']['1']['href']?>" required>
                </div>
				<div class="dataForm">
                    <input type="text" name="2href" placeholder="Контакты (ссылка на группу вк)" value="<?=$Admin->engine->cfg['links']['2']['href']?>" required>
                </div>				
                <div class="mega__area button">
                    <input type="submit" class="form__button" value="Изменить">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
