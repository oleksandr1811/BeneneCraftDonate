<?php
/* Smarty version 3.1.30, created on 2021-01-19 16:45:13
  from "C:\Users\whita\Desktop\OSPanel\domains\wxcvsdcvdsd.ru\templates\main.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6006e2699a24a0_68473084',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a8172562852e19d82b31927c4f1e55f60e2b3be' => 
    array (
      0 => 'C:\\Users\\whita\\Desktop\\OSPanel\\domains\\wxcvsdcvdsd.ru\\templates\\main.html',
      1 => 1611063908,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.html' => 1,
  ),
),false)) {
function content_6006e2699a24a0_68473084 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#eeb851">
	<link type="image/x-icon" rel="shortcut icon" href="/favicon.png" />
	
	<title><?php echo $_smarty_tpl->tpl_vars['cfg']->value['server']['name'];?>
 | Покупка привилегий</title>

	<meta name="description" content="Покупка игровой привилегии и кейсов на сервере Майнкрафт (Minecraft) <?php echo $_smarty_tpl->tpl_vars['cfg']->value['server']['name'];?>
, версия сервера с 1.8 по 1.16.4. У нас есть бесплатные донат привилегии!">
    <meta name="keywords" content="minecraft, майнкрафт, сервер, майнкрафт сервер, донат, магазин, кейсы, привилегии, масед донат, <?php echo $_smarty_tpl->tpl_vars['cfg']->value['server']['name'];?>
, <?php echo $_smarty_tpl->tpl_vars['cfg']->value['server']['name'];?>
 донат, бесплатный донат, майнкрафт 1.8-1.16.4">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/style.css">

    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"><?php echo '</script'; ?>
>

</head>
<body>

<div class="sidenav" id="sidenav_mobile">
    <div class="close" id="sidenav_mobile_close"><img src="assets/close.svg"></div>
    <a href="https://vk.com/mixstd">Правила</a>
    <a href="https://vk.com/mixstd">Как купить донат?</a>
    <a href="https://vk.com/mixstd">Описание доната</a>
    <a href="https://vk.com/mixstd">Контакты</a>
</div>
<header>
    <div class="navbar-light navbar-expand-lg2">
        <div class="container">
            <div class="menu d-flex align-items-center justify-content-between">
                <span id="sidenav_mobile_toggle" class="link-mobile">
                    <img src="assets/menu.svg">
                </span>
                <a href="#" class="logo align-self-lg-start"><img class="logo" src="assets/logo.png"></a>
                <span class="d-none d-lg-inline d-md-none" style="text-align: center;">
                    <a href="https://vk.com/mixstd" style="color: white;"><img src="assets/rules.svg">Правила</a>
					<a href="https://vk.com/mixstd" style="color: white;"><img src="assets/donate.svg">Как купить донат?</a>
                    <a href="https://vk.com/mixstd" style="color: white;"><img src="assets/opis.svg">Описание доната</a>
                    <a href="https://vk.com/mixstd" style="color: white;"><img src="assets/contact.svg">Контакты</a>
                    <br>
                </span>
                <a href="console/index.php" class="console d-none d-lg-block">Войти в консоль</a>
                <a href="console/index.php" class="link-mobile">
                    <img src="assets/console-m.svg">
                </a>
            </div>
        </div>
    </div>
</header>
<div class="container main">
<div id="action">
<img src="/styles/img/phone.png" alt="Выиграй IPhone 11 PRO MAX" />
</div>
	<br>
	
    <div class="row">
        <div class="col-12 col-lg-7 donate">
            <div class="donateDiv">
			
                <div class="row tabs">
						<ul class="nav nav-tabs"  role="tablist">
							<?php echo $_smarty_tpl->tpl_vars['get_servers']->value;?>

						</ul></div>
                <div class="row justify-content-center tabs-content">
				
					
					 <div class="col-11 col-lg-7 content srvsurvival active">

					   <div class="info d-flex align-items-center justify-content-center">
                            <img src="assets/donate-icon.svg">
                            <span><b>Весь донат продается навсегда<br>
                                и остаётся после вайпов</b><br>
                                Оплата происходит без комиссии
                            </span>
                        </div>
								<div class="tab-content"><?php $_smarty_tpl->_subTemplateRender("file:messages.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

									<?php echo $_smarty_tpl->tpl_vars['get_form']->value;?>

								</div>					
                        </form>
                    </div>
			    </div>
            </div>
        </div>			
        <div class="col-12 col-lg-5 timer">
            <div class="timerDiv">
                <div class="header d-flex flex-column justify-content-center align-content-center">
				
                    <h1>Купите донат со скидкой 90%</h1>
                    <h2>[Владелец] + /op + ЗВЕЗДА всего за <b>479 рублей</b></h2>
                </div>
				
                <div class="row justify-content-center">
                    <div class="col content">
					    <br>
                        <div class="text">До завершения акции осталось:</div>
                        <div class="nums d-flex justify-content-around justify-content-lg-between">
                            <div class="h second"></div>
                            <div class="m third "></div>
                            <div class="s four"></div>
                        </div>
						<br>						
                        <div class="info d-flex justify-content-center align-items-center">
                            <img src="assets\timer-info.svg">
                            <div>
                                Кейсы с увеличенным шансом<br>
                                Осталось: <span>125 штук</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container lasts">
    <h1>Последние покупки</h1>
	<div class="user col-4 col-lg-1">
	<div class="donat" id="donaters"></div>
</div>

<footer> <div class="container">VK для связи <a href="https://vk.com/mixstd" target="_blank">MixStudio</a></div></footer>
<?php echo '<script'; ?>
 src="/styles/js/preloader.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="/styles/js/jquery-3.4.0.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="/styles/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="/styles/js/countdown.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="/styles/js/script.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="/styles/js/valid.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
