<?php

require_once __DIR__ . "/../autoload.php";
header('Content-Type: application/json; charset=utf-8');

$resp = [
    "done" => false,
    "msg" => "Error",
];

switch ($action) {
    case "login":
        if ($logged) {
            $resp["msg"] = "Already logged in.";
            break;
        }

        $username = decodeString($username, $config["salt"]);
        $password = decodeString($password, $config["salt"]);

        if (strlen($username) > 20 || strlen($username) < 3) {
            $resp["msg"] = "Username not in allowed length range (3-20).";
            break;
        }
        if (strlen($password) > 50 || strlen($password) < 8) {
            $resp["msg"] = "Password not in allowed length range (8-50).";
            break;
        }

        $res = $db["users"]->findOneBy(["username", "==", $username]);

        if (empty($res)) {
            $resp["msg"] = "No user found with that name.";
            break;
        }
        if (!password_verify($password, $res["password"])) {
            $resp["msg"] = "Wrong password.";
            break;
        }

        $token = genToken();
        $session = [
            "user" => $res["id"],
            "token" => $token,
        ];
        $db["sessions"]->insert($session);

        $resp["done"] = true;
        $resp["msg"] = "User exists and password matches.";
        $resp["session"] = $token;
        break;
    case "signup":
        if ($logged) {
            $resp["msg"] = "Already logged in.";
            break;
        }

        $username = decodeString($username, $config["salt"]);
        $password = decodeString($password, $config["salt"]);
        $password2 = decodeString($password2, $config["salt"]);

        if (strlen($username) > 20 || strlen($username) < 3) {
            $resp["msg"] = "Username not in allowed length range (3-20).";
            break;
        }
        if (strlen($password) > 50 || strlen($password) < 8) {
            $resp["msg"] = "Password not in allowed length range (8-50).";
            break;
        }
        if ($password !== $password2) {
            $resp["msg"] = "Passwords don't match.";
            break;
        }

        $res = $db["users"]->findOneBy(["username", "==", $username]);
        if (!empty($res)) {
            $resp["msg"] = "Username already taken.";
            break;
        }

        $hPassword = password_hash($password, PASSWORD_BCRYPT);

        $data = [
            "username" => $username,
            "password" => $hPassword,
            "avatar" => $config["default"]["avatar"],
            "level" => $config["default"]["level"],
            "uid" => genToken(),
            "banned" => false,
        ];
        $user = $db["users"]->insert($data);

        $token = genToken();
        $session = [
            "user" => $user["id"],
            "token" => $token,
        ];
        $db["sessions"]->insert($session);

        $resp["done"] = true;
        $resp["msg"] = "User exists and password matches.";
        $resp["session"] = $token;
        $resp["done"] = true;
        $resp["msg"] = "Account created!";

        break;
    default:
        $resp["msg"] = "Index...?";
        break;
}

die(json_encode($resp));
