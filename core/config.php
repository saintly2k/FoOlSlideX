<?php

// Basic Configuration

$config["name"] = "FoOlSlideX"; // Site name
$config["logo"] = "logo.png"; // Logo file (300x50), located in the "img" folder of your theme (default: /assets/themes/RoriconScans/img/logo.png)
$config["url"]  = "http://localhost/FoOlSlideX"; // Site URL (WITH slash ending!!, if you're in a folder, add it too)
$config["home"] = "home"; // What is the page that shows up, if no page is set?
$config["theme"] = "RoriconScans"; // Themes located in /assets/themes/, CASE SENSITIVE!!
$config["hero"] = "10"; // How many images should be shown on the home page on the hero slider?
$config["chapters"] = "20"; // How many chapters should be shown on the home page right to the hero slider?

// Items per page shown (for pagination)
$perpage["manga"] = "25"; // How many Mangas should be shown on the Manga page per page?
$perpage["latest"] = "25"; // How many Chapters should be shown on the Latest page per page?
$perpage["list"] = "50"; // How many Chapters should be shown on a Manga entry as chapterlist?

// Reader Configs
$reader["type"] = "strip"; // strip or page WIPPP!!

// Socials Configs
$socials["twitter"] = "https://twitter.com/saintly2k"; // INCLUDE https and leave blank if none
$socials["mangadex"] = "https://mangadex.org/group/16890"; // INCLUDE https, leave blank for none
$socials["discord"] = "https://discord.gg/gFux2eazGp"; // INCLUDE https, leave blank for none
$socials["irc"] = ""; // WIP
$socials["facebook"] = "https://facebook.com/saintly2k"; // INCLUDE https, leave blank for none
$socials["website"] = "https://weltenwanderer-scans.ovh"; //INCLUDE https, leave blank for none

// Admin Account Info, edit/add users in
// views/pages/users.php

// Chapter Generation features .:: COMING SOON! ::.
$chagen["slug"] = "w"; // WIP

// DataBase details
$based["host"] = "localhost"; // Host for Database
$based["user"]= "root"; // User for Database
$based["pass"] = ""; // Password for Database user
$based["table"] = "foolslidex"; // Table where you imported "roriconscans.sql"

?>
