<?php

require_once ROOT . "autoload.php";
if (!isset($page) || !is_numeric($page) || $page < 1) {
    $page = 1;
}

$smarty->assign("pageTitle", titlify("Releases - Page {$page}", $config["divider"], $config["title"]));

$smarty->display("parts/head.tpl");
$smarty->display("parts/header.tpl");

$smarty->display("pages/releases.tpl");

$smarty->display("parts/footer.tpl");
$smarty->display("parts/foot.tpl");
