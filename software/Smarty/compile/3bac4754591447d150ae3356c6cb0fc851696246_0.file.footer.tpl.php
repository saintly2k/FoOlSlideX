<?php
/* Smarty version 4.3.0, created on 2023-01-25 20:25:20
  from '/var/www/html/FSX/library/themes/nucleus/parts/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_63d1822009ad01_73401378',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3bac4754591447d150ae3356c6cb0fc851696246' => 
    array (
      0 => '/var/www/html/FSX/library/themes/nucleus/parts/footer.tpl',
      1 => 1674232644,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63d1822009ad01_73401378 (Smarty_Internal_Template $_smarty_tpl) {
?></div>
<!-- Container End -->

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
                    <select class="select w-full border border-black" name="lang">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['config']->value['langs'], 'item', false, 'key', 'name', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
">Language: <?php echo $_smarty_tpl->tpl_vars['item']->value;?>
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
                    let text = document.getElementById("usersettings-result");
                    text.classList.remove("hidden");
                    if (data == "success") {
                        text.innerHTML =
                            "<b>Success!</b> You may need to reload this page.";
                        text.classList.add("text-success");
                        text.classList.remove("text-error");
                    } else {
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
                        alert(data);
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
                        alert(data);
                    }
                }
            });
            return false;
        });
    <?php }
echo '</script'; ?>
>

<footer class="footer footer-center p-6 bg-base-300 text-base-content">
    <div>
        <p>
            Copyright © <?php echo date("Y");?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['url'];?>
" class="link"><?php echo $_smarty_tpl->tpl_vars['config']->value['title'];?>
</a>
            <span class="hidden md:inline">-</span>
            <br class="md:hidden">
            Running <a href="https://github.com/saintly2k/FoOlSlideX" class="link" target="_blank">FoOlSlideX</a>
            <span class="badge badge-info"><?php echo $_smarty_tpl->tpl_vars['version']->value;?>
</span>
            <br class="md:hidden">
            by <a href="https://github.com/saintly2k" class="link" target="_blank">Saintly2k</a> and
            <a href="https://github.com/s-vhs" class="link" target="_blank">S-VHS</a>
        </p>
    </div>
</footer>

</body>

</html><?php }
}
