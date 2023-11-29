<?php

session_start();
require "system/files/timer.start.php";
$error = false;

/*if (!file_exists(__DIR__ . "/.installed")) {
header("Location: install.php");
die("System not installed.");
}*/

$logged = false;
require "config.php";
$config["debug"] == true ? error_reporting(E_ALL) && ini_set('display_errors', 1) : error_reporting(0) && ini_set('display_errors', 0);
require_once ROOT . "system/files/functions.php";

// Parsedown
require_once ROOT . "software/Parsedown.php";
$parsedown = new Parsedown();
$parsedown->setSafeMode(true);

// HTML-Purifier
require_once ROOT . "software/HTMLPurifier/HTMLPurifier.auto.php";
$purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());

// Smarty
require_once ROOT . "software/Smarty/Smarty.class.php";
$smarty = new Smarty();
$smarty->setTemplateDir(ps(__DIR__ . $config["smarty"]["template"] . "/" . $config["theme"]));

$smarty->setConfigDir(ps(__DIR__ . $config["smarty"]["config"]));
$smarty->setCompileDir(ps(__DIR__ . $config["smarty"]["compile"]));
$smarty->setCacheDir(ps(__DIR__ . $config["smarty"]["cache"]));

// Salt
if (!file_exists(ps(__DIR__ . "/system/data/salt.txt"))) {
    die("System needs a salt!! located in 'system/data/salt.txt'");
}

$config["salt"] = file_get_contents(ps(__DIR__ . "/system/data/salt.txt"));
if (empty($config["salt"])) {
    die("Salt cannot be empty!!");
}

// Default user lang
// if (!file_exists(ps(__DIR__ . "/system/languages/{$config["default"]["lang"]}.php"))) {
//     die("Default language file not found.");
// }

// require_once ps(__DIR__ . "/system/languages/{$config["default"]["lang"]}.php");

// Getting all plugins for the Theme
require __DIR__ . "/system/themes/{$config["theme"]}/info.php";
foreach ($theme["plugins"] as $reqPlugin) {
    if (!file_exists(ps(__DIR__ . "/system/plugins/" . $reqPlugin . ".php"))) {
        die("This theme requires following plugin: " . $reqPlugin);
    }

    require_once ps(__DIR__ . "/system/plugins/" . $reqPlugin . ".php");
}

// Assigning variables
$smarty->assign("config", $config);
$smarty->assign("version", file_get_contents(ps(__DIR__ . "/version.txt")));

// Time Zone
# I know you could solve it date_default_timezone_get() but whatever
$date = new DateTime();
$timeZone = $date->getTimezone();
$timeZone = $timeZone->getName();
$smarty->assign("timeZone", $timeZone);
