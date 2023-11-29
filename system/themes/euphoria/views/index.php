<?php

require_once ROOT . "autoload.php";
$smarty->assign("pageTitle", titlify($config["title"], $config["divider"], $config["slogan"]));

$smarty->display("parts/head.tpl");
$smarty->display("parts/header.tpl");

$smarty->display("pages/index.tpl");

$smarty->display("parts/footer.tpl");
$smarty->display("parts/foot.tpl");
