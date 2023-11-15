<?php
/* Smarty version 4.3.0, created on 2023-11-15 23:03:45
  from 'C:\xamppx\htdocs\ictest\system\themes\euphoria\parts\footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_65554041814ea5_68646575',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3bd6dc280ead195c5d6b266a16837c16ae9f16a' => 
    array (
      0 => 'C:\\xamppx\\htdocs\\ictest\\system\\themes\\euphoria\\parts\\footer.tpl',
      1 => 1700085820,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65554041814ea5_68646575 (Smarty_Internal_Template $_smarty_tpl) {
?></div>

<footer class="my-4 bg-gray-50 dark:bg-gray-700">
    <div class="w-full mx-auto max-w-screen-xl p-2 md:flex md:items-center md:justify-between">
        <span class="text-sm sm:text-center">
            Copyright &copy; <?php echo date("Y");?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['url'];?>
"
                class="hover:underline text-blue-600"><?php echo $_smarty_tpl->tpl_vars['config']->value['title'];?>
</a>.
            Proudly powered by <a href="https://github.com/saintly2k/FoOlSlideX" target="_blank"
                class="hover:underline text-blue-600">FoOlSlideX</a>
            <span
                class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 dark:bg-blue-900 dark:text-blue-300">v<?php echo $_smarty_tpl->tpl_vars['version']->value;?>
</span>
        </span>
        <ul class="flex flex-wrap items-center mt-2 text-sm font-medium sm:mt-0 space-x-4">
            <?php if (empty($_smarty_tpl->tpl_vars['menu']->value)) {?>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['url'];?>
index" class="text-gray-900 dark:text-white hover:underline">Index</a>
                </li>
            <?php } else { ?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu']->value, 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                    <?php if (!$_smarty_tpl->tpl_vars['item']->value['hidden']) {?>
                        <?php if (($_smarty_tpl->tpl_vars['item']->value['reqlogged'] && $_smarty_tpl->tpl_vars['logged']->value) || !$_smarty_tpl->tpl_vars['item']->value['reqlogged']) {?>
                            <li>
                                <a href="<?php if (startsWith($_smarty_tpl->tpl_vars['item']->value['url'],"http")) {
echo $_smarty_tpl->tpl_vars['item']->value['url'];
} else {
echo $_smarty_tpl->tpl_vars['config']->value['url'];
echo $_smarty_tpl->tpl_vars['item']->value['url'];
}?>"
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['newtab']) {?>target="_blank" <?php }?>
                                    class="text-gray-900 dark:text-white hover:underline"><?php echo $_smarty_tpl->tpl_vars['item']->value['display'];?>
</a>
                            </li>
                        <?php }?>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php }?>
        </ul>
    </div>
</footer><?php }
}
