<?php

$id = mysqli_real_escape_string($conn, $_GET["id"]);
$ruser = $conn->query("SELECT * FROM `user` WHERE `id`='$id' LIMIT 1");
$ruser = mysqli_fetch_assoc($ruser);
$comments3 = "69";

if(!empty($ruser["id"])) {

?>

<?= title($ruser["username"]." (".$lang["user"]["title"].")") ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= glyph("education",$lang["user"]["title"]) ?> <?= $ruser["username"] ?></h3>
    </div>
    <table class="table table-condensed">
        <tr>
            <td width="150px" rowspan="5"><img src='<?= $ruser["image"] ?>' width='100%' title='Logo of <?= $ruser["username"] ?>' alt='Logo of <?= $ruser["Username"] ?>' /></td>
            <th width="105px"><?= $lang["user"]["level"] ?></th>
            <td><?= convert_level($ruser["level"]) ?></td>
        </tr>
        <tr>
            <th><?= $lang["user"]["theme"] ?></th>
            <td><?= convert_theme($ruser["theme"]) ?></td>
        </tr>
        <tr>
            <th><?= $lang["user"]["bookmarks"] ?></th>
            <td><?php if($ruser["public_watchlist"]==1) { ?><a href="?page=bookmarks&id=<?= $ruser["id"] ?>"><?= $lang["user"]["bookmarks_1"] ?></a><?php } else { ?><?= $lang["user"]["bookmarks_2"] ?><?php } ?></td>
        </tr>
        <tr>
            <th><?= $lang["user"]["stats"] ?></th>
            <td><?= glyph("comment",$lang["user"]["stats_comments"]) ?> <?= $comments3 ?>
            </td>
        </tr>
    </table>
</div>

<?php } else { ?>

<?= title($lang["user"]["error"]) ?>
<h2 class="text-center"><?= $lang["user"]["error"] ?></h2>
<img src="<?= $config["404"] ?>" width="100%">

<?php } ?>
