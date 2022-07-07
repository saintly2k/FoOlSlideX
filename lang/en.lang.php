<?php

# English Language File
# By Saintly2k

$lang = [
    "cookie_modal" => [
        "title"     => "This website requires the use of Cookies!",
        "content"   => "Hello dear reader! This site doesn't allow you to create an account and store your reading progress there. Due to that, we use Cookies to store your reading progress. If you want to use this function, you need to accept us using Cookies. We hope you have fun reading~",
        "accept"    => "I accept",
        "refuse"    => "I refuse"
    ],
    "install"   => [
        "title"     => "Install FoOlSlideX",
        "confirm"   => "Let's go!",
        "after"     => "After you click 'Let's go!', you will be redirected to the signup page. Signup there using the following invite code:",
        "copy"      => "Click to copy"
    ],
    "menu" => [
        "home"      => "Home",
        "releases"  => "Releases",
        "titles"    => "Titles",
        "more"      => "More",
        "about"     => "About",
        "quicksearch"   => "Quicksearch",
        "search"    => "Search",
        "account"   => "Account",
        "login"     => "Login",
        "signup"    => "Signup",
        "profile"   => "My Profile",
        "settings"  => "Settings",
        "logout"    => "Logout",
        "add_new"   => "New Title",
        "bookmarks" => "Bookmarks",
        "manage_groups" => "Manage Groups",
        "groups"    => "Groups",
        "config"    => "Edit Config",
        "settings"  => "Account Settings"
    ],
    "home"  => [
        "added_titles"  => "Added Titles",
        "type"          => "Type",
        "title"         => "Title",
        "added"         => "Added",
        "released_chap" => "Released Chapters",
        "chapter"       => "Chapter",
        "chap_title"    => "Chapter Title",
        "group"         => "Group",
        "uploader"      => "Uploader"
    ],
    "groups" => [
        "add_group" => "Add new Group",
        "req_group" => "Request new Group",
        "name"      => "Group Name",
        "short"     => "Group short Name",
        "image"     => "Group Banner Image (URL)",
        "about"     => "About this Group (Supports BBCode)",
        "founded"   => "Group founded",
        "website"   => "Group Website (Leave empty for none)",
        "irc"       => "Group IRC Channel (Leave empty for none)",
        "mangadex"  => "Group MangaDex site (Leave empty for none)",
        "email"     => "Contact eMail",
        "confirm"   => "Add group!",
        "confirm_r" => "Request group!",
        "group"     => "Group",
        "infos"     => "Informations",
        "short2"    => "Short",
        "founded2"  => "Founded",
        "links"     => "Links",
        "about2"    => "About",
        "releases"  => "Releases by this Group",
        "no_releas" => "There are no Releases yet!"
    ],
    "group" => [
        "website"   => "Website",
        "irc"       => "IRC",
        "mangadex"  => "MangaDex",
        "email"     => "eMail",
        "approve"   => [
            "not_approved"  => "This group has not been approved by a Staff member yet and is only visible to Mods and Admins.",
            "action"        => "What do you want to do?",
            "approve"       => "Approve this Group",
            "unapprove"     => "Delete this Group",
            "notice"        => "After approving, you might want to reload this page..."
        ]
    ],
    "edit_group" => [
        "title"     => "Edit Group",
    ],
    "config"    => [
        "title"     => "Edit Config",
        "title2"    => "Site Title",
        "slogan"    => "Site Slogan",
        "logo"      => "Logo URL (Leave empty for none)",
        "cookie"    => "Cookie Prefix (If you change, all old Bookmarks will be lost!)",
        "url"       => "URL to Site (With https and END WITH SLASH!)",
        "theme"     => "Site Default Theme",
        "themes"    => [
            1   => "Default Light",
            2   => "Cerulean Light",
            3   => "Lumen Light",
            4   => "Readable Light",
            5   => "Slate Dark",
            6   => "Cyborg Dark"
        ],
        "start"     => "Site Started in",
        "lang"      => "Default Language",
        "disqus"    => "Disqus Name (Optional)"
    ],
    "login" => [
        "error"     => "Error",
        "message"   => "Don't have an account yet?",
        "username"  => "Username",
        "password"  => "Password",
        "captcha"   => "Captcha",
        "cookies"   => "Stay logged in (THIS USES COOKIES!)"
    ],
    "signup" => [
        "password" => "Repeat Password",
        "message"   => "Already have an account?",
        "used_invite"   => "The Invite you entered has already been used!",
        "empty_invite"  => "You need an invite to create an account!",
        "invite"    => "Invite Code"
    ],
    "add_manga" => [
        "add"       => "Add Manga",
        "title"     => "*Manga Title",
        "cover"     => "Cover Image (1500x2150px)",
        "alt"       => "Alt Names",
        "author"    => "Author",
        "genre"     => "Genre (Seperate by comma)",
        "type"      => "*Reading type (Manga, Manwha, Manhua)",
        "released"  => "Released in Year",
        "raw-st"    => "*Status of Raws",
        "status"    => "*Status of Scanlation",
        "descript"  => "Description of Title (Supports HTML)",
        "raw-url"   => "URL to Raw",
        "licensed"  => "Licenser (leave empty if unlicensed)",
        "official"  => "URL to official Release (leave empty if none)",
        "required"  => "Required fiels are marked with *",
        "all_required"  => "All fields are required!",
        "manga"     => "Manga",
        "manhua"    => "Manhua",
        "manwha"    => "Manwha",
        "type_manga"    => "Manga (Paged)",
        "type_manhua"   => "Manhua (List)",
        "type_manwha"   => "Manwha (List)",
        "rawst"     => [
            1   => "Unknown",
            2   => "Announced",
            3   => "Ongoing",
            4   => "Hiatus",
            "5"   => "Completed",
            6   => "Canceled"
        ],
        "scanst"    => [
            1   => "Plan to Scan",
            2   => "In Work",
            3   => "Scan on Hiatus",
            4   => "Forced Hiatus (due to exposure)",
            5   => "Completed",
            6   => "Dropped"
        ],
    ],
    "manga" => [
        "alt"       => "Alt. Name(s)",
        "author"    => "Author(s)",
        "genre"     => "Genre(s)",
        "type"      => "Reading Type",
        "released"  => "Released (Year)",
        "raw-status"    => "Status of the Raws",
        "scan-status"   => "Status of Scanlation",
        "raw"       => "Read/Buy official Raw",
        "licensed"  => "Please support the Author by buying the official work since it has been licensed by",
        "added"     => "This Manga has been added on",
        "edit_title"    => "Edit Title",
        "add_ch"    => "Add Chapter",
        "unknown"   => "Unknown",
        "edit_chap" => "Edit Chapter",
        "chapters"  => "Chapters",
        "comments"  => "Comments"
    ],
    "add_chapter" => [
        "title"     => "Add Chapter for",
        "file"      => "*Select ZIP/RAR File to upload",
        "volume"    => "Volume (Leave empty for none)",
        "chapter"   => "Chapter (Leave empty or 0 for Oneshot)",
        "ctitle"    => "Chapter Title (Leave empty for none)",
        "button"    => "Add Chapter",
        "ser_grp"   => "Search for Group...",
        "sel_grp1"  => "Select Group 1",
        "sel_grp2"  => "Select Group 2",
        "sel_grp3"  => "Select Group 3",
        "no_group"  => "No Group",
        "none"      => "None",
        "group_unap"    => "Don't see your group? That means it's still unapproved. Wait some more or upload without a group. You can always edit that later."
    ],
    "chapter" => [
        "menu"      => "Navigation",
        "close"     => "Hide",
        "back_to_m" => "Back to Manga",
        "bookmark"  => "Bookmark",
        "update_bm" => "Update Bookmark",
        "remove_bm" => "Remove Bookmark",
        "comments"  => "To the Comments",
        "next"      => "Next Chapter",
        "prev"      => "Previous Chapter",
        "oneshot"   => "Oneshot"
    ],
    "edit_chapter" => [
        "title"     => "Edit Chapter",
        "file"      => "Select new ZIP/RAR (deletes old)",
        "edit"      => "Edit Chapter",
        "return"    => "Return to Title",
        "delete"    => "Delete Chapter",
        "del_yes"   => "Yes, I am sure.",
        "del_no"    => "No, cancel!"
    ],
    "edit_title" => [
        "title"     => "Edit Title",
        "save"      => "Make Changes",
        "delete"    => "Delete Title"
    ],
    
    "errors" => [
        "bad_username"  => "Username contains bad characters!",
        "bad_password"  => "Password contains bad characters!",
        "wrong_password"    => "Password is wrong!",
        "taken_username"    => "This username is already taken!",
        "unmatch_password"  => "The passwords do not match!",
        "attack"    => "Are you sure you want to exist without saving?",
        "captcha"   => "The CAPTCHA was wrong... try again!",
        "unsupported_image" => "The File you have tried to upload is NOT an Image (or it is empty)!",
        "title_exists"  => "The Title you are trying to add already exists with the same name!",
        "used_invite"   => "This Invite Code has already been used!"
    ]
];

?>