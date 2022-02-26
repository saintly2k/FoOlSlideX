<?php

$id = mysqli_real_escape_string($conn, $_GET["id"]);
$manga = $conn->query("SELECT * FROM `project` WHERE `id`='$id' LIMIT 1");
$manga = mysqli_fetch_assoc($manga);

if(!empty($manga["id"])) {
    
    if(empty($manga["description"])) {
        $manga["description"] = $lang["manga"]["desc_empty"];
    }
    
    if(empty($manga["raw"])) {
        $manga["raw"] = $lang["manga"]["raw_no"];
    } else {
        $manga["raw"] = "<a href='".$manga["raw"]."' target='_blank'>".$lang["manga"]["raw_yes"]."</a>";
    }
    
    if(empty($manga["official"])) {
        $manga["official"] = $lang["manga"]["official_no"];
    } else {
        $manga["raw"] = "<a href='".$manga["official"]."' target='_blank'>".$lang["manga"]["official_yes"]."</a>";
    }
    
    $bookmarked = $conn->query("SELECT * FROM `project_bookmarks` WHERE `user`='".$user["id"]."' LIMIT 1");
    if(mysqli_num_rows($bookmarked)==1) {
        $bookmarked = true;
    } else {
        $bookmarked = false;
    }
    
    $chapters = $conn->query("SELECT * FROM `chapter` WHERE `manga`='$id' ORDER BY `number` DESC");
    
    if(mysqli_num_rows($chapters)==0) {
        $bookmarkable = false;
    } else {
        $bookmarkable = true;
    }
    
    /* *********************************** */
    
    if(isset($_POST["add_bookmark"])) {
        $conn->query("INSERT INTO `project_bookmarks`(`manga`,`user`) VALUES('$id','".$user["id"]."')");
        redirect("");
    }
    
    if(isset($_POST["remove_bookmark"])) {
        $conn->query("DELETE FROM `project_bookmarks` WHERE `manga`='$id' AND `user`='".$user["id"]."'");
        redirect("");
    }

?>

<?= title($manga["title"]." (".$lang["manga"]["title"].")") ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= glyph("book",$lang["manga"]["title"]) ?> <?= $manga["title"] ?></h3>
    </div>
    <table class="table table-condensed">
        <tr>
            <td width="200px" rowspan="3"><img src='<?= $config["url"] ?>uploads/covers/<?= $id ?>.jpg' width='100%'></td>
            <th width="105px"><?= $lang["manga"]["description"] ?></th>
            <td><?= $manga["description"] ?></td>
        </tr>
        <tr>
            <th><?= $lang["manga"]["more"] ?></th>
            <td><?= $manga["raw"] ?>, <?= $manga["official"] ?></td>
        </tr>
        <tr>
            <th><?= $lang["manga"]["actions"]["title"] ?></th>
            <td>
                <form method="post" action="">
                    <?php if($user["level"]<=10) { ?>
                    <a href="?page=edit&type=manga&id=<?= $id ?>" class="btn btn-warning"><?= glyph("edit",$lang["manga"]["actions"]["edit"]) ?> <?= $lang["manga"]["actions"]["edit"] ?></a>
                    <a href="?page=new&action=chapter" class="btn btn-info"><?= glyph("edit",$lang["manga"]["actions"]["chapter"]) ?> <?= $lang["manga"]["actions"]["chapter"] ?></a>
                    <?php } ?>
                    <?php if($bookmarkable==true) { ?>
                    <?php if($bookmarked==false && $user["level"]<=30) { ?>
                    <button type="submit" name="add_bookmark" class="btn btn-success"><?= glyph("plus",$lang["manga"]["actions"]["bookmark"]) ?> <?= $lang["manga"]["actions"]["bookmark"] ?></button>
                    <?php } elseif($bookmarked==true) { ?>
                    <button type="submit" name="remove_bookmark" class="btn btn-danger"><?= glyph("minus",$lang["manga"]["actions"]["unbookmark"]) ?> <?= $lang["manga"]["actions"]["unbookmark"] ?></button>
                    <?php } else { ?>
                    <?= $lang["manga"]["actions"]["nonbookmark"] ?>
                    <?php } ?>
                    <?php } else { ?>
                    <?= $lang["manga"]["actions"]["unavailable"] ?>
                    <?php } ?>
                </form>
            </td>
        </tr>
    </table>
</div>

<?php } else { ?>

<?= title($lang["manga"]["error"]) ?>
<h2 class="text-center"><?= $lang["manga"]["error"] ?></h2>
<img src="<?= $config["url"].$config["404"] ?>" width="100%">

<?php } ?>
