<?php

require "../autoload.php";

if (!$logged) header("Location: index.php")  && die("Not even logged in.");
if ($logged && $user["level"] >= 50) header("Location: index.php") && die("Already activated.");
if (!isset($_GET["token"]) || empty($_GET["token"])) header("Location: index.php") && die("No token given.");

$token = clean($_GET["token"] ?? "");

if (empty($token)) header("Location: index.php") && die("Empty token.");

$check = $db["activation"]->findOneBy(["token", "==", $token]);
if (empty($check)) header("Location: index.php") && die("Invalid token.");
$data = array(
    "level" => 50
);
$db["users"]->updateById($user["id"], $data);
header("Location: index.php");
