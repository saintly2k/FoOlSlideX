<?php

if (!file_exists(__DIR__ . "/.installed")) {
    header("Location: install.php");
    die("System not installed.");
}

// Main-config
require_once "config.php";
$config["debug"] == true ? error_reporting(E_ALL) && ini_set('display_errors', 1) : error_reporting(0) && ini_set('display_errors', 0);
require_once "funky.php";

// SleekDB
require_once ps(__DIR__ . $config["path"]["sleek"] . "/Store.php");
$db["users"] = new \SleekDB\Store("users", ps(__DIR__ . $config["db"]["sleek"]["dir"]), $config["db"]["sleek"]["config"]);
$db["sessions"] = new \SleekDB\Store("sessions", ps(__DIR__ . $config["db"]["sleek"]["dir"]), $config["db"]["sleek"]["config"]);
$db["alerts"] = new \SleekDB\Store("alerts", ps(__DIR__ . $config["db"]["sleek"]["dir"]), $config["db"]["sleek"]["config"]);
$db["alertReads"] = new \SleekDB\Store("alertReads", ps(__DIR__ . $config["db"]["sleek"]["dir"]), $config["db"]["sleek"]["config"]);
$db["titles"] = new \SleekDB\Store("titles", ps(__DIR__ . $config["db"]["sleek"]["dir"]), $config["db"]["sleek"]["config"]);
$db["chapters"] = new \SleekDB\Store("chapters", ps(__DIR__ . $config["db"]["sleek"]["dir"]), $config["db"]["sleek"]["config"]);
$db["visitLogs"] = new \SleekDB\Store("visitLogs", ps(__DIR__ . $config["db"]["sleek"]["dir"]), $config["db"]["sleek"]["config"]);
$db["chapterComments"] = new \SleekDB\Store("chapterComments", ps(__DIR__ . $config["db"]["sleek"]["dir"]), $config["db"]["sleek"]["config"]);
$db["titleComments"] = new \SleekDB\Store("titleComments", ps(__DIR__ . $config["db"]["sleek"]["dir"]), $config["db"]["sleek"]["config"]);
$db["profileComments"] = new \SleekDB\Store("profileComments", ps(__DIR__ . $config["db"]["sleek"]["dir"]), $config["db"]["sleek"]["config"]);
$db["titleViews"] = new \SleekDB\Store("titleViews", ps(__DIR__ . $config["db"]["sleek"]["dir"]), $config["db"]["sleek"]["config"]);
$db["chapterViews"] = new \SleekDB\Store("chapterViews", ps(__DIR__ . $config["db"]["sleek"]["dir"]), $config["db"]["sleek"]["config"]);
$db["profileViews"] = new \SleekDB\Store("profileViews", ps(__DIR__ . $config["db"]["sleek"]["dir"]), $config["db"]["sleek"]["config"]);
$db["activation"] = new \SleekDB\Store("activation", ps(__DIR__ . $config["db"]["sleek"]["dir"]), $config["db"]["sleek"]["config"]);
$db["readChapters"] = new \SleekDB\Store("readChapters", ps(__DIR__ . $config["db"]["sleek"]["dir"]), $config["db"]["sleek"]["config"]);

// Session
require_once "session.php";

// Theme, language and reading language
$usertheme = getUserTheme($logged, $user["theme"] ?? "");
$userlang = getUserLang($logged, $user["lang"] ?? "");
$preflang = getPrefLang();

// Parsedown
require_once ps(__DIR__ . $config["path"]["parsedown"] . "/Parsedown.php");
$parsedown = new Parsedown();
$parsedown->setSafeMode(true);

// HTML-Purifier
require_once ps(__DIR__ . $config["path"]["htmlpurifier"] . "/HTMLPurifier.auto.php");
$purifier = new HTMLPurifier(HTMLPurifier_Config::createDefault());

// PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once ps(__DIR__ . $config["path"]["phpmailer"] . "/Exception.php");
require_once ps(__DIR__ . $config["path"]["phpmailer"] . "/PHPMailer.php");
require_once ps(__DIR__ . $config["path"]["phpmailer"] . "/SMTP.php");

$mailer = new PHPMailer(true);

// Smarty
require_once ps(__DIR__ . $config["path"]["smarty"] . "/Smarty.class.php");
$smarty = new Smarty();
$smarty->setTemplateDir(ps(__DIR__ . $config["smarty"]["template"] . "/" . $usertheme));
$smarty->setConfigDir(ps(__DIR__ . $config["smarty"]["config"]));
$smarty->setCompileDir(ps(__DIR__ . $config["smarty"]["compile"]));
$smarty->setCacheDir(ps(__DIR__ . $config["smarty"]["cache"]));

// Getting all plugins for the Theme
require ps(__DIR__ . $config["smarty"]["template"] . "/{$usertheme}/info.php");
foreach ($theme["plugins"] as $reqPlugin) {
    if (!file_exists(ps(__DIR__ . $config["path"]["plugins"] . "/" . $reqPlugin . ".php")))
        die("This theme requires following plugin: " . $reqPlugin);
    require_once ps(__DIR__ . $config["path"]["plugins"] . "/" . $reqPlugin . ".php");
}

// Plugins (Legacy)
// $plugins = glob(ps(__DIR__ . $config["path"]["plugins"] . "/enabled/*.php"));
// foreach ($plugins as $plugin) {
//     require_once $plugin;
// }

// And finally
$usertheme = getUserTheme($logged, $user["theme"] ?? "");
$userlang = getUserLang($logged, $user["lang"] ?? "");
$preflang = getPrefLang();
require ps(__DIR__ . $config["smarty"]["template"] . "/{$usertheme}/info.php");
require  ps(__DIR__ . $config["path"]["langs"] . "/{$userlang}.php");

visit();

$smarty->assign("config", $config);
$smarty->assign("lang", $lang);
$smarty->assign("theme", $theme);
$smarty->assign("userlang", $userlang);
$smarty->assign("usertheme", $usertheme);
$smarty->assign("version", file_get_contents(ps(__DIR__ . "/version.txt")));
$smarty->assign("logged", $logged);
$smarty->assign("user", $user);
$smarty->assign("preflang", $preflang);
