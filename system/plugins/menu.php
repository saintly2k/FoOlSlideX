<?php

$menuItems = $db["menu"]->findAll(["order" => "ASC"]);
$smarty->assign("menu", $menuItems);

unset($menuItems);
