<?php

require("../../requires.php");

$page = $lang["menu"]["statics"];

if($loggedin==false || ($user["level"]!=1 && $user["level"]!=2) || $user["active"]==0) {
    header("Refresh: 0; url=../../");
}

$statics = $conn->query("SELECT * FROM `statics` ORDER BY `created` ASC");

$error = false;
$error_msg = "";

if(isset($_POST["edit_static"])) {
    $s_id = mysqli_real_escape_string($conn, $_POST["id"]);
    $s_old_name = mysqli_real_escape_string($conn, $_POST["old_name"]);
    $s_old_title = mysqli_real_escape_string($conn, $_POST["old_title"]);
    $s_name = mysqli_real_escape_string($conn, $_POST["name"]);
    $s_title = mysqli_real_escape_string($conn, $_POST["title"]);
    if(isset($_POST["private"])) { $s_private = mysqli_real_escape_string($conn, $_POST["private"]); } else { $s_private = "1"; }
    
    if($s_old_name==$s_name) { $s_name = "waiufbsuigvisvzogbsbvsdb"; $cname = true; } else { $cname = false; }
    if($s_old_title==$s_title) { $s_title = "waiufbsuigvisvzogbsbvsdb"; $ctitle = true; } else { $ctitle = false; }
    $check = $conn->query("SELECT * FROM `statics` WHERE `name`='$s_name' OR `title`='$s_title'");
    if($cname==true) $s_name = $s_old_name;
    if($ctitle==true) $s_title = $s_old_title;
    
    if(mysqli_num_rows($check)==1) {
        $error = true;
        $error_msg = $lang["errors"]["exising_item"];
    }
    
    if($error==false) {
        rename("../statics/$s_old_name.html", "../statics/$s_name.html");
        $conn->query("UPDATE `statics` SET `name`='$s_name', `title`='$s_title', `public`='$s_private' WHERE `id`='$s_id'");
        $conn->query("UPDATE `display` SET `item`='s/$s_name', `text`='$s_title' WHERE `item`='s/$s_old_name'");
        header("Refresh: 0");
    }
}

if(isset($_POST["add_static"])) {
    $s_name = mysqli_real_escape_string($conn, $_POST["name"]);
    $s_title = mysqli_real_escape_string($conn, $_POST["title"]);
    if(isset($_POST["menu"])) {
        $s_menu = mysqli_real_escape_string($conn, $_POST["menu"]);
        $s_icon = mysqli_real_escape_string($conn, $_POST["icon"]);
    } else {
        $s_menu = "0";
        $s_icon = "";
    }
    if(isset($_POST["private"])) { $s_private = mysqli_real_escape_string($conn, $_POST["private"]); } else { $s_private = "1"; }
    
    $check = $conn->query("SELECT * FROM `statics` WHERE `name`='$s_name' OR `title`='$s_title' LIMIT 1");
    
    if(mysqli_num_rows($check)==1) {
        $error = true;
        $error_msg = $lang["errors"]["exising_item"];
    }
    
    if($error==false) {
        $file = fopen("../statics/$s_name.html", "w") or die("could not create file. check permissions and set to 755");
        fwrite($file, date('Y/m/d H:i:s'));
        fclose($file);
        $conn->query("INSERT INTO `statics`(`name`,`title`,`public`) VALUES('$s_name', '$s_title', '$s_private')");
        if($s_menu==true) {
            $lmi = $conn->query("SELECT * FROM `display` ORDER BY `order` DESC LIMIT 1")->fetch_assoc();
            $lmi = $lmi["order"];
            $lmi++;
            $conn->query("INSERT INTO `display`(`order`,`item`,`text`,`icon`,`displayed`,`hidden`) VALUES('$lmi', 's/$s_name', '$s_title', '$s_icon', '1', '0')");
        }
        header("Refresh: 0");
    }
}

if(isset($_POST["delete_static"])) {
    $sid = mysqli_real_escape_string($conn, $_POST["id"]);
    $sname = mysqli_real_escape_string($conn, $_POST["name"]);
    
    unlink("../statics/$sname.html");
    $conn->query("DELETE FROM `display` WHERE `item`='s/$sname'");
    $conn->query("DELETE FROM `statics` WHERE `id`='$sid'");
    
    
    header("Refresh: 0");
}

include("../parts/header.php");

