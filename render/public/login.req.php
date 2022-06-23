<?php

require("../../requires.php");

$page = $lang["menu"]["login"];

if($loggedin==true) {
    header("Refresh: 0; url=./");
}

$error = false;
$error_msg = "";

if(isset($_GET["username"]) && isset($_GET["password"]) /*&& isset($_GET["captcha_challenge"])*/) {
    /*if(isset($_GET['captcha_challenge']) && $_GET['captcha_challenge'] == $_SESSION['captcha_text']) {*/
        $username = mysqli_real_escape_string($conn, $_GET["username"]);
        $password = mysqli_real_escape_string($conn, $_GET["password"]);
        $check1 = preg_match('/[^.a-zA-Z0-9-_]/', $username);
        $check2 = preg_match('/[^.a-zA-Z0-9-_]/', $password);
        if($check2==true) {
            $error = true;
            $error_msg = $lang["errors"]["bad_password"];
        }
        if($check1==true) {
            $error = true;
            $error_msg = $lang["errors"]["bad_username"];
        }
        if($error==false) {
            // Everything is fine desu~
            $check = $conn->query("SELECT * FROM `user` WHERE `username`='$username' LIMIT 1");
            if(mysqli_num_rows($check)==1) {
                // Account exists!
                $check = mysqli_fetch_assoc($check);
                $check = password_verify($password, $check["password"]);
                if($check==true) {
                    // Yay, user exists & passowrd matches!
                    $user = $conn->query("SELECT * FROM `user` WHERE `username`='$username' LIMIT 1");
                    $user = mysqli_fetch_assoc($user);
                    $uid = $user["id"];
                    $token = rand();
                    $token = md5($token);
                    setcookie("".$config["cookie"]."_session", $token, time()+(86400*30), "/");
                    $conn->query("INSERT INTO `sessions`(`user-id`,`token`) VALUES('$uid','$token')");
                    header("Location: ./");
                } else {
                    // Ewww error
                    $error = true;
                    $error_msg = $lang["errors"]["wrong_password"];
                }
            } else {
                // Username/Password doesn't match
                $error = true;
                $error_msg = $lang["errors"]["attack"];
            }
        }
    /*} else {
        $error = true;
        $error_msg = $lang["errors"]["captcha"];
    } */
}

include("../parts/header.php");

?>

<title><?= $lang["menu"]["login"]." :: ".$config["title"] ?></title>

<?php include("../parts/menu.php"); ?>

<?php if(!isset($_COOKIE[$config["cookie"]."_cookie-consent"]) || empty($_COOKIE[$config["cookie"]."_cookie-consent"])) { include("../parts/cookies.php"); } ?>

<?php if(!empty($error_msg)) { ?>
<div class="alert alert-warning alert-dismissible text-center" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong><?= $lang["login"]["error"] ?>:</strong> <?= $error_msg ?>
</div>
<?php } ?>
<div style="margin: 0 auto; width: 300px" id="login_container">
    <form method="get" id="login_form" name="login_user">
        <h1 class="text-center"><?= $lang["menu"]["login"] ?></h1>
        <hr>
        <div class="form-group">
            <label for="login_username" class="sr-only"><?= $lang["login"]["username"] ?></label>
            <input tabindex="1" type="text" name="username" id="login_username" class="form-control" placeholder="<?= $lang["login"]["username"] ?>">
        </div>

        <div class="form-group">
            <label for="login_password" class="sr-only"><?= $lang["login"]["password"] ?></label>
            <input tabindex="2" type="password" name="password" id="login_password" class="form-control" placeholder="<?= $lang["login"]["password"] ?>">
        </div>

        <div class="checkbox">
            <label>
                <input tabindex="4" type="checkbox" name="remember_me" value="1"> <?= $lang["login"]["cookies"] ?>
            </label>
        </div>

        <button tabindex="5" class="btn btn-lg btn-success btn-block" type="submit" id="login_button" name="user_login"><?= glyph("log-in",$lang["menu"]["login"]) ?> <?= $lang["menu"]["login"] ?></button>
        <hr>
        <p><?= $lang["login"]["message"] ?> <a href="<?= $config["url"] ?>signup"><?= $lang["menu"]["signup"] ?>!</a></p>
    </form>
</div>



<script>
    var refreshButton = document.querySelector(".captcha-image");
    refreshButton.onclick = function() {
        document.querySelector(".captcha-image").src = 'render/parts/captcha.php?' + Date.now();
    }

</script>

<?php include("../parts/footer.php"); ?>
