<?php

// This Plugin only works with SleekDB
if (!in_array("SleekDB", $theme["plugins"])) {
    die("Plugin 'dbLists' requires plugin 'SleekDB'! Make sure it is loaded before this plugin.");
}

if (isset($theme["lists"]["dbLists"]) && !empty($theme["lists"]["dbLists"])) {
    foreach ($theme["lists"]["dbLists"] as $tdbl) {
        if (!file_exists(ps(__DIR__ . "/../data/{$tdbl}.txt"))) {
            die("Theme requires DB List '{$tdbl}.txt' but it does not exist! Please create/download/add it.");
        }

        $cDbs = explode(",", clean(file_get_contents(ps(__DIR__ . "/../data/{$tdbl}.txt"))));
        if (count($cDbs) > 0) {
            foreach ($cDbs as $cdb) {
                if (!empty($cdb)) {
                    $db[$cdb] = new \SleekDB\Store($cdb, ps(ROOT . "{$theme["config"]["sleek"]["dir"]}"), $theme["config"]["sleek"]["config"]);
                }
            }
        }
    }
}
