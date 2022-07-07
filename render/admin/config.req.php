<?php

require("../../requires.php");

$page = $lang["menu"]["config"];

if($loggedin==false || $user["level"]!=1 || $user["active"]==0) {
    header("Refresh: 0; url=../../");
}

$error = false;
$error_msg = "";

if(isset($_POST["edit_config"])) {
    $c_title = mysqli_real_escape_string($conn, $_POST["title"]);
    $c_slogan = mysqli_real_escape_string($conn, $_POST["slogan"]);
    $c_logo = mysqli_real_escape_string($conn, $_POST["logo"]);
    $c_cookie = mysqli_real_escape_string($conn, $_POST["cookie"]);
    $c_url = mysqli_real_escape_string($conn, $_POST["url"]);
    $c_theme = mysqli_real_escape_string($conn, $_POST["theme"]);
    $c_start = mysqli_real_escape_string($conn, $_POST["start"]);
    if(isset($_POST["blog"])) { $c_blog = mysqli_real_escape_string($conn, $_POST["blog"]); } else { $c_blog = 0; }
    if(isset($_POST["news"])) { $c_news = mysqli_real_escape_string($conn, $_POST["news"]); } else { $c_news = 0; }
    $c_lang = mysqli_real_escape_string($conn, $_POST["lang"]);
    $c_disqus = mysqli_real_escape_string($conn, $_POST["disqus"]);
    
    if($c_title!=$config["title"]) {
        $conn->query("UPDATE `config` SET `title`='$c_title'");
    }
    if($c_slogan!=$config["slogan"]) {
        $conn->query("UPDATE `config` SET `slogan`='$c_slogan'");
    }
    if($c_logo!=$config["logo"]) {
        $conn->query("UPDATE `config` SET `logo`='$c_logo'");
    }
    if($c_cookie!=$config["cookie"]) {
        $conn->query("UPDATE `config` SET `cookie`='$c_cookie'");
    }
    if($c_url!=$config["url"]) {
        $conn->query("UPDATE `config` SET `url`='$c_url'");
    }
    if($c_theme!=$config["theme"]) {
        $conn->query("UPDATE `config` SET `theme`='$c_theme'");
    }
    if($c_start!=$config["start"]) {
        $conn->query("UPDATE `config` SET `start`='$c_start'");
    }
    if($c_blog!=$config["blog"]) {
        $conn->query("UPDATE `config` SET `blog`='$c_blog'");
    }
    if($c_news!=$config["news"]) {
        $conn->query("UPDATE `config` SET `news`='$c_news'");
    }
    if($c_lang!=$config["lang"]) {
        $conn->query("UPDATE `config` SET `lang`='$c_lang'");
    }
    if($c_disqus!=$config["disqus"]) {
        $conn->query("UPDATE `config` SET `disqus`='$c_disqus'");
    }
    
    header("Refresh: 0");
}

include("../parts/header.php");

?>

<title><?= $lang["config"]["title"]." :: ".$config["title"] ?></title>

<?php include("../parts/menu.php"); ?>

<?php if(!isset($_COOKIE[$config["cookie"]."_cookie-consent"]) || empty($_COOKIE[$config["cookie"]."_cookie-consent"])) { include("../parts/cookies.php"); } ?>

