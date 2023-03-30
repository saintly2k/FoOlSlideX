<?php

/* ************************************************************ *
 * Name: Read Chapters                                          *
 * Author: Saintly                                              *
 * Website: https://h33t.moe                                    *
 * Last Updated: 24.02.2023                                     *
 * ------------------------------------------------------------ *
 * Gets all read chapters from Database and puts the into an    *
 * array which gets pushed to Smarty.                           *
 * ************************************************************ */

if ($logged) {
    $readChapters = $db["readChapters"]->findBy(["user", "==", $user["id"]]);
    $_readChapters = array();
    foreach ($readChapters as $key => $ch) {
        array_push($_readChapters, $ch["chapter"]);
    }
    if (isset($smarty))
        $smarty->assign("readChapters", $_readChapters);

    unset($ch);
    unset($_readChapters);
    unset($readChapters);
}
