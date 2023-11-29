<?php

require __DIR__ . "/config.php";
require "router.php";

if (!file_exists(__DIR__ . $config["smarty"]["template"] . "/{$config["theme"]}/info.php")) {
    die("Can't find this theme's 'info.php'!");
}
if (!file_exists(__DIR__ . "/system/themes/{$config["theme"]}/routes.php")) {
    die("Your theme doesn't have a routes-file!");
}

define("ROOT", __DIR__ . "/");
$roudir = "system/themes/{$config["theme"]}/";
require __DIR__ . "/system/themes/{$config["theme"]}/routes.php";

// ##################################################
// ##################################################
// ##################################################

if (!empty($customRoutes)) {
    foreach ($customRoutes as $key => $route) {
        if ($route[0] == "get") {
            get($route[1], $roudir . $route[2]);
        } elseif ($route[0] == "post") {
            post($route[1], $roudir . $route[2]);
        } else {
            any($route[1], $roudir . $route[2]);
        }
    }
}
