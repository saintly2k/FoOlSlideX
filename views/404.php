<?php

require_once ROOT . "autoload.php";
$smarty->assign("pageTitle", titlify("404", $config["divider"], $config["title"]));

$smarty->display("parts/head.tpl");
$smarty->display("parts/header.tpl");

$smarty->display("pages/404.tpl");

$smarty->display("parts/footer.tpl");
$smarty->display("parts/foot.tpl");
