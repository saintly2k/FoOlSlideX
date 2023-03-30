<?php

$config["title"] = "FoOlSlideX";
$config["divider"] = ".::.";
$config["slogan"] = "Mangas for Fools!";
$config["logs"] = true;
$config["debug"] = true;
$config["url"] = "http://localhost/fsx/public/";
$config["email"] = "saintly@h33t.moe";
$config["activation"] = false; // Activate account through email?
$config["shareAnonymousAnalytics"] = true;
$config["api"] = true; // not really working rn, still please let it enabled until newer versions

$config["db"]["type"] = "sleek"; // "sleek"
$config["db"]["sleek"]["dir"] = "/database";
$config["db"]["sleek"]["config"] = array(
    "auto_cache" => true,
    "cache_lifetime" => null,
    "timeout" => false, // deprecated! Set it to false!
    "primary_key" => "id",
    "search" => array(
        "min_length" => 2,
        "mode" => "or",
        "score_key" => "scoreKey"
    ),
    "folder_permissions" => 0777
);

// MaxFileSize (in Bytes, visit https://www.gbmb.org/mb-to-bytes for help)
$config["mfs"]["cover"] = 5242880; // 5MB
$config["mfs"]["chapter"] = 52428800; // 50MB

// Default-Variablen
$config["default"]["theme"] = "nucleus";
$config["default"]["lang"] = "en";
$config["default"]["avatar"] = "https://rav.h33t.moe/data/8c4f8647-4bec-420e-96e0-284125793baf.jpeg";

// Captcha
$config["captcha"]["enabled"] = false;
$config["captcha"]["type"] = "hcaptcha"; // "hcaptcha"
$config["captcha"]["hcaptcha"]["secret"] = "";
$config["captcha"]["hcaptcha"]["sitekey"] = "";

// Themes and Languages
$config["themes"] = array(
    "nucleus" => "Nucleus"
);
$config["langs"] = array(
    "en" => "English",
);

// Avatars
$config["avatars"] = array(
    "https://rav.h33t.moe/data/8c4f8647-4bec-420e-96e0-284125793baf.jpeg",
    "https://rav.h33t.moe/data/cf39f370-73f9-4428-bc65-136e1d509cc9.jpeg",
    "https://rav.shishnet.org/af4cf8aadc45565bbeecb0ced4857ed5.jpeg",
    "https://rav.shishnet.org/4f054d8a364b1cb658a458df687621c6.jpeg",
    "https://rav.shishnet.org/21e78a09e342964a8c7ce20e410697d0.jpeg",
    "https://rav.shishnet.org/436e8788f8ed655e9c74c54dc9947d00.jpeg",
    "https://rav.shishnet.org/3737e6629146ba78fb4a84284357802a.gif",
    "https://rav.shishnet.org/c6bbc472ba1ec7012620ac0c1b35491a.gif",
);

// X elements per page for pagination
$config["perpage"]["titles"] = 25;
$config["perpage"]["chapters"] = 36;

$config["path"]["sleek"] = "/software/SleekDB";
$config["path"]["parsedown"] = "/software";
$config["path"]["langs"] = "/library/langs";
$config["path"]["htmlpurifier"] = "/software/HTMLPurifier";
$config["path"]["smarty"] = "/software/Smarty";
$config["path"]["plugins"] = "/library/plugins";
$config["path"]["phpmailer"] = "/software/PHPMailer";
$config["path"]["imagescrambler"] = "/software";

// Diese Software nutzt Smarty als Template-Engine. Dokumentation: https://smarty-php.github.io/smarty/
$config["smarty"]["template"] = "/library/themes";
$config["smarty"]["config"] = "/software/Smarty/config";
$config["smarty"]["compile"] = "/software/Smarty/compile";
$config["smarty"]["cache"] = "/software/Smarty/cache";
