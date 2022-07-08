<?php

require("../../requires.php");

$static = mysqli_real_escape_string($conn, $_GET["static"]);
$s = $conn->query("SELECT * FROM `statics` WHERE `name`='$static' LIMIT 1")->fetch_assoc();

if($s["public"]==false && (($user["level"]!=1 && $user["level"]!=2) || $user["active"]==false)) {
    header("Location: ../");
}

$page = "s/".$s["name"];

include("../parts/header.php");

?>

<title><?= $s["title"]." :: ".$config["title"] ?></title>

<?php include("../parts/menu.php"); ?>

<?php if(!isset($_COOKIE[$config["cookie"]."_cookie-consent"]) || empty($_COOKIE[$config["cookie"]."_cookie-consent"])) { include("../parts/cookies.php"); } ?>

<?php include("../statics/".$s["name"].".html") ?>

<?php include("../parts/footer.php"); ?>
