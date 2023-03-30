<?php

require "../../../autoload.php";

if (!$logged) die("You're not logged in!");

doLog("logout", true, null, $user["id"]);
$db["sessions"]->deleteById($session["id"]);
die("success");
