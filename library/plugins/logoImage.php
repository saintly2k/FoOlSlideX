<?php

/* ************************************************************ *
 * Name: Logo Image                                             *
 * Author: Saintly                                              *
 * Website: https://h33t.moe                                    *
 * Last Updated: 28.01.2023                                     *
 * ------------------------------------------------------------ *
 * This plugin checks if the logo in the theme folder exists    *
 * and pushes it to Smarty. If it doesn't exist, it will assign *
 * and empty value to "logoImage".                              *
 * ************************************************************ */

$usertheme = getUserTheme($logged, $user["theme"] ?? "");
$logoImage = file_exists(ps(__DIR__ . "/../../../public/assets/{$usertheme}/logo.png")) ? "assets/{$usertheme}/logo.png" : "";
if (isset($smarty)) {
    $smarty->assign("logoImage", $logoImage);
    unset($logoImage);
    unset($usertheme);
}
