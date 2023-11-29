<?php

// This Plugin only works with SleekDB
if (!in_array("SleekDB", $theme["plugins"])) {
    die("Plugin 'readChapters' requires plugin 'SleekDB'! Make sure it is loaded before this plugin.");
}

/* ************************************************************ *
 * Name: Read Chapters                                          *
 * Author: Saintly                                              *
 * Website: https://h33t.moe                                    *
 * Last Updated: 29.05.2023                                     *
 * ------------------------------------------------------------ *
 * Gets all read chapters from Database and puts the into an    *
 * array which gets pushed to Smarty.                           *
 * ************************************************************ */

// This needs to be reworked, completely - ForsakenMaiden
/*if ($logged) {
    $readChapters = $db["readChapters"]->findBy(["user", "==", $user["id"]]);
    $_readChapters = array();
    foreach ($readChapters as $key => $ch) {
        array_push($_readChapters, $ch["chapter"]);
    }
    if (isset($_GET["id"]) && is_numeric($_GET["id"]) && strpos($_SERVER["REQUEST_URI"], "chapter") == true) {
        $id = $_GET["id"];
        $chapter = $db["chapters"]->findById($id);
        if (!empty($chapter)) {
            if (!in_array($id, $_readChapters)) {
                $_data = array(
                    "user" => $user["id"],
                    "chapter" => $id,
                    "timestamp" => now(),
                );
                $request = $db["readChapters"]->insert($_data);
                if ($request) {
                    array_push($_readChapters, $id);
                }

                unset($request);
                unset($_data);
            }
        }
        unset($id);
        unset($chapter);
    }

    $smarty->assign("readChapters", $_readChapters);

    unset($ch);
    unset($_readChapters);
    unset($readChapters);
}*/
