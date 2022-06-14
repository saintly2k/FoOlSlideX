<?php

// Note to my future self: Someday I'll need to make this proccess automated...

require("../../requires.php");

$slug = mysqli_real_escape_string($conn, $_GET["id"]);
$group = $conn->query("SELECT * FROM `groups` WHERE `slug`='$slug' LIMIT 1")->fetch_assoc();

$releases = $conn->query("SELECT * FROM `chapters` WHERE `group`='".$group["id"]."' ORDER BY `id` DESC");

$page = $group["name"];

include("../parts/header.php");

?>

<title><?= $group["name"]." :: ".$config["title"] ?></title>

<?php include("../parts/menu.php"); ?>

<?php if(!isset($_COOKIE[$config["cookie"]."_cookie-consent"]) || empty($_COOKIE[$config["cookie"]."_cookie-consent"])) { include("../parts/cookies.php"); } ?>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= glyph("education",$lang["groups"]["group"]) ?> <b><?= $group["name"] ?></b> <span class="label label-success"></h3>
            </div>
            <?php if(!empty($group["image"])) { ?>
            <img src="<?= $group["image"] ?>" width="100%" alt="<?= $group["name"] ?>'s Banner" title="<?= $group["name"] ?>'s Banner">
            <?php } ?>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= glyph("info-sign",$lang["groups"]["infos"]) ?> <?= $lang["groups"]["infos"] ?></h3>
            </div>
            <div class="panel-body">
                <b><?= $lang["groups"]["short2"] ?>:</b> <?= $group["short"] ?><br>
                <b><?= $lang["groups"]["founded2"] ?>:</b> <?= $group["founded"] ?> (yyyy-mm-dd hh:mm:ss)<br>
                <b><?= $lang["groups"]["links"] ?>:</b>
                <?php if(!empty($group["website"])) { ?><a href="<?= $group["website"] ?>" target="_blank"><?= glyph("globe","Website") ?> Website</a><?php } ?>
                <?php if(!empty($group["irc"])) { ?><a href="irc://<?= $group["irc"] ?>" target="_blank"><?= glyph("transfer","IRC") ?> IRC</a><?php } ?>
                <?php if(!empty($group["mangadex"])) { ?><a href="<?= $group["mangadex"] ?>" target="_blank"><?= glyph("book","MangaDex") ?> MangaDex</a><?php } ?>
                <?php if(!empty($group["email"])) { ?><a href="mailto:<?= $group["email"] ?>" target="_blank"><?= glyph("envelope","eMail") ?> eMail</a><?php } ?>
                <?php if(empty($group["discord"]) && empty($group["website"]) && empty($group["irc"]) && empty($group["email"])) { ?>---<?php } ?><br>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= glyph("info-sign",$lang["groups"]["about2"]) ?> <?= $lang["groups"]["about2"] ?></h3>
            </div>
            <div class="panel-body">
                <?php if(!empty($group["about"])) { ?>
                <?= bbconvert($group["about"]) ?>
                <?php } else { ?>
                ----
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= glyph("list",$lang["groups"]["releases"]) ?> <?= $lang["groups"]["releases"] ?></h3>
            </div>
            <?php if(mysqli_num_rows($releases)!=0) { ?>
            <div class="table-responsive" id="latest-titles">
                <table class="table table-hover table-striped">
                    <thead>
                        <th style="width:5%"><?= $lang["home"]["type"] ?></th>
                        <th style="width:5%"><?= $lang["home"]["chapter"] ?></th>
                        <th style="width:25%;"><?= $lang["home"]["chap_title"] ?></th>
                        <th style="width:25%"><?= $lang["home"]["title"] ?></th>
                        <th class="text-center" style="width:5%"><?= $lang["home"]["group"] ?></th>
                        <th class="text-center" style="width:10%"><?= $lang["home"]["uploader"] ?></th>
                        <th class="text-right" style="width:20%"><?= $lang["home"]["added"] ?></th>
                    </thead>
                    <tbody>
                        <?php foreach($releases as $chapter) { ?>
                        <tr>
                            <td>
                                <?php $mng = $conn->query("SELECT * FROM `titles` WHERE `id`='".$chapter["mid"]."' LIMIT 1"); $mng = mysqli_fetch_assoc($mng); ?>
                                <?php if($mng["type"]==$lang["add_manga"]["manga"]) { ?>
                                <span class="label label-primary"><?= $lang["add_manga"]["manga"] ?></span>
                                <?php } elseif($mng["type"]==$lang["add_manga"]["manwha"]) { ?>
                                <span class="label label-success"><?= $lang["add_manga"]["manwha"] ?></span>
                                <?php } else { ?>
                                <span class="label label-info"><?= $lang["add_manga"]["manhua"] ?></span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if(isset($_COOKIE[$config["cookie"]."_chapter-".$chapter["slug"]]) && $_COOKIE[$config["cookie"]."_chapter-".$chapter["slug"]]==$chapter["slug"]) echo glyph("bookmark","Bookmarked"); ?>
                                <a href="<?= $config["url"] ?>chapter/<?= $chapter["slug"] ?>">
                                    <?php if(empty($chapter["volume"]) && empty($chapter["chapter"])) { ?>
                                    <?= $lang["chapter"]["oneshot"] ?>
                                    <?php } elseif(empty($chapter["volume"]) && !empty($chapter["chapter"])) { ?>
                                    Ch. <?= $chapter["chapter"] ?>
                                    <?php } else { ?>
                                    Vol. <?= $chapter["volume"] ?> Ch. <?= $chapter["chapter"] ?>
                                    <?php } ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?= $config["url"] ?>chapter/<?= $chapter["slug"] ?>">
                                    <?php if(empty($chapter["title"])) { ?>
                                    <?= $lang["manga"]["unknown"] ?>
                                    <?php } else { ?>
                                    <?= $chapter["title"] ?>
                                    <?php } ?>
                                </a>
                                <?php if($loggedin==true) { ?>
                                <a href="<?= $config["url"] ?>admin/edit_chapter/<?= $chapter["slug"] ?>">
                                    <span class="badge"><?= glyph("pencil",$lang["manga"]["edit_chap"]) ?> <?= $lang["manga"]["edit_chap"] ?></span>
                                </a>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if(isset($_COOKIE[$config["cookie"]."_bookmark-".$mng["slug"]]) && $_COOKIE[$config["cookie"]."_bookmark-".$mng["slug"]]==$mng["slug"]) echo glyph("bookmark","Bookmarked"); ?>
                                <a href="<?= $config["url"] ?>manga/<?= $mng["slug"] ?>">
                                    <?= $mng["title"] ?>
                                </a>
                            </td>
                            <td class="text-center">
                                <?php $group = $conn->query("SELECT * FROM `groups` WHERE `id`='".$chapter["group"]."' LIMIT 1")->fetch_assoc(); ?><a href="<?= $config["url"] ?>group/<?= $group["slug"] ?>"><?= $group["short"] ?></a>
                            </td>
                            <td class="text-center">
                                <?php $uploader = $conn->query("SELECT * FROM `user` WHERE `id`='".$chapter["user"]."' LIMIT 1")->fetch_assoc(); echo $uploader["username"]; ?>
                            </td>
                            <td class="text-right"><?= $chapter["added"] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php } else { ?>
                <div class="panel-body">
                    <?= $lang["groups"]["no_releas"] ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php include("../parts/footer.php"); ?>
