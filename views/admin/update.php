<?php

require_once __DIR__ . "/../../autoload.php";
$smarty->assign("pageTitle", titlify("Admin", $config["divider"], $config["title"]));

if (!$logged || $user["level"] > 10) {
    header("Location: {$config["url"]}");
    die("No u");
}

$gitver = file_get_contents("https://github.com/saintly2k/FoOlSlideX/blob/master/version.txt");
$smarty->assign("gitver", $gitver);

$smarty->display("parts/head.tpl");
$smarty->display("parts/header.tpl");

$smarty->display("pages/admin/update.tpl");

$smarty->display("parts/footer.tpl");
$smarty->display("parts/foot.tpl");
