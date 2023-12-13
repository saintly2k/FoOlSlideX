<?php

require_once ROOT . "autoload.php";

if (!$tab || empty($tab)) {
    $tab = "info";
}

if (!in_array($tab, ["info", "chapters", "comments"])) {
    $tab = "info";
}

$title = $db["projects"]->findOneBy(["uid", "==", $uid]);
if (empty($title)) {
    header("Location: {$config["url"]}projects");
    die("title not found, baka!");
}

$smarty->assign("project", $title);
$smarty->assign("uid", $uid);
$smarty->assign("tab", $tab);
$smarty->assign("pageTitle", titlify("Projects - " . $title["title"], $config["divider"], $config["title"]));

$smarty->display("parts/head.tpl");
$smarty->display("parts/header.tpl");

$smarty->display("pages/project.tpl");

$smarty->display("parts/footer.tpl");
$smarty->display("parts/foot.tpl");
