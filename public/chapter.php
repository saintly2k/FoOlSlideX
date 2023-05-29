<?php

require "../autoload.php";

if (!isset($_GET["id"]) || empty($_GET["id"])) header("Location: index.php") && die("No or empty ID.");
if (!is_numeric($_GET["id"])) header("Location: index.php") && die("Invalid ID.");
$id = cat($_GET["id"]);
$chapter = $db["chapters"]->findById($id);
$title = $db["titles"]->findById($chapter["title"]);
if (empty($title)) header("Location: titles.php") && die("Title not found.");
if (empty($chapter)) header("Location: title.php?id={$title["id"]}") && die("Chapter not found.");

$fct = formatChapterTitle($chapter["volume"], $chapter["number"], "full");
$smarty->assign("fullChapterTitle", $fct);

$chapters = $db["chapters"]->findBy(["title", "==", $title["id"]]);
$smarty->assign("chapters", $chapters);

$isNextChapter = false;
$isPrevChapter = false;

foreach ($chapters as $key => $ch) {
    if ($ch["id"] == $id) {
        if (!empty($chapters[($key + 1)])) $isNextChapter = $chapters[($key + 1)]["id"];
        if (!empty($chapters[($key - 1)])) $isPrevChapter = $chapters[($key - 1)]["id"];
    }
}

$smarty->assign("nextChapter", $isNextChapter);
$smarty->assign("prevChapter", $isPrevChapter);

$images = glob(ps(__DIR__ . "/data/chapters/{$id}/*.{jpg,png,jpeg,webp,gif}"), GLOB_BRACE);
natsort($images);

$comments = $db["chapterComments"]->findBy(["chapter.id", "==", $title["id"]], ["id" => "DESC"]);

chapterVisit($chapter);

$imgind = [];
$ic = 1;
foreach ($images as $ii) {
    $ii = pathinfo($ii);
    $imgind[$ic]["order"] = $ic;
    $imgind[$ic]["name"] = $ii["filename"];
    $imgind[$ic]["ext"] = $ii["extension"];
    $ic++;
}
$smarty->assign("imgind", $imgind);

if ($readingmode == "single") {
    if (!isset($_GET["page"]) || empty($_GET["page"]) || $_GET["page"] == "0") {
        header("Location: chapter.php?id=" . $id . "&page=1");
    }

    $page = cat($_GET["page"]);

    $isNextPage = true;
    $isPrevPage = true;

    $nextPage = $page + 1;
    $prevPage = $page - 1;

    $imgCount = count($images);

    if ($nextPage >= $imgCount) $isNextPage = false;
    if ($prevPage <= 0) $isPrevPage = false;

    $smarty->assign("isNextPage", $isNextPage);
    $smarty->assign("isPrevPage", $isPrevPage);
    $smarty->assign("currentPage", $page);
}

$smarty->assign("commentsCount", count($comments));
$smarty->assign("title", $title);
$smarty->assign("chapter", $chapter);
$smarty->assign("images", $images);
$smarty->assign("pagetitle", "Read " . $title["title"] . " " . formatChapterTitle($chapter["volume"], $chapter["number"]) . " " . $config["divider"] . " " . $config["title"]);

$smarty->display("parts/header.tpl");
$smarty->display("pages/chapter.tpl");
$smarty->display("parts/footer.tpl");
