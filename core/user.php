<?php

if((isset($_COOKIE[$config["cookie"]."session"]) && !empty($_COOKIE[$config["cookie"]."session"])) || (isset($_SESSION[$config["cookie"]."session"]) && !empty($_SESSION[$config["cookie"]."session"]))) {
    if(!empty($_COOKIE[$config["cookie"]."session"])) {
        $checking = mysqli_real_escape_string($conn, $_COOKIE[$config["cookie"]."session"]);
    } else {
        $checking = mysqli_real_escape_string($conn, $_SESSION[$config["cookie"]."session"]);
    }
    $checking = $conn->query("SELECT * FROM `user_tokens` WHERE `token`='$checking'");
    if(mysqli_num_rows($checking)==1) {
        // Perform user-check of all data
        $user = mysqli_fetch_assoc($checking);
        $user = $user["user"];
        $user = $conn->query("SELECT * FROM `user` WHERE `username`='$user' LIMIT 1");
        $user = mysqli_fetch_assoc($user);
        $loggedin = true;
    } else {
        // Invalid session! (Hacking attempt or outdated? who knows...)
        $loggedin = false;
        $user = ["theme" => $config["theme"], "level" => 50, "read_announce" => 0, "lang" => $config["lang"]];
    }
} else {
    $loggedin = false;
    $user = ["theme" => $config["theme"], "level" => 50, "read_announce" => 0, "lang" => $config["lang"]];
}

require("langs/".$user["lang"].".php");

?>
