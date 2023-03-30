<?php

/* ************************************************************ *
 * Name: Daisy Theme                                            *
 * Author: Saintly                                              *
 * Website: https://h33t.moe                                    *
 * Last Updated: 28.01.2023                                     *
 * ------------------------------------------------------------ *
 * This plugin gets the cookie "{prefix}_daisytheme" and pushes *
 * it to Smarty as a variable.                                  *
 * ************************************************************ */

$daisytheme = cat($_COOKIE[cat($config["title"]) . "_daisytheme"] ?? "light");
if (isset($smarty)) {
    $smarty->assign("daisytheme", $daisytheme);
    unset($daisytheme);
}
