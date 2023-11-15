<?php
/* Smarty version 4.3.0, created on 2023-11-15 21:29:09
  from 'C:\xamppx\htdocs\ictest\system\themes\euphoria\parts\foot.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_65552a15890f10_04206545',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75491f4509112c48086880502facbcf6a7798a89' => 
    array (
      0 => 'C:\\xamppx\\htdocs\\ictest\\system\\themes\\euphoria\\parts\\foot.tpl',
      1 => 1700079723,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65552a15890f10_04206545 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['url'];?>
node_modules/flowbite/dist/flowbite.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['url'];?>
js/js.cookie.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['config']->value['url'];?>
instantclick?<?php echo filemtime('js/instantclick.js')+filemtime('js/loading-indicator.js');?>
"
    data-instant-track>
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    InstantClick.init('mouseover');

    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    // Change the icons inside the button based on previous settings
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
            '(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }

    var themeToggleBtn = document.getElementById('theme-toggle');

    themeToggleBtn.addEventListener('click', function() {
        // toggle icons inside button
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');

        // if set via local storage previously
        if (localStorage.getItem('color-theme')) {
            if (localStorage.getItem('color-theme') === 'light') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
                console.warn("dark");
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
                console.warn("light");
            }

            // if NOT set via local storage previously
        } else {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        }
    });

    function setCookie(name, value) {
        Cookies.set(name, value, { expires: 999 })
    }

    function encodeString(input, salt) {
        let encodedString = "";
        const saltLength = salt.length;
        const inputLength = input.length;

        for (let i = 0; i < inputLength; i++) {
            const saltIndex = i % saltLength;
            const saltChar = salt.charCodeAt(saltIndex);
            const inputChar = input.charCodeAt(i);
            const encodedChar = saltChar + inputChar;

            encodedString += encodedChar.toString(36);
        }

        return encodedString;
    }
<?php echo '</script'; ?>
>

</body>

</html><?php }
}
