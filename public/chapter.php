<?php

require "../autoload.php";

if (!isset($_GET["id"]) || empty($_GET["id"])) header("Location: index.php") && die("No or empty ID.");
if (!is_numeric($_GET["id"])) header("Location: index.php") && die("Invalid ID.");
$id = cat($_GET["id"]);
$chapter = $db["chapters"]->findById($id);
$title = $db["titles"]->findById($chapter["title"]["id"]);
if (empty($title)) header("Location: titles.php") && die("Title not found.");
if (empty($chapter)) header("Location: title.php?id={$title["id"]}") && die("Chapter not found.");

$images = glob(ps(__DIR__ . "/data/chapters/{$id}/*.{jpg,png,jpeg,webp,gif}"), GLOB_BRACE);
natsort($images);

$comments = $db["chapterComments"]->findBy(["chapter.id", "=", $title["id"]], ["id" => "DESC"]);

chapterVisit($chapter);

$smarty->assign("commentsCount", count($comments));
$smarty->assign("title", $title);
$smarty->assign("chapter", $chapter);
$smarty->assign("images", $images);
$smarty->assign("pagetitle", "Read " . $title["title"] . " " . formatChapterTitle($chapter["volume"], $chapter["number"]) . " (Chapter) " . $config["divider"] . " " . $config["title"]);

$smarty->display("parts/header.tpl");
$smarty->display("pages/chapter.tpl");
$smarty->display("parts/footer.tpl");
