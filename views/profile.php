<?php

require_once __DIR__ . "/../autoload.php";

if (!$logged && (!isset($id) || (isset($id) && empty($id)))) {
    header("Location: {$config["url"]}login");
    die("No u");
}

if ($logged && empty($id) || !isset($id)) {
    $id = $user["id"];
}

if ($id == $user["id"]) {
    $res = $user;
} else {
    $res = $db["users"]->findById($id);
    if (empty($res)) {
        header("Location: {$config["url"]}404");
        die("Not found.");
    }
}

$smarty->assign("pageTitle", titlify("Profile of " . $res["username"], $config["divider"], $config["title"]));
$smarty->assign("res", $res);

$smarty->display("parts/head.tpl");
$smarty->display("parts/header.tpl");

$smarty->display("pages/profile.tpl");

$smarty->display("parts/footer.tpl");
$smarty->display("parts/foot.tpl");
