<?php

require_once ROOT . "autoload.php";
$smarty->assign("pageTitle", titlify("Users - Admin", $config["divider"], $config["title"]));

if (!$logged || $user["level"] !== 0) {
    header("Location: {$config["url"]}");
    die("No u");
}

$userItems = $db["users"]->findAll(["order" => "ASC"]);
$smarty->assign("userItems", $userItems);

$smarty->display("parts/head.tpl");
$smarty->display("parts/header.tpl");

$smarty->display("pages/admin/users.tpl");

$smarty->display("parts/footer.tpl");
$smarty->display("parts/foot.tpl");
