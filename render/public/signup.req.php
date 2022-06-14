<?php

require("../../requires.php");

$page = $lang["menu"]["signup"];

if($loggedin==true) {
    header("Refresh: 0; url=./");
}

$date =  date('Y-m-d h:i:s');

$error = false;
$error_msg = "";

if(isset($_GET["username"]) && isset($_GET["password"]) && isset($_GET["password2"]) && isset($_GET["invite"])) {
    //if(isset($_GET['captcha_challenge']) && $_GET['captcha_challenge'] == $_SESSION['captcha_text']) {
        $username = mysqli_real_escape_string($conn, $_GET["username"]);
        $password1 = mysqli_real_escape_string($conn, $_GET["password"]);
        $password2 = mysqli_real_escape_string($conn, $_GET["password2"]);
        $invite = mysqli_real_escape_string($conn, $_GET["invite"]);
        $check1 = preg_match('/[^.a-zA-Z0-9-_]/', $username);
        $check2 = preg_match('/[^.a-zA-Z0-9-_]/', $password1);
        $check3 = preg_match('/[^.a-zA-Z0-9-_]/', $password2);
        $invitecheck = $conn->query("SELECT * FROM `invites` WHERE `token`='$invite' LIMIT 1");
        $usercheck = $conn->query("SELECT * FROM `user` WHERE `username`='$username' LIMIT 1");
        
        // Executing all the checks
        
        if(empty($invite)) {
            $error = true;
            $error_msg = $lang["errors"]["empty_invite"];
        }
        if($check3==true) {
            $error = true;
            $error_msg = $lang["errors"]["bad_password"];
        }
        if($check2==true) {
            $error = true;
            $error_msg = $lang["errors"]["bad_password"];
        }
        if($check1==true) {
            $error = true;
            $error_msg = $lang["errors"]["bad_username"];
        }
        if(mysqli_num_rows($invitecheck)==1) {
            $inv = mysqli_fetch_assoc($invitecheck);
            if(!empty($inv["used"])) {
                $error = true;
                $error_msg = $lang["errors"]["used_invite"];
            }
        }
        if(mysqli_num_rows($usercheck)==1) {
            $error = true;
            $error_msg = $lang["errors"]["taken_username"];
        }
        if($password1!=$password2) {
            $error = true;
            $error_msg = $lang["errors"]["unmatch_password"];
        }
        
        // Everything is right?!
        
        if($error==false) {
            // Everything is right!
            $password = password_hash($password1, PASSWORD_BCRYPT);
            $conn->query("UPDATE `invites` SET `used`='$date' WHERE `token`='$invite'");
            $conn->query("INSERT INTO `user`(`username`,`password`) VALUES('$username','$password')");
            header("Location: ./login");
        }
        
    /*} else {
        $error = true;
        $error_msg = $lang["errors"]["captcha"];
    }*/
}

include("../parts/header.php");

?>

<title><?= $lang["menu"]["signup"]." :: ".$config["title"] ?></title>

<?php include("../parts/menu.php"); ?>

<?php if(!isset($_COOKIE[$config["cookie"]."_cookie-consent"]) || empty($_COOKIE[$config["cookie"]."_cookie-consent"])) { include("../parts/cookies.php"); } ?>

<?php if(!empty($error_msg)) { ?>
<div class="alert alert-warning alert-dismissible text-center" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong><?= $lang["login"]["error"] ?>:</strong> <?= $error_msg ?>
</div>
<?php } ?>
<div style="margin: 0 auto; width: 300px" id="login_container">
    <form method="get" id="login_form" name="signup_user">
        <h1 class="text-center"><?= $lang["menu"]["signup"] ?></h1>
        <hr>
        <div class="form-group">
            <label for="login_username" class="sr-only"><?= $lang["login"]["username"] ?></label>
            <input tabindex="1" type="text" name="username" id="login_username" class="form-control" maxlength="20" placeholder="<?= $lang["login"]["username"] ?>">
        </div>

        <div class="form-group">
            <label for="login_password" class="sr-only"><?= $lang["login"]["password"] ?></label>
            <input tabindex="2" type="password" name="password" id="login_password" class="form-control" placeholder="<?= $lang["login"]["password"] ?>" maxlength="50">
        </div>

        <div class="form-group">
            <label for="login_password2" class="sr-only"><?= $lang["signup"]["password"] ?></label>
            <input tabindex="3" type="password" name="password2" id="login_password2" class="form-control" placeholder="<?= $lang["signup"]["password"] ?>" maxlength="50">
        </div>

        <div class="form-group">
            <label for="login_invite" class="sr-only"><?= $lang["signup"]["invite"] ?></label>
            <input tabindex="4" type="text" name="invite" id="login_invite" class="form-control" placeholder="<?= $lang["signup"]["invite"] ?>" maxlength="50">
        </div>

<!--
        <div class="form-group">
            <label for="login_captcha" class="sr-only"><?= $lang["login"]["captcha"] ?></label>
            <input tabindex="5" id="login_captcha" class="form-control" type="text" placeholder="<?= $lang["login"]["captcha"] ?>" name="captcha_challenge" tabindex="3" title="<?= $lang["login"]["captcha"] ?>" autocomplete="off" maxlength="6">
            <img src="render/parts/captcha.php" alt="CAPTCHA IMAGE (Click to refresh)" class="captcha-image loading" width="200px" title="Click to refresh!" style="padding-top:10px;padding-bottom:10px;margin-left:50px;margin-right:50px;">
        </div>
-->

        <button tabindex="6" class="btn btn-lg btn-success btn-block" type="submit" id="login_button" name="signup_user"><?= glyph("plus",$lang["menu"]["signup"]) ?> <?= $lang["menu"]["signup"] ?></button>
        <hr>
        <p><?= $lang["signup"]["message"] ?> <a href="<?= $config["url"] ?>login"><?= $lang["menu"]["login"] ?>!</a></p>
    </form>
</div>



<script>
    var refreshButton = document.querySelector(".captcha-image");
    refreshButton.onclick = function() {
        document.querySelector(".captcha-image").src = 'render/parts/captcha.php?' + Date.now();
    }

</script>

<?php include("../parts/footer.php"); ?>
