<?php
/* Smarty version 4.3.0, created on 2023-01-29 20:44:34
  from 'C:\xamppx\htdocs\fsx\library\themes\nucleus\parts\alert.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63d6cca2df4185_65680645',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e4c0ba52364a950f17dbdc5443ff63403ed5cf2' => 
    array (
      0 => 'C:\\xamppx\\htdocs\\fsx\\library\\themes\\nucleus\\parts\\alert.tpl',
      1 => 1675021474,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63d6cca2df4185_65680645 (Smarty_Internal_Template $_smarty_tpl) {
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
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['logged']->value && $_smarty_tpl->tpl_vars['user']->value['level'] == 49) {?>
    <div class="alert alert-info shadow-md" id="topAlert">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                class="stroke-current flex-shrink-0 w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span><b>Info:</b> Activate your account through the Email we sent you to use all functions of <?php echo $_smarty_tpl->tpl_vars['config']->value['title'];?>
!</span>
        </div>
    </div>
<?php }
}
}
