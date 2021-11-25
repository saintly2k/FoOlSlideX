<?php

// Site Configuration
$config["name"] = "FoOlSlideX"; // Page Title
$config["logo"] = "assets/images/logo.png"; // Logo image, replaces $config["name"] in navbar
$config["url"] = "http://localhost/"; // Full URL, WITH TRAILING SLASH OR ELSE YOU WILL BREAK THE SITE!
$config["desc"] = "FoOlSlideX is the most powerful Manga-reader, ever created by the human race. Reworked by an Otaku for Scanlation-groups."; // Description of your site.
$config["home"] = "releases"; // Which page to display if not specifically entered
$config["theme"] = "1"; // Default Theme for guests, 1 for light, 2 for dark
$config["registration"] = "0"; // Registration open? 1 to enable, 0 to disable

// Entries per page for Pagination
$perpage["mangas"] = "16"; // How many Mangas per page?

// Banner Configuration
$banner["enabled"] = "0"; // Should a banner be displayed at the very page top?
$banner["directory"] = "assets/banners/"; // If yes, where are the banners located?
$banner["images"] = array("1.jpg"); // Which banners should be used? The system will pick 1 random

// Database Configuration
$based["host"] = "localhost"; // Database Host
$based["user"] = "root"; // Database Username
$based["pass"] = "root"; // Database Password
$based["table"] = "foolslidev2"; // Database Table

?>
