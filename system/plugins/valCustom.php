<?php

function valCustom($file)
{
    require ps(__DIR__ . "/../../config.php");
    $filePath = ps(__DIR__ . "/../data/valCustom/{$file}.json");
    if (!file_exists($filePath)) {
        die("Plugin 'valCustom' tried reaching file, could not find: " . $filePath);
    }
    require_once ps(__DIR__ . "/../../software/SleekDB/Store.php");
    $db = new \SleekDB\Store("custom_" . $file, ps(__DIR__ . "/../../database"), $config["db"]);
    $file = file_get_contents($filePath);
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
