<?php

/* ************************************************************ *
 * Name: Simple Alert                                           *
 * Author: Saintly                                              *
 * Website: https://h33t.moe                                    *
 * Last Updated: 29.05.2023                                     *
 * ------------------------------------------------------------ *
 * This plugin gets the latest Alert and assigns it to Smarty.  *
 * If the user is logged, he has an option to mark it as read,  *
 * thus it will no longer be displayed to him.                  *
 * ************************************************************ */

/*
// Alert structure:
$data = array(
    "type" => "info", // "", "info", "success", "warning", "error"
    "content" => "Welcome to {$config["title"]}! To use all the functions such as commenting or Bookmarking, please create a free acount!",
    "timestamp" => now()
);
// Database Insert
$db["alerts"]->insert($data);
*/
$topAlert = $db["alerts"]->findAll(["id" => "DESC"], 1);
if (!empty($topAlert)) $topAlert = $topAlert[0];
$readAlert = !empty($topAlert) ? ($logged ? (!empty($db["alertReads"]->findOneBy([["user", "=", $user["id"]], "AND", ["alert", "=", $topAlert["id"]]])) ? true : false) : false) : false;

$smarty->assign("topAlert", $topAlert);
$smarty->assign("readAlert", $readAlert);

unset($topAlert);
unset($readAlert);
