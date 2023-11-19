<?php

require_once __DIR__ . "/../autoload.php";
header("Content-Type: application/json; charset=utf-8");

$resp = [
    "done" => false,
    "msg" => "Error",
];

if (!$logged || $user["level"] > 15) {
    die(json_encode($resp));
}

switch ($action) {
    case "title":
        switch ($mode) {
            case "delete_title":
                //TODO, but should be preeetty easy haha
                break;
            case "edit_title":
            case "add_title":
                if ($user["level"] > 14) { // Checks if user can add titles, if not die()
                    die(json_encode($resp));
                }

                // Definitions
                // My attempt? I guess so.
                // (int) $id = isset($_POST["id"]) && !empty($_POST["id"]) && is_numeric($_POST["id"]) ? $_POST["id"] : null;
                // (string) $cover = isset($_POST["cover"]) && !empty($_POST["cover"]) ? clean($_POST["cover"]) : "";
                // (string) $title = isset($_POST["title"]) && !empty($_POST["title"]) ? clean($_POST["title"]) : "";
                // (string) $alts = isset($_POST["alts"]) && !empty($_POST["alts"]) ? clean($_POST["alts"]) : "";
                // (string) $authors = isset($_POST["authors"]) && !empty($_POST["authors"]) ? clean($_POST["authors"]) : "";
                // (string) $artists = isset($_POST["artists"]) && !empty($_POST["artists"]) ? clean($_POST["artists"]) : "";
                // (string) $lang = isset($_POST["lang"]) && !empty($_POST["lang"]) ? clean($_POST["lang"]) : "";
                // (int) $originalStatus = isset($_POST["originalStatus"]) && !empty($_POST["originalStatus"]) && is_numeric($_POST["originalStatus"]) ? $_POST["originalStatus"] : 2;
                // (int) $uploadStatus = isset($_POST["uploadStatus"]) && !empty($_POST["uploadStatus"]) && is_numeric($_POST["uploadStatus"]) ? $_POST["uploadStatus"] : 2;
                // (int) $release = isset($_POST["release"]) && !empty($_POST["release"]) && is_numeric($_POST["release"]) ? $_POST["release"] : date("Y");
                // (int) $completion = isset($_POST["completion"]) && !empty($_POST["completion"]) && is_numeric($_POST["completion"]) ? $_POST["completion"] : date("Y");
                // (string) $summary = isset($_POST["summary"]) && !empty($_POST["summary"]) ? $_POST["summary"] : "";

                // (array) $formats = isset($_POST["formats"]) && !empty($_POST["formats"]) && is_array($_POST["formats"]) ? $_POST["formats"] : [];
                // (array) $warnings = isset($_POST["warnings"]) && !empty($_POST["warnings"]) && is_array($_POST["warnings"]) ? $_POST["warnings"] : [];
                // (array) $themes = isset($_POST["themes"]) && !empty($_POST["themes"]) && is_array($_POST["themes"]) ? $_POST["themes"] : [];
                // (array) $genres = isset($_POST["genres"]) && !empty($_POST["genres"]) && is_array($_POST["genres"]) ? $_POST["genres"] : [];
                $id = (isset($_POST["id"]) && is_numeric($_POST["id"])) ? (int) $_POST["id"] : null;
                $cover = (isset($_POST["cover"])) ? clean($_POST["cover"]) : "";
                $title = (isset($_POST["title"])) ? clean($_POST["title"]) : "";
                $alts = (isset($_POST["alts"])) ? clean($_POST["alts"]) : "";
                $authors = (isset($_POST["authors"])) ? clean($_POST["authors"]) : "";
                $artists = (isset($_POST["artists"])) ? clean($_POST["artists"]) : "";
                $lang = (isset($_POST["lang"])) ? clean($_POST["lang"]) : "";
                $originalStatus = (isset($_POST["originalStatus"]) && is_numeric($_POST["originalStatus"])) ? (int) $_POST["originalStatus"] : 2;
                $uploadStatus = (isset($_POST["uploadStatus"]) && is_numeric($_POST["uploadStatus"])) ? (int) $_POST["uploadStatus"] : 2;
                $release = (isset($_POST["release"]) && is_numeric($_POST["release"])) ? (int) $_POST["release"] : date("Y");
                $completion = (isset($_POST["completion"]) && is_numeric($_POST["completion"])) ? (int) $_POST["completion"] : date("Y");
                $summary = (isset($_POST["summary"])) ? $_POST["summary"] : "";

                $formats = (isset($_POST["formats"]) && is_array($_POST["formats"])) ? $_POST["formats"] : [];
                $warnings = (isset($_POST["warnings"]) && is_array($_POST["warnings"])) ? $_POST["warnings"] : [];
                $themes = (isset($_POST["themes"]) && is_array($_POST["themes"])) ? $_POST["themes"] : [];
                $genres = (isset($_POST["genres"]) && is_array($_POST["genres"])) ? $_POST["genres"] : [];

                $requiredFields = [
                    "title" => $title,
                    "lang" => $lang,
                ];

                foreach ($requiredFields as $field => $value) {
                    if (empty($value)) {
                        die(json_encode(["done" => false, "msg" => "Requires {$field}."]));
                    }
                }

                $originalStatus = in_array($originalStatus, [1, 2, 3, 4, 5]) ? $originalStatus : 2;
                $uploadStatus = in_array($uploadStatus, [1, 2, 3, 4, 5]) ? $uploadStatus : 2;
                $release = (strlen($release) === 4) ? $release : date("Y");

                processAndTrimArray($formats);
                processAndTrimArray($warnings);
                processAndTrimArray($themes);
                processAndTrimArray($genres);

                // Check if ID is null or not
                if (is_null($id)) {
                    $check = $db["projects"]->findOneBy(["title", "==", $title]);
                    if (!empty($check)) {
                        die(json_encode(["done" => false, "msg" => "There is already a project with that title."]));
                    }
                } else {
                    $check = $db["projects"]->findById($id);
                    if (empty($check)) {
                        die(json_encode(["done" => false, "msg" => "ID is invalid."]));
                    }
                }

                // Ensure the covers directory exists
                $coversDirectory = ps(__DIR__ . "/../assets/covers");
                if (!file_exists($coversDirectory)) {
                    mkdir($coversDirectory, 0777, true);
                }

                // Process cover file, if provided
                if (!empty($cover)) {
                    $oldFilePath = ps(__DIR__ . "/../assets/tmp/{$cover}");
                    if (file_exists($oldFilePath)) {
                        $coverHash = md5_file($oldFilePath);
                        $ext = pathinfo($oldFilePath, PATHINFO_EXTENSION);
                        $cover = $coverHash . "." . $ext;
                        $newFilePath = ps($coversDirectory . "/{$cover}");
                        rename($oldFilePath, $newFilePath);
                    }
                }

                $data = [
                    "cover" => (!empty($cover) ? $cover : (!empty($check) ? $check["cover"] : "")),
                    "title" => $title,
                    "alts" => $alts,
                    "authors" => $authors,
                    "artists" => $artists,
                    "lang" => $lang,
                    "summary" => $summary,
                    "status" => [
                        "original" => $originalStatus,
                        "upload" => $uploadStatus,
                    ],
                    "years" => [
                        "release" => $release,
                        "completion" => $completion,
                    ],
                    "tags" => [
                        "formats" => $formats,
                        "warnings" => $warnings,
                        "themes" => $themes,
                        "genres" => $genres,
                    ],
                    "updated" => [
                        "user" => $user["id"],
                        "timestamp" => now(),
                    ],
                    (is_null($id)) ?
                    [
                        "creator" => $user["id"],
                        "timestamp" => now(),
                        "uid" => genUuid(),
                    ] : [],
                ];

                if (!empty($cover)) {
                    $data["cover"] = $cover;
                }

                $db["projects"]->updateOrInsert($data);

                $resp["done"] = true;
                $resp["msg"] = "Created!";
                break;
            default:
                // Huh?
                $resp["msg"] = "Index...!";
                break;
        }
        break;
    case "default":
        $resp["msg"] = "Index...?";
        break;
}

die(json_encode($resp));
