<?php

// This Plugin only works with SleekDB
if (!in_array("SleekDB", $theme["plugins"])) {
    die("Plugin 'customTags' requires plugin 'SleekDB'! Make sure it is loaded before this plugin.");
}

function valCustomTags($file)
{
    require ROOT . "config.php";
    require ROOT . "system/themes/{$config["theme"]}/info.php";
    require_once ROOT . "software/SleekDB/Store.php";
    $db = new \SleekDB\Store("custom_" . $file, ROOT . $theme["config"]["sleek"]["dir"], $theme["config"]["sleek"]["config"]);
    $file = file_exists(ROOT . "system/data/customTags/{$file}.json") ? file_get_contents(ROOT . "system/data/customTags/{$file}.json") : "";
    $data = jd($file);
    $_data = $db->findAll();
    if (!empty($data)) {
        sort($data);
        foreach ($data as $dat) {
            $dta = array(
                "name" => $dat,
                "timestamp" => now(),
            );
            if (empty($db->findOneBy(["name", "==", $dat]))) {
                $db->insert($dta);
            }
        }
    }
    if (!empty($_data)) {
        sort($_data);
        foreach ($_data as $dat) {
            if (!in_array($dat["name"], $data)) {
                $db->deleteBy(["name", "==", $dat["name"]]);
            }
        }
        return $_data;
    } else {
        return true;
    }
}
