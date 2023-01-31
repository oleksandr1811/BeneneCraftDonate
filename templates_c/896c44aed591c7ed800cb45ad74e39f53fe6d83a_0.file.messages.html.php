<?php
/* Smarty version 3.1.30, created on 2021-01-21 21:13:42
  from "C:\Users\whita\Desktop\OSPanel\domains\mixdonate.ru\templates\messages.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6009c456e36204_78037538',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '896c44aed591c7ed800cb45ad74e39f53fe6d83a' => 
    array (
      0 => 'C:\\Users\\whita\\Desktop\\OSPanel\\domains\\mixdonate.ru\\templates\\messages.html',
      1 => 1609848281,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6009c456e36204_78037538 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages_list']->value, 'message');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['message']->value) {
?>
	<?php if ($_smarty_tpl->tpl_vars['message']->value['err']) {?>
		<div class="alert alert-dismissible alert-danger">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong><strong>Ошибка!</strong> <?php echo $_smarty_tpl->tpl_vars['message']->value['text'];?>
</strong>
		</div>
	<?php } else { ?>
		<div class="alert alert-dismissible alert-success">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong><strong>Успешно!</strong> <?php echo $_smarty_tpl->tpl_vars['message']->value['text'];?>
</strong>
		</div>
	<?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
}
}
