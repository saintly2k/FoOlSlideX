<?php

function clean($data)
{
    // This function is used, to completely sanitize user-input and make any form of scripts harmless and displayable
    $data = htmlspecialchars($data);
    $data = strip_tags($data);
    $data = stripslashes($data);
    $data = trim($data);
    $data = str_replace("'", "\'", $data);
    return $data;
}

function cat($title)
{
    // This function is used, to make all titles readable for the URL and links
    return preg_replace('/[^A-Za-z0-9\-_,.]/', '', str_replace("&", "et", str_replace(' ', '-', strtolower($title))));
}

function namba($data)
{
    return preg_replace("/[^0-9.]/i", "", str_replace(",", ".", $data));
}

function now()
{
    return date('Y-m-d H:i:s');
}

function jd($text)
{
    return json_decode($text, true);
}

function je($text)
{
    return json_encode($text, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

function ps($path)
{
    return str_replace('/', DIRECTORY_SEPARATOR, $path);
}

function genUuid()
{
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0C2f) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0x2Aff),
        mt_rand(0, 0xffD3),
        mt_rand(0, 0xff4B)
    );
}

function genToken()
{
    return md5(rand());
}

function formatBytes($size, $precision = 2)
{
    $base = log($size, 1024);
    $suffixes = array('B', 'KB', 'MB', 'GB', 'TB');

    // return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
    return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
}

function doLog($action, bool $success, $value = null, $user = null)
{
    require "config.php";
    if ($config["logs"]) {
        require_once ps(__DIR__ . $config["path"]["sleek"] . "/Store.php");
        $db = new \SleekDB\Store("logs", ps(__DIR__ . $config["db"]["sleek"]["dir"]), $config["db"]["sleek"]["config"]); // Logs
        if (empty($action)) return false;
        if (!empty($user) && !is_numeric($user)) return false;
        $data = array(
            "action" => clean($action),
            "success" => $success,
            "value" => clean($value),
            "user" => $user,
            "ip" => clean($_SERVER["REMOTE_ADDR"]),
            "timestamp" => now()
        );
        $db->insert($data);
    }
    return true;
}

function visit()
{
    require "config.php";
    require_once ps(__DIR__ . $config["path"]["sleek"] . "/Store.php");
    $db = new \SleekDB\Store("visitLogs", ps(__DIR__ . $config["db"]["sleek"]["dir"]), $config["db"]["sleek"]["config"]); // Logs
    if (empty($db->findOneBy(["ip", "=", clean($_SERVER["REMOTE_ADDR"])]))) {
        $data = array(
            "ip" => clean($_SERVER["REMOTE_ADDR"]),
            "timestamp" => now()
        );
        $db->insert($data);
    }
}

function titleVisit($title)
{
    require "config.php";
    require_once ps(__DIR__ . $config["path"]["sleek"] . "/Store.php");
    $db = new \SleekDB\Store("titleViews", ps(__DIR__ . $config["db"]["sleek"]["dir"]), $config["db"]["sleek"]["config"]); // Logs
    if (empty($db->findOneBy([["ip", "=", clean($_SERVER["REMOTE_ADDR"])], "AND", ["title.id", "=", $title["id"]]]))) {
        $data = array(
            "title" => $title,
            "ip" => clean($_SERVER["REMOTE_ADDR"]),
            "timestamp" => now()
        );
        $db->insert($data);
    }
}

function chapterVisit($chapter)
{
    require "config.php";
    require_once ps(__DIR__ . $config["path"]["sleek"] . "/Store.php");
    $db = new \SleekDB\Store("chapterViews", ps(__DIR__ . $config["db"]["sleek"]["dir"]), $config["db"]["sleek"]["config"]); // Logs
    if (empty($db->findOneBy([["ip", "=", clean($_SERVER["REMOTE_ADDR"])], "AND", ["chapter.id", "=", $chapter["id"]]]))) {
        $data = array(
            "chapter" => $chapter,
            "ip" => clean($_SERVER["REMOTE_ADDR"]),
            "timestamp" => now()
        );
        $db->insert($data);
    }
}

function hCaptcha($response)
{
    require "config.php";
    $data = array(
        "secret" => $config["captcha"]["hcaptcha"]["secret"],
        "response" => $response
    );
    $verify = curl_init();
    curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
    curl_setopt($verify, CURLOPT_POST, true);
    curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
    $responseData = json_decode(curl_exec($verify));
    return $responseData->success ? true : false;
}

function valCustom($file)
{
    require "config.php";
    require_once ps(__DIR__ . $config["path"]["sleek"] . "/Store.php");
    $db = new \SleekDB\Store("custom_" . $file, ps(__DIR__ . $config["db"]["sleek"]["dir"]), $config["db"]["sleek"]["config"]);
    $file = file_exists(ps(__DIR__ . "/custom/{$file}.json")) ? file_get_contents(ps(__DIR__ . "/custom/{$file}.json")) : "";
    $data = jd($file);
    $_data = $db->findAll();
    if (!empty($data)) {
        sort($data);
        foreach ($data as $dat) {
            $dta = array(
                "name" => $dat,
                "timestamp" => now()
            );
            if (empty($db->findOneBy(["name", "=", $dat]))) $db->insert($dta);
        }
    }
    if (!empty($_data)) {
        sort($_data);
        foreach ($_data as $dat) {
            if (!in_array($dat["name"], $data)) {
                $db->deleteBy(["name", "=", $dat["name"]]);
            }
        }
        return $_data;
    } else {
        return true;
    }
}

