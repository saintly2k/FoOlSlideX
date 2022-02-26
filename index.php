<?php

session_start();

require("includes.php");

// Error reporting for debugging, set display_errors to 0 to disable
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

if($page=="logout") {
    // Removing token from Database and destroy entire session and so on
    $conn->query("DELETE FROM `user_tokens` WHERE `user`='".$user["username"]."'");
    setcookie($config["cookie"]."session", "", time() - 3600, "/", "");
    session_destroy();
    session_unset();
    redirect("?page=releases");
}

if(isset($_POST["read_announce"])) {
    $user_announce = $user["id"];
    $conn->query("UPDATE `user` SET `read_announce`='1' WHERE `id`='$user_announce'");
    redirect("");
}

?>

<!DOCTYPE html>
<html lang="<?= $user["lang"] ?>">

<head>

    <?php include("public/templates/header.php"); ?>

</head>

<body>

    <?php include("public/templates/menu.php"); ?>

    <div class="container">

        <?php include("public/pages/$page.req.php"); ?>

        <?php if($config["debug"]==true) { ?>

        <div class="well well-sm text-center">
            <b><u>» DEBUG CORNER «</u></b><br>
            $page = <b><?= $page ?></b><br>
            $user["level"] = <b><?= $user["level"] ?></b><br>
        </div>

        <?php } ?>

    </div>

    <?php include("public/templates/footer.php"); ?>

</body>

</html>
