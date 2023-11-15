<?php
/* Smarty version 4.3.0, created on 2023-11-14 21:10:28
  from 'C:\xamppx\htdocs\ictest\system\themes\euphoria\parts\head.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6553d434dd1e81_06335137',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '566bc4240134681d94e1da2acd056b84ea81ce8a' => 
    array (
      0 => 'C:\\xamppx\\htdocs\\ictest\\system\\themes\\euphoria\\parts\\head.tpl',
      1 => 1699992627,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6553d434dd1e81_06335137 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
        <link href="<?php echo $_smarty_tpl->tpl_vars['config']->value['url'];?>
dist/output.css" rel="stylesheet">
        <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"><?php echo '</script'; ?>
>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Courier+Prime&family=PT+Serif&display=swap');

        * {
            font-family: 'Courier Prime', monospace;
            font-family: 'PT Serif', serif;
        }
    </style>

    <?php echo '<script'; ?>
>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    <?php echo '</script'; ?>
>
</head>

<body class="bg-white dark:bg-gray-900 text-black dark:text-white"><?php }
}
