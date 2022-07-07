<?php

require("../../requires.php");

$page = $lang["menu"]["groups"];

include("../parts/header.php");

$can_activate = false;

if(($user["level"]==1 || $user["level"]==2) && $user["active"]==true) {
    $can_activate = true;
    $req_groups = $conn->query("SELECT * FROM `groups` WHERE `approved`='0' ORDER BY `name` ASC");
}

$groups = $conn->query("SELECT * FROM `groups` WHERE `approved`='1' ORDER BY `name` ASC");

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
        <hr style="opacity: 0">
    </div>

    <div class="col-sm-12">
        <?php foreach($groups as $g) { ?>
        <div class="well well-sm" style="background:url('<?= $g["image"] ?>'); background-position: center; background-repeat: no-repeat; background-size: cover; border-radius: 5px;">
            <span class="image-shadow">
                <b><a href="<?= $config["url"] ?>group/<?= $g["slug"] ?>" style="color:black"><?= $g["name"] ?></a></b>
            </span>
            <span class="text-right image-shadow">
                <?php if(!empty ($g["website"])) { ?><a href="<?= $g["website"] ?>" target="_blank" style="color:black"><?= glyph("globe", $lang["group"]["website"]) ?></a><?php } ?>
                <?php if(!empty ($g["irc"])) { ?><a href="irc://<?= $g["irc"] ?>" target="_blank" style="color:black"><?= glyph("transfer", $lang["group"]["irc"]) ?></a><?php } ?>
                <?php if(!empty ($g["mangadex"])) { ?><a href="<?= $g["mangadex"] ?>" target="_blank" style="color:black"><?= glyph("book", $lang["group"]["mangadex"]) ?></a><?php } ?>
                <?php if(!empty ($g["email"])) { ?><a href="mailto:<?= $g["email"] ?>" target="_blank" style="color:black"><?= glyph("envelope", $lang["group"]["email"]) ?></a><?php } ?>
            </span>
        </div>
        <?php } ?>
        <?php if($can_activate==true) { ?>
        <h3 class="text-center">Unapproved</h3>
        <?php foreach($req_groups as $g) { ?>
        <div class="well well-sm" style="background:url('<?= $g["image"] ?>'); background-position: center; background-repeat: no-repeat; background-size: cover; border-radius: 5px;">
            <span class="image-shadow">
                <b><a href="<?= $config["url"] ?>group/<?= $g["slug"] ?>" style="color:black" target="_blank"><?= $g["name"] ?></a></b>
            </span>
            <span class="text-right image-shadow">
                <?php if(!empty ($g["website"])) { ?><a href="<?= $g["website"] ?>" target="_blank" style="color:black"><?= glyph("globe", $lang["group"]["website"]) ?></a><?php } ?>
                <?php if(!empty ($g["irc"])) { ?><a href="irc://<?= $g["irc"] ?>" target="_blank" style="color:black"><?= glyph("transfer", $lang["group"]["irc"]) ?></a><?php } ?>
                <?php if(!empty ($g["mangadex"])) { ?><a href="<?= $g["mangadex"] ?>" target="_blank" style="color:black"><?= glyph("book", $lang["group"]["mangadex"]) ?></a><?php } ?>
                <?php if(!empty ($g["email"])) { ?><a href="mailto:<?= $g["email"] ?>" target="_blank" style="color:black"><?= glyph("envelope", $lang["group"]["email"]) ?></a><?php } ?>
            </span>
        </div>
        <?php } ?>
        <span class="text-center"><i><?= $lang["group"]["approve"]["notice"] ?></i></span>
        <?php } ?>
    </div>
</div>

<?php include("../parts/footer.php"); ?>
