<?php

session_start();

include("includes/config.inc.php");
require("includes/conn.inc.php");
require("includes/deamon.inc.php");

if(!isset($_GET["page"])) {
    $rPage = $config["home"];
} else {
    $rPage = $_GET["page"];
}

?>

<!DOCTYPE html>
<html>

<head>

    <?php include("templates/head.temp.php"); ?>

</head>

<body>

    <?php include("templates/navbar.temp.php"); ?>

    <div class="container">

        <div class="row">

            <?php if($banner["enabled"]=="1") { ?>

            <div class="col-sm-12">

                <?php include("templates/banner.temp.php"); ?>

            </div>

            <?php } ?>

            <div class="col-sm-10">

                <?php include("pages/$rPage.req.php"); ?>

            </div>

            <div class="col-sm-2">

                <?php include("templates/sidebar.temp.php"); ?>

            </div>

            <div class="col-sm-12">

                <center>

                    <pre>.:: Debug Lounge ::.
;Page = <?php echo $rPage; ?>;
.:: End Debug Lounge ::.</pre>

                </center>

            </div>

        </div>

    </div>

    <?php include("templates/footer.temp.php"); ?>

</body>

</html>
