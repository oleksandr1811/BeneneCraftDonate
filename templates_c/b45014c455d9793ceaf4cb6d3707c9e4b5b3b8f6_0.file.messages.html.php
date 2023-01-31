<?php
/* Smarty version 3.1.30, created on 2021-02-01 19:10:29
  from "C:\Users\whita\Desktop\OSPanel\domains\mixdonate.sp\templates\messages.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_601827f5115229_57308644',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b45014c455d9793ceaf4cb6d3707c9e4b5b3b8f6' => 
    array (
      0 => 'C:\\Users\\whita\\Desktop\\OSPanel\\domains\\mixdonate.sp\\templates\\messages.html',
      1 => 1609848281,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_601827f5115229_57308644 (Smarty_Internal_Template $_smarty_tpl) {
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
