<?php

require_once ROOT . "autoload.php";

if (!isset($page) || empty($page) || !is_numeric($page)) {
    $page = 1;
}

if ($page < 1) {
    $page = 1;
}

/**/
$perpage = $theme["config"]["perpage"]["title"];
$skip = ($page - 1) * $perpage;

$titles = $db["projects"]->createQueryBuilder()
    ->orderBy(["title" => "ASC"])
    ->limit($perpage)
    ->skip($skip)
    ->where(["public", "==", 1])
    ->getQuery()
    ->fetch();

$pagis = [];
$totalPages = $db["projects"]->count() / $perpage;
for ($i = 0; $i < $totalPages; $i++) {
    array_push($pagis, $i + 1);
}
// $smarty->assign("projects", $titles);
$smarty->assign("pagination", $pagis);
/**/

$smarty->assign("pageTitle", titlify("Projects - Page " . $page, $config["divider"], $config["title"]));
$smarty->assign("page", $page);

$smarty->display("parts/head.tpl");
$smarty->display("parts/header.tpl");

$smarty->display("pages/projects.tpl");

$smarty->display("parts/footer.tpl");
$smarty->display("parts/foot.tpl");
