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

if (!is_numeric($page) || $page < 1) {
    die(json_encode(["done" => false, "msg" => "Page is invalid."]));
}

$perpage = $theme["config"]["perpage"]["title"];
$skip = ($page - 1) * $perpage;

$titles = $db["projects"]->createQueryBuilder()
    ->orderBy(["title" => "ASC"])
    ->limit($perpage)
    ->skip($skip)
    ->where(["public", "==", 1])
    ->getQuery()
    ->fetch();

$pagis = [];
$totalPages = $db["projects"]->count() / $perpage;
for ($i = 0; $i < $totalPages; $i++) {
    array_push($pagis, $i + 1);
}

$resp["done"] = true;
$resp["msg"] = $titles;
$resp["pagination"] = $pagis;

die(json_encode($resp));
