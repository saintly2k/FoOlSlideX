<?php

// Basic Configuration

$config["name"] = "RoriconScans"; // Site name
$config["url"]  = "http://localhost/"; // Site URL (WITH slash ending!!)
$config["home"] = "home"; // What is the page that shows up, if no page is set?

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
$based["pass"] = "root"; // Password for Database user
$based["table"] = "roriconscans"; // Table where you imported "roriconscans.sql"

?>
