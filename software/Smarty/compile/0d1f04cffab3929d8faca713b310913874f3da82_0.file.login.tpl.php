<?php
/* Smarty version 4.3.0, created on 2023-11-15 21:36:06
  from 'C:\xamppx\htdocs\ictest\system\themes\euphoria\pages\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_65552bb6577855_58879508',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0d1f04cffab3929d8faca713b310913874f3da82' => 
    array (
      0 => 'C:\\xamppx\\htdocs\\ictest\\system\\themes\\euphoria\\pages\\login.tpl',
      1 => 1700079704,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65552bb6577855_58879508 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="max-w-[300px] mx-auto px-2 xl:px-0">
    <h3 class="text-2xl text-center">Login</h3>
    <div class="mt-4 space-y-2">
        <div id="alert" class="p-2 text-sm text-blue-800 hidden bg-blue-50 dark:bg-blue-200 dark:text-blue-800"
            role="alert">
            <span class="font-medium">Info alert!</span> Change a few things up and try submitting again.
        </div>
        <input type="text" id="username" required minlength="3" maxlength="20" placeholder="Username"
            class="block w-full text-sm text-gray-900 border border-gray-300 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
        <input type="password" id="password" required minlength="8" maxlength="50" placeholder="Password"
            class="block w-full text-sm text-gray-900 border border-gray-300 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
        <p>
            <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['url'];?>
reset_password" class="text-blue-600 hover:underline">Reset password?</a>
        </p>
        <button type="button" id="loginForm"
            class="w-full py-2 text-sm text-center text-white bg-blue-700 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700">Login</button>
        <hr>
        <p>
            No account yet?
            <a href="<?php echo $_smarty_tpl->tpl_vars['config']->value['url'];?>
signup" class="text-blue-600 hover:underline">Signup!</a>
        </p>
    </div>
</div>

<?php echo '<script'; ?>
>
    $("#loginForm").on("click", function(e) {
        // alert(encodeString($("#username").val(), "<?php echo $_smarty_tpl->tpl_vars['config']->value['salt'];?>
"));
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "api\\account\\action\\login\\username\\" + encodeString($("#username").val(), "<?php echo $_smarty_tpl->tpl_vars['config']->value['salt'];?>
") + "\\password\\" + encodeString($("#password").val(), "<?php echo $_smarty_tpl->tpl_vars['config']->value['salt'];?>
"),
            success: function(data) {
                const $targetEl = document.getElementById('alert');
                const options = {};
                const instanceOptions = {
                    id: 'alert',
                    override: true
                };
                const dismiss = new Dismiss($targetEl, null, options, instanceOptions);

                if (data.done && data.session) {
                    // alert("session: " + data.session);
                    // If success, display an alert
                    $targetEl.innerHTML = "<b>Success!</b> " + data.msg;
                    $targetEl.classList.remove("hidden");
                    setCookie("session", data.session);
                    document.getElementById('homeLink').click();
                } else {
                    $targetEl.innerHTML = "<b>Error!</b> " + data.msg;
                    $targetEl.classList.remove("hidden");
                    // If not successful, show the element with id "alert" and set its inner HTML to the response message
                }
            }
        });
        return false;
    });
<?php echo '</script'; ?>
><?php }
}