function valCLang($file)
{
    require "config.php";
    require_once ps(__DIR__ . $config["path"]["sleek"] . "/Store.php");
    $db = new \SleekDB\Store("custom_" . $file, ps(__DIR__ . $config["db"]["sleek"]["dir"]), $config["db"]["sleek"]["config"]);
    $file = file_exists(ps(__DIR__ . "/custom/{$file}.json")) ? file_get_contents(ps(__DIR__ . "/custom/{$file}.json")) : "";
    $data = jd($file);
    $_data = $db->findAll();
    if (!empty($_data)) {
        sort($_data);
        $langs = array_column($data, 0);
        $langs = array_reverse($langs);
        foreach ($_data as $dat) {
            $found = false;
            foreach ($langs as $l) {
                if ($dat["code"] == $l) $found = true;
            }
            if (!$found) $db->deleteBy(["code", "=", $dat["code"]]);
        }
    }
    if (!empty($data)) {
        sort($data);
        foreach ($data as $dat) {
            $dta = array(
                "code" => $dat[0],
                "name" => $dat[1],
                "flag" => $dat[2],
                "timestamp" => now()
            );
            if (empty($db->findOneBy(["code", "=", $dat[0]]))) $db->insert($dta);
        }
    }
    return !empty($_data) ? $_data : true;
}

function getTag($file, $id)
{
    $tags = valCustom($file);
    foreach ($tags as $tg) {
        if ($tg["id"] == $id) return $tg;
    }
    return null;
}

function rmrf($dir)
{
    foreach (glob($dir) as $file) {
        if (is_dir($file)) {
            rmrf("$file/*");
            rmdir($file);
        } else {
            unlink($file);
        }
    }
}

function valImage($location, $file)
{
    // Image?
    $check = getimagesize($location);
    if ($check == false) return "Fake image.";
    // In array?
    $filetypes = array("jpg", "jpeg", "png", "gif", "webp");
    if (!in_array(strtolower($file), $filetypes)) return "Invalid Image format.";
    // Yes!
    return true;
}

function unzip($file, $tmp, $target)
{
    $zip = new ZipArchive;
    $res = $zip->open($file);
    if ($res !== true) die("Something!");

    // extract it to the path we determined above
    if (file_exists($tmp)) rmrf($tmp);
    if (file_exists($target)) rmrf($target);
    mkdir($tmp, 0755, true);
    mkdir($target, 0755, true);
    $zip->extractTo($tmp);
    $files = glob("$tmp/*.{jpg,jpeg,webp,gif,png}", GLOB_BRACE);
    if (empty($files)) return "No images in ZIP!";
    foreach ($files as $f) {
        $check = getimagesize($f);
        if ($check == false) {
            return "An error occured.";
            rmrf($tmp);
        }
    }
    sort($files, SORT_STRING);
    $c = 1;
    foreach ($files as $_file) {
        rename($_file, ps($target . "/{$c}." . strtolower(pathinfo($_file, PATHINFO_EXTENSION))));
        $c++;
    }
    $zip->close();
    rmrf($tmp);
    unlink($file);
    return "success";
}

function formatChapterTitle($volume, $chapter, $type = "short")
{
    switch ($type) {
        case "full":
            $type = "full";
            break;
        case "short":
        default:
            $type = "short";
    }
    $out = "";
    if (substr($chapter, -2) == ".00") {
        $chapter = substr($chapter, 0, -3);
    } elseif (substr($chapter, -1) == "0") {
        $chapter = substr($chapter, 0, -1);
    }
    if ($type == "short") {
        if (!empty($volume)) $out .= "Vol." . $volume . " ";
        $out .= "Ch." . $chapter;
    }
    if ($type == "full") {
        if (!empty($volume)) $out .= "Volume " . $volume . " ";
        $out .= "Chapter " . $chapter;
    }
    return $out;
}

function formatDate($date, $full = false)
{
    $date = clean($date);

    $s = $date;
    $date = strtotime($s);
    if ($full == false) {
        return date('d. M Y', $date);
    } else {
        return date('d. M Y H:m:i', $date);
    }
}

function getUserLang($logged = false, $userlang = "")
{
    require "config.php";
    $userlang = $logged ? $userlang : cat($_COOKIE[cat($config["title"]) . "_lang"] ?? $config["default"]["lang"]);
    if (!file_exists(ps(__DIR__ . $config["path"]["langs"] . "/{$userlang}.php")))
        $userlang = $config["default"]["lang"];
    return $userlang;
}

function getUserTheme($logged = false, $usertheme = "")
{
    require "config.php";
    $usertheme = $logged ? $usertheme : cat($_COOKIE[cat($config["title"]) . "_theme"] ?? $config["default"]["theme"]);
    if (!file_exists(ps(__DIR__ . $config["smarty"]["template"] . "/{$usertheme}/info.php")))
        $usertheme = $config["default"]["theme"];
    return $usertheme;
}

function getPrefLang()
{
    require "config.php";
    return isset($_COOKIE[cat($config["title"]) . "_preflang"]) && !empty($_COOKIE[cat($config["title"]) . "_preflang"]) ? cat($_COOKIE[cat($config["title"]) . "_preflang"]) : $config["default"]["lang"];
}

function timeAgo($datetime, $full = false)
{
    // Thx - https://stackoverflow.com/questions/1416697/converting-timestamp-to-time-ago-in-php-e-g-1-day-ago-2-days-ago
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'min',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

// Only available in PHP 8.x which I don't like at all
if (!function_exists("str_contains")) {
    function str_contains($haystack, $needle)
    {
        return $needle !== "" && mb_strpos($haystack, $needle) !== false;
    }
}

function shorten($text, $maxlength = 25)
{
    // This function is used, to display only a certain amount of characters
    if (strlen($text) > $maxlength)
        return substr($text, 0, $maxlength) . "...";
    return $text;
}
