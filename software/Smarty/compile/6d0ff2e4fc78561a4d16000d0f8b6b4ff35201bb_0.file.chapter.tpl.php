<?php
/* Smarty version 4.3.0, created on 2023-03-03 12:41:20
  from 'C:\xamppx\htdocs\fsx\library\themes\nucleus\pages\chapter.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6401dce0f34e28_75778377',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d0ff2e4fc78561a4d16000d0f8b6b4ff35201bb' => 
    array (
      0 => 'C:\\xamppx\\htdocs\\fsx\\library\\themes\\nucleus\\pages\\chapter.tpl',
      1 => 1677256062,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6401dce0f34e28_75778377 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['images']->value, 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
    <img src="data/chapters/<?php echo $_smarty_tpl->tpl_vars['chapter']->value['id'];?>
/<?php echo basename($_smarty_tpl->tpl_vars['item']->value);?>
" alt="Page <?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
">
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
