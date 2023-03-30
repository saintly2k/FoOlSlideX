</div>
<!-- Container End -->

{if (isset($rel) && $rel != 'tab') || !isset($rel)}
    {if !$logged}
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
    {else}
        <input type="checkbox" id="userSettingsModal" class="modal-toggle">
        <div class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <h3 class="font-bold text-2xl text-center mb-4 underline">User Settings</h3>
                <form method="POST" name="userSettings" id="userSettingsForm">
                    <div class="grid grid-cols-1 gap-4">
                        <input type="text" placeholder="Avatar URL" name="avatar" class="input w-full border border-black"
                            value="{$user.avatar}">
                        <select class="select w-full border border-black" name="theme">
                            {foreach from=$config.themes item=item key=key name=name}
                                <option value="{$key}">Theme: {$item}</option>
                            {/foreach}
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
    {/if}

    <script>
        function toggleCheck(id) {
            let box = document.getElementById(id);
            box.checked = !box.checked;
        }

        {if !$logged}
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
        {/if}

        {if $logged}
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
        {/if}

        function setCookie(name, value) {
            Cookies.set("{cat($config.title)}_" + name, value, { expires: 999 })
        }

        function updateUserLang(lang) {
            {if $logged}
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
            {else}
                location.reload();
            {/if}
        }

        function toggleRead(id) {
            let box = event.srcElement.id;
            {if !$logged}
                alert("Error: Login to use this function!");
                toggleCheck(box);
            {else}
                $.ajax({
                    type: "POST",
                    url: "ajax\\chapters\\read.php",
                    data: {
                        user: {$user.id},
                        chapter: id
                    },
                    success: function(data) {
                        if (data != "success") {
                            alert("Error: " + data);
                            toggleCheck(box);
                        }
                    }
                });
            {/if}
        }
    </script>

    <!-- Theme Modal -->
    <input type="checkbox" id="themeModal" class="modal-toggle">
    <div class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="font-bold text-lg mb-4">Change Design</h3>
            {$daisyThemes = array("light", "dark", "cupcake", "bumblebee", "emerald", "corporate", "synthwave", "retro", "cyberpunk", "valentine", "halloween", "garden", "forest", "aqua", "lofi", "pastel", "fantasy", "wireframe", "black", "luxury", "dracula", "cmyk", "autumn", "business", "acid", "lemonade", "night", "coffee", "winter")}
            <div class="grid grid-cols-2 md:grid-cols-5 gap-1 sm:gap-2 md:gap-4">
                {foreach from=$daisyThemes item=item key=key name=name}
                    <div class="col-span-1 border rounded-xl p-1 md:p-2 cursor-pointer bg-base-100" data-theme="{$item}"
                        onclick="setCookie('daisytheme','{$item}');assignTheme('{cat($config.title)}_');">
                        <div class="grid grid-cols-5 grid-rows-2">
                            <div class="bg-base-200 col-start-1 row-span-1 row-start-1 rounded-tl-md"></div>
                            <div class="bg-base-300 col-start-1 row-start-2 rounded-bl-md"></div>
                            <div class="col-span-4 col-start-2 row-span-2 row-start-1 ml-2">
                                <span class="font-bold">{$item}</span>
                                <div class="w-full grid grid-cols-4 gap-1 md:gap-2 mt-1 md:mt-2 text-sm">
                                    <button class="btn btn-sm btn-primary">A</button>
                                    <button class="btn btn-sm btn-secondary">A</button>
                                    <button class="btn btn-sm btn-accent">A</button>
                                    <button class="btn btn-sm btn-neutral">A</button>
                                </div>
                            </div>
                        </div>
                    </div>
                {/foreach}
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
                {foreach from=$userlangs item=item key=key name=name}
                    <div class="col-span-1 border rounded-xl text-center p-1 md:p-2 cursor-pointer bg-base-100"
                        onclick="setCookie('userlang','{$item.code}');updateUserLang('{$item.code}');">
                        <p class="font-bold text-xl">{$item.name}</p>
                        <p>
                            by
                            {if !empty($item.website)}
                                <a href="{$item.website}" target="_blank" class="link">
                                {/if}
                                {$item.author}
                                {if !empty($item.website)}
                                </a>
                            {/if}
                        </p>
                        <p class="italic text-sm">Updated: {$item.updated}</p>
                    </div>
                {/foreach}
                <label for="langModal" class="mt-4 md:mt-0 btn col-span-2 md:col-span-4">Close</label>
            </div>
        </div>
    </div>
    <!-- /Language Modal -->

    <footer class="footer footer-center p-6 bg-base-300 text-base-content">
        <div>
            <p>
                Copyright © {date("Y")} <a href="{$config.url}" class="link">{$config.title}</a>
                <span class="hidden md:inline">|</span>
                <br class="md:hidden">
                Running <a href="https://github.com/saintly2k/FoOlSlideX" class="link" target="_blank">FoOlSlideX</a>
                <span class="badge badge-info">{$version}</span>
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

    <!--<script src="assets/page.js"></script>-->
    <script src="assets/nucleus/tabs.js"></script>
    <script src="assets/nucleus/tags.js"></script>
    <script src="assets/nucleus/autotheme.js"></script>
    <script src="assets/nucleus/carousel.js"></script>
    <script src="assets/js.cookie.js"></script>
    </body>

    </html>
{/if}