<?php

require "../autoload.php";

// Pagination
$page = cat($_GET["page"] ?? 1);
$limit = $config["perpage"]["chapters"];
$skip = ($page - 1) * $limit;

$chapters = $db["chapters"]->createQueryBuilder()
    ->orderBy(["id" => "DESC"])
    ->limit($limit)
    ->skip($skip)
    ->getQuery()
    ->fetch();

foreach ($chapters as $key => $ch) {
    $title = $db["titles"]->findById($ch["title"]);
    $uploader = $db["users"]->findById($ch["user"]);
    $chapters[$key]["title"] = $title;
    $chapters[$key]["user"] = $uploader;
}

$pagis = array();
$totalPages = $db["chapters"]->count() / $config["perpage"]["chapters"];
for ($i = 0; $i < $totalPages; $i++) {
    array_push($pagis, $i + 1);
}

$smarty->assign("pagetitle", "Releases - Page " . $page . " " . $config["divider"] . " " . $config["title"]);
$smarty->assign("page", $page);
$smarty->assign("chapters", $chapters);
$smarty->assign("pagis", $pagis);
$smarty->assign("totalPages", $totalPages);

$smarty->display("parts/header.tpl");
$smarty->display("pages/releases.tpl");
$smarty->display("parts/footer.tpl");
