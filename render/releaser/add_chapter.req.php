<?php

require("../../requires.php");

$page = $lang["add_chapter"]["title"];

if($loggedin==false || $user["active"]==0) {
    header("Refresh: 0; url=../../");
}

$slug2 = mysqli_real_escape_string($conn, $_GET["slug"]);
$manga = $conn->query("SELECT * FROM `titles` WHERE `slug`='$slug2' LIMIT 1");
$manga = mysqli_fetch_assoc($manga);

$groups = $conn->query("SELECT * FROM `groups` WHERE `approved`='1' ORDER BY `name` ASC");

$mid = $manga["id"];

$error = false;
$error_msg = "";

if(isset($_POST["add_chapter"])) {
    $slug = generate_url();
    $volume = mysqli_real_escape_string($conn, $_POST["volume"]);
    $chapter = mysqli_real_escape_string($conn, $_POST["chapter"]);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    
    $group1 = mysqli_real_escape_string($conn, $_POST["group1"]);
    $group2 = mysqli_real_escape_string($conn, $_POST["group2"]);
    $group3 = mysqli_real_escape_string($conn, $_POST["group3"]);
    
    if(empty($volume)) { $volume = "NULL"; } else { $volume = "'$volume'"; }
    if(empty($chapter)) { $chapter = "'0'"; } else { $chapter = "'$chapter'"; }
    if(empty($title)) { $title = "NULL"; } else { $title = "'$title'"; }
    if(empty($group2) || $group2==0) { $group2 = "NULL"; } else { $group2 = "'$group2'"; }
    if(empty($group3) || $group2==0) { $group3 = "NULL"; } else { $group3 = "'$group3'"; }
    
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
    
    $conn->query("INSERT INTO `chapters`(`mid`,`slug`,`volume`,`chapter`,`title`,`user`,`group1`,`group2`,`group3`) VALUES('$mid','$slug',$volume,$chapter,$title,'$uid','$group1', $group2, $group3)");
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

        <div>
            <input type="checkbox" id="chkbx1" checked onchange="toggleBox('chkbx1', 'group1div')"> *<label for="chkbx1"><?= $lang["add_chapter"]["sel_grp1"] ?></label>
            <div class="form-group" id="group1div">
                <input type="text" id="groupSearch1" class="form-control" onkeyup="search_group('1')" placeholder="<?= $lang["add_chapter"]["ser_grp"] ?>">
                <div id="groupSearch1">
                    <fieldset>
                        <div>
                            <input type="radio" id="yougroup1" name="group1" value="0" checked> <label for="yougroup1"><?= $lang["add_chapter"]["no_group"] ?></label>
                        </div>
                        <?php foreach($groups as $g) { ?>
                        <div class="groupSearchItem1">
                            <input type="radio" id="group1item-<?= $g["id"] ?>" name="group1" value="<?= $g["id"] ?>" <?php if(isset($_POST["group1"]) && $_POST["group1"]==$g["id"]) echo "checked"; ?>> <label for="group1item-<?= $g["id"] ?>"><?= $g["name"] ?></label>
                        </div>
                        <?php } ?>
                    </fieldset>
                </div>
            </div>
        </div>

        <div>
            <input type="checkbox" id="chkbx2" <?php if(isset($_POST["group2"]) && $_POST["group2"]!=0) echo "checked"; ?> onchange="toggleBox('chkbx2', 'group2div')"> <label for="chkbx2"><?= $lang["add_chapter"]["sel_grp2"] ?></label>
            <div class="form-group" id="group2div" <?php if(!isset($_POST["group2"]) || $_POST["group2"]==0) echo 'style="display: none"'; ?>>
                <input type="text" id="groupSearch2" class="form-control" onkeyup="search_group('2')" placeholder="<?= $lang["add_chapter"]["ser_grp"] ?>" value="<?php if(isset($_GET["mtitle"])) echo mysqli_real_escape_string($conn, $_GET["mtitle"]); ?>">
                <div id="groupSearch2">
                    <fieldset>
                        <div>
                            <input type="radio" id="yougroup2" name="group2" value="0" checked> <label for="yougroup2"><?= $lang["add_chapter"]["none"] ?></label>
                        </div>
                        <?php foreach($groups as $g) { ?>
                        <div class="groupSearchItem2">
                            <input type="radio" id="group2item-<?= $g["id"] ?>" name="group2" value="<?= $g["id"] ?>" <?php if(isset($_POST["group2"]) && $_POST["group2"]==$g["id"]) echo "checked"; ?>> <label for="group2item-<?= $g["id"] ?>"><?= $g["name"] ?></label>
                        </div>
                        <?php } ?>
                    </fieldset>
                </div>
            </div>
        </div>

        <div>
            <input type="checkbox" id="chkbx3" <?php if(isset($_POST["group3"]) && $_POST["group3"]!=0) echo "checked"; ?> onchange="toggleBox('chkbx3', 'group3div')"> <label for="chkbx3"><?= $lang["add_chapter"]["sel_grp3"] ?></label>
            <div class="form-group" id="group3div" <?php if(!isset($_POST["group3"]) || $_POST["group3"]==0) echo 'style="display: none"'; ?>>
                <input type="text" id="groupSearch3" class="form-control" onkeyup="search_group('3')" placeholder="<?= $lang["add_chapter"]["ser_grp"] ?>" value="<?php if(isset($_GET["mtitle"])) echo mysqli_real_escape_string($conn, $_GET["mtitle"]); ?>">
                <div id="groupSearch3">
                    <fieldset>
                        <div>
                            <input type="radio" id="yougroup3" name="group3" value="0" checked> <label for="yougroup3"><?= $lang["add_chapter"]["none"] ?></label>
                        </div>
                        <?php foreach($groups as $g) { ?>
                        <div class="groupSearchItem3">
                            <input type="radio" id="group3item-<?= $g["id"] ?>" name="group3" value="<?= $g["id"] ?>" <?php if(isset($_POST["group3"]) && $_POST["group3"]==$g["id"]) echo "checked"; ?>> <label for="group3item-<?= $g["id"] ?>"><?= $g["name"] ?></label>
                        </div>
                        <?php } ?>
                    </fieldset>
                </div>
            </div>
        </div>

        <p><i><?= $lang["add_chapter"]["group_unap"] ?></i></p>

        <p><i><?= $lang["add_manga"]["required"] ?></i></p>
        <button tabindex="5" class="btn btn-lg btn-success btn-block" type="submit" id="upload-file" name="add_chapter"><?= glyph("plus",$lang["add_chapter"]["button"]) ?> <?= $lang["add_chapter"]["button"] ?></button>
    </form>
</div>

<script>
    function toggleBox(box, div) {
        var div = document.getElementById(div);
        if (div.style.display === "none") {
            div.style.display = "block";
        } else {
            div.style.display = "none";
        }
    }

    function search_group(div) {
        let input = document.getElementById('groupSearch' + div).value
        input = input.toLowerCase();
        let x = document.getElementsByClassName('groupSearchItem' + div);

        for (i = 0; i < x.length; i++) {
            if (!x[i].innerHTML.toLowerCase().includes(input)) {
                x[i].style.display = "none";
            } else {
                x[i].style.display = "block";
            }
        }
    }

</script>

<?php include("../parts/footer.php"); ?>
