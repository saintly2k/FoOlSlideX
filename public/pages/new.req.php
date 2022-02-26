<?php

$action = mysqli_real_escape_string($conn, $_GET["action"]);

if($action=="project") {
?>

<?php
    
    $m_latest = $conn->query("SELECT * FROM `project` ORDER BY `id` DESC LIMIT 1");
    $m_latest = mysqli_fetch_assoc($m_latest);
    if(empty($m_latest["id"])) {
        $m_latest["id"] = "0";
    }
    $m_latest["id"]++;
    $conn->query("ALTER TABLE `project` AUTO_INCREMENT=".$m_latest["id"].";");
    
    $target_file = $upload["cover_dir"].$m_latest["id"].".jpg";
    $error = false;
    $error_msg = "";
    
    if(isset($_POST["add_project"])) {
        $m_title = mysqli_real_escape_string($conn, $_POST["title"]);
        $m_description = mysqli_real_escape_string($conn, $_POST["description"]);
        $m_status = mysqli_real_escape_string($conn, $_POST["status"]);
        $m_raw = mysqli_real_escape_string($conn, $_POST["raw"]);
        $m_official = mysqli_real_escape_string($conn, $_POST["official"]);
        
        $check = $conn->query("SELECT * FROM `project` WHERE `title`='$m_title' LIMIT 1");
        if(mysqli_num_rows($check)==1) {
            $error = true;
            $error_msg = "Manga with that Name alraedy exists!";
        }
        
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["cover"]["tmp_name"]);
        if($check !== false) {
            $error_msg = "File is an image - " . $check["mime"] . ".";
            $error = false;
        } else {
            $error_msg = "File is not an image.";
            $error = true;
        }
        if($error==false) {
            if(move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file)) {
                // Success!
                if(empty($m_description)) {
                    $m_description = "NULL";
                } else {
                    $m_description = "'".$m_description."'";
                }
                if(empty($m_raw)) {
                    $m_raw = "NULL";
                } else {
                    $m_raw = "'".$m_raw."'";
                }
                if(empty($m_official)) {
                    $m_official = "NULL";
                } else {
                    $m_official = "'".$m_official."'";
                }
                $conn->query("INSERT INTO `project`(`title`,`description`,`status`,`raw`,`official`) VALUES('$m_title',$m_description,'$m_status',$m_raw,$m_official)");
                redirect("?page=manga&id=".$m_latest["id"]);
            } else {
                $error = true;
                $error_msg = "Sorry, there was an error uploading your file.";
            }
        }
        
        if($error==true) {
            echo $error_msg;
        }
    }
                        
?>

<?= title($lang["new"]["project"]["title"]) ?>

<form class="form-horizontal" method="post" name="add_project" action="" enctype="multipart/form-data">

    <div class="row">

        <div class="form-group">
            <label class="col-sm-3 control-label" for="title">*<?= $lang["new"]["project"]["form"]["title"] ?></label>
            <div class="col-sm-9">
                <input type="text" name="title" id="title" maxlength="250" required class="form-control" placeholder="<?= $lang["new"]["project"]["form"]["title_input"] ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label" for="cover">*<?= $lang["new"]["project"]["form"]["cover"] ?></label>
            <div class="col-sm-9">
                <input required type="file" name="cover" id="cover" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label" for="description"><?= $lang["new"]["project"]["form"]["description"] ?></label>
            <div class="col-sm-9">
                <textarea type="text" name="description" id="description" class="form-control" placeholder="<?= $lang["new"]["project"]["form"]["description_input"] ?>"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label" for="status">*<?= $lang["new"]["project"]["form"]["status"]["title"] ?></label>
            <div class="col-sm-9">
                <select required title="<?= $lang["new"]["project"]["form"]["status"]["select"] ?>" class="form-control selectpicker" name="status" id="status">
                    <option value="0" disabled selected><?= $lang["new"]["project"]["form"]["status"]["select"] ?></option>
                    <option value="0"><?= $lang["new"]["project"]["form"]["status"][0] ?></option>
                    <option value="1"><?= $lang["new"]["project"]["form"]["status"][1] ?></option>
                    <option value="2"><?= $lang["new"]["project"]["form"]["status"][2] ?></option>
                    <option value="3"><?= $lang["new"]["project"]["form"]["status"][3] ?></option>
                    <option value="4"><?= $lang["new"]["project"]["form"]["status"][4] ?></option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label" for="raw"><?= $lang["new"]["project"]["form"]["raw"] ?></label>
            <div class="col-sm-9">
                <input type="text" name="raw" id="raw" class="form-control" placeholder="<?= $lang["new"]["project"]["form"]["raw_input"] ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label" for="official"><?= $lang["new"]["project"]["form"]["official"] ?></label>
            <div class="col-sm-9">
                <input type="text" name="official" id="official" class="form-control" placeholder="<?= $lang["new"]["project"]["form"]["official_input"] ?>">
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-success col-sm-offset-3" type="submit" name="add_project"><?= $lang["new"]["project"]["form"]["submit"] ?></button>
        </div>

    </div>

</form>

<?php 
    
} elseif($action=="chapter") {

?>

<?= title($lang["new"]["chapter"]["title"]) ?>

<?php } else { ?>

No... that's not how it should go!

<?php } ?>
