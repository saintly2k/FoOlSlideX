<?php

/* ************************************************************ *
 * Name: Reading mode                                           *
 * Author: Saintly                                              *
 * Website: https://h33t.moe                                    *
 * Last Updated: 26.05.2023                                     *
 * ------------------------------------------------------------ *
 * Gets the current reading mode and assigns it to smarty.      *
 * ************************************************************ */

$readingmode = "strip";
if (isset($_COOKIE[cat($config["title"]) . "_readingmode"])) {
    $readingmode = cat($_COOKIE[cat($config["title"]) . "_readingmode"]);
}

switch ($readingmode) {
    case "strip":
        $readingmode = "strip";
        break;
    case "single":
        $readingmode = "single";
        break;
    default:
        $readingmode = "strip";
}

$smarty->assign("readingMode", $readingmode);
