<?php

require "../../../autoload.php";

if ($logged) die("You're already logged in!");

$username = clean($_POST["username"] ?? "");
$password = clean($_POST["password"] ?? "");

if ($config["captcha"]["enabled"]) {
    if ($config["captcha"]["type"] == "hcaptcha") {
        if (!hCaptcha($_POST['h-captcha-response'] ?? "")) die("Captcha is wrong!");
    }
}

if (empty($password)) die("Password is empty!");
if (empty($username)) die("Username is empty!");
if (strlen($password) < 8) die("Password needs to be at least 8 characters long!");
if (strlen($password) > 64) die("Password can only be 64 characters long!");
if (strlen($username) < 3) die("Username needs to be at least 3 characters long!");
if (strlen($username) > 20) die("Username can only be 20 characters long!");

$check = $db["users"]->findOneBy(["username", "=", $username]);
if (empty($check)) doLog("login", false, "user not found") && die("User not found!");
if (!password_verify($password, $check["password"])) doLog("login", false, "invalid password") && die("Wrong Password!");
if ($check["banned"]) doLog("login", false, "banned", $check["id"]) && die("Banned! Reason: " . $check["bannedReason"]);

// Everything is right!
$token = genToken();
$session = array(
    "user" => $check["id"],
    "token" => $token,
    "ip" => $_SERVER["REMOTE_ADDR"]
);
$db["sessions"]->insert($session);
setcookie(cat($config["title"]) . "_session", $token, time() + 606024 * 9999, "/");
doLog("login", true, null, $check["id"]);
die("success");
