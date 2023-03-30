<?php

require "../autoload.php";

if (!isset($_GET["id"]) || empty($_GET["id"])) header("Location: index.php") && die("No or empty ID.");
if (!is_numeric($_GET["id"])) header("Location: index.php") && die("Invalid ID.");
$id = cat($_GET["id"]);
$title = $db["titles"]->findById($id);
if (empty($title)) header("Location: titles.php") && die("Title not found.");

$title["authors2"] = $title["authors"];
$title["artists2"] = $title["artists"];
if (!empty($title["authors"])) $title["authors"] = explode(",", $title["authors"]);
if (!empty($title["artists"])) $title["artists"] = explode(",", $title["artists"]);

if (!empty($title["tags"]["formats"])) {
	$_array = array();
	foreach ($title["tags"]["formats"] as $item) {
		if (!empty($item) && is_numeric($item)) {
			$call = getTag("format", $item);
			if (!empty($call)) array_push($_array, $call);
		}
	}
	$title["tags"]["_formats"] = $title["tags"]["formats"];
	$title["tags"]["formats"] = $_array;
} else {
	$title["tags"]["_formats"] = array();
}
if (!empty($title["tags"]["warnings"])) {
	$_array = array();
	foreach ($title["tags"]["warnings"] as $item) {
		if (!empty($item) && is_numeric($item)) {
			$call = getTag("warnings", $item);
			if (!empty($call)) array_push($_array, $call);
		}
	}
	$title["tags"]["_warnings"] = $title["tags"]["warnings"];
	$title["tags"]["warnings"] = $_array;
} else {
	$title["tags"]["_warnings"] = array();
}
if (!empty($title["tags"]["themes"])) {
	$_array = array();
	foreach ($title["tags"]["themes"] as $item) {
		if (!empty($item) && is_numeric($item)) {
			$call = getTag("theme", $item);
			if (!empty($call)) array_push($_array, $call);
		}
	}
	$title["tags"]["_themes"] = $title["tags"]["themes"];
	$title["tags"]["themes"] = $_array;
} else {
	$title["tags"]["_themes"] = array();
}
if (!empty($title["tags"]["genres"])) {
	$_array = array();
	foreach ($title["tags"]["genres"] as $item) {
		if (!empty($item) && is_numeric($item)) {
			$call = getTag("genre", $item);
			if (!empty($call)) array_push($_array, $call);
		}
	}
	$title["tags"]["_genres"] = $title["tags"]["genres"];
	$title["tags"]["genres"] = $_array;
} else {
	$title["tags"]["_genres"] = array();
}

if ($logged && $user["level"] >= 75) {
	// Gotta implement a function here that makes it for all files inside /custom/
	$upl["theme"] = valCustom("theme");
	$upl["genre"] = valCustom("genre");
	$upl["warnings"] = valCustom("warnings");
	$upl["format"] = valCustom("format");
	$upl["langs"] = valCLang("upload_langs");

	$smarty->assign("upl_theme", $upl["theme"]);
	$smarty->assign("upl_genre", $upl["genre"]);
	$smarty->assign("upl_warnings", $upl["warnings"]);
	$smarty->assign("upl_format", $upl["format"]);
	$smarty->assign("upl_langs", $upl["langs"]);
}

if (!empty($title["summary"])) {
	$title["summary2"] = $title["summary"];
	$title["summary"] = $parsedown->text($purifier->purify($title["summary"]));
} else {
	$title["summary2"] = "";
}

$chapters = array();
$chapterLangs = array();
$chapterCount = 0;
if (!empty($db["chapters"]->findOneBy(["title.id", "=", $title["id"]]))) {
	// Chapter Languages
	$chapterLangs = $db["chapters"]->createQueryBuilder()
		->select(["language"])
		->where(["title.id", "=", $title["id"]])
		->distinct("language.0")
		->getQuery()
		->fetch();
	sort($chapterLangs);
	// Preferred Language
	if (!in_array($preflang, array_column(array_column($chapterLangs, "language"), 1))) $smarty->assign("preflang", $chapterLangs[0]["language"][1]);
	// Actual Chapters
	foreach ($chapterLangs as $key => $chLang) {
		$_chapters = $db["chapters"]->createQueryBuilder()
			->where([["title.id", "=", $title["id"]], "AND", ["language.1", "=", $chLang["language"][1]]])
			->orderBy(["volume" => "DESC"])
			->orderBy(["number" => "DESC"])
			->getQuery()
			->fetch();
		if (!empty($_chapters)) {
			$chapterLangs[$key]["language"]["chapters"] = array();
			$chapterLangs[$key]["language"]["count"] = count($_chapters);
			foreach ($_chapters as $_chapter) {
				// array_push($chapterLangs[$chLang[]], $_chapter);
				array_push($chapterLangs[$key]["language"]["chapters"], $_chapter);
				$chapterCount++;
			}
		}
	}
}

$comments = $db["titleComments"]->findBy(["title.id", "=", $title["id"]], ["id" => "DESC"]);

titleVisit($title);

$smarty->assign("commentsCount", count($comments));
$smarty->assign("chapterLangs", $chapterLangs);
$smarty->assign("chapterCount", $chapterCount);
$smarty->assign("pagetitle", $title["title"] . " (Title) " . $config["divider"] . " " . $config["title"]);
$smarty->assign("title", $title);

$smarty->display("parts/header.tpl");
$smarty->display("pages/title.tpl");
$smarty->display("parts/footer.tpl");
