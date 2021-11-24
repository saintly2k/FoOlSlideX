<?php

// Site Configuration
$config["name"] = "FoOlSlideX"; // Page Title
$config["logo"] = "assets/images/logo.png"; // Logo image, replaces $config["name"] in navbar
$config["url"] = "http://localhost/FoOlSlideX/"; // Full URL, WITH TRAILING SLASH OR ELSE YOU WILL BREAK THE SITE!
$config["home"] = "home"; // Which page to display if not specifically entered?
$config["registration"] = "1"; // Registration open? 1 to enable, 0 to disable

// Banner Configuration
$banner["enabled"] = "1"; // Should a banner be displayed at the very page top?
$banner["directory"] = "assets/banners/"; // If yes, where are the banners located?
$banner["images"] = array("1.jpg"); // Which banners should be used? The system will pick 1 random

// Database Configuration
$based["host"] = "localhost"; // Database Host
$based["user"] = "root"; // Database Username
$based["pass"] = ""; // Database Password
$based["table"] = "foolslidev2"; // Database Table

?>
