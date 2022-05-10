<?php

require("../../requires.php");

$page = $lang["menu"]["about"];

include("../parts/header.php");

?>

<title><?= $lang["menu"]["about"]." :: ".$config["title"] ?></title>

<?php include("../parts/menu.php"); ?>

<?php if(!isset($_COOKIE[$config["title"]."_cookie-consent"]) || empty($_COOKIE[$config["title"]."_cookie-consent"])) { include("../parts/cookies.php"); } ?>

<?php include("../../about.html") ?>

<?php include("../parts/footer.php"); ?>
