<?php

require_once ROOT . "autoload.php";
header("Content-Type: application/json; charset=utf-8");

$resp = [
    "done" => false,
    "msg" => "Error",
];

if ($logged && $user["level"] == 99) {
    die(json_encode(["done" => false, "msg" => "You're banned, baka!"]));
}

if (!in_array($type, ["title", "chapter", "user", "error", "tmp"])) {
    die(json_encode(["done" => false, "msg" => "Invalid type."]));
}

switch ($type) {
    case "title":
        $image = ROOT . "assets/covers/{$file}";
        break;
    case "tmp":
        $image = ROOT . "assets/tmp/{$file}";
        break;
    case "error":
    default:
        $image = ROOT . "assets/no-cover.jpg";
        break;
}

// $type = "image/jpeg";

if (!file_exists($image)) {
    die(json_encode(["done" => false, "msg" => "Cover does not exist."]));
}
header("Content-Type: image/jpeg");
header("Content-Length: " . filesize($image));
readfile($image);
