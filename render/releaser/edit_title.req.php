<?php

require("../../requires.php");

$page = $lang["edit_title"]["title"];

if($loggedin==false || $user["active"]==0) {
    header("Refresh: 0; url=../../");
}

$slug2 = mysqli_real_escape_string($conn, $_GET["slug"]);
$manga = $conn->query("SELECT * FROM `titles` WHERE `slug`='$slug2' LIMIT 1");
$manga = mysqli_fetch_assoc($manga);

$error = false;
$error_msg = "";

$slug = $manga["slug"];

if(isset($_POST["edit_title"])) {
    $m_title = mysqli_real_escape_string($conn, $_POST["title"]);
    $m_alt = mysqli_real_escape_string($conn, $_POST["alt"]);
    $m_author = mysqli_real_escape_string($conn, $_POST["author"]);
    $m_genre = mysqli_real_escape_string($conn, $_POST["genre"]);
    $m_type = mysqli_real_escape_string($conn, $_POST["type"]);
    $m_released = mysqli_real_escape_string($conn, $_POST["released"]);
    $m_rawstatus = mysqli_real_escape_string($conn, $_POST["raw-status"]);
    $m_scanstatus = mysqli_real_escape_string($conn, $_POST["scan-status"]);
    $m_description = mysqli_real_escape_string($conn, $_POST["description"]);
    $m_rawurl = mysqli_real_escape_string($conn, $_POST["raw-url"]);
    $m_licensed = mysqli_real_escape_string($conn, $_POST["licensed"]);
    $m_officialurl = mysqli_real_escape_string($conn, $_POST["official-url"]);
    
    if($m_title!=$manga["title"]) {
        $conn->query("UPDATE `titles` SET `title`='$m_title' WHERE `id`='".$manga["id"]."'");
    }
    if($m_alt!=$manga["alt"]) {
        $conn->query("UPDATE `titles` SET `alt`='$m_alt' WHERE `id`='".$manga["id"]."'");
    }
    if($m_author!=$manga["author"]) {
        $conn->query("UPDATE `titles` SET `author`='$m_author' WHERE `id`='".$manga["id"]."'");
    }
    if($m_genre!=$manga["genre"]) {
        $conn->query("UPDATE `titles` SET `genre`='$m_genre' WHERE `id`='".$manga["id"]."'");
    }
    if($m_released!=$manga["released"]) {
        $conn->query("UPDATE `titles` SET `released`='$m_released' WHERE `id`='".$manga["id"]."'");
    }
    if($m_description!=$manga["description"]) {
        $conn->query("UPDATE `titles` SET `description`='$m_description' WHERE `id`='".$manga["id"]."'");
    }
    if($m_rawurl!=$manga["raw-url"]) {
        $conn->query("UPDATE `titles` SET `raw-url`='$m_rawurl' WHERE `id`='".$manga["id"]."'");
    }
    if($m_licensed!=$manga["licensed"]) {
        $conn->query("UPDATE `titles` SET `licensed`='$m_licensed' WHERE `id`='".$manga["id"]."'");
    }
    if($m_officialurl!=$manga["official-url"]) {
        $conn->query("UPDATE `titles` SET `official-url`='$m_officialurl' WHERE `id`='".$manga["id"]."'");
    }
    
    if(isset($_FILES["cover"]["tmp_name"]) && !empty($_FILES["cover"]["tmp_name"])) {
        $filename = pathinfo($_FILES['cover']['name'], PATHINFO_FILENAME);
        $fileextension = pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION);
        $finalfile = $filename."-".$slug.".".$fileextension;
        $target_file = "../../data/covers/".$finalfile;

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["cover"]["tmp_name"]);
        if($check !== false) {
            // Update SQL for Image
            move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file);
            $conn->query("UPDATE `titles` SET `cover`='$finalfile' WHERE `id`='".$manga["id"]."'");
        } else {
            $error = true;
            $error_msg = $lang["errors"]["unsupported_image"];
        }
    } // no else statement needed
    
//  No need for it anymore
//    if($error==false) {
//        $conn->query("INSERT INTO `titles`(`slug`,`title`,`cover`,`alt`,`author`,`genre`,`type`,`released`,`raw-status`,`scan-status`,`description`,`raw-url`,`licensed`,`official-url`) VALUES('$slug','$m_title','$finalfile',$m_alt,$m_author,$m_genre,'$m_type',$m_released,'$m_rawstatus','$m_scanstatus',$m_description,$m_rawurl,$m_licensed,$m_officialurl)");
//        if(isset($_FILES["cover"]["tmp_name"])) {
//            move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file);
//        }
//    }
    
    header("Refresh: 0");
    
}

