<?php

require "../../../autoload.php";

if (!$logged) die("You're not logged in!");

$avatar = clean($_POST["avatar"] ?? "");
$theme = clean($_POST["theme"] ?? "");

if (empty($avatar)) $avatar = $config["default"]["avatar"];
if (empty($theme)) $theme = $config["default"]["theme"];

$data = array(
    "avatar" => $avatar,
    "theme" => $theme,
);
$db["users"]->updateById($user["id"], $data);
die("success");
