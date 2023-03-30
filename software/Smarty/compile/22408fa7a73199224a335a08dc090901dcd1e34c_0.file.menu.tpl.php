<?php
/* Smarty version 4.3.0, created on 2023-01-25 22:33:23
  from '/var/www/html/FSX/library/themes/nucleus/parts/menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63d1a023e8bdf1_34634672',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '22408fa7a73199224a335a08dc090901dcd1e34c' => 
    array (
      0 => '/var/www/html/FSX/library/themes/nucleus/parts/menu.tpl',
      1 => 1674682402,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../parts/alert.tpl' => 1,
  ),
),false)) {
function content_63d1a023e8bdf1_34634672 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="navbar bg-base-300 text-base-content">
    <div class="navbar-start">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </label>
            <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow-xl bg-base-100 rounded-box w-52">
                <li><a href="index.php">Home</a></li>
                <li><a href="releases.php">Releases</a></li>
                <li><a href="titles.php">Titles</a></li>
                <li><a href="bookmarks.php">Bookmarks</a></li>
                <li><a href="members.php">Members</a></li>
            </ul>
        </div>
        <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['url'];?>
" class="btn btn-ghost normal-case text-xl"><?php echo $_smarty_tpl->tpl_vars['config']->value['title'];?>
</a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li><a href="index.php">Home</a></li>
            <li><a href="releases.php">Releases</a></li>
            <li><a href="titles.php">Titles</a></li>
            <li><a href="bookmarks.php">Bookmarks</a></li>
            <li><a href="members.php">Members</a></li>
        </ul>
    </div>
    <div class="navbar-end">
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img src="<?php if ($_smarty_tpl->tpl_vars['logged']->value) {
echo $_smarty_tpl->tpl_vars['user']->value['avatar'];
} else { ?>https://rav.h33t.moe/avatar.php?name=rileinc<?php }?>"
                        alt="Avatar">
                </div>
            </label>
            <ul tabindex="0" class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-200 rounded-box w-52">
                <?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
                    <li><a href="#/">Profile</a></li>
                    <li><a href="#/" onclick="toggleCheck('userSettingsModal')">Settings</a></li>
                    <li><a href="#/" id="logoutButton">Logout</a></li>
                <?php } else { ?>
                    <li><label for="loginModal">Login</label></li>
                    <li><label for="signupModal">Signup</label></li>
                <?php }?>
            </ul>
        </div>
    </div>
</div>

<!-- Container Begin -->
<div class="container mx-auto my-4 px-2 md:px-0">
<?php $_smarty_tpl->_subTemplateRender("file:../parts/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
