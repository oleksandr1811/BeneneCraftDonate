<?php
/* Smarty version 3.1.30, created on 2021-02-13 22:41:50
  from "C:\Users\whita\Desktop\OSPanel\domains\mixdonate.su\poki.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60282b7ee5f096_04323814',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0d6937719c8f146951779349c3e6793a520eef97' => 
    array (
      0 => 'C:\\Users\\whita\\Desktop\\OSPanel\\domains\\mixdonate.su\\poki.php',
      1 => 1613245308,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60282b7ee5f096_04323814 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php ';?>session_start();
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
$smarty->display('poki.php');
define('SERVER_DIR', dirname ( __FILE__ ));
define('STYLE_DIR', SERVER_DIR.'/styles');
<?php echo '?>';?>
<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#eeb851">

	<title>Как купить донат?</title>

	<meta name="description" content="Как купить или туториал покупки игровых товаров на Майнкрафт (Minecraft) сервере MasedWorld">
    <meta name="keywords" content="minecraft, майнкрафт, сервер, майнкрафт сервер, донат, магазин, кейсы, привилегии, масед донат, MasedWorld, MasedWorld донат, бесплатный донат, майнкрафт 1.8-1.16.4">

    <link rel="stylesheet" href="../ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
	
    <?php echo '<script'; ?>
 src="../ajax/libs/jquery/3.3.1/jquery.min.js"><?php echo '</script'; ?>
>

</head>
<body class="bgfixed">
<header>
    <div class="navbar-light navbar-expand-lg2">
        <div class="container">
            <div class="menu d-flex align-items-center justify-content-between">
				<a href="/" class="link-mobile">
                    <img src="assets/close.svg">
                </a>
            </div>
        </div>
    </div>
</header>
<div class="pageHowtobuy container">
    <div class="row justify-content-end">
        <div class="col-12  col-lg-4 alerts order-1 order-lg-0">
            <div>
                <h2>Выдаем донат навсегда</h2>
                <p>Привилегия не пропадет после вайпа, так же у нас работает доплата</p>
				<a href="/"><button class="bg">Купить привилегию</button></a>
            </div>
            <div>
                <h2>Возникли трудности?</h2>
                <p>Наша служба поддержки всегда будет рада помочь тебе!</p>
                <a href="https://vk.me/mixstd"><button class="bordered">Рассказать о проблеме</button></a>
            </div>
        </div>
        <div class="col-12 col-lg-8 steps">
            <div>
                <h2>1. Выбери сервер, введи ник и выбери привилегию</h2>
                <img src="../assets/steps/1.jpg">
            </div>
            <div>
                <h2>2. Выбери удобный способ оплаты</h2>
                <img src="../assets/steps/2.jpg">
            </div>
            <div>
                <h2>3. Введи свой номер телефона или лицевой счет</h2>
                <img src="../assets/steps/3.jpg">
            </div>
            <div>
                <h2>4. Перейди к оплате (Для примера показан QIWI)</h2>
                <img src="../assets/steps/4.jpg">
            </div>
            <div>
                <h2>5. Готово! Наслаждайтесь игрой!</h2>
            </div>
        </div>
    </div>
</div>
<noscript><div><img src="../watch/50457259/1.gif" style="position:absolute; left:-9999px;" alt=""></div></noscript>
</body>
</html><?php }
}
