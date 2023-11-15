<?php
/* Smarty version 4.3.0, created on 2023-11-15 18:18:07
  from 'C:\xamppx\htdocs\ictest\system\themes\euphoria\pages\admin\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6554fd4fb95d55_02678423',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c22927e0231871c32cc98d1db51d6e563fec1031' => 
    array (
      0 => 'C:\\xamppx\\htdocs\\ictest\\system\\themes\\euphoria\\pages\\admin\\index.tpl',
      1 => 1700068687,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6554fd4fb95d55_02678423 (Smarty_Internal_Template $_smarty_tpl) {
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
admin"
                    class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Admin</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <span class="text-gray-400 cursor-default">»</span>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Index</span>
            </div>
        </li>
    </ol>
</nav>

<div class="px-2 xl:px-0">
    <p class="text-2xl">Admin</p>
    <p>
        <span class="text-gray-400 cursor-default">»</span>
        <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['url'];?>
admin/users" class="text-blue-600 hover:underline">Edit Users</a><br>

        <span class="text-gray-400 cursor-default">»</span>
        <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['url'];?>
admin/menu" class="text-blue-600 hover:underline">Edit Menu-Items</a><br>

        <span class="text-gray-400 cursor-default">»</span>
        <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['url'];?>
admin/update" class="text-blue-600 hover:underline">Update-Center</a>
    </p>
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
admin"
                    class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Admin</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <span class="text-gray-400 cursor-default">»</span>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Index</span>
            </div>
        </li>
    </ol>
</nav><?php }
}
