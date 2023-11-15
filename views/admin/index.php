<?php

require_once __DIR__ . "/../../autoload.php";
$smarty->assign("pageTitle", titlify("Admin", $config["divider"], $config["title"]));

if (!$logged || $user["level"] > 10) {
    header("Location: {$config["url"]}");
    die("No u");
}

$smarty->display("parts/head.tpl");
$smarty->display("parts/header.tpl");

$smarty->display("pages/admin/index.tpl");

$smarty->display("parts/footer.tpl");
$smarty->display("parts/foot.tpl");
