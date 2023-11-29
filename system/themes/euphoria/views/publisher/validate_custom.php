<?php

require_once ROOT . "autoload.php";

// This Plugin only works with customTags
if (!in_array("customTags", $theme["plugins"])) {
    die("Page 'validate_custom.php' requires plugin 'customTags'! Make sure it is loaded.");
}

if (!$logged || $user["level"] > 15) {
    header("Location: {$config["url"]}");
    die("lol no u.");
}

if (isset($page) && !empty($page)) {
    if ($page !== "title" && $page !== "chapter") {
        $page = "index";
    }
}

if ($page == "title") {
    // Title
    if (isset($id) && (empty($id) || !is_numeric($id))) {
        // If ID not valid, redirect to create page
        $id = 0;
        if ($action == "modify") {
            $action = "create";
        }
    } elseif (isset($id) && !empty($id) && is_numeric($id)) {
        // If ID valid but Project does not exists and action "modify"
        if ($action == "modify") {
            $res = $db["projects"]->findById($id);
            if (empty($res)) {
                $id = 0;
                $action = "create";
            }
        }
    }
} elseif ($page == "chapter") {
    // Chapter
    if (isset($id) && (empty($id) || !is_numeric($id))) {
        // If ID not valid, redirect to create page
        $id = 0;
        $page = "index";
    } elseif (isset($id) && !empty($id) && is_numeric($id)) {
        // If ID valid but Project does not exists and action "modify"
        if ($action == "create") {
            $res = $db["projects"]->findById($id);
            if (empty($res)) {
                $id = 0;
                $page = "index";
            }
        } else {
            $res = $db["chapters"]->findById($id);
            if (empty($res)) {
                $id = 0;
                $page = "index";
            }
        }
    }
} else {
    $page = "index";
}

/* ************* */

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
                    valCustomTags($item);
                }
            }
        }
    }
}

/* ************* */

if ($page == "index") {
    $location = $config["url"];
} else {
    $location = $config["url"] . "publisher/{$page}/{$action}";
    if (isset($id) && !empty($id)) {
        $location = "{$location}/{$id}";
    }
}

header("Location: {$location}");
