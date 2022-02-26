<?php

if(isset($_POST["login_user"])) {
    $error = false;
    $error_msg = "";
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $cuser = $conn->query("SELECT * FROM `user` WHERE `username`='$username' LIMIT 1");
    $cuser = mysqli_fetch_assoc($cuser);
    $password = $_POST["password"];
    $pcheck = password_verify($password, $cuser["password"]);
    if($pcheck==true) {
        $token = rand();
        $token = md5($token);
        if(isset($_POST["remember_me"])) {
            // For one month
            setcookie("".$config["cookie"]."session", $token, time()+(86400*30), "/", $config["domain"]);
        } else {
            // Only for one day since checkbox wasn't checked
            setcookie("".$config["cookie"]."session", $token, time()+(86400), "/", $config["domain"]);
        }
        $_SESSION[$config["cookie"]."session"] = $token;
        $conn->query("INSERT INTO `user_tokens`(`user`,`token`) VALUES('$username','$token')");
        redirect("");
    } else {
        $error = true;
        $error_msg = "Username/Password is wrong!";
    }
}

/* ****************************************** */

function glyph($glyph, $title = "") {
    return "<span class=\"glyphicon glyphicon-$glyph\" title=\"$title\"></span>";
}

function redirect($destination = "") {
    require("core/config.php");
    echo "<script type=\"text/javascript\"> document.location = \"".$destination."\"; </script>";
}

function title($title) {
    require("core/config.php");
    return "<title>$title « ".$group["name"]."</title>";
}

function convert_level($level) {
    require("core/config.php");
    require("langs/en.php");
    if($level==0) {
        $level = $lang["userlevel"]["admin"];
    } elseif($level==10) {
        $level = $lang["userlevel"]["team"];
    } elseif($level==20) {
        $level = $lang["userlevel"]["user"];
    } else {
        $level = $lang["userlevel"]["un_user"];
    }
    return $level;
}

function convert_theme($theme) {
    require("core/config.php");
    require("langs/en.php");
    if($theme==0) {
        $theme = $lang["theme"][0];
    } elseif($theme==1) {
        $theme = $lang["theme"][1];
    } elseif($theme==2) {
        $theme = $lang["theme"][2];
    } elseif($theme==3) {
        $theme = $lang["theme"][3];
    } else {
        $theme = $lang["theme"][4];
    }
    return $theme;
}

function ago($datetime, $full = false) {

    require("core/config.php");
    require("langs/en.php");
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    
    $string = array(
        'y' => $lang["ago"]["year"],
        'm' => $lang["ago"]["month"],
        'w' => $lang["ago"]["week"],
        'd' => $lang["ago"]["day"],
        'h' => $lang["ago"]["hour"],
        'i' => $lang["ago"]["minute"],
        's' => $lang["ago"]["second"],
    );
    foreach($string as $k => &$v) {
        if($diff->$k) {
            $v = $diff->$k.' '.$v.($diff->$k > 1 ? $lang["ago"]["plural"]." " : ' ');
        } else {
            unset($string[$k]);
        }
    }
    
    if(!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string)." ".$lang["ago"]["ago"] : " ".$lang["ago"]["now"];
}

?>