if(isset($_POST["delete_title"])) {
    $conn->query("DELETE FROM `titles` WHERE `slug`='$slug'");
    header("Location: ../../");
}

include("../parts/header.php");

?>

<title><?= $lang["edit_title"]["title"]." - ".$manga["title"]." :: ".$config["title"] ?></title>

<?php include("../parts/menu.php"); ?>

<?php if(!isset($_COOKIE[$config["cookie"]."_cookie-consent"]) || empty($_COOKIE[$config["cookie"]."_cookie-consent"])) { include("../parts/cookies.php"); } ?>

<?php if(!empty($error_msg)) { ?>
<div class="alert alert-warning alert-dismissible text-center" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong><?= $lang["login"]["error"] ?>:</strong> <?= $error_msg ?>
</div>
<?php } ?>
<div style="margin: 0 auto; width: 300px" id="login_container">
    <form method="post" id="login_form" name="edit_title" enctype="multipart/form-data">
        <h1 class="text-center"><?= $lang["edit_title"]["title"] ?></h1>
        <h3 class="text-center"><a href="<?= $config["url"] ?>manga/<?= $manga["slug"] ?>"><?= $lang["edit_chapter"]["return"] ?>: <?= $manga["title"] ?></a></h3>
        <hr>
        <div class="form-group">
            <label for="manga_title"><?= $lang["add_manga"]["title"] ?></label>
            <input tabindex="1" type="text" name="title" id="manga_title" class="form-control" value="<?= $manga["title"] ?>" placeholder="<?= $lang["add_manga"]["title"] ?>">
        </div>

        <div class="form-group">
            <label for="manga_cover" class="sr-"><?= $lang["add_manga"]["cover"] ?></label>
            <input tabindex="2" type="file" name="cover" id="manga_cover" class="form-control">
        </div>

        <div class="form-group">
            <label for="manga_alt"><?= $lang["add_manga"]["alt"] ?></label>
            <input tabindex="3" type="text" name="alt" id="manga_alt" class="form-control" value="<?= $manga["alt"] ?>" placeholder="<?= $lang["add_manga"]["alt"] ?>">
        </div>

        <div class="form-group">
            <label for="manga_author"><?= $lang["add_manga"]["author"] ?></label>
            <input tabindex="4" type="text" name="author" id="manga_author" class="form-control" value="<?= $manga["author"] ?>" placeholder="<?= $lang["add_manga"]["author"] ?>">
        </div>

        <div class="form-group">
            <label for="manga_genre"><?= $lang["add_manga"]["genre"] ?></label>
            <input tabindex="5" type="text" name="genre" id="manga_genre" class="form-control" value="<?= $manga["genre"] ?>" placeholder="<?= $lang["add_manga"]["genre"] ?>">
        </div>

        <div class="form-group">
            <label for="manga_raw-status"><?= $lang["add_manga"]["type"] ?></label>
            <select required tabindex="6" class="selectpicker form-control" name="type" id="manga_type">
                <option <?php if($manga["type"]=="Manga") echo "selected"; ?> value="Manga"><?= $lang["add_manga"]["type_manga"] ?></option>
                <option <?php if($manga["type"]=="Manwha") echo "selected"; ?> value="Manwha"><?= $lang["add_manga"]["type_manwha"] ?></option>
                <option <?php if($manga["type"]=="Manhua") echo "selected"; ?> value="Manhua"><?= $lang["add_manga"]["type_manhua"] ?></option>
            </select>
        </div>

        <div class="form-group">
            <label for="manga_released"><?= $lang["add_manga"]["released"] ?></label>
            <input tabindex="7" type="number" name="released" id="manga_released" class="form-control" value="<?= $manga["released"] ?>" placeholder="<?= $lang["add_manga"]["released"] ?>">
        </div>

        <div class="form-group">
            <label for="manga_raw-status"><?= $lang["add_manga"]["raw-st"] ?></label>
            <select tabindex="8" class="selectpicker form-control" name="raw-status" id="manga_raw-status">
                <option <?php if($manga["raw-status"]==1) echo "selected"; ?> value="1"><?= $lang["add_manga"]["rawst"][1] ?></option>
                <option <?php if($manga["raw-status"]==2) echo "selected"; ?> value="2"><?= $lang["add_manga"]["rawst"][2] ?></option>
                <option <?php if($manga["raw-status"]==3) echo "selected"; ?> value="3"><?= $lang["add_manga"]["rawst"][3] ?></option>
                <option <?php if($manga["raw-status"]==4) echo "selected"; ?> value="4"><?= $lang["add_manga"]["rawst"][4] ?></option>
                <option <?php if($manga["raw-status"]==5) echo "selected"; ?> value="5"><?= $lang["add_manga"]["rawst"][5] ?></option>
                <option <?php if($manga["raw-status"]==6) echo "selected"; ?> value="5"><?= $lang["add_manga"]["rawst"][6] ?></option>
            </select>
        </div>

        <div class="form-group">
            <label for="manga_scan-status"><?= $lang["add_manga"]["status"] ?></label>
            <select required tabindex="9" class="selectpicker form-control" name="scan-status" id="manga_scan-status">
                <option <?php if($manga["scan-status"]==1) echo "selected"; ?> value="1"><?= $lang["add_manga"]["scanst"][1] ?></option>
                <option <?php if($manga["scan-status"]==2) echo "selected"; ?> value="2"><?= $lang["add_manga"]["scanst"][2] ?></option>
                <option <?php if($manga["scan-status"]==3) echo "selected"; ?> value="3"><?= $lang["add_manga"]["scanst"][3] ?></option>
                <option <?php if($manga["scan-status"]==4) echo "selected"; ?> value="4"><?= $lang["add_manga"]["scanst"][4] ?></option>
                <option <?php if($manga["scan-status"]==5) echo "selected"; ?> value="5"><?= $lang["add_manga"]["scanst"][5] ?></option>
            </select>
        </div>

        <div class="form-group">
            <label for="manga_description"><?= $lang["add_manga"]["descript"] ?></label>
            <textarea tabindex="10" type="text" name="description" id="manga_description" class="form-control" placeholder="<?= $lang["add_manga"]["descript"] ?>" style="margin-left: -200px; width: 700px; max-width: 700px; min-width: 700px; min-height:200px"><?= $manga["description"] ?></textarea>
        </div>

        <div class="form-group">
            <label for="manga_raw-url"><?= $lang["add_manga"]["raw-url"] ?></label>
            <input tabindex="11" type="text" name="raw-url" id="manga_raw-url" class="form-control" value="<?= $manga["raw-url"] ?>" placeholder="<?= $lang["add_manga"]["raw-url"] ?>">
        </div>

        <div class="form-group">
            <label for="manga_licensed"><?= $lang["add_manga"]["licensed"] ?></label>
            <input tabindex="12" type="text" name="licensed" id="manga_licensed" class="form-control" value="<?= $manga["licensed"] ?>" placeholder="<?= $lang["add_manga"]["licensed"] ?>">
        </div>

        <div class="form-group">
            <label for="manga_official-url"><?= $lang["add_manga"]["official"] ?></label>
            <input tabindex="13" type="text" name="official-url" id="manga_official-url" class="form-control" value="<?= $manga["official-url"] ?>" placeholder="<?= $lang["add_manga"]["official"] ?>">
        </div>

        <p><i><?= $lang["add_manga"]["required"] ?></i></p>
        <button tabindex="14" class="btn btn-lg btn-success btn-block" type="submit" id="login_button" name="edit_title"><?= glyph("plus",$lang["edit_title"]["save"]) ?> <?= $lang["edit_title"]["save"] ?></button>
    </form>
    <hr>
    <form method="post" name="delete_title">
        <button style="width: 300px; display: block" class="btn btn-lg btn-danger btn-block" onclick="showDelCon()" type="button" id="delbtn"><?= glyph("trash",$lang["edit_title"]["delete"]) ?> <?= $lang["edit_title"]["delete"] ?></button>
        <div id="delcon" style="display: none">
            <button style="width: 300px; display: block" class="btn btn-lg btn-success btn-block" onclick="hideDelCon()" type="button" id="delbtn"><?= glyph("remove",$lang["edit_chapter"]["del_no"]) ?> <?= $lang["edit_chapter"]["del_no"] ?></button>
            <button style="width: 300px; display: block" class="btn btn-lg btn-danger btn-block" type="submit" name="delete_title" id="delbtn"><?= glyph("trash",$lang["edit_chapter"]["del_yes"]) ?> <?= $lang["edit_chapter"]["del_yes"] ?></button>
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
