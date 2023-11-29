<?php

// This Plugin only works with SleekDB
if (!in_array("SleekDB", $theme["plugins"])) {
    die("Plugin 'menu' requires plugin 'SleekDB'! Make sure it is loaded before this plugin.");
}
$menuItems = $db["menu"]->findAll(["order" => "ASC"]);
$smarty->assign("menu", $menuItems);

unset($menuItems);
