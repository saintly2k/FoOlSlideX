<?php

/* ************************************************************ *
 * Name: User Langs                                             *
 * Author: Saintly                                              *
 * Website: https://h33t.moe                                    *
 * Last Updated: 28.01.2023                                     *
 * ------------------------------------------------------------ *
 * This Plugin is used to get all the languages and put         *
 * them into an array and push that to Smarty.                  *
 * ************************************************************ */

$userlangs = glob(ps(__DIR__ . "/../langs/*.php"));
$_userlangs = array();
foreach ($userlangs as $userlang) {
    unset($lang);
    require_once $userlang;
    $lang["info"]["code"] = substr(basename($userlang), 0, -4);
    array_push($_userlangs, $lang["info"]);
}
if (isset($smarty)) {
    $smarty->assign("userlangs", $_userlangs);
    unset($lang);
    // unset($userlangs);
    unset($_userlangs);
}
