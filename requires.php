<?php

//if(!file_exists(".installed")) {
//    header("Location: install.php");
//}
// Will work on this tomorrow

ini_set('display_errors', 1);

session_start();

require("config.php");
require("vhs/conn.php");
require("vhs/funky.php");

if(isset($_GET["lang"])) {
    if($_GET["lang"]=="de") {
        setcookie($config["cookie"]."_lang", "de", time()+31556926, "/");
        header("refresh: 0; url=?");
    }
    if($_GET["lang"]=="en") {
        setcookie($config["cookie"]."_lang", "en", time()+31556926, "/");
        header("refresh: 0; url=?");
    }
    if($_GET["lang"]=="pt") {
        setcookie($config["cookie"]."_lang", "pt", time()+31556926, "/");
        header("refresh: 0; url=?");
    }
    if($_GET["lang"]=="ru") {
        setcookie($config["cookie"]."_lang", "ru", time()+31556926, "/");
        header("refresh: 0; url=?");
    }
}

if(isset($_POST["refuse_cookies"])) {
    setcookie($config["cookie"]."_cookie-consent", "2", time()+31556926, "/");
    header("Refresh: 0");
}

if(isset($_POST["accept_cookies"])) {
    setcookie($config["cookie"]."_cookie-consent", true, time()+31556926, "/");
    header("Refresh: 0");
}

if(isset($_COOKIE[$config["cookie"]."_cookie-consent"]) && $_COOKIE[$config["cookie"]."_cookie-consent"]==1) {
    if(!isset($_COOKIE[$config["cookie"]."_lang"])) {
        setcookie($config["cookie"]."_lang", $config["lang"], time()+31556926, "/");
        header("Refresh: 0");
    }
    $lang = mysqli_real_escape_string($conn, $_COOKIE[$config["cookie"]."_lang"]);
} else {
    if(!isset($_SESSION[$config["cookie"]."_lang"])) {
        $_SESSION[$config["cookie"]."_lang"] = $config["lang"];
        header("Refresh: 0");
    }
    $lang = mysqli_real_escape_string($conn, $_SESSION[$config["cookie"]."_lang"]);
}

require("lang/".$lang.".lang.php");

?>
