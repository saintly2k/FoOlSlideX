<?php

require "../autoload.php";
header("Content-Type: application/json");

if (isset($_GET["isOnline"])) die(je(true));
if (isset($_GET["getAnalytics"])) {
    if (!$config["shareAnonymousAnalytics"]) die(je(["code" => 503, "message" => "Analytics are disabled."]));
    if (!isset($_GET["key"]) || empty($_GET["key"])) die(je(["code" => 401, "message" => "Key not supplied."]));
    $key = clean($_GET["key"]);
    if ($key != file_get_contents(ps(__DIR__ . "/../library/secrets/key.txt"))) die(je(["code" => 498, "message" => "Invalid key."]));
    $data = array(
        "code" => 201,
        "version" => file_get_contents(ps(__DIR__ . "/../version.txt")),
        "config" => array(
            "title" => $config["title"],
            "divider" => $config["divider"],
            "slogan" => $config["slogan"],
            "logs" => $config["logs"],
            "debug" => $config["debug"],
            "activation" => $config["activation"],
            "url" => $config["url"],
            "db" => array(
                "type" => $config["db"]["type"],
                "sleek" => array(
                    "dir" => $config["db"]["sleek"]["dir"],
                    "config" => $config["db"]["sleek"]["config"]
                )
            ),
            "mfs" => array(
                "cover" => $config["mfs"]["cover"],
                "chapter" => $config["mfs"]["chapter"]
            ),
            "default" => array(
                "theme" => $config["default"]["theme"],
                "lang" => $config["default"]["lang"],
                "avatar" => $config["default"]["avatar"]
            ),
            "captcha" => array(
                "enabled" => $config["captcha"]["enabled"],
                "type" => $config["captcha"]["type"]
            ),
            "themes" => $config["themes"],
            "langs" => $config["langs"],
            "avatars" => $config["avatars"],
            "perpage" => array(
                "titles" => $config["perpage"]["titles"],
                "chapters" => $config["perpage"]["chapters"],
            )
        ),
        "statistics" => array(
            "users" => $db["users"]->count(),
            "titles" => $db["titles"]->count(),
            "comments" => array(
                "chapters" => $db["chapterComments"]->count(),
                "titles" => $db["titleComments"]->count(),
                "profiles" => $db["profileComments"]->count(),
                "total" => ($db["chapterComments"]->count() + $db["titleComments"]->count() + $db["profileComments"]->count())
            ),
            "views" => array(
                "chapters" => $db["chapterViews"]->count(),
                "titles" => $db["titleViews"]->count(),
                "profiles" => $db["profileViews"]->count(),
                "total" => ($db["chapterViews"]->count() + $db["titleViews"]->count() + $db["profileViews"]->count()),
                "visits" => $db["visitLogs"]->count()
            ),
        ),
        "website" => array(
            "onlineSince" => $started ?? "file deleted or plugin disabled",
            "checks" => [
                now() => $started ?? "file deleted or plugin disabled"
            ]
        ),
        "server" => array(
            "self" => $_SERVER["PHP_SELF"],
            "server" => $_SERVER["SERVER_NAME"],
            "host" => $_SERVER["HTTP_HOST"],
            "agent" => $_SERVER["HTTP_USER_AGENT"],
            "script" => $_SERVER["SCRIPT_NAME"],
            "gateway" => $_SERVER["GATEWAY_INTERFACE"],
            "software" => $_SERVER["SERVER_SOFTWARE"],
            "protocol" => $_SERVER["SERVER_PROTOCOL"],
            "time" => $_SERVER["REQUEST_TIME"]
        ),
        "timestamp" => now()
    );
    die(je($data));
}
