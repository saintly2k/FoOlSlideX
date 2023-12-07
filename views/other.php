<?php

require_once ROOT . "autoload.php";
$smarty->assign("pageTitle", titlify("Other", $config["divider"], $config["title"]));

$smarty->display("parts/head.tpl");
$smarty->display("parts/header.tpl");

$smarty->display("pages/other.tpl");

$smarty->display("parts/footer.tpl");
$smarty->display("parts/foot.tpl");
