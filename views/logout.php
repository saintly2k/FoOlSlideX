<?php

require_once __DIR__ . "/../autoload.php";

if (!$logged) {
    header("Location: {$config["url"]}");
    die("You're not logged in!");
}

// doLog("logout", true, null, $user["id"]);
$db["sessions"]->deleteById($session["id"]);
header("Location: {$config["url"]}");
die("success");
