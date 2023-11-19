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
    return date("d-m-Y H:i:s");
}

function jd($text)
{
    return json_decode($text, true);
}

function je($text)
{
    return json_encode($text, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

function rdash($string)
{
    return str_replace("-", " ", $string);
}

function checkWordInArray($word)
{
    // Read the contents of the text file into an array, one word per line
    $wordsArray = file(ps(__DIR__ . "/../_data/browse.txt"), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if ($wordsArray === false) {
        // Failed to read the file
        return false;
    }

    // Convert all the words to lowercase for case-insensitive comparison
    $lowercaseWords = array_map('strtolower', $wordsArray);

    // Convert the input word to lowercase
    $lowercaseWord = strtolower($word);

    // Check if the lowercase input word exists in the lowercase words array
    if (in_array($lowercaseWord, $lowercaseWords)) {
        return true;
    }

    return false;
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

// Only supports SleekDB.
function doLog(string $action, bool $success, string $value = null, int $user = null)
{
    require ps(__DIR__ . "/../../config.php");
    require ps(__DIR__ . "/../themes/{$config["theme"]}/info.php");
    if ($config["logs"]) {
        require_once ps(__DIR__ . "/../../software/SleekDB/Store.php");
        $db = new \SleekDB\Store("logs", ps(__DIR__ . "/../..{$theme["config"]["sleek"]["dir"]}"), $theme["config"]["sleek"]["config"]); // Logs
        if (empty($action)) {
            return false;
        }

        if (!empty($user) && !is_numeric($user)) {
            return false;
        }

        $data = array(
            "action" => clean($action),
            "success" => $success,
            "value" => clean($value),
            "user" => $user,
            "ip" => clean($_SERVER["REMOTE_ADDR"]),
            "timestamp" => now(),
        );
        $db->insert($data);
    }
    return true;
}

function processAndTrimArray(&$array)
{
    if (!empty($array)) {
        $_array = array_map('trim', array_filter($array));
        $array = array_values($_array);
    }
}

// This is used to organize statistics, ported over 1:1 from Holics. Probably useless here?
function organizeDatabaseElements($array)
{
    // Check if the array is empty and return an empty result
    if (empty($array)) {
        return [];
    }

    $result = [];

    foreach ($array as $element) {
        $year = $element["year"];
        $month = $element["month"];

        // Check if the year exists in the result array, if not, initialize it
        if (!isset($result[$year])) {
            $result[$year] = [];
        }

        // Check if the month exists for this year, if not, initialize it
        if (!isset($result[$year][$month])) {
            $result[$year][$month] = [];
        }

        // Append the element to the specific year and month
        $result[$year][$month][] = $element;
    }

    // Sort the years and months in ascending order
    ksort($result);
    foreach ($result as &$yearData) {
        ksort($yearData);
    }

    return $result;
}

function addStat($for, $y = null, $m = null, $d = null)
{
    if (is_null($y) || empty($y)) {
        $y = date("Y");
    }

    if (is_null($m) || empty($m)) {
        $m = date("m");
    }

    if (is_null($d) || empty($d)) {
        $d = date("d");
    }

    require ps(__DIR__ . "/../../config.php");
    require_once ps(__DIR__ . "/../../software/SleekDB/Store.php");
    $db = new \SleekDB\Store("statistics", ps(__DIR__ . "/../../database"), $config["db"]); // Logs
    if (empty($for)) {
        return false;
    }

    $data = array(
        "action" => clean($for),
        "year" => $y,
        "month" => $m,
        "d" => $d,
        "timestamp" => now(),
    );
    $db->insert($data);
    return true;
}

function hCaptcha($response)
{
    require ps(__DIR__ . "/../../config.php");
    $data = array(
        "secret" => $config["captcha"]["hcaptcha"]["secret"],
        "response" => $response,
    );
    $verify = curl_init();
    curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
    curl_setopt($verify, CURLOPT_POST, true);
    curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
    $responseData = json_decode(curl_exec($verify));
    return $responseData->success ? true : false;
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

    if (!$full) {
        $string = array_slice($string, 0, 1);
    }

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
    if (strlen($text) > $maxlength) {
        return substr($text, 0, $maxlength) . "...";
    }

    return $text;
}

function titlify($a, $b, $c)
{
    // $a = Page Title
    // $b = Title seperator
    // $c = Page Title 2
    return $a . $b . $c;
}

function encodeString($input, $salt)
{
    $input = clean($input);
    $encodedString = "";
    $saltLength = strlen($salt);
    $inputLength = strlen($input);

    for ($i = 0; $i < $inputLength; $i++) {
        $saltIndex = $i % $saltLength;
        $saltChar = ord($salt[$saltIndex]);
        $inputChar = ord($input[$i]);
        $encodedChar = $saltChar + $inputChar;

        $encodedString .= base_convert($encodedChar, 10, 36);
    }

    return $encodedString;
}

function decodeString($encodedString, $salt)
{
    $decodedString = "";
    $saltLength = strlen($salt);
    $encodedLength = strlen($encodedString);

    for ($i = 0; $i < $encodedLength; $i += 2) {
        $saltIndex = $i / 2 % $saltLength;
        $saltChar = ord($salt[$saltIndex]);
        $encodedChar = substr($encodedString, $i, 2);
        $encodedChar = base_convert($encodedChar, 36, 10);
        $decodedChar = $encodedChar - $saltChar;

        $decodedString .= chr($decodedChar);
    }

    return $decodedString;
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
        if (!empty($volume)) {
            $out .= "Vol." . $volume . " ";
        }

        $out .= "Ch." . $chapter;
    }
    if ($type == "full") {
        if (!empty($volume)) {
            $out .= "Volume " . $volume . " ";
        }

        $out .= "Chapter " . $chapter;
    }
    return $out;
}

function startsWith($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}
