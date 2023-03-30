<?php
/* Smarty version 4.3.0, created on 2023-01-26 16:44:27
  from '/var/www/html/FSX/library/themes/nucleus/parts/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63d29fdb1096f5_83739452',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '47fcaae21443e51ae0cbc42ac0e0d0f3fc9ad2a9' => 
    array (
      0 => '/var/www/html/FSX/library/themes/nucleus/parts/header.tpl',
      1 => 1674747865,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63d29fdb1096f5_83739452 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
<?php }
}
