<?php

// This Plugin only works with SleekDB
if (!in_array("SleekDB", $theme["plugins"])) {
    die("Plugin 'session' requires plugin 'SleekDB'! Make sure it is loaded before this plugin.");
}

$logged = false;
$user = [];

if (isset($_COOKIE["session"]) && !empty($_COOKIE["session"])) {
    $token = clean($_COOKIE["session"]);
    $session = $db["sessions"]->findOneBy(["token", "==", $token]);
    if (!empty($session)) {
        $user = $db["users"]->findOneBy(["id", "==", $session["user"]]);
        if (!empty($user)) {
            $logged = true;
        }
    }
}
$smarty->assign("logged", $logged);
$smarty->assign("user", $user);
