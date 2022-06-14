<?php

require("../../requires.php");

$page = $lang["edit_chapter"]["title"];

if($loggedin==false || $user["active"]==0) {
    header("Refresh: 0; url=../../");
}

$slug2 = mysqli_real_escape_string($conn, $_GET["slug"]);
$chapter = $conn->query("SELECT * FROM `chapters` WHERE `slug`='$slug2' LIMIT 1");
$chapter = mysqli_fetch_assoc($chapter);

$mid = $chapter["mid"];

$manga = $conn->query("SELECT * FROM `titles` WHERE `id`='$mid' LIMIT 1");
$manga = mysqli_fetch_assoc($manga);

$error = false;
$error_msg = "";

if(isset($_POST["edit_chapter"])) {
    $slug = generate_url();
    $volume = mysqli_real_escape_string($conn, $_POST["volume"]);
    $chapter = mysqli_real_escape_string($conn, $_POST["chapter"]);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    
    if(empty($volume)) { $volume = "NULL"; } else { $volume = "'$volume'"; }
    if(empty($chapter)) { $chapter = "'0'"; } else { $chapter = "'$chapter'"; }
    if(empty($title)) { $title = "NULL"; } else { $title = "'$title'"; }
    
    if(isset($_FILES["archive"]["tmp_name"]) && !empty($_FILES["archive"]["tmp_name"])) {
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
    } else {
        $slug = $slug2;
    }
    
    $uid = $user["id"];
    
    $conn->query("UPDATE `chapters` SET `slug`='$slug', `volume`=$volume, `chapter`=$chapter, `title`=$title, `user`='$uid' WHERE `slug`='$slug2'");
    header("Refresh: 0; url=$slug");
}

if(isset($_POST["delete_chapter"])) {
    $conn->query("DELETE FROM `chapters` WHERE `slug`='$slug2'");
    header("Location: ".$config["url"]."manga/".$manga["slug"]);
}

include("../parts/header.php");

?>

<?php if(!empty($chapter["id"])) { ?>
<title><?= $lang["edit_chapter"]["title"]." - ".$manga["title"]." :: ".$config["title"] ?></title>
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
    <form method="post" name="edit_chapter" enctype="multipart/form-data">
        <h1 class="text-center"><?= $lang["edit_chapter"]["title"] ?></h1>
        <h3 class="text-center"><a href="<?= $config["url"] ?>manga/<?= $manga["slug"] ?>"><?= $lang["edit_chapter"]["return"] ?>: <?= $manga["title"] ?></a></h3>
        <hr>

        <div class="form-group">
            <label for="archive" class="sr-"><?= $lang["edit_chapter"]["file"] ?></label>
            <input tabindex="1" type="file" name="archive" id="archive" class="form-control">
        </div>

        <div class="form-group">
            <label for="chapter_vol"><?= $lang["add_chapter"]["volume"] ?> </label>
            <input tabindex="2" type="number" name="volume" id="chapter_vol" class="form-control" value="<?= $chapter["volume"] ?>" placeholder="<?= $lang["add_chapter"]["volume"] ?>">
        </div>

        <div class="form-group">
            <label for="chapter_chap"><?= $lang["add_chapter"]["chapter"] ?> </label>
            <input tabindex="3" type="number" name="chapter" id="chapter_chap" class="form-control" value="<?= $chapter["chapter"] ?>" placeholder="<?= $lang["add_chapter"]["chapter"] ?>">
        </div>

        <div class="form-group">
            <label for="chapter_title"><?= $lang["add_chapter"]["ctitle"] ?> </label>
            <input tabindex="4" type="text" name="title" id="chapter_title" class="form-control" placeholder="<?= $lang["add_chapter"]["ctitle"] ?>" value="<?= $chapter["title"] ?>">
        </div>

        <p><i><?= $lang["add_manga"]["required"] ?></i></p>
        <button tabindex="5" class="btn btn-lg btn-success btn-block" type="submit" id="upload-file" name="edit_chapter"><?= glyph("pencil",$lang["edit_chapter"]["edit"]) ?> <?= $lang["edit_chapter"]["edit"] ?></button>
    </form>
    <hr>
    <form method="post" name="delete_chapter">
        <button style="width: 300px; display: block" class="btn btn-lg btn-danger btn-block" onclick="showDelCon()" type="button" id="delbtn"><?= glyph("trash",$lang["edit_chapter"]["delete"]) ?> <?= $lang["edit_chapter"]["delete"] ?></button>
        <div id="delcon" style="display: none">
            <button style="width: 300px; display: block" class="btn btn-lg btn-success btn-block" onclick="hideDelCon()" type="button" id="delbtn"><?= glyph("remove",$lang["edit_chapter"]["del_no"]) ?> <?= $lang["edit_chapter"]["del_no"] ?></button>
            <button style="width: 300px; display: block" class="btn btn-lg btn-danger btn-block" type="submit" name="delete_chapter" id="delbtn"><?= glyph("trash",$lang["edit_chapter"]["del_yes"]) ?> <?= $lang["edit_chapter"]["del_yes"] ?></button>
        </div>
    </form>
</div>

<script>
    function showDelCon() {
        document.getElementById("delbtn").style.display = "none";
        document.getElementById("delcon").style.display = "block";
    }

    function hideDelCon() {
        document.getElementById("delbtn").style.display = "block";
        document.getElementById("delcon").style.display = "none";
    }

</script>

<?php include("../parts/footer.php"); ?>
