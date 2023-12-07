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

if (!in_array($type, ["title", "chapter", "user"])) {
    die(json_encode(["done" => false, "msg" => "Invalid type."]));
}

if ($type == "title") {
    $image = ROOT . "assets/covers/{$file}";
    if (!file_exists($image)) {
        die(json_encode(["done" => false, "msg" => "Cover does not exist."]));
    }
}

// $type = "image/jpeg";
header("Content-Type: image/jpeg");
header("Content-Length: " . filesize($image));
readfile($image);
