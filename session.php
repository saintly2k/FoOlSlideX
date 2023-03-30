<?php

$logged = false;
$user = array();
if (isset($_COOKIE[cat($config["title"]) . "_session"]) && !empty($_COOKIE[cat($config["title"]) . "_session"])) {
    $token = clean($_COOKIE[cat($config["title"]) . "_session"]);
    $session = $db["sessions"]->findOneBy(["token", "=", $token]);
    if (!empty($session)) {
        unset($user);
        $user = $db["users"]->findOneBy(["id", "=", $session["user"]]);
        if (!empty($user)) {
            $logged = true;
        }
    }
}
