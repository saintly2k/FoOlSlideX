<?php

require("../../requires.php");

$page = $lang["menu"]["add_new"];

if($loggedin==false) {
    header("Refresh: 0; url=../login");
}

$error = false;
$error_msg = "";

if(isset($_POST["add_manga"])) {
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
    $titlecheck = $conn->query("SELECT * FROM `titles` WHERE `title`='$m_title' LIMIT 1");
    $slug = generate_url();
    
    if(mysqli_num_rows($titlecheck)==1) {
        $error = true;
        $error_msg = $lang["errors"]["title_exists"];
    }
    
    if(empty($m_alt)) { $m_alt = "NULL"; } else { $m_alt = "'$m_alt'"; }
    if(empty($m_author)) { $m_author = "NULL"; } else { $m_author = "'$m_author'"; }
    if(empty($m_genre)) { $m_genre = "NULL"; } else { $m_genre = "'$m_genre'"; }
    if(empty($m_released)) { $m_released = "NULL"; } else { $m_released = "'$m_released'"; }
    if(empty($m_description)) { $m_description = "NULL"; } else { $m_description = "'$m_description'"; }
    if(empty($m_rawurl)) { $m_rawurl = "NULL"; } else { $m_rawurl = "'$m_rawurl'"; }
    if(empty($m_licensed)) { $m_licensed = "NULL"; } else { $m_licensed = "'$m_licensed'"; }
    if(empty($m_officialurl)) { $m_officialurl = "NULL"; } else { $m_officialurl = "'$m_officialurl'"; }
    
    if(isset($_FILES["cover"]["tmp_name"]) && !empty($_FILES["cover"]["tmp_name"])) {
        $filename = pathinfo($_FILES['cover']['name'], PATHINFO_FILENAME);
        $fileextension = pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION);
        $finalfile = $filename."-".$slug.".".$fileextension;
        $target_file = "../../data/covers/".$finalfile;

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["cover"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
        } else {
            $error = true;
            $error_msg = $lang["errors"]["unsupported_image"];
        }
    } else {
        $finalfile = "no-cover.jpg";
    }
    
    if($error==false) {
        $conn->query("INSERT INTO `titles`(`slug`,`title`,`cover`,`alt`,`author`,`genre`,`type`,`released`,`raw-status`,`scan-status`,`description`,`raw-url`,`licensed`,`official-url`) VALUES('$slug','$m_title','$finalfile',$m_alt,$m_author,$m_genre,'$m_type',$m_released,'$m_rawstatus','$m_scanstatus',$m_description,$m_rawurl,$m_licensed,$m_officialurl)");
        if(isset($_FILES["cover"]["tmp_name"])) {
            move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file);
        }
    }
    
}

include("../parts/header.php");

?>

<title><?= $lang["menu"]["add_new"]." :: ".$config["title"] ?></title>

<?php include("../parts/menu.php"); ?>

<?php if(!isset($_COOKIE[$config["title"]."_cookie-consent"]) || empty($_COOKIE[$config["title"]."_cookie-consent"])) { include("../parts/cookies.php"); } ?>

