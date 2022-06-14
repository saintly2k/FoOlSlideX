<?php

require("../../requires.php");

$page = $lang["groups"]["add_group"];

if($loggedin==false || ($user["level"]!=1 && $user["level"]!=2) || $user["active"]==0) {
    header("Refresh: 0; url=../../");
}

$error = false;
$error_msg = "";

if(isset($_POST["add_group"])) {
    $g_name = mysqli_real_escape_string($conn, $_POST["name"]);
    $g_short = mysqli_real_escape_string($conn, $_POST["short"]);
    $g_image = mysqli_real_escape_string($conn, $_POST["image"]);
    $g_about = mysqli_real_escape_string($conn, $_POST["about"]);
    $g_founded = mysqli_real_escape_string($conn, $_POST["founded"]);
    $g_website = mysqli_real_escape_string($conn, $_POST["website"]);
    $g_irc = mysqli_real_escape_string($conn, $_POST["irc"]);
    $g_mangadex = mysqli_real_escape_string($conn, $_POST["mangadex"]);
    $g_email = mysqli_real_escape_string($conn, $_POST["email"]);
    
    if(empty($g_image)) { $g_image = "'https://cdn.henai.eu/assets/images/fsx-group.jpg'"; } else { $g_image = "'".$g_image."'"; }
    if(empty($g_about)) { $g_about = "NULL"; } else { $g_about = "'".$g_about."'"; }
    if(empty($g_founded)) { $g_founded = "NULL"; } else { $g_founded = "'".$g_founded."'"; }
    if(empty($g_website)) { $g_website = "NULL"; } else { $g_website = "'".$g_website."'"; }
    if(empty($g_irc)) { $g_irc = "NULL"; } else { $g_irc = "'".$g_irc."'"; }
    if(empty($g_mangadex)) { $g_mangadex = "NULL"; } else { $g_mangadex = "'".$g_mangadex."'"; }
    if(empty($g_email)) { $g_email = "NULL"; } else { $g_email = "'".$g_email."'"; }
    
    $slug = generate_url();
    
    if($user["level"]==1) { $approved = 1; } elseif($user["level"]==3) { $approved = 0; }
    
    $conn->query("INSERT INTO `groups`(`name`,`slug`,`short`,`image`,`about`,`founded`,`website`,`irc`,`mangadex`,`email`,`user`,`approved`) VALUES('$g_name', '$slug', '$g_short', $g_image, $g_about, $g_founded, $g_website, $g_irc, $g_mangadex, $g_email, '".$user["id"]."', '$approved')");
    $group = $conn->query("SELECT * FROM `groups` ORDER BY `id` DESC LIMIT 1")->fetch_assoc();
    header("Location: ".$config["url"]."group/".$group["slug"]);
}

include("../parts/header.php");

?>

<title><?= $lang["groups"]["add_group"]." :: ".$config["title"] ?></title>

<?php include("../parts/menu.php"); ?>

<?php if(!isset($_COOKIE[$config["cookie"]."_cookie-consent"]) || empty($_COOKIE[$config["cookie"]."_cookie-consent"])) { include("../parts/cookies.php"); } ?>

<?php if(!empty($error_msg)) { ?>
<div class="alert alert-warning alert-dismissible text-center" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong><?= $lang["login"]["error"] ?>:</strong> <?= $error_msg ?>
</div>
<?php } ?>
<div style="margin: 0 auto; width: 300px" id="login_container">
    <form method="post" name="add_group">
        <h1 class="text-center"><?= $lang["groups"]["add_group"] ?></h1>
        <hr>

        <div class="form-group">
            <label for="group_name">*<?= $lang["groups"]["name"] ?></label>
            <input required tabindex="1" type="text" name="name" id="group_name" class="form-control" placeholder="<?= $lang["groups"]["name"] ?>">
        </div>

        <div class="form-group">
            <label for="group_short">*<?= $lang["groups"]["short"] ?></label>
            <input required tabindex="2" type="text" name="short" id="group_short" class="form-control" placeholder="<?= $lang["groups"]["short"] ?>">
        </div>

        <div class="form-group">
            <label for="group_image"><?= $lang["groups"]["image"] ?></label>
            <input tabindex="3" type="text" name="image" id="group_image" class="form-control" placeholder="<?= $lang["groups"]["image"] ?>">
        </div>

        <div class="form-group">
            <label for="group_about"><?= $lang["groups"]["about"] ?></label>
            <textarea tabindex="4" type="text" name="about" id="group_about" class="form-control" placeholder="<?= $lang["groups"]["about"] ?>" style="margin-left: -200px; width: 700px; max-width: 700px; min-width: 700px; min-height:200px"></textarea>
        </div>

        <div class="form-group">
            <label for="group_founded"><?= $lang["groups"]["founded"] ?></label>
            <input tabindex="5" type="date" name="founded" id="group_founded" class="form-control" placeholder="<?= $lang["groups"]["founded"] ?>">
        </div>

        <div class="form-group">
            <label for="group_website"><?= $lang["groups"]["website"] ?></label>
            <input tabindex="6" type="text" name="website" id="group_website" class="form-control" placeholder="<?= $lang["groups"]["website"] ?>">
        </div>

        <div class="form-group">
            <label for="group_irc"><?= $lang["groups"]["irc"] ?></label>
            <input tabindex="7" type="text" name="irc" id="group_irc" class="form-control" placeholder="<?= $lang["groups"]["irc"] ?>">
        </div>

        <div class="form-group">
            <label for="group_mangadex"><?= $lang["groups"]["mangadex"] ?></label>
            <input tabindex="8" type="text" name="mangadex" id="group_mangadex" class="form-control" placeholder="<?= $lang["groups"]["mangadex"] ?>">
        </div>

        <div class="form-group">
            <label for="group_email"><?= $lang["groups"]["email"] ?></label>
            <input tabindex="9" type="text" name="email" id="group_email" class="form-control" placeholder="<?= $lang["groups"]["email"] ?>">
        </div>

        <p><i><?= $lang["add_manga"]["required"] ?></i></p>
        <?php if($user["level"]==1 || $user["level"]==2) { ?>
        <button tabindex="10" class="btn btn-lg btn-success btn-block" type="submit" id="upload-file" name="add_group"><?= glyph("ok",$lang["groups"]["confirm"]) ?> <?= $lang["groups"]["confirm"] ?></button>
        <?php } elseif($user["level"]==3) { ?>
        <button tabindex="10" class="btn btn-lg btn-success btn-block" type="submit" id="upload-file" name="add_group"><?= glyph("ok",$lang["groups"]["confirm_r"]) ?> <?= $lang["groups"]["confirm_r"] ?></button>
        <?php } ?>
    </form>
</div>

<?php include("../parts/footer.php"); ?>
