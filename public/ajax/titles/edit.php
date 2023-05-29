<?php

require "../../../autoload.php";

if (!$logged) die("You're not logged in!");
if ($user["level"] < 75) die("Missing permissions to do this!");
if (!isset($_POST["id"]) || empty($_POST["id"])) die("Empty ID.");
if (!is_numeric($_POST["id"])) die("Invalid ID.");

$id = clean($_POST["id"] ?? "");

$title = $db["titles"]->findById($id);
if (empty($title)) die(je(["s" => false, "msg" => "Title not found!"]));

$cover = clean($_POST["cover"] ?? "");
$name = clean($_POST["title"] ?? "");
$alts = clean($_POST["alts"] ?? "");
$authors = clean($_POST["authors"] ?? "");
$artists = clean($_POST["artists"] ?? "");
$olang = clean($_POST["olang"] ?? "");
$ostatus = clean($_POST["ostatus"] ?? "");
$sstatus = clean($_POST["sstatus"] ?? "");
$release = clean($_POST["release"] ?? "");
$completion = clean($_POST["completion"] ?? "");
$summary = clean($_POST["summary"] ?? "");

$formats = $_POST["format"] ?? array();
$warnings = $_POST["warning"] ?? array();
$themes = $_POST["theme"] ?? array();
$genres = $_POST["genre"] ?? array();

if (empty($cover)) die(je(["s" => false, "msg" => "Cover is required!"]));
if (empty($name)) die(je(["s" => false, "msg" => "Title is required!"]));
switch ($ostatus) {
	case 1:
		break;
	case 3:
		break;
	case 4:
		break;
	case 5:
		break;
	case 2:
	default:
		$ostatus = 2;
}
switch ($sstatus) {
	case 1:
		break;
	case 3:
		break;
	case 4:
		break;
	case 5:
		break;
	case 2:
	default:
		$sstatus = 2;
}
if (empty($olang)) die(je(["s" => false, "msg" => "You need to enter an original language."]));
if (!empty($release)) {
	if (!is_numeric($release)) die(je(["s" => false, "msg" => "You messed with the Release Year!"]));
	if (strlen($release) != 4) die(je(["s" => false, "msg" => "Release years tend to be four digits long."]));
}
if (!empty($completion)) {
	if (!is_numeric($completion)) die(je(["s" => false, "msg" => "You messed with the Completion Year!"]));
	if (strlen($completion) != 4) die(je(["s" => false, "msg" => "Completion years tend to be four digits long."]));
}

if (!is_array($formats)) die(je(["s" => false, "msg" => "Formats should be an array."]));
if (!is_array($warnings)) die(je(["s" => false, "msg" => "Warnings should be an array."]));
if (!is_array($themes)) die(je(["s" => false, "msg" => "Themes should be an array."]));
if (!is_array($genres)) die(je(["s" => false, "msg" => "Genres should be an array."]));

if (!empty($formats)) {
	$_formats = array();
	foreach ($formats as $format) {
		if (!empty($format)) array_push($_formats, trim(cat($format)));
	}
	$formats = $_formats;
}
if (!empty($warnings)) {
	$_warnings = array();
	foreach ($warnings as $warning) {
		if (!empty($warning)) array_push($_warnings, trim(cat($warning)));
	}
	$warnings = $_warnings;
}
if (!empty($themes)) {
	$_themes = array();
	foreach ($themes as $theme) {
		if (!empty($theme)) array_push($_themes, trim(cat($theme)));
	}
	$themes = $_themes;
}
if (!empty($genres)) {
	$_genres = array();
	foreach ($genres as $genre) {
		if (!empty($genre)) array_push($_genres, trim(cat($genre)));
	}
	$genres = $_genres;
}

// So far, everything is correct
if ($title != $title["title"])
	if (!empty($db["titles"]->findOneBy(["title", "=", $title]))) die(je(["s" => false, "msg" => "Title already exists!"]));

if (!file_exists(ps(__DIR__ . "/../../data/covers"))) mkdir(ps(__DIR__ . "/../../data/covers"), 0777, true);
if (file_exists(ps(__DIR__ . "/../../data/tmp/" . $cover))) rename(ps(__DIR__ . "/../../data/tmp/" . $cover), ps(__DIR__ . "/../../data/covers/" . $title["id"] . ".png"));

$data = array(
	"title" => $name,
	"alts" => $alts,
	"authors" => $authors,
	"artists" => $artists,
	"lang" => $olang,
	"status" => $ostatus,
	"sstatus" => $sstatus,
	"releaseYear" => $release,
	"completionYear" => $completion,
	"summary" => $summary,
	"tags" => array(
		"formats" => $formats,
		"warnings" => $warnings,
		"themes" => $themes,
		"genres" => $genres
	),
	"lastEdited" => now()
);
$db["titles"]->updateById($title["id"], $data);

// Everything is right, return true and title ID
die(je(["s" => true, "msg" => $title["id"]]));
