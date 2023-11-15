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

if ($readingmode == "single") {
    $smarty->assign("readingMode", "single");
} else {
    $smarty->assign("readingMode", "strip");
}
