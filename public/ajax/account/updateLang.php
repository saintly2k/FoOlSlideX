<?php

require "../../../autoload.php";

if (!$logged) die("Not logged in.");

$newLang = cat($_POST["newLang"]);
$data = array(
    "lang" => $newLang
);
$db["users"]->updateById($user["id"], $data);
die("success");
