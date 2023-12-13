<?php

require_once ROOT . "autoload.php";
header('Content-Type: application/json; charset=utf-8');

$resp = [
    "done" => false,
    "msg" => "Error",
];

if (!$logged || $user["level"] > 15) {
    die(json_encode($resp));
}

switch ($action) {
    case "temporary_image":
        if (!isset($_FILES["cover"]["name"])) {
            $resp["msg"] = "No image to upload.";
            break;
        }

        // Upload image on select
        if (!file_exists(ROOT . "assets/tmp")) {
            mkdir(ROOT . "assets/tmp", 0777, true);
        }

        $tmpPath = ROOT . "assets/tmp/";
        // Create TMP folder if not exists
        $md5Hash = md5_file($_FILES["cover"]["tmp_name"]);
        $imageFileType = strtolower(pathinfo($_FILES["cover"]["name"], PATHINFO_EXTENSION));
        $target_file = $tmpPath . $md5Hash . "." . $imageFileType;
        $frontend_file = "api/image/" . $md5Hash . "." . $imageFileType . "/tmp";
        $output_file = $md5Hash . "." . $imageFileType;

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["cover"]["tmp_name"]);
        if ($check === false) {
            $resp["msg"] = "Invalid image.";
            break;
        }

        // Check file size
        if ($_FILES["cover"]["size"] > $config["mfs"]["cover"]) {
            $resp["msg"] = "Cover cannot exceed " . formatBytes($config["mfs"]["cover"]) . " bytes.";
            break;
        }

        // Allow certain file formats
        if (!in_array($imageFileType, ["jpg", "jpeg", "png", "webp"])) {
            $resp["msg"] = "Invalid format, only accepts JPG, JPEG, PNG, or WEBP.";
            break;
        }

        if (!move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file)) {
            $resp["msg"] = "Something simply went wrong.";
            break;
        }

        $resp["done"] = true;
        $resp["msg"] = "Temporary image uploaded!";
        $resp["public"] = $frontend_file;
        $resp["image"] = $output_file;
        break;
    default:
        $resp["msg"] = "Index...?";
        break;
}

die(json_encode($resp));