<?php if(!empty($error_msg)) { ?>
<div class="alert alert-warning alert-dismissible text-center" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong><?= $lang["login"]["error"] ?>:</strong> <?= $error_msg ?>
</div>
<?php } ?>
<div style="margin: 0 auto; width: 300px" id="login_container">
    <form method="post" name="edit_config">
        <h1 class="text-center"><?= $lang["config"]["title"] ?></h1>
        <hr>

        <div class="form-group">
            <label for="config_title"><?= $lang["config"]["title2"] ?> </label>
            <input required tabindex="1" type="text" name="title" id="config_title" class="form-control" value="<?= $config["title"] ?>" placeholder="<?= $lang["config"]["title2"] ?>">
        </div>

        <div class="form-group">
            <label for="config_slogan"><?= $lang["config"]["slogan"] ?> </label>
            <input required tabindex="2" type="text" name="slogan" id="config_slogan" class="form-control" value="<?= $config["slogan"] ?>" placeholder="<?= $lang["config"]["slogan"] ?>">
        </div>

        <div class="form-group">
            <label for="config_logo"><?= $lang["config"]["logo"] ?> </label>
            <input tabindex="3" type="text" name="logo" id="config_logo" class="form-control" value="<?= $config["logo"] ?>" placeholder="<?= $lang["config"]["logo"] ?>">
        </div>

        <div class="form-group">
            <label for="config_cookie"><?= $lang["config"]["cookie"] ?> </label>
            <input required tabindex="4" type="text" name="cookie" id="config_cookie" class="form-control" value="<?= $config["cookie"] ?>" placeholder="<?= $lang["config"]["cookie"] ?>">
        </div>

        <div class="form-group">
            <label for="config_url"><?= $lang["config"]["url"] ?> </label>
            <input required tabindex="5" type="text" name="url" id="config_url" class="form-control" value="<?= $config["url"] ?>" placeholder="<?= $lang["config"]["url"] ?>">
        </div>

        <div class="form-group">
            <label for="config_theme"><?= $lang["config"]["theme"] ?></label>
            <select required tabindex="6" name="theme" id="config_theme" class="form-control selectpicker" title="<?= $lang["config"]["theme"] ?>">
                <option value="1" <?php if($config["theme"]==1) echo "selected"; ?>><?= $lang["config"]["themes"][1] ?></option>
                <option value="2" <?php if($config["theme"]==2) echo "selected"; ?>><?= $lang["config"]["themes"][2] ?></option>
                <option value="3" <?php if($config["theme"]==3) echo "selected"; ?>><?= $lang["config"]["themes"][3] ?></option>
                <option value="4" <?php if($config["theme"]==4) echo "selected"; ?>><?= $lang["config"]["themes"][4] ?></option>
                <option value="5" <?php if($config["theme"]==5) echo "selected"; ?>><?= $lang["config"]["themes"][5] ?></option>
                <option value="6" <?php if($config["theme"]==6) echo "selected"; ?>><?= $lang["config"]["themes"][6] ?></option>
            </select>
        </div>

        <div class="form-group">
            <label for="config_start"><?= $lang["config"]["start"] ?> </label>
            <input required tabindex="7" type="number" name="start" id="config_start" class="form-control" value="<?= $config["start"] ?>" placeholder="<?= $lang["config"]["start"] ?>">
        </div>

        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" <?php if($config["blog"]==true) echo "checked"; ?> name="blog" value="1"> <?= $lang["menu"]["blog"] ?>
                </label>
            </div>
        </div>

        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" <?php if($config["news"]==true) echo "checked"; ?> name="news" value="1"> <?= $lang["menu"]["news"] ?>
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="config_lang"><?= $lang["config"]["lang"] ?> </label>
            <select required tabindex="8" name="lang" id="config_lang" class="form-control selectpicker" title="<?= $lang["config"]["lang"] ?>">
                <option value="de" <?php if($config["lang"]=="de") echo "selected"; ?>>Deutsch</option>
                <option value="en" <?php if($config["lang"]=="en") echo "selected"; ?>>English</option>
                <option value="pt" <?php if($config["lang"]=="pt") echo "selected"; ?>>Português</option>
                <option value="ru" <?php if($config["lang"]=="ru") echo "selected"; ?>>Русский</option>
            </select>
        </div>

        <div class="form-group">
            <label for="config_disqus"><?= $lang["config"]["disqus"] ?> </label>
            <input tabindex="9" type="text" name="disqus" id="config_disqus" class="form-control" value="<?= $config["disqus"] ?>" placeholder="<?= $lang["config"]["disqus"] ?>">
        </div>

        <p><i><?= $lang["add_manga"]["all_required"] ?></i></p>
        <button tabindex="10" class="btn btn-lg btn-success btn-block" type="submit" id="upload-file" name="edit_config"><?= glyph("pencil",$lang["config"]["title"]) ?> <?= $lang["config"]["title"] ?></button>
    </form>
</div>

<?php include("../parts/footer.php"); ?>
