<?php

require_once __DIR__ . "/../autoload.php";
header('Content-Type: application/json; charset=utf-8');

$resp = [
    "done" => false,
    "msg" => "Error",
];

if (!$logged || $user["level"] !== 0) {
    die(json_encode($resp));
}

switch ($action) {
    case "menu":
        switch ($mode) {
            case "delete":
                if (empty($_POST["id"]) || !isset($_POST["id"]) || !is_numeric($_POST["id"])) {
                    $resp["msg"] = "ID not given.";
                    break;
                }
                $id = $_POST["id"];

                $res = $db["menu"]->findById($id);
                if (!empty($res)) {
                    $db["menu"]->deleteById($id);
                } else {
                    $resp["msg"] = "Menu-Item does not exist.";
                    break;
                }

                $resp["done"] = true;
                $resp["msg"] = "Menu-Item deleted!";
                break;
            case "edit":
            case "add":
                $display = "";
                $url = "";
                $order = "0";
                $loggedonly = false;
                $newtab = false;
                $hidden = false;
                $id = null;

                if (isset($_POST["display"]) && !empty($_POST["display"])) {
                    $display = decodeString($_POST["display"], $config["salt"]);
                }
                if (isset($_POST["url"]) && !empty($_POST["url"])) {
                    $url = decodeString($_POST["url"], $config["salt"]);
                }
                if (isset($_POST["order"]) && !empty($_POST["order"])) {
                    $order = $_POST["order"];
                }
                if (isset($_POST["logged"]) && !empty($_POST["logged"])) {
                    $loggedonly = true;
                }
                if (isset($_POST["tab"]) && !empty($_POST["tab"])) {
                    $newtab = true;
                }
                if (isset($_POST["hidden"]) && !empty($_POST["hidden"])) {
                    $hidden = true;
                }
                if (isset($_POST["id"]) && !empty($_POST["id"])) {
                    $id = $_POST["id"];
                }

                if (!is_numeric($order)) {
                    $resp["msg"] = "Order has to be numeric.";
                    break;
                }
                if (empty($display) || empty($url)) {
                    $resp["msg"] = "Display or URL can't be empty.";
                    break;
                }

                $data = [
                    "display" => $display,
                    "url" => $url,
                    "order" => $order,
                    "reqlogged" => $loggedonly,
                    "newtab" => $newtab,
                    "hidden" => $hidden,
                ];
                if ($id !== null) {$data["id"] = $id;}
                $item = $db["menu"]->updateOrInsert($data);
                if ($item) {
                    $resp["done"] = true;
                    $resp["msg"] = "Successfully added menu item!";
                    $resp["item"] = $item;
                }
                break;
            default:
                $resp["msg"] = "Index...!";
                break;
        }
        break;
    default:
        $resp["msg"] = "Index...?";
        break;
}

die(json_encode($resp));
