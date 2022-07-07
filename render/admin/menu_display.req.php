<?php

require("../../requires.php");

$page = $lang["menu"]["menu_dis"];

if($loggedin==false || $user["level"]!=1 || $user["active"]==0) {
    header("Refresh: 0; url=../../");
}

$error = false;
$error_msg = "";

if(isset($_POST["edit_display"])) {
    $d_id = mysqli_real_escape_string($conn, $_POST["id"]);
    $d_old = mysqli_real_escape_string($conn, $_POST["old"]);
    $d_item = mysqli_real_escape_string($conn, $_POST["item"]);
    $d_text = mysqli_real_escape_string($conn, $_POST["text"]);
    $d_icon = mysqli_real_escape_string($conn, $_POST["icon"]);
    $d_order = mysqli_real_escape_string($conn, $_POST["order"]);
    if(isset($_POST["displayed"])) { $d_displayed = mysqli_real_escape_string($conn, $_POST["displayed"]); }
    if(isset($_POST["hidden"])) { $d_hidden = mysqli_real_escape_string($conn, $_POST["hidden"]); }
    
    
    if(empty($d_displayed)) $d_displayed = 0;
    if(empty($d_hidden)) $d_hidden = 0;
    
    if($d_item==$d_old) { $d_item = "aioufgxvxkcjbsdfigwoh"; $changeditem = true; } else { $changeditem = false; }
    if(empty($d_text)) { $d_text = "aiofgkgvbbxvbxcmbsvigqwuifg"; $changedtext = true; } else { $changedtext = false; }
    $check = $conn->query("SELECT * FROM `display` WHERE `item`='$d_item' OR `text`='$d_text' LIMIT 1");
    if($changeditem==true) { $d_item = $d_old; }
    if($changedtext==true) { $d_text = ""; }
    
    if(mysqli_num_rows($check)==1) {
        $error = true;
        $error_msg = $lang["errors"]["exising_item"];
    }
    
    if($error==false) {
        $conn->query("UPDATE `display` SET `order`='$d_order', `item`='$d_item', `text`='$d_text', `icon`='$d_icon', `displayed`='$d_displayed', `hidden`='$d_hidden' WHERE `id`='$d_id'");
        header("Refresh: 0");
    }
}

if(isset($_POST["add_display"])) {
    $d_item = mysqli_real_escape_string($conn, $_POST["item"]);
    $d_text = mysqli_real_escape_string($conn, $_POST["text"]);
    $d_icon = mysqli_real_escape_string($conn, $_POST["icon"]);
    $d_order = mysqli_real_escape_string($conn, $_POST["order"]);
    $d_displayed = mysqli_real_escape_string($conn, $_POST["displayed"]);
    $d_hidden = mysqli_real_escape_string($conn, $_POST["hidden"]);
    
    if(empty($d_displayed)) $d_displayed = 0;
    if(empty($d_hidden)) $d_hidden = 0;
    
    if(empty($d_text)) { $d_text = "aiofgkgvbbxvbxcmbsvigqwuifg"; $changedtext = true; } else { $changedtext = false; }
    $check = $conn->query("SELECT * FROM `display` WHERE `item`='$d_item' OR `text`='$d_text' LIMIT 1");
    if($changedtext==true) { $d_text = ""; }
    
    if(mysqli_num_rows($check)==1) {
        $error = true;
        $error_msg = $lang["errors"]["exising_item"];
    }
    
    if($error==false) {
        $conn->query("INSERT INTO `display`(`order`,`item`,`text`,`icon`,`displayed`,`hidden`) VALUES('$d_order', '$d_item', '$d_text', '$d_icon', '$d_displayed', '$d_hidden')");
        header("Refresh: 0");
    }
}

if(isset($_POST["delete_display"])) {
    $d_id = mysqli_real_escape_string($conn, $_POST["id"]);
    
    $conn->query("DELETE FROM `display` WHERE `id`='$d_id'");
    header("Refresh: 0");
}

include("../parts/header.php");

?>

<title><?= $lang["menu"]["menu_dis"]." :: ".$config["title"] ?></title>

<?php include("../parts/menu.php"); ?>

<?php if(!isset($_COOKIE[$config["cookie"]."_cookie-consent"]) || empty($_COOKIE[$config["cookie"]."_cookie-consent"])) { include("../parts/cookies.php"); } ?>

