<?php
/* Smarty version 4.3.0, created on 2023-01-25 20:25:20
  from '/var/www/html/FSX/library/themes/nucleus/parts/alert.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63d1822004f5c0_68132745',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '85a8f46871e45e0ec0747a2d44a7b5d690e635ef' => 
    array (
      0 => '/var/www/html/FSX/library/themes/nucleus/parts/alert.tpl',
      1 => 1674091844,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63d1822004f5c0_68132745 (Smarty_Internal_Template $_smarty_tpl) {
if (!empty($_smarty_tpl->tpl_vars['topAlert']->value) && !$_smarty_tpl->tpl_vars['readAlert']->value) {?>
    <div class="alert alert-<?php echo $_smarty_tpl->tpl_vars['topAlert']->value['type'];?>
 shadow-md" id="topAlert">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                class="stroke-current flex-shrink-0 w-6 h-6">
                <?php if ($_smarty_tpl->tpl_vars['topAlert']->value['type'] == "info") {?>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                <?php } elseif ($_smarty_tpl->tpl_vars['topAlert']->value['type'] == "success") {?>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                <?php } elseif ($_smarty_tpl->tpl_vars['topAlert']->value['type'] == "warning") {?>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                <?php } else { ?>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                <?php }?>
            </svg>
            <span><b><?php echo ucfirst($_smarty_tpl->tpl_vars['topAlert']->value['type']);?>
:</b> <?php echo $_smarty_tpl->tpl_vars['topAlert']->value['content'];?>
</span>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
            <div class="flex-none m-0 p-0">
                <button class="btn btn-sm m-0 mikuLink" id="dismissAlert">Dismiss</button>
            </div>
        <?php }?>
    </div>
<?php }
}
}
