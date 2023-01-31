<?php
/* Smarty version 3.1.30, created on 2021-02-20 22:46:26
  from "C:\Users\whita\Desktop\OSPanel\domains\mixdonate.su\templates\main.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_60316712702ae4_95971628',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '23512a874ea5dce453fbbfbc2a4e4a2800cd543e' => 
    array (
      0 => 'C:\\Users\\whita\\Desktop\\OSPanel\\domains\\mixdonate.su\\templates\\main.html',
      1 => 1613850383,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.html' => 1,
  ),
),false)) {
function content_60316712702ae4_95971628 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#eeb851">
	<link type="image/x-icon" rel="shortcut icon" href="/favicon.png" />
	<link type="text/css" rel="stylesheet" href="/styles/css/main.css"/>
	
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
<style>
body {
    background: url("/assets/bg.png") center no-repeat fixed;
	background-size: cover;
}
</style>
<header>
    <div class="navbar-light navbar-expand-lg2">
        <div class="container">
            <div class="menu d-flex align-items-center justify-content-between">
				<a href="#" class="link-mobile" data-toggle="modal" data-target="#Contacts"><i class="fa fa-address-book"></i>
                <img src="assets/menu.svg">
                </a>
                <a  href="javascript:"  onclick="prompt('Скопируйте наш IP адрес и вставьте в ваш клиент:','<?php echo $_smarty_tpl->tpl_vars['cfg']->value['server']['ip'];?>
'); return false;"><em><b style="	font-size: 29px;
                color: #fff;"><?php echo $_smarty_tpl->tpl_vars['cfg']->value['server']['name'];?>
</b></em></a>				
                <span class="d-none d-lg-inline d-md-none" style="text-align: center;">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['links']['0']['href'];?>
" style="color: white;"><img src="assets/rules.svg">Правила</a>
					<a href="poki.php" style="color: white;"><img src="assets/donate.svg">Как купить донат?</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['links']['1']['href'];?>
" style="color: white;"><img src="assets/opis.svg">Описание доната</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['links']['2']['href'];?>
" style="color: white;"><img src="assets/contact.svg">Контакты</a>
                    <br>
                    <a href="/templates/privacy.html" style="color: white;"><img src="assets/customization.svg">Политика конфиденциальности</a>
					<a href="soglachenie.docx" style="color: white;"><img src="assets/customization.svg">Пользовательское соглашение</a>
                </span>
                <a href="console/index.php" class="console d-none d-lg-block">Войти в консоль</a>
                <a href="console/index.php" class="link-mobile">
                    <img src="assets/console-m.svg">
                </a>
            </div>
        </div>
    </div>
</header>
<style>
</style>
		<!-- Контакты -->
		<div class="modal fade" id="Contacts" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
<h5 class="modal-title" id="ContactsLabel" style="color: black;">Навигация</h5>
						<button style="	font-size: 29px;" class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<a href="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['links']['0']['href'];?>
"><b  style="	font-size: 22px;
                color: black;">Правила</b></p>
					</div>
					<hr size=150px width=500px align="left" color="white">
					<div class="modal-body">
						<a href="poki.php"><b  style="	font-size: 22px;
                color: black;">Как купить донат?</b></p>
					</div>
					<hr size=150px width=500px align="left" color="white">
					<div class="modal-body">
						<a href="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['links']['1']['href'];?>
"><b  style="	font-size: 22px;
                color: black;">Описание доната</b></p>
					</div>
					<hr size=150px width=500px align="left" color="white">					
					<div class="modal-body">
						<a href="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['links']['2']['href'];?>
"><b  style="	font-size: 22px;
                color: black;">Контакты</b></p>
					</div>
					<hr size=150px width=500px align="left" color="white">					
					<div class="modal-body">
						<a href="/templates/privacy.html"><b  style="	font-size: 22px;
                color: black;">Политика конфиденциальности</b></p>
					</div>
					<hr size=150px width=500px align="left" color="white">					
					<div class="modal-body">
						<a href="soglachenie.docx"><b  style="	font-size: 22px;
                color: black;">Пользовательское соглашение</b></p>
					</div>
				</div>
			</div>
		</div>
<div class="container main">
<div id="action">
<img src="/assets/iphone.png" alt="First slide">
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
				
                    <h1><?php echo $_smarty_tpl->tpl_vars['cfg']->value['okno']['1'];?>
</h1>
                    <h2><?php echo $_smarty_tpl->tpl_vars['cfg']->value['okno']['2'];?>
</h2>
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
                                <?php echo $_smarty_tpl->tpl_vars['cfg']->value['okno']['3'];?>

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
	<div class="donat" id="donaters"></div>
</div>

<footer> <div class="container">VK для связи <a href="<?php echo $_smarty_tpl->tpl_vars['cfg']->value['links']['2']['href'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['cfg']->value['server']['name'];?>
</a></div></footer>
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
