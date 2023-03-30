<?php
/* Smarty version 4.3.0, created on 2023-03-30 22:40:29
  from 'C:\xamppx\htdocs\fsx\library\themes\nucleus\parts\footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6425f3bd406f98_76065636',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0af686df315fb33c6ea5adb09cda514c8ffa4a1' => 
    array (
      0 => 'C:\\xamppx\\htdocs\\fsx\\library\\themes\\nucleus\\parts\\footer.tpl',
      1 => 1680208827,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6425f3bd406f98_76065636 (Smarty_Internal_Template $_smarty_tpl) {
?></div>
<!-- Container End -->

<?php if (((isset($_smarty_tpl->tpl_vars['rel']->value)) && $_smarty_tpl->tpl_vars['rel']->value != 'tab') || !(isset($_smarty_tpl->tpl_vars['rel']->value))) {?>
    <?php if (!$_smarty_tpl->tpl_vars['logged']->value) {?>
        <input type="checkbox" id="loginModal" class="modal-toggle">
        <div class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <h3 class="font-bold text-2xl text-center mb-4 underline">Login</h3>
                <form method="POST" name="login" id="loginForm">
                    <div class="grid grid-cols-1 gap-4">
                        <input type="text" placeholder="Username" name="username" class="input w-full border border-black">
                        <input type="password" placeholder="Password" name="password" class="input w-full border border-black">
                    </div>
                    <div class=" mt-4">
                        <button class="btn btn-primary btn-block btn-outline" type="submit">Log me in!</button>
                    </div>
                    <div class="mt-4 text-error text-center hidden" id="login-result"></div>
                    <div class="pt-4 grid grid-cols-2 gap-4">
                        <label onclick="toggleCheck('loginModal'); toggleCheck('signupModal');" class="btn btn-block">To
                            Signup</label>
                        <label for="loginModal" class="btn btn-error">Cancel</label>
                    </div>
                </form>
            </div>
        </div>

        <input type="checkbox" id="signupModal" class="modal-toggle">
        <div class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <h3 class="font-bold text-2xl text-center mb-4 underline">Signup</h3>
                <form method="POST" name="signup" id="signupForm">
                    <div class="grid grid-cols-1 gap-4">
                        <input type="text" placeholder="Username" name="username" class="input w-full border border-black">
                        <input type="password" placeholder="Password" name="password" class="input w-full border border-black">
                        <input type="password" placeholder="Repeat Password" name="password2"
                            class="input w-full border border-black">
                        <input type="email" placeholder="Email (for account-activation and recovery)" name="email"
                            class="input w-full border border-black">
                        <input type="email" placeholder="Repeat Email" name="email2" class="input w-full border border-black">
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-primary btn-block btn-outline" type="submit">Create my account!</button>
                    </div>
                    <div class="mt-2 text-error text-center hidden" id="signup-result"></div>
                    <div class="pt-4 grid grid-cols-2 gap-4">
                        <label onclick="toggleCheck('loginModal'); toggleCheck('signupModal');" class="btn btn-block">To
                            Login</label>
                        <label for="signupModal" class="btn btn-error">Cancel</label>
                    </div>
                </form>
            </div>
        </div>
    <?php } else { ?>
        <input type="checkbox" id="userSettingsModal" class="modal-toggle">
        <div class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <h3 class="font-bold text-2xl text-center mb-4 underline">User Settings</h3>
                <form method="POST" name="userSettings" id="userSettingsForm">
                    <div class="grid grid-cols-1 gap-4">
                        <input type="text" placeholder="Avatar URL" name="avatar" class="input w-full border border-black"
                            value="<?php echo $_smarty_tpl->tpl_vars['user']->value['avatar'];?>
">
                        <select class="select w-full border border-black" name="theme">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['config']->value['themes'], 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">Theme: <?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-primary btn-block btn-outline" type="submit">Save settings!</button>
                    </div>
                    <div class="mt-2 text-center hidden" id="usersettings-result"></div>
                    <div class="pt-4">
                        <label for="userSettingsModal" class="btn btn-error btn-block">Close</label>
                    </div>
                </form>
            </div>
        </div>
    <?php }?>

    <?php echo '<script'; ?>
>
        function toggleCheck(id) {
            let box = document.getElementById(id);
            box.checked = !box.checked;
        }

        <?php if (!$_smarty_tpl->tpl_vars['logged']->value) {?>
            $("#loginForm").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "ajax\\account\\login.php",
                    data: $(this).serialize(),
                    success: function(data) {
                        if (data == "success") {
                            location.reload();
                        } else {
                            let text = document.getElementById("login-result");
                            text.classList.remove("hidden");
                            text.innerHTML = "<b>Error:</b> " + data;
                        }
                    }
                });
                return false;
            });

            $("#signupForm").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "ajax\\account\\signup.php",
                    data: $(this).serialize(),
                    success: function(data) {
                        if (data == "success") {
                            location.reload();
                        } else {
                            let text = document.getElementById("signup-result");
                            text.classList.remove("hidden");
                            text.innerHTML = "<b>Error:</b> " + data;
                        }
                    }
                });
                return false;
            });
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
            $("#userSettingsForm").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "ajax\\account\\settings.php",
                    data: $(this).serialize(),
                    success: function(data) {
                        if (data == "success") {
                            location.reload();
                        } else {
                            let text = document.getElementById("usersettings-result");
                            text.classList.remove("hidden");
                            text.innerHTML = "<b>Error:</b> " + data;
                            text.classList.add("text-error");
                            text.classList.remove("text-success");
                        }
                    }
                });
                return false;
            });

            $("#logoutButton").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "ajax\\account\\logout.php",
                    data: $(this).serialize(),
                    success: function(data) {
                        if (data == "success") {
                            location.reload();
                        } else {
                            alert("Error: " + data);
                        }
                    }
                });
                return false;
            });

            $("#dismissAlert").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "ajax\\alerts\\dismiss.php",
                    success: function(data) {
                        if (data == "success") {
                            let div = document.getElementById("topAlert");
                            div.classList.add("hidden");
                        } else {
                            alert("Error: " + data);
                        }
                    }
                });
                return false;
            });
        <?php }?>

        function setCookie(name, value) {
            Cookies.set("<?php echo cat($_smarty_tpl->tpl_vars['config']->value['title']);?>
_" + name, value, { expires: 999 })
        }

        function updateUserLang(lang) {
            <?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
                $.ajax({
                    type: "POST",
                    url: "ajax\\account\\updateLang.php",
                    data: {
                        newLang: lang
                    },
                    success: function(data) {
                        if (data == "success") {
                            location.reload();
                        } else {
                            alert("Error: " + data);
                        }
                    }
                });
            <?php } else { ?>
                location.reload();
            <?php }?>
        }

        function toggleRead(id) {
            let box = event.srcElement.id;
            <?php if (!$_smarty_tpl->tpl_vars['logged']->value) {?>
                alert("Error: Login to use this function!");
                toggleCheck(box);
            <?php } else { ?>
                $.ajax({
                    type: "POST",
                    url: "ajax\\chapters\\read.php",
                    data: {
                        user: <?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
,
                        chapter: id
                    },
                    success: function(data) {
                        if (data != "success") {
                            alert("Error: " + data);
                            toggleCheck(box);
                        }
                    }
                });
            <?php }?>
        }
    <?php echo '</script'; ?>
>

    <!-- Theme Modal -->
    <input type="checkbox" id="themeModal" class="modal-toggle">
    <div class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="font-bold text-lg mb-4">Change Design</h3>
            <?php $_smarty_tpl->_assignInScope('daisyThemes', array("light","dark","cupcake","bumblebee","emerald","corporate","synthwave","retro","cyberpunk","valentine","halloween","garden","forest","aqua","lofi","pastel","fantasy","wireframe","black","luxury","dracula","cmyk","autumn","business","acid","lemonade","night","coffee","winter"));?>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-1 sm:gap-2 md:gap-4">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['daisyThemes']->value, 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                    <div class="col-span-1 border rounded-xl p-1 md:p-2 cursor-pointer bg-base-100" data-theme="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"
                        onclick="setCookie('daisytheme','<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
');assignTheme('<?php echo cat($_smarty_tpl->tpl_vars['config']->value['title']);?>
_');">
                        <div class="grid grid-cols-5 grid-rows-2">
                            <div class="bg-base-200 col-start-1 row-span-1 row-start-1 rounded-tl-md"></div>
                            <div class="bg-base-300 col-start-1 row-start-2 rounded-bl-md"></div>
                            <div class="col-span-4 col-start-2 row-span-2 row-start-1 ml-2">
                                <span class="font-bold"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</span>
                                <div class="w-full grid grid-cols-4 gap-1 md:gap-2 mt-1 md:mt-2 text-sm">
                                    <button class="btn btn-sm btn-primary">A</button>
                                    <button class="btn btn-sm btn-secondary">A</button>
                                    <button class="btn btn-sm btn-accent">A</button>
                                    <button class="btn btn-sm btn-neutral">A</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <label for="themeModal" class="mt-4 md:mt-0 btn col-span-2 md:col-span-5">Close</label>
            </div>
        </div>
    </div>
    <!-- /Theme Modal -->

    <!-- Language Modal -->
    <input type="checkbox" id="langModal" class="modal-toggle">
    <div class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="font-bold text-lg mb-4">Change Language</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-1 sm:gap-2 md:gap-4">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['userlangs']->value, 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                    <div class="col-span-1 border rounded-xl text-center p-1 md:p-2 cursor-pointer bg-base-100"
                        onclick="setCookie('userlang','<?php echo $_smarty_tpl->tpl_vars['item']->value['code'];?>
');updateUserLang('<?php echo $_smarty_tpl->tpl_vars['item']->value['code'];?>
');">
                        <p class="font-bold text-xl"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
                        <p>
                            by
                            <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['website'])) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['website'];?>
" target="_blank" class="link">
                                <?php }?>
                                <?php echo $_smarty_tpl->tpl_vars['item']->value['author'];?>

                                <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['website'])) {?>
                                </a>
                            <?php }?>
                        </p>
                        <p class="italic text-sm">Updated: <?php echo $_smarty_tpl->tpl_vars['item']->value['updated'];?>
</p>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <label for="langModal" class="mt-4 md:mt-0 btn col-span-2 md:col-span-4">Close</label>
            </div>
        </div>
    </div>
    <!-- /Language Modal -->

    <footer class="footer footer-center p-6 bg-base-300 text-base-content">
        <div>
            <p>
                Copyright © <?php echo date("Y");?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['url'];?>
" class="link"><?php echo $_smarty_tpl->tpl_vars['config']->value['title'];?>
</a>
                <span class="hidden md:inline">|</span>
                <br class="md:hidden">
                Running <a href="https://github.com/saintly2k/FoOlSlideX" class="link" target="_blank">FoOlSlideX</a>
                <span class="badge badge-info"><?php echo $_smarty_tpl->tpl_vars['version']->value;?>
</span>
                <br class="md:hidden">
                by <a href="https://github.com/saintly2k" class="link" target="_blank">Saintly2k</a> and
                <a href="https://github.com/saintly2k/FoOlSlideX/graphs/contributors" class="link" target="_blank">The
                    Gang</a>.
                <span class="hidden md:inline">|</span>
                <br class="md:hidden">
                <label for="themeModal" class="link">Change Design</label> or
                <label for="langModal" class="link">Change Language</label>
            </p>
        </div>
    </footer>

    <!--<?php echo '<script'; ?>
 src="assets/page.js"><?php echo '</script'; ?>
>-->
    <?php echo '<script'; ?>
 src="assets/nucleus/tabs.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/nucleus/tags.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/nucleus/autotheme.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/nucleus/carousel.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js.cookie.js"><?php echo '</script'; ?>
>
    </body>

    </html>
<?php }
}
}
