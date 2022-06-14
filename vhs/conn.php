<?php

$conn = new mysqli($slave["host"],$slave["user"],$slave["pass"],$slave["table"]);
$conn->set_charset("utf8mb4");

if($conn->connect_error) {
    die("Database Error: " . $conn->connect_error);
}

$config = $conn->query("SELECT * FROM `config`")->fetch_assoc();

if((isset($_COOKIE[$config["cookie"]."_session"]) && !empty($_COOKIE[$config["cookie"]."_session"])) || (isset($_SESSION[$config["cookie"]."_session"]) && !empty($_SESSION[$config["cookie"]."_session"]))) {
    if(!empty($_COOKIE[$config["cookie"]."_session"])) {
        $token = mysqli_real_escape_string($conn, $_COOKIE[$config["cookie"]."_session"]);
    } else {
        $token = mysqli_real_escape_string($conn, $_SESSION[$config["cookie"]."_session"]);
    }
    $checking = $conn->query("SELECT * FROM `sessions` WHERE `token`='$token'");
    if(mysqli_num_rows($checking)<=1) {
        // Perform user-check of all data
        $user = mysqli_fetch_assoc($checking);
        $user = $user["user-id"];
        $user = $conn->query("SELECT * FROM `user` WHERE `id`='$user' LIMIT 1");
        $user = mysqli_fetch_assoc($user);
        $loggedin = true;
    } else {
        // Invalid session! (Hacking attempt or outdated? who knows...)
        $loggedin = false;
        $user = [
            "level" => 5,
            "theme" => $config["theme"],
        ];
    }
} else {
    $loggedin = false;
}

?>