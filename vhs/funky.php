<?php

function glyph($glyph,$gtitle = "Glyphicon") {
    return "<span class=\"glyphicon glyphicon-".$glyph."\" title=\"$gtitle\" aria-hidden=\"true\"></span>";
}

function generate_url() {

    function generate_string($length = 5) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    $a = generate_string(5);
    $b = generate_string(5);
    $c = generate_string(5);
    $d = generate_string(5);
//    require("../config.php");
//    require("conn.php");
    $string = $a."-".$b."-".$c."-".$d;
//    $check = $conn->query("SELECT * FROM `titles` WHERE `slug`='$string' LIMIT 1");
//    if(mysqli_num_rows($check)==1) {
//        
//    }
    return $string;
}

?>
