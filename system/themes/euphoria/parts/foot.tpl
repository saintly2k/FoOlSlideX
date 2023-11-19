</div>
{* <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script> *}
<script src="{$config.url}node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="{$config.url}js/js.cookie.js"></script>
<script src="{$config.url}instantclick?{filemtime('js/instantclick.js') + filemtime('js/loading-indicator.js')}"
    data-instant-track>
</script>
<script>
    InstantClick.init('load');

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
</script>

</body>

</html>