<?php

require_once ROOT . "autoload.php";
header("Content-Type: application/json; charset=utf-8");

$resp = [
    "done" => false,
    "msg" => "Error",
];

if (!$logged || $user["level"] > 14) {
    die(json_encode($resp));
}

if (isset($tags) && !empty($tags) && !is_numeric($tags)) {
    $output = $db["custom_{$tags}"]->findAll();
} else {
    $output = [];
    if (!empty($theme["lists"]["customTags"])) {
        foreach ($theme["lists"]["customTags"] as $key => $ctList) {
            $dir = ROOT . "system/data/{$ctList}.txt";
            if (!file_exists($dir)) {
                die("Plugin 'customTags' tried to load list '{$ctList}' (at '{$dir}') but could not find it! Does it exists?");
            }
            $items = explode(",", clean(file_get_contents($dir)));
            if (count($items) > 0) {
                foreach ($items as $item) {
                    if (!empty($item)) {
                        if (is_numeric($tags)) {
                            $output[$item] = valCustomTags($item, $tags);
                        } else {
                            $output[$item] = valCustomTags($item);
                        }
                    }
                }
            }
        }
    }
}

die(json_encode($output));
