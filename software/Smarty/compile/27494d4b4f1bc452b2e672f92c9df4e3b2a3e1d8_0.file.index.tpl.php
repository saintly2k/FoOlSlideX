<?php
/* Smarty version 4.3.0, created on 2023-02-13 21:37:04
  from 'C:\xamppx\htdocs\fsx\library\themes\nucleus\pages\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63ea9f708fcdc8_32707671',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27494d4b4f1bc452b2e672f92c9df4e3b2a3e1d8' => 
    array (
      0 => 'C:\\xamppx\\htdocs\\fsx\\library\\themes\\nucleus\\pages\\index.tpl',
      1 => 1676320611,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63ea9f708fcdc8_32707671 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="p-4 border shadow-md rounded-xl my-4">
    <div class="mb-4">
        <h1 class="font-bold text-2xl">
            <a href="titles.php" class="link">
                Recently Updated Titles
            </a>
        </h1>
    </div>
    <?php if (!empty($_smarty_tpl->tpl_vars['recentlyUpdated']->value)) {?>
        <div class="carousel w-full rounded-xl border">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recentlyUpdated']->value, 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                <div id="titleSlider_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class=" text-black carousel-item w-full rounded-xl backdrop-blur-sm overflow-auto"
                    style="background-image: url(data/covers/<?php echo $_smarty_tpl->tpl_vars['item']->value['title']['id'];?>
.png); background-size: cover; background-position: center;">
                    <div
                        class="w-full backdrop-blur-md bg-white/30 grid grid-cols-3 md:grid-cols-6 gap-2 md:gap-4 flex items-center">
                        <div class="col-span-1 pl-4 py-4">
                            <a href="title.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['title']['id'];?>
">
                                <img src="data/covers/<?php echo $_smarty_tpl->tpl_vars['item']->value['title']['id'];?>
.png" class="rounded-xl w-full border shadow-md">
                            </a>
                        </div>
                        <div class="col-span-2 md:col-span-5 pr-4">
                            <h1 class="font-bold text-2xl">
                                <a href="title.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['title']['id'];?>
"><span class="link"><?php echo $_smarty_tpl->tpl_vars['item']->value['title']['title'];?>
</span></a>
                                <div
                                    class="badge shadow-md badge-<?php if ($_smarty_tpl->tpl_vars['item']->value['title']['sstatus'] == 1) {?>info<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['title']['sstatus'] == 2) {?>success<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['title']['sstatus'] == 3) {?>warning<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['title']['sstatus'] == 4) {?>success-content<?php } else { ?>error<?php }?>">
                                    <?php if ($_smarty_tpl->tpl_vars['item']->value['title']['sstatus'] == 1) {?>Planned<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['title']['sstatus'] == 2) {?>Ongoing<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['title']['sstatus'] == 3) {?>Hiatus<?php } elseif ($_smarty_tpl->tpl_vars['item']->value['title']['sstatus'] == 4) {?>Completed<?php } else { ?>Cancelled<?php }?>
                                </div>
                            </h1>
                            <p class="text-sm mb-2"><?php echo $_smarty_tpl->tpl_vars['item']->value['title']['alts'];?>
</p>
                            <div class="auto space-y-2 md:hidden">
                                <?php echo $_smarty_tpl->tpl_vars['item']->value['title']['summary2'];?>

                            </div>
                            <div class="auto space-y-1 hidden md:block">
                                <?php echo $_smarty_tpl->tpl_vars['item']->value['title']['summary1'];?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <div class="flex justify-center w-full pt-4 gap-2 btn-group">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recentlyUpdated']->value, 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                <a href="#titleSlider_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="carlink btn btn-xs md:btn-sm <?php if ($_smarty_tpl->tpl_vars['key']->value == 0) {?>btn-active<?php }?>"
                    onclick="switchCarLink(event);" rel="mad"><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</a>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    <?php } else { ?>
        <p>There are no Titles at the Moment!</p>
    <?php }?>
</div>

<!-- Chapters Div -->
<div class="p-4 border shadow-md rounded-xl my-4">
    <h1 class="mb-4 font-bold text-2xl">
        <a href="releases.php" class="link">
            Latest Releases
        </a>
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
                                <span class="sm:hidden">
                                    <?php echo shorten($_smarty_tpl->tpl_vars['item']->value['title']['title'],10);?>

                                </span>
                                <span class="hidden sm:block md:hidden">
                                    <?php echo shorten($_smarty_tpl->tpl_vars['item']->value['title']['title'],21);?>

                                </span>
                                <span class="hidden md:block lg:hidden">
                                    <?php echo shorten($_smarty_tpl->tpl_vars['item']->value['title']['title'],17);?>

                                </span>
                                <span class="hidden lg:block xl:hidden">
                                    <?php echo shorten($_smarty_tpl->tpl_vars['item']->value['title']['title'],12);?>

                                </span>
                                <span class="hidden xl:block 2xl:hidden">
                                    <?php echo shorten($_smarty_tpl->tpl_vars['item']->value['title']['title'],13);?>

                                </span>
                                <span class="hidden 2xl:block">
                                    <?php echo shorten($_smarty_tpl->tpl_vars['item']->value['title']['title'],17);?>

                                </span>
                            </a>
                        </p>
                        <div class="text-sm">
                            <p>
                                <a href="chapter.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="flex items-center gap-2 link"
                                    title="<?php echo formatChapterTitle($_smarty_tpl->tpl_vars['item']->value['volume'],$_smarty_tpl->tpl_vars['item']->value['number'],"full");?>
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
            <div class="col-span-2 md:col-span-3 lg:col-span-5 xl:col-span-6">
                <a href="releases.php?page=2" class="btn w-full">
                    More
                </a>
            </div>
        </div>
    <?php } else { ?>
        <p>There are no Chapters on this page!</p>
    <?php }?>
</div>
<!-- /Chapters Div --><?php }
}
