<?php

require_once ROOT . "autoload.php";
$smarty->assign("pageTitle", titlify("Login", $config["divider"], $config["title"]));

if ($logged) {
    header("Location: {$config["url"]}");
    die("No u");
}

$smarty->display("parts/head.tpl");
$smarty->display("parts/header.tpl");

$smarty->display("pages/login.tpl");

$smarty->display("parts/footer.tpl");
$smarty->display("parts/foot.tpl");