<?php if(!empty($error_msg)) { ?>
<div class="alert alert-warning alert-dismissible text-center" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong><?= $lang["login"]["error"] ?>:</strong> <?= $error_msg ?>
</div>
<?php } ?>
<div style="margin: 0 auto; width: 300px" id="login_container">
    <form method="post" id="login_form" name="add_manga" enctype="multipart/form-data">
        <h1 class="text-center"><?= $lang["menu"]["add_new"] ?></h1>
        <hr>
        <div class="form-group">
            <label for="manga_title"><?= $lang["add_manga"]["title"] ?></label>
            <input required tabindex="1" type="text" name="title" id="manga_title" class="form-control" placeholder="<?= $lang["add_manga"]["title"] ?>">
        </div>

        <div class="form-group">
            <label for="manga_cover" class="sr-"><?= $lang["add_manga"]["cover"] ?></label>
            <input tabindex="2" type="file" name="cover" id="manga_cover" class="form-control">
        </div>

        <div class="form-group">
            <label for="manga_alt"><?= $lang["add_manga"]["alt"] ?></label>
            <input tabindex="3" type="text" name="alt" id="manga_alt" class="form-control" placeholder="<?= $lang["add_manga"]["alt"] ?>">
        </div>

        <div class="form-group">
            <label for="manga_author"><?= $lang["add_manga"]["author"] ?></label>
            <input tabindex="4" type="text" name="author" id="manga_author" class="form-control" placeholder="<?= $lang["add_manga"]["author"] ?>">
        </div>

        <div class="form-group">
            <label for="manga_genre"><?= $lang["add_manga"]["genre"] ?></label>
            <input tabindex="5" type="text" name="genre" id="manga_genre" class="form-control" placeholder="<?= $lang["add_manga"]["genre"] ?>">
        </div>

        <div class="form-group">
            <label for="manga_raw-status"><?= $lang["add_manga"]["type"] ?></label>
            <select required tabindex="6" class="selectpicker form-control" name="type" id="manga_type">
                <option value="<?= $lang["add_manga"]["manga"] ?>" selected><?= $lang["add_manga"]["type_manga"] ?></option>
                <option value="<?= $lang["add_manga"]["manwha"] ?>"><?= $lang["add_manga"]["type_manwha"] ?></option>
                <option value="<?= $lang["add_manga"]["manhua"] ?>"><?= $lang["add_manga"]["type_manhua"] ?></option>
            </select>
        </div>

        <div class="form-group">
            <label for="manga_released"><?= $lang["add_manga"]["released"] ?></label>
            <input tabindex="7" type="number" name="released" id="manga_released" class="form-control" placeholder="<?= $lang["add_manga"]["released"] ?>">
        </div>

        <div class="form-group">
            <label for="manga_raw-status"><?= $lang["add_manga"]["raw-st"] ?></label>
            <select tabindex="8" class="selectpicker form-control" name="raw-status" id="manga_raw-status">
                <option value="1" selected><?= $lang["add_manga"]["rawst"][1] ?></option>
                <option value="2"><?= $lang["add_manga"]["rawst"][2] ?></option>
                <option value="3"><?= $lang["add_manga"]["rawst"][3] ?></option>
                <option value="4"><?= $lang["add_manga"]["rawst"][4] ?></option>
                <option value="5"><?= $lang["add_manga"]["rawst"][5] ?></option>
                <option value="5"><?= $lang["add_manga"]["rawst"][6] ?></option>
            </select>
        </div>

        <div class="form-group">
            <label for="manga_scan-status"><?= $lang["add_manga"]["status"] ?></label>
            <select required tabindex="9" class="selectpicker form-control" name="scan-status" id="manga_scan-status">
                <option value="1"><?= $lang["add_manga"]["scanst"][1] ?></option>
                <option value="2" selected><?= $lang["add_manga"]["scanst"][2] ?></option>
                <option value="3"><?= $lang["add_manga"]["scanst"][3] ?></option>
                <option value="4"><?= $lang["add_manga"]["scanst"][4] ?></option>
                <option value="5"><?= $lang["add_manga"]["scanst"][5] ?></option>
            </select>
        </div>

        <div class="form-group">
            <label for="manga_description"><?= $lang["add_manga"]["descript"] ?></label>
            <textarea tabindex="10" type="text" name="description" id="manga_description" class="form-control" placeholder="<?= $lang["add_manga"]["descript"] ?>" style="max-width:100%; height:200px"></textarea>
        </div>

        <div class="form-group">
            <label for="manga_raw-url"><?= $lang["add_manga"]["raw-url"] ?></label>
            <input tabindex="11" type="text" name="raw-url" id="manga_raw-url" class="form-control" placeholder="<?= $lang["add_manga"]["raw-url"] ?>">
        </div>

        <div class="form-group">
            <label for="manga_licensed"><?= $lang["add_manga"]["licensed"] ?></label>
            <input tabindex="12" type="text" name="licensed" id="manga_licensed" class="form-control" placeholder="<?= $lang["add_manga"]["licensed"] ?>">
        </div>

        <div class="form-group">
            <label for="manga_official-url"><?= $lang["add_manga"]["official"] ?></label>
            <input tabindex="13" type="text" name="official-url" id="manga_official-url" class="form-control" placeholder="<?= $lang["add_manga"]["official"] ?>">
        </div>

        <p><i><?= $lang["add_manga"]["required"] ?></i></p>
        <button tabindex="14" class="btn btn-lg btn-success btn-block" type="submit" id="login_button" name="add_manga"><?= glyph("plus",$lang["add_manga"]["add"]) ?> <?= $lang["add_manga"]["add"] ?></button>
    </form>
</div>

<?php include("../parts/footer.php"); ?>
