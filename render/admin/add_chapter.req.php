<?php

require("../../requires.php");

$page = $lang["add_chapter"]["title"];

if($loggedin==false || $user["active"]==0) {
    header("Refresh: 0; url=../login");
}

$slug2 = mysqli_real_escape_string($conn, $_GET["slug"]);
$manga = $conn->query("SELECT * FROM `titles` WHERE `slug`='$slug2' LIMIT 1");
$manga = mysqli_fetch_assoc($manga);

$mid = $manga["id"];

$error = false;
$error_msg = "";

if(isset($_POST["add_chapter"])) {
    $slug = generate_url();
    $volume = mysqli_real_escape_string($conn, $_POST["volume"]);
    $chapter = mysqli_real_escape_string($conn, $_POST["chapter"]);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    
    if(empty($volume)) { $volume = "NULL"; } else { $volume = "'$volume'"; }
    if(empty($chapter)) { $chapter = "'0'"; } else { $chapter = "'$chapter'"; }
    if(empty($title)) { $title = "NULL"; } else { $title = "'$title'"; }
    
    $target_file = "../../data/chapters/".$_FILES["archive"]["name"];
    $new_file = "../../data/chapters/".$slug;
    move_uploaded_file($_FILES["archive"]["tmp_name"], $target_file);
    $filename = pathinfo($_FILES['archive']['name'], PATHINFO_FILENAME);
    $before_file = "../../data/chapters/".$filename;
    $zip = new ZipArchive;
    $res = $zip->open($target_file);
    $zip->extractTo('../../data/chapters/');
    $zip->close();
    rename($before_file, $new_file);
    unlink($target_file);
    
    $uid = $user["id"];
    
    $conn->query("INSERT INTO `chapters`(`mid`,`slug`,`volume`,`chapter`,`title`,`user`) VALUES('$mid','$slug',$volume,$chapter,$title,'$uid')");
}

include("../parts/header.php");

?>

<?php if(!empty($manga["id"])) { ?>
<title><?= $lang["add_chapter"]["title"]." ".$manga["title"]." :: ".$config["title"] ?></title>
<?php } else { ?>
<title><?= $lang["login"]["error"]." :: ".$config["title"] ?></title>
<?php } ?>

<?php include("../parts/menu.php"); ?>

<?php if(!isset($_COOKIE[$config["cookie"]."_cookie-consent"]) || empty($_COOKIE[$config["cookie"]."_cookie-consent"])) { include("../parts/cookies.php"); } ?>

<?php if(!empty($error_msg)) { ?>
<div class="alert alert-warning alert-dismissible text-center" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong><?= $lang["login"]["error"] ?>:</strong> <?= $error_msg ?>
</div>
<?php } ?>
<div style="margin: 0 auto; width: 300px" id="login_container">
    <form method="post" name="add_chapter" enctype="multipart/form-data">
        <h1 class="text-center"><?= $lang["add_chapter"]["title"] ?> <a href="<?= $config["url"] ?>manga/<?= $slug2 ?>"><b><u><?= $manga["title"] ?></u></b></a></h1>
        <hr>

        <div class="form-group">
            <label for="archive" class="sr-"><?= $lang["add_chapter"]["file"] ?></label>
            <input tabindex="1" required type="file" name="archive" id="archive" class="form-control">
        </div>

        <div class="form-group">
            <label for="chapter_vol"><?= $lang["add_chapter"]["volume"] ?> </label>
            <input tabindex="2" type="number" name="volume" id="chapter_vol" class="form-control" value="<?php if(isset($_POST["volume"])) { $vol = $_POST["volume"]; echo $vol; } ?>" placeholder="<?= $lang["add_chapter"]["volume"] ?>">
        </div>

        <div class="form-group">
            <label for="chapter_chap"><?= $lang["add_chapter"]["chapter"] ?> </label>
            <input tabindex="3" type="text" name="chapter" id="chapter_chap" class="form-control" value="<?php if(isset($_POST["chapter"])) { $chap = $_POST["chapter"]; $chap++; echo $chap; } ?>" placeholder="<?= $lang["add_chapter"]["chapter"] ?>">
        </div>

        <div class="form-group">
            <label for="chapter_title"><?= $lang["add_chapter"]["ctitle"] ?> </label>
            <input tabindex="4" type="text" name="title" id="chapter_title" class="form-control" placeholder="<?= $lang["add_chapter"]["ctitle"] ?>">
        </div>

        <p><i><?= $lang["add_manga"]["required"] ?></i></p>
        <button tabindex="5" class="btn btn-lg btn-success btn-block" type="submit" id="upload-file" name="add_chapter"><?= glyph("plus",$lang["add_chapter"]["button"]) ?> <?= $lang["add_chapter"]["button"] ?></button>
    </form>
</div>

<?php include("../parts/footer.php"); ?>
