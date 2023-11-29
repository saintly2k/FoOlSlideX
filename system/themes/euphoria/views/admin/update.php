<?php

require_once ROOT . "autoload.php";
$smarty->assign("pageTitle", titlify("Admin - Update-Center", $config["divider"], $config["title"]));

if (!$logged || $user["level"] > 10) {
    header("Location: {$config["url"]}");
    die("No u");
}

$gitver = file_get_contents("https://raw.githubusercontent.com/saintly2k/FoOlSlideX/master/version.txt");
$devver = file_get_contents("https://raw.githubusercontent.com/saintly2k/FoOlSlideX/dev/version.txt");
$smarty->assign("gitver", $gitver);
$smarty->assign("devver", $devver);

$smarty->display("parts/head.tpl");
$smarty->display("parts/header.tpl");

$smarty->display("pages/admin/update.tpl");

$smarty->display("parts/footer.tpl");
$smarty->display("parts/foot.tpl");
