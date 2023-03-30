<?php

require "../autoload.php";

// Pagination
$page = cat($_GET["page"] ?? 1);
$limit = $config["perpage"]["titles"];
$skip = ($page - 1) * $limit;

$titles = $db["titles"]->createQueryBuilder()
    ->orderBy(["title" => "ASC"])
    ->limit($limit)
    ->skip($skip)
    ->getQuery()
    ->fetch();

$pagis = array();
$totalPages = $db["titles"]->count() / $config["perpage"]["titles"];
for ($i = 0; $i < $totalPages; $i++) {
    array_push($pagis, $i + 1);
}

if($logged && $user["level"] >= 75) {
	// Gotta implement a function here that makes it for all files inside /custom/
	$upl["theme"] = valCustom("theme");
	$upl["genre"] = valCustom("genre");
	$upl["warnings"] = valCustom("warnings");
	$upl["format"] = valCustom("format");
	//valCLang("upload_langs");
	
	$smarty->assign("upl_theme", $upl["theme"]);
	$smarty->assign("upl_genre", $upl["genre"]);
	$smarty->assign("upl_warnings", $upl["warnings"]);
	$smarty->assign("upl_format", $upl["format"]);
}

$smarty->assign("pagetitle", "Titles - Page " . $page . " " . $config["divider"] . " " . $config["title"]);
$smarty->assign("page", $page);
$smarty->assign("titles", $titles);
$smarty->assign("pagis", $pagis);
$smarty->assign("totalPages", $totalPages);

$smarty->display("parts/header.tpl");
$smarty->display("pages/titles.tpl");
$smarty->display("parts/footer.tpl");
