<?php
/* Smarty version 4.3.0, created on 2023-02-13 21:31:52
  from 'C:\xamppx\htdocs\fsx\library\themes\nucleus\parts\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63ea9e38f13809_60866877',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a98a0397eb530d94c7c81ec80b6e381b750f3c54' => 
    array (
      0 => 'C:\\xamppx\\htdocs\\fsx\\library\\themes\\nucleus\\parts\\header.tpl',
      1 => 1676320260,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../parts/menu.tpl' => 1,
  ),
),false)) {
function content_63ea9e38f13809_60866877 (Smarty_Internal_Template $_smarty_tpl) {
if (((isset($_smarty_tpl->tpl_vars['rel']->value)) && $_smarty_tpl->tpl_vars['rel']->value != 'tab') || !(isset($_smarty_tpl->tpl_vars['rel']->value))) {?>
    <!DOCTYPE html>
    <html lang="<?php echo $_smarty_tpl->tpl_vars['userlang']->value;?>
">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?php echo $_smarty_tpl->tpl_vars['pagetitle']->value;?>
</title>

        <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"><?php echo '</script'; ?>
>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@2.47.0/dist/full.css" rel="stylesheet" type="text/css">
        <?php echo '<script'; ?>
 src="https://cdn.tailwindcss.com"><?php echo '</script'; ?>
>
        <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
        <link rel="manifest" href="assets/favicon/site.webmanifest">
        <style>
            .link {
                text-decoration-line: underline;
                text-decoration-style: dotted;
            }

            .link:hover {
                text-decoration-style: solid;
            }

            .auto a {
                text-decoration-line: underline;
                text-decoration-style: dotted;
            }

            .auto a:hover {
                text-decoration-style: solid;
            }
        </style>
    </head>

    <body data-theme="<?php echo $_smarty_tpl->tpl_vars['daisytheme']->value;?>
" onload="assignTheme('<?php echo cat($_smarty_tpl->tpl_vars['config']->value['title']);?>
_');" class="min-h-screen">

        <?php $_smarty_tpl->_subTemplateRender("file:../parts/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
}
