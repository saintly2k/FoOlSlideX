<?php

require "../autoload.php";

// Popular Titles
// $views = array();
// $_popularTitles = $db["titleViews"]->createQueryBuilder()
//     ->getQuery()
//     ->fetch();
// $titleCount = 0;
// $titleCountArray = array();
// foreach ($_popularTitles as $key => $pop) {
//     // 10 is the amount of max titles
//     $ago = timeAgo($pop["timestamp"]);
//     if (str_contains($ago, "second") || str_contains($ago, "min") || str_contains($ago, "hour") || str_contains($ago, "day")) {
//         $views[$pop["title"]["id"]]["views"] = 0;
//         $views[$pop["title"]["id"]]["title"] = array();
//         $popularTitles[$pop["title"]["id"]] = array();
//         if ($titleCount <= 4 && !in_array($pop["title"]["id"], $titleCountArray)) {
//             $titleCount++;
//             array_push($titleCountArray, $pop["title"]["id"]);
//         }
//     }
// }
// foreach ($_popularTitles as $key => $pop) {
//     $ago = timeAgo($pop["timestamp"]);
//     if (str_contains($ago, "second") || str_contains($ago, "min") || str_contains($ago, "hour") || str_contains($ago, "day")) {
//         $views[$pop["title"]["id"]]["views"]++;
//         if (empty($views[$pop["title"]["id"]]["title"])) {
//             $views[$pop["title"]["id"]]["title"] = $db["titles"]->findById($pop["title"]["id"]);
//             $views[$pop["title"]["id"]]["title"]["summary1"] = shorten($parsedown->text($purifier->purify($views[$pop["title"]["id"]]["title"]["summary"])), 200);
//             $views[$pop["title"]["id"]]["title"]["summary2"] = shorten($parsedown->text($purifier->purify($views[$pop["title"]["id"]]["title"]["summary"])), 200);
//         }
//     }
// }
// sort($views);
// $views = array_reverse($views);
// /Popular Titles
// $smarty->assign("popularTitles", $views);

// Recently Updated Titles
$recentlyUpdated = $db["chapters"]->createQueryBuilder()
    ->orderBy(["id" => "DESC"])
    ->distinct(["title.id"])
    ->getQuery()
    ->fetch();

foreach ($recentlyUpdated as $key => $rec) {
    $title = $db["titles"]->findById($rec["title"]["id"]);
    $recentlyUpdated[$key]["title"]["summary1"] = shorten($parsedown->text($purifier->purify($title["summary"])), 400);
    $recentlyUpdated[$key]["title"]["summary2"] = shorten($parsedown->text($purifier->purify($title["summary"])), 100);
}

$chapters = $db["chapters"]->createQueryBuilder()
    ->orderBy(["id" => "DESC"])
    ->limit($config["perpage"]["chapters"])
    ->getQuery()
    ->fetch();

$smarty->assign("chapters", $chapters);
$smarty->assign("recentlyUpdated", $recentlyUpdated);
$smarty->assign("pagetitle", $config["title"] . " " . $config["divider"] . " " . $config["slogan"]);

$smarty->display("parts/header.tpl");
$smarty->display("pages/index.tpl");
$smarty->display("parts/footer.tpl");
