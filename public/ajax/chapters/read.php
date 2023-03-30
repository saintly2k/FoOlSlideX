<?php

require "../../../autoload.php";

if (!$logged) die("Not logged in!");
if ($user["level"] < 75) die("Missing permission!");

if (!isset($_POST["user"]) || empty($_POST["user"]) || !is_numeric($_POST["user"])) die("Invalid User!");
if (!isset($_POST["chapter"]) || empty($_POST["chapter"]) || !is_numeric($_POST["chapter"])) die("Invalid Chapter!");

$uid = cat($_POST["user"] ?? 0);
$cid = cat($_POST["chapter"] ?? 0);

$check = $db["readChapters"]->findOneBy(["chapter", "==", $cid]);
if (empty($check)) {
    $data = array(
        "user" => $uid,
        "chapter" => $cid,
        "timestamp" => now()
    );
    $db["readChapters"]->insert($data);
} else {
    $db["readChapters"]->deleteById($check["id"]);
}

die("success");
