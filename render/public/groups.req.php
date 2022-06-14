<?php

require("../../requires.php");

$page = $lang["menu"]["groups"];

include("../parts/header.php");

$groups = $conn->query("SELECT * FROM `groups` ORDER BY `name` ASC");

?>

<title><?= $lang["menu"]["groups"]." :: ".$config["title"] ?></title>

<?php include("../parts/menu.php"); ?>

<?php if(!isset($_COOKIE[$config["cookie"]."_cookie-consent"]) || empty($_COOKIE[$config["cookie"]."_cookie-consent"])) { include("../parts/cookies.php"); } ?>

<div class="row">
    <div class="col-sm-12 text-center">
        <h2 class="text-center"><?= $lang["menu"]["groups"] ?></h2>
        <?php if($user["level"]==1 || $user["level"]==2) { ?>
        <a href="<?= $config["url"] ?>admin/add_group" class="btn btn-success"><?= glyph("plus-sign",$lang["groups"]["add_group"]) ?> <?= $lang["groups"]["add_group"] ?></a>
        <?php } elseif($user["level"]==3) { ?>
        <a href="<?= $config["url"] ?>admin/add_group" class="btn btn-success"><?= glyph("plus-sign",$lang["groups"]["req_group"]) ?> <?= $lang["groups"]["req_group"] ?></a>
        <?php } ?>
    </div>

    <div class="col-sm-12">
        <?php foreach($groups as $g) { ?>
        <div class="well well-sm" style="background:url('<?= $row["banner"] ?>');background-position: center;background-repeat: no-repeat;background-size: cover;">
            <span class="image-shadow"><b><a href="<?= $config["url"] ?>gruppe/<?= $row["id"] ?>" style="color:black"><?= $row["name"] ?></a></b></span> <span class="label label-success"><?= glyph("thumbs-up",$likes["total"]." Likes") ?> <?= $likes["total"] ?></span> <span class="label label-success"><?= glyph("comment",$comments["total"]." Kommentare") ?> <?= $comments["total"] ?></span> <span class="text-right image-shadow">
                <?php if(!empty ($row["discord"])) { ?><a href="<?= $row["discord"] ?>" target="_blank" style="color:black"><?= glyph("comment","Discord") ?></a><?php } ?>
                <?php if(!empty ($row["website"])) { ?><a href="<?= $row["website"] ?>" target="_blank" style="color:black"><?= glyph("globe","Website") ?></a><?php } ?>
                <?php if(!empty ($row["irc"])) { ?><a href="irc://<?= $row["irc"] ?>" target="_blank" style="color:black"><?= glyph("tags","IRC") ?></a><?php } ?>
                <?php if(!empty ($row["email"])) { ?><a href="mailto:<?= $row["email"] ?>" target="_blank" style="color:black"><?= glyph("envelope","eMail") ?></a><?php } ?>
            </span>
        </div>
        <?php } ?>
    </div>
</div>

<?php include("../parts/footer.php"); ?>
