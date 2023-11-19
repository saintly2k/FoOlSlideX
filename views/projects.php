<?php

require_once __DIR__ . "/../autoload.php";

$page = 1;

if (isset($_GET["page"]) && !empty($_GET["page"]) && is_numeric($_GET["page"])) {
    $page = $_GET["page"];
}

if ($page < 1) {
    $page = 1;
}

$smarty->assign("pageTitle", titlify("Projects - Page " . $page, $config["divider"], $config["title"]));
$smarty->assign("page", $page);

$smarty->display("parts/head.tpl");
$smarty->display("parts/header.tpl");

$smarty->display("pages/projects.tpl");

$smarty->display("parts/footer.tpl");
$smarty->display("parts/foot.tpl");
