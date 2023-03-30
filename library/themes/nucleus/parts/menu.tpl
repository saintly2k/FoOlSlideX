<input hidden readonly type="text" value="{$config.title}" id="siteName">
<input hidden readonly type="text" value="{$config.divider}" id="siteDivider">

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
        <a href="{$config.url}" class="btn btn-ghost normal-case text-xl">
            {if !empty($logoImage)}
                <img src="{$logoImage}" alt="Logo" class="h-10">
            {else}
                {$config.title}
            {/if}
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
                    <img src="{if $logged}{$user.avatar}{else}https://rav.h33t.moe/avatar.php?name=rileinc{/if}"
                        alt="Avatar">
                </div>
            </label>
            <ul tabindex="0"
                class="mt-3 p-2 shadow-md menu menu-compact dropdown-content bg-base-100 border rounded-box w-52">
                {if $logged}
                    <li><a href="profile.php?id={$user.id}" rel="tab"
                            ttl="Profile of {$user.username} - Uploads - Page 1">Profile</a></li>
                    <li><label for="userSettingsModal">Settings</label></li>
                    <li><button id="logoutButton">Logout</button></li>
                {else}
                    <li><label for="loginModal">Login</label></li>
                    <li><label for="signupModal">Signup</label></li>
                {/if}
            </ul>
        </div>
    </div>
</div>

<!-- Container Begin -->
<div class="container mx-auto my-4 px-2 md:px-0" id="content">
{include file="../parts/alert.tpl"}