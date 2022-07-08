<?php

require("../../requires.php");

if($loggedin==false || ($user["level"]!=1 && $user["level"]!=2 && $user["level"]!=3) || $user["active"]==0) {
    header("Refresh: 0; url=../../");
}

$type = mysqli_real_escape_string($conn, $_GET["type"]);
$file = mysqli_real_escape_string($conn, $_GET["file"]);

if($type=="static") {
    $s = $conn->query("SELECT * FROM `statics` WHERE `name`='$file' LIMIT 1")->fetch_assoc();
    
    if(isset($_POST["edit_body"])) {
        $txt = $_POST["txt"];
        
        $mf = fopen("../statics/$file.html", "w") or die("couldn't edit file. check file permission and set to 755.");
        fwrite($mf, $txt);
        fclose($mf);
        echo "<script>window.close('','_parent','');</script>";
    }
}

$page = $lang["editor"]["title"];

include("../parts/header.php");

?>

<title><?= $lang["editor"]["title"]." :: ".$config["title"] ?></title>

</head>

<body style="margin:0px; padding:0px;margin-top: -20px;">

    <h3><?= $lang["editor"]["title"] ?>: <?= $s["name"] ?>.html <span class="text-right"><a href="#" onclick="javascript:window.close('','_parent','')"><?= glyph("remove", $lang["editor"]["close"]) ?> <?= $lang["editor"]["close"] ?></a></span></h3>

    <form method="post" name="edit_body" style="margin-top: -30px">
        <textarea name="txt" class="form-control" style="resize: vertical; height: 649px"><?= file_get_contents("../statics/$file.html") ?></textarea>
        <button type="submit" name="edit_body" class="btn btn-success btn-block"><?= glyph("pencil", $lang["edit_title"]["save"]) ?> <?= $lang["edit_title"]["save"] ?></button>
    </form>

</body>

</html>