<a href="" target="_blank">
    <div class="alert alert-info text-center" role="alert">
        <b>
            <?= $lang["display"]["notice"] ?>
        </b>
    </div>
</a>

<?php if(!empty($error_msg)) { ?>
<div class="alert alert-warning alert-dismissible text-center" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong><?= $lang["login"]["error"] ?>:</strong> <?= $error_msg ?>
</div>
<?php } ?>
<div style="margin: 0 auto; width: 600px" id="login_container">
    <h1 class="text-center"><?= $lang["menu"]["menu_dis"] ?></h1>
    <hr>

    <?php $c = 1; foreach($d as $i) { ?>
    <div class="form-group panel panel-default">
        <div class="panel-body">
            <form name="edit_display" method="post">
                <div class="row">
                    <div class="form-group">
                        <input type="number" required name="id" value="<?= $i["id"] ?>" style="display: none" class="form-control" readonly>
                        <input type="text" required name="old" value="<?= $i["item"] ?>" style="display: none" class="form-control" readonly>
                        <div class="col-sm-4">
                            <input type="text" required name="item" value="<?= $i["item"] ?>" class="form-control" title="<?= $lang["display"]["item"] ?>" placeholder="<?= $lang["display"]["item"] ?>" maxlength="20">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="text" value="<?= $i["text"] ?>" class="form-control" title="<?= $lang["display"]["text"] ?>" placeholder="<?= $lang["display"]["text"] ?>" maxlength="20">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" required name="icon" value="<?= $i["icon"] ?>" class="form-control" title="<?= $lang["display"]["icon"] ?>" placeholder="<?= $lang["display"]["icon"] ?>" maxlength="20"><br>
                        </div>
                        <div class="col-sm-3">
                            <input type="number" required name="order" value="<?= $i["order"] ?>" class="form-control" title="<?= $lang["display"]["order"] ?>">
                        </div>
                        <div class="col-sm-3">
                            <div class="checkbox">
                                <label title="<?= $lang["display"]["displayed"] ?>">
                                    <input type="checkbox" <?php if($i["displayed"]==true) echo "checked"; ?> name="displayed" value="1"> <?= $lang["display"]["displayed"] ?>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="checkbox">
                                <label title="<?= $lang["display"]["hidden"] ?>">
                                    <input type="checkbox" <?php if($i["hidden"]==true) echo "checked"; ?> name="hidden" value="1"> <?= $lang["display"]["hidden"] ?>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-success" type="submit" name="edit_display" style="width: 47%"><?= glyph("pencil",$lang["edit_title"]["save"]) ?></button>
                            <button class="btn btn-danger" type="submit" onclick="return confirmDel()" name="delete_display" style="width: 47%"><?= glyph("remove",$lang["edit_title"]["delete"]) ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php $c++; } ?>
    <hr>
    <div class="form-group panel panel-success">
        <div class="panel-body">
            <form name="add_display" method="post">
                <div class="row">
                    <div class="col-sm-4">
                        <input type="text" required name="item" class="form-control" title="<?= $lang["display"]["item"] ?>" placeholder="<?= $lang["display"]["item"] ?>" maxlength="20">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="text" class="form-control" title="<?= $lang["display"]["text"] ?>" placeholder="<?= $lang["display"]["text"] ?>" maxlength="20">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" required name="icon" class="form-control" title="<?= $lang["display"]["icon"] ?>" placeholder="<?= $lang["display"]["icon"] ?>" maxlength="20"><br>
                    </div>
                    <div class="col-sm-3">
                        <input type="number" required value="<?php $i["order"]++; echo $i["order"] ?>" name="order" class="form-control" title="<?= $lang["display"]["order"] ?>">
                    </div>
                    <div class="col-sm-3">
                        <div class="checkbox">
                            <label title="<?= $lang["display"]["displayed"] ?>">
                                <input type="checkbox" name="displayed" value="1"> <?= $lang["display"]["displayed"] ?>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="checkbox">
                            <label title="<?= $lang["display"]["hidden"] ?>">
                                <input type="checkbox" name="hidden" value="1"> <?= $lang["display"]["hidden"] ?>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-success btn-block" type="submit" name="add_display"><?= glyph("plus",$lang["home"]["added"]) ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function confirmDel() {
        let isExecuted = confirm("<?= $lang["display"]["delete"] ?>");

        return isExecuted; // OK = true, Cancel = false
    }

</script>

<?php include("../parts/footer.php"); ?>