?>

<title><?= $lang["menu"]["statics"]." :: ".$config["title"] ?></title>

<?php include("../parts/menu.php"); ?>

<?php if(!isset($_COOKIE[$config["cookie"]."_cookie-consent"]) || empty($_COOKIE[$config["cookie"]."_cookie-consent"])) { include("../parts/cookies.php"); } ?>

<?php if(!empty($error_msg)) { ?>
<div class="alert alert-warning alert-dismissible text-center" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong><?= $lang["login"]["error"] ?>:</strong> <?= $error_msg ?>
</div>
<?php } ?>
<div style="margin: 0 auto; width: 800px" id="login_container">
    <?php foreach($statics as $s) { ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <form method="post" name="edit_static">
                    <input type="number" name="id" value="<?= $s["id"] ?>" style="display: none" readonly>
                    <input type="text" name="old_name" value="<?= $s["name"] ?>" style="display: none" readonly>
                    <input type="text" name="old_title" value="<?= $s["title"] ?>" style="display: none" readonly>
                    <div class="col-sm-3">
                        <input required type="text" name="name" title="<?= $lang["statics"]["name"] ?>" class="form-control" placeholder="<?= $lang["statics"]["name"] ?>" value="<?= $s["name"] ?>" maxlength="20">
                    </div>
                    <div class="col-sm-3">
                        <input required type="text" name="title" title="<?= $lang["statics"]["title"] ?>" class="form-control" placeholder="<?= $lang["statics"]["title"] ?>" value="<?= $s["title"] ?>" maxlength="20">
                    </div>
                    <div class="col-sm-2">
                        <div class="checkbox">
                            <label title="<?= $lang["statics"]["private"] ?>">
                                <input type="checkbox" name="private" <?php if($s["public"]==false) echo "checked"; ?> value="0"> <?= $lang["statics"]["private"] ?>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <button type="submit" name="edit_static" class="btn btn-success btn-block"><?= glyph("floppy-disk", $lang["edit_title"]["save"]) ?></button>
                    </div>
                </form>
                <div class="col-sm-2">
                    <a href="#" class="btn btn-info btn-block" onclick="window.open('<?= $config["url"] ?>admin/editor?type=static&file=<?= $s["name"] ?>','name','width=1000,height=800')"><?= glyph("pencil",$lang["editor"]["edit"]) ?></a>
                </div>
                <div class="col-sm-1">
                    <form method="post" name="delete_static">
                        <input type="number" name="id" class="form-control" style="display: none" value="<?= $s["id"] ?>">
                        <input type="text" name="name" class="form-control" style="display: none" value="<?= $s["name"] ?>">
                        <button type="submit" name="delete_static" class="btn btn-danger btn-block" onclick="return confirmDel()"><?= glyph("remove",$lang["editor"]["delete"]) ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="panel panel-success">
        <div class="panel-body">
            <form name="add_static" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <input required type="text" class="form-control" name="name" placeholder="<?= $lang["statics"]["name"] ?>" maxlength="20">
                    </div>
                    <div class="col-sm-6">
                        <input required type="text" class="form-control" name="title" placeholder="<?= $lang["statics"]["title"] ?>" maxlength="20"><br>
                    </div>
                    <div class="col-sm-4">
                        <div class="checkbox">
                            <label onchange="toggleVisibility('crmitem')">
                                <input type="checkbox" name="menu" checked value="1"> <?= $lang["statics"]["menu"] ?>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="private" value="0"> <?= $lang["statics"]["private"] ?>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-success btn-block" name="add_static"><?= glyph("plus", $lang["statics"]["create"]) ?> <?= $lang["statics"]["create"] ?></button><br>
                    </div>
                    <div class="col-sm-4" id="crmitem" style="display: block">
                        <input type="text" name="icon" class="form-control" placeholder="<?= $lang["display"]["icon"] ?>" maxlength="20">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
</div>

<script>
    function toggleVisibility(item) {
        var i1 = document.getElementById(item);

        if (i1.style.display == "block") {
            i1.style.display = "none";
        } else {
            i1.style.display = "block";
        }
    }

    function confirmDel() {
        let isExecuted = confirm("<?= $lang["statics"]["delete"] ?>");

        return isExecuted; // OK = true, Cancel = false
    }

</script>

<?php include("../parts/footer.php"); ?>
