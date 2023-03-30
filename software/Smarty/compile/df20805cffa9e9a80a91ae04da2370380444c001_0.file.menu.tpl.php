<?php
/* Smarty version 4.3.0, created on 2023-02-13 21:34:16
  from 'C:\xamppx\htdocs\fsx\library\themes\nucleus\parts\menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63ea9ec869d5f3_55016460',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'df20805cffa9e9a80a91ae04da2370380444c001' => 
    array (
      0 => 'C:\\xamppx\\htdocs\\fsx\\library\\themes\\nucleus\\parts\\menu.tpl',
      1 => 1676320427,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../parts/alert.tpl' => 1,
  ),
),false)) {
function content_63ea9ec869d5f3_55016460 (Smarty_Internal_Template $_smarty_tpl) {
?><input hidden readonly type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['title'];?>
" id="siteName">
<input hidden readonly type="text" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['divider'];?>
" id="siteDivider">

<div class="navbar bg-base-300 text-base-content">
    <div class="navbar-start">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </label>
            <ul tabindex="0"
                class="menu menu-compact border dropdown-content mt-3 p-2 shadow-md bg-base-100 rounded-box w-52">
                <li><a href="index.php" rel="tab" ttl="Home">Home</a></li>
                <li><a href="releases.php" rel="tab" ttl="Releases - Page 1">Releases</a></li>
                <li><a href="titles.php" rel="tab" ttl="Titles - Page 1">Titles</a></li>
                <li><a href="bookmarks.php" rel="tab" ttl="Bookmarks - Reading - Page 1">Bookmarks</a></li>
                <li><a href="members.php" rel="tab" ttl="Members - Page 1">Members</a></li>
            </ul>
        </div>
        <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['url'];?>
" class="btn btn-ghost normal-case text-xl">
            <?php if (!empty($_smarty_tpl->tpl_vars['logoImage']->value)) {?>
                <img src="<?php echo $_smarty_tpl->tpl_vars['logoImage']->value;?>
" alt="Logo" class="h-10">
            <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['config']->value['title'];?>

            <?php }?>
        </a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li><a href="index.php" rel="tab" ttl="Home">Home</a></li>
            <li><a href="releases.php" rel="tab" ttl="Releases - Page 1">Releases</a></li>
            <li><a href="titles.php" rel="tab" ttl="Titles - Page 1">Titles</a></li>
            <li><a href="bookmarks.php" rel="tab" ttl="Bookmarks - Reading - Page 1">Bookmarks</a></li>
            <li><a href="members.php" rel="tab" ttl="Members - Page 1">Members</a></li>
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
            <ul tabindex="0"
                class="mt-3 p-2 shadow-md menu menu-compact dropdown-content bg-base-100 border rounded-box w-52">
                <?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
                    <li><a href="profile.php?id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" rel="tab"
                            ttl="Profile of <?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
 - Uploads - Page 1">Profile</a></li>
                    <li><label for="userSettingsModal">Settings</label></li>
                    <li><button id="logoutButton">Logout</button></li>
                <?php } else { ?>
                    <li><label for="loginModal">Login</label></li>
                    <li><label for="signupModal">Signup</label></li>
                <?php }?>
            </ul>
        </div>
    </div>
</div>

<!-- Container Begin -->
<div class="container mx-auto my-4 px-2 md:px-0" id="content">
<?php $_smarty_tpl->_subTemplateRender("file:../parts/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
