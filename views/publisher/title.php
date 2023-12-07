<?php

require_once ROOT . "autoload.php";

if (!$logged || $user["level"] > 14) {
    header("Location: {$config["url"]}");
    die("lol no u.");
}

if ($action !== "create" && $action !== "modify") {
    header("Location: {$config["url"]}projects");
    die("lol no u.");
}

if (!empty($id)) {
    if ($action == "create") {
        header("Location: {$config["url"]}publisher/title/create");
        die("lol no u.");
    } else {
        if (is_numeric($id)) {
            $res = $db["projects"]->findById($id);
        } else {
            $res = $db["projects"]->findOneBy(["uid", "==", $id]);
        }
        if (empty($res)) {
            header("Location: {$config["url"]}publisher/title/create");
            die("lol no u.");
        }
        $smarty->assign("res", $res);
    }
}

$smarty->assign("action", $action);
$smarty->assign("pageTitle", titlify("Publisher - " . ucfirst($action) . " Title", $config["divider"], $config["title"]));

$smarty->display("parts/head.tpl");
$smarty->display("parts/header.tpl");

$smarty->display("pages/publisher/title.tpl");

$smarty->display("parts/footer.tpl");
$smarty->display("parts/foot.tpl");
