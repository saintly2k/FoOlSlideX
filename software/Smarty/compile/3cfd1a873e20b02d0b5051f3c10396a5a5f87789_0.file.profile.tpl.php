<?php
/* Smarty version 4.3.0, created on 2023-11-15 18:15:32
  from 'C:\xamppx\htdocs\ictest\system\themes\euphoria\pages\profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6554fcb44aa204_76888538',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3cfd1a873e20b02d0b5051f3c10396a5a5f87789' => 
    array (
      0 => 'C:\\xamppx\\htdocs\\ictest\\system\\themes\\euphoria\\pages\\profile.tpl',
      1 => 1700064184,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6554fcb44aa204_76888538 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="flex px-2 py-1 text-gray-700 bg-gray-50 dark:bg-gray-800 mb-4" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['url'];?>
"
                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <?php echo $_smarty_tpl->tpl_vars['config']->value['title'];?>

            </a>
        </li>
        <li>
            <div class="flex items-center">
                <span class="text-gray-400 cursor-default">»</span>
                <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['url'];?>
profile"
                    class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Profile</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <span class="text-gray-400 cursor-default">»</span>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400"><?php echo $_smarty_tpl->tpl_vars['res']->value['username'];?>
</span>
            </div>
        </li>
    </ol>
</nav>

<?php if ($_smarty_tpl->tpl_vars['res']->value['id'] == $_smarty_tpl->tpl_vars['user']->value['id']) {?>
    <div>
        <button type="button" onclick="document.location.href='<?php echo $_smarty_tpl->tpl_vars['config']->value['url'];?>
logout';"
            class="px-3 mb-4 py-2 w-full text-sm font-medium text-center text-white bg-blue-700 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700">Logout</button>
    </div>
<?php }?>

<div class="px-2 xl:px-0">
    Profile
</div>

<nav class="flex px-2 py-1 text-gray-700 bg-gray-50 dark:bg-gray-800 mt-4" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['url'];?>
"
                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <?php echo $_smarty_tpl->tpl_vars['config']->value['title'];?>

            </a>
        </li>
        <li>
            <div class="flex items-center">
                <span class="text-gray-400 cursor-default">»</span>
                <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['url'];?>
profile"
                    class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Profile</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <span class="text-gray-400 cursor-default">»</span>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400"><?php echo $_smarty_tpl->tpl_vars['res']->value['username'];?>
</span>
            </div>
        </li>
    </ol>
</nav><?php }
}
