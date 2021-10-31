<?php

session_start();

require("core/db.php");
require("core/config.php");
require("core/overlord.php");

$page = $_GET["page"];
if(!isset($page)) {
    $page = $config["home"];
}

include("views/templates/header.php");
include("views/templates/menu.php");
include("views/pages/$page.php");
include("views/templates/footer.php");

?>
