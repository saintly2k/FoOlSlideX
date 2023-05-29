<?php

require "../../../autoload.php";

if (!$logged) die("Not logged in!");
if ($user["level"] < 75) die("Missing permission!");

if (!isset($_POST["id"]) || empty($_POST["id"])) die("Missing ID!");
if (!is_numeric($_POST["id"])) die("Invalid ID!");

(int) $id = cat($_POST["id"]);
$title = $db["titles"]->findById($id);

if (empty($title)) die("Title does not exist!");

$number = cat($_POST["number"] ?? 1);
$volume = cat($_POST["volume"] ?? null);
$name = clean($_POST["title"] ?? "");
$language = clean($_POST["language"] ?? "");

if (!isset($_FILES["zip"]) || empty($_FILES["zip"]["tmp_name"])) die("Missing ZIP file!");
if (empty($number)) die("Invalid or empty chapter number!");
if (empty($language)) die("Invalid Language!");
$language = explode(",", $language);
if (empty($language[0]) || empty($language[1])) die("Invalid Language!");

$mime = mime_content_type($_FILES["zip"]["tmp_name"]);
$type = strtolower(pathinfo($_FILES["zip"]["name"], PATHINFO_EXTENSION));

if (empty($_FILES["zip"]["tmp_name"])) die("Invalid File!");
if ($mime != "application/zip" || $type != "zip") die("Only ZIP is supported!");
if ($_FILES["zip"]["size"] > $config["mfs"]["chapter"]) die(je(["s" => false, "msg" => "ZIP too large. Cannot exceed " . formatBytes($config["mfs"]["chapter"]) . "!"]));

$cid = $db["chapters"]->getLastInsertedId() + 1;

if (file_exists(ps(__DIR__ . "/../../data/chapters/{$cid}"))) rmrf(ps(__DIR__ . "/../../data/chapters/{$cid}"));
$result = unzip($_FILES["zip"]["tmp_name"], ps(__DIR__ . "/../../data/tmp/{$cid}"), ps(__DIR__ . "/../../data/chapters/{$cid}"));
if ($result !== "success") die($result);

$data = array(
    "number" => namba($number),
    "volume" => namba($volume),
    "name" => $name,
    "language" => $language,
    "title" => $title["id"],
    "user" => $user["id"],
    "lastEdited" => now(),
    "timestamp" => now()
);
$db["chapters"]->insert($data);
die("success");
