<?php
/* Smarty version 4.3.0, created on 2023-02-13 21:26:25
  from 'C:\xamppx\htdocs\fsx\library\themes\nucleus\pages\releases.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63ea9cf1e4e560_84552480',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f8c86d31bf2cd189b910db90a62de7ade7cf3973' => 
    array (
      0 => 'C:\\xamppx\\htdocs\\fsx\\library\\themes\\nucleus\\pages\\releases.tpl',
      1 => 1676319978,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63ea9cf1e4e560_84552480 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Chapters Div -->
<div class="p-4 border shadow-md rounded-xl my-4">
    <h1 class="mb-4 font-bold text-2xl">
        Releases - Page <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

    </h1>
    <?php if (!empty($_smarty_tpl->tpl_vars['chapters']->value)) {?>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-6 gap-4">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['chapters']->value, 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                <div class="w-full grid grid-cols-3 gap-2 border rounded-xl shadow-md">
                    <div class="col-span-1 p-2">
                        <a href="title.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['title']['id'];?>
">
                            <img src="data/covers/<?php echo $_smarty_tpl->tpl_vars['item']->value['title']['id'];?>
.png" alt="Cover" class="w-full rounded-md border shadow-md">
                        </a>
                    </div>
                    <div class="col-span-2 py-2 pr-2">
                        <p class="font-bold text-md">
                            <a href="title.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['title']['id'];?>
" class="link" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['title']['title'];?>
">
                                <span class="md:hidden">
                                    <?php echo shorten($_smarty_tpl->tpl_vars['item']->value['title']['title'],10);?>

                                </span>
                                <span class="hidden md:block lg:hidden">
                                    <?php echo shorten($_smarty_tpl->tpl_vars['item']->value['title']['title'],18);?>

                                </span>
                                <span class="hidden lg:block xl:hidden">
                                    <?php echo shorten($_smarty_tpl->tpl_vars['item']->value['title']['title'],13);?>

                                </span>
                                <span class="hidden xl:block 2xl:hidden">
                                    <?php echo shorten($_smarty_tpl->tpl_vars['item']->value['title']['title'],14);?>

                                </span>
                                <span class="hidden 2xl:block">
                                    <?php echo shorten($_smarty_tpl->tpl_vars['item']->value['title']['title'],17);?>

                                </span>
                            </a>
                        </p>
                        <div class="text-sm">
                            <p>
                                <a href="chapter.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="flex items-center gap-2 link" title="<?php echo formatChapterTitle($_smarty_tpl->tpl_vars['item']->value['volume'],$_smarty_tpl->tpl_vars['item']->value['number'],"full");?>
">
                                    <img src="https://flagcdn.com/16x12/<?php echo $_smarty_tpl->tpl_vars['item']->value['language'][1];?>
.png" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['language'][2];?>
"
                                        class="h-3">
                                    <?php echo formatChapterTitle($_smarty_tpl->tpl_vars['item']->value['volume'],$_smarty_tpl->tpl_vars['item']->value['number']);?>

                                </a>
                            </p>
                            <p>
                                <a href="profile.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['user']['id'];?>
"
                                    class="link flex items-center text-center md:text-left">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['user']['avatar'];?>
" class="rounded-full h-5">
                                    <span class="ml-1">
                                        <?php echo $_smarty_tpl->tpl_vars['item']->value['user']['username'];?>

                                    </span>
                                </a>
                            </p>
                            <p>
                                <?php echo timeAgo($_smarty_tpl->tpl_vars['item']->value['timestamp']);?>

                            </p>
                        </div>
                    </div>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    <?php } else { ?>
        <p>There are no Chapters on this page!</p>
    <?php }?>

    <?php if (!empty($_smarty_tpl->tpl_vars['pagis']->value)) {?>
        <!-- Pagination Div -->
        <div class="btn-group mx-auto pt-4">
            <?php if ($_smarty_tpl->tpl_vars['page']->value > 1) {?>
                <a href="?page=1" class="btn btn-sm md:btn-md shadow-md">«</a>
                <a href="?page=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
" class="btn btn-sm md:btn-md shadow-md">‹</a>
            <?php }?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pagis']->value, 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                <?php if ($_smarty_tpl->tpl_vars['page']->value != $_smarty_tpl->tpl_vars['item']->value) {?>
                    <a href="?page=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" class="btn btn-sm md:btn-md shadow-md"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</a>
                <?php } else { ?>
                    <span class="btn btn-active btn-sm md:btn-md shadow-md"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</span>
                <?php }?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php if ($_smarty_tpl->tpl_vars['page']->value < $_smarty_tpl->tpl_vars['totalPages']->value) {?>
                <a href="?page=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
" class="btn btn-sm md:btn-md shadow-md">›</a>
                <a href="?page=<?php echo $_smarty_tpl->tpl_vars['totalPages']->value;?>
" class="btn btn-sm md:btn-md shadow-md">»</a>
            <?php }?>
        </div>
        <!-- /Pagination Div -->
    <?php }?>
</div>
<!-- /Chapters Div --><?php }
}
