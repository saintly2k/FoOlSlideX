<?php

/* ************************************************************ *
 * Name: Get Rel                                                *
 * Author: Saintly                                              *
 * Website: https://h33t.moe                                    *
 * Last Updated: 13.02.2023                                     *
 * ------------------------------------------------------------ *
 * This plugin is used to get if rel isset per get request and  *
 * if it is "rel", it assigns it to smarty.                     *
 * ************************************************************ */

if (isset($_GET["rel"]) && !empty($_GET["rel"]))
    $smarty->assign("rel", clean($_GET["rel"]));
