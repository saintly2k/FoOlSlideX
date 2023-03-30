<?php

require "../../../autoload.php";

if ($logged) die("You're already logged in!");

$username = clean($_POST["username"] ?? "");
$password = clean($_POST["password"] ?? "");
$password2 = clean($_POST["password2"] ?? "");
$email = clean($_POST["email"] ?? "");
$email2 = clean($_POST["email2"] ?? "");

if ($config["captcha"]["enabled"]) {
    if ($config["captcha"]["type"] == "hcaptcha") {
        if (!hCaptcha($_POST['h-captcha-response'] ?? "")) die("Captcha is wrong!");
    }
}

if (empty($username)) die("Username is empty!");
if (empty($password)) die("Password is empty!");
if (empty($password2)) die("You need to repeat your password!");
if (empty($email)) die("You need to enter an email!");
if (empty($email2)) die("You need to confirm your email!");
if (strlen($username) < 3) die("Username needs to be at least 3 characters long!");
if (strlen($username) > 20) die("Username can only be 20 characters long!");
if (strlen($password) < 8 || strlen($password) > 64) die("Password needs to be at leats 8 characters long!");
if ($password != $password2) die("Passwords don't match!");
if (strlen($email) < 6 || strlen($email) > 320) die("Email needs to be between 6 and 320 characters!");
if (strlen($email2) < 6 || strlen($email2) > 320) die("Email needs to be between 6 and 320 characters!");
if ($email != $email2) die("Emails don't match!");

$check = $db["users"]->findOneBy(["email", "=", $email]);
if (!empty($check)) doLog("signup", false, "email already in use: " . $email) && die("Email already in use!");
$check = $db["users"]->findOneBy(["username", "=", $username]);
if (!empty($check)) doLog("signup", false, "username already in use: " . $username) && die("Username already in use!");
$password = password_hash($password, PASSWORD_BCRYPT);

if ($config["activation"]) {
    $token = genToken();
    $activationLink = $config["url"] . "activate.php?token=" . $token;

    try {
        $mailer->setFrom($config["email"], $config["title"] . " Staff", 0);
        $mailer->addAddress($email, $config["title"] . " Reader");
        $mailer->isHTML(true);
        $mailer->Subject = "Activate your account at " . $config["title"];
        $mailer->Body = "<b>Hello, {$username}</b><br>You just created an account on {$config["title"]}.<br>Please use the link below to activate it and gain access to all of the features:<br>{$activationLink}<br><br>Regards,<br>The {$config["title"]} Staff";
        $mailer->AltBody = "Hello {$username}, you just created an account on {$config["title"]}. Please activate it with this link to fully access our site: {$activationLink} - Best regards, the {$config["title"]} Staff.";
        $mailer->send();
    } catch (Exception $e) {
        die("Email died: {$mailer->ErrorInfo}");
    }
    $data = array(
        "token" => $token,
        "user" => $check
    );
    $db["activation"]->insert($data);
    $level = 49;
} else {
    $level = 50;
}

if (empty($db["users"]->findAll(null, 1))) $level = 100;

$data = array(
    "username" => $username,
    "password" => $password,
    "email" => $email,
    "avatar" => $config["default"]["avatar"],
    "level" => $level,
    "theme" => $usertheme,
    "lang" => $userlang,
    "banned" => false,
    "bannedReason" => null,
    "timestamp" => now()
);
$db["users"]->insert($data);
$token = genToken();
$check = $db["users"]->findOneBy(["username", "=", $username]);
$session = array(
    "user" => $check["id"],
    "token" => $token,
    "ip" => $_SERVER["REMOTE_ADDR"]
);
$db["sessions"]->insert($session);
setcookie(cat($config["title"]) . "_session", $token, time() + 606024 * 9999, "/");

doLog("signup", true, null, $check["id"]);
die("success");
