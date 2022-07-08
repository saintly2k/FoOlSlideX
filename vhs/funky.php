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
    
    $string = $a."-".$b."-".$c."-".$d;
    
    return $string;
}

function bbconvert($text) {
	
	// Always ensure that user inputs are scanned and filtered properly.
	$text  = htmlspecialchars($text, ENT_QUOTES);

	// BBcode array
	$find = array(
		'~\[b\](.*?)\[/b\]~s',
		'~\[i\](.*?)\[/i\]~s',
		'~\[s\](.*?)\[/s\]~s',
		'~\[u\](.*?)\[/u\]~s',
		'~\[center\](.*?)\[/center\]~s',
		'~\[br\]~s',
		'~\[hr\]~s',
		'~\[quote\](.*?)\[/quote\]~s',
		'~\[size=(.*?)\](.*?)\[/size\]~s',
		'~\[color=(.*?)\](.*?)\[/color\]~s',
		'~\[url\]((?:ftp|https?)://.*?)\[/url\]~s',
		'~\[img\](https?://.*?\.(?:jpg|jpeg|gif|png|bmp))\[/img\]~s'
	);

	// HTML tags to replace BBcode
	$replace = array(
		'<b>$1</b>',
		'<i>$1</i>',
		'<s>$1</s>',
		'<span style="text-decoration:underline;">$1</span>',
        '<center>$1</center>',
        '<br>',
        '<hr>',
		'<pre>$1</'.'pre>',
		'<span style="font-size:$1px;">$2</span>',
		'<span style="color:$1;">$2</span>',
		'<a href="$1" target="_blank">$1</a>',
		'<img src="$1" alt="$1">'
	);

	// Replacing the BBcodes with corresponding HTML tags
	return preg_replace($find,$replace,$text);
}

function munch_groups($a, $b = "", $c = "", $html = true) {
    require("../../config.php");
    require("conn.php");
    require("user.php");
    
    $output = "";
    
    if($a=="0") {
        $output .= "No Group";
    } else {
        $a = $conn->query("SELECT * FROM `groups` WHERE `id`='$a' LIMIT 1")->fetch_assoc();
        $output .= "<a href='".$config["url"]."group/".$a["slug"]."'>".$a["name"]."</a>";
    }
    if(!empty($b)) {
        $b = $conn->query("SELECT * FROM `groups` WHERE `id`='$b' LIMIT 1")->fetch_assoc();
        $output .= ", <a href='".$config["url"]."group/".$b["slug"]."'>".$b["name"]."</a>";
    }
    if(!empty($c)) {
        $c = $conn->query("SELECT * FROM `groups` WHERE `id`='$c' LIMIT 1")->fetch_assoc();
        $output .= ", <a href='".$config["url"]."group/".$c["slug"]."'>".$c["name"]."</a>";
    }
    
    return $output;
}

?>
