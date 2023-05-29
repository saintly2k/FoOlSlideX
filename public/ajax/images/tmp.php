<?php

require "../../../autoload.php";

if (!$logged) die(je([false, "You're not logged in!"]));

if (!isset($_FILES["cover"]["name"])) die(je(["s" => false, "msg" => "No image to upload!"]));

// Upload image on select
if (!file_exists("../../data/tmp")) mkdir("../../data/tmp", 0777, true); // Create TMP folder if not exists
$string = genUuid();
$target_file = "../../data/tmp/" . $string . "-" . basename($_FILES["cover"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$target_file = "../../data/tmp/" . $string . "." . $imageFileType;
$output_file = $string . "." . $imageFileType;

// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["cover"]["tmp_name"]);
if ($check == false) die(je(["s" => false, "msg" => "Invalid Image!"]));

// Check file size
if ($_FILES["cover"]["size"] > $config["mfs"]["cover"]) die(je(["s" => false, "msg" => "Cover too large. Cannot exceed " . formatBytes($config["mfs"]["cover"]) . "!"]));

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp") die(je(["s" => false, "msg" => "Invalid Image! Please use JPEG, PNG or WEBP."]));

if (!move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file)) die(je(["s" => false, "msg" => "Something went wrong..."]));
die(je(["s" => true, "msg" => $output_file]));