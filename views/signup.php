<?php

require_once __DIR__ . "/../autoload.php";
$smarty->assign("pageTitle", titlify("Signup", $config["divider"], $config["title"]));

if ($logged) {
    header("Location: {$config["url"]}");
    die("No u");
}

$smarty->display("parts/head.tpl");
$smarty->display("parts/header.tpl");

$smarty->display("pages/signup.tpl");

$smarty->display("parts/footer.tpl");
$smarty->display("parts/foot.tpl");
