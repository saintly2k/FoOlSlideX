<?php

session_start();

require("core/db.php");
require("core/config.php");
require("core/overlord.php");

$hh = $_GET["page"];
if(!isset($hh)) {
    $hh = $config["home"];
}

include("views/templates/header.php");
include("views/templates/menu.php");
include("views/pages/$hh.php");
include("views/templates/footer.php");

?>
