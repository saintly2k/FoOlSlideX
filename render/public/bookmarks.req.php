<?php

// Note to my future self: Someday I'll need to make this proccess automated...

require("../../requires.php");

$page = $lang["menu"]["bookmarks"];

include("../parts/header.php");

$titles = $conn->query("SELECT * FROM `titles` ORDER BY `title` ASC");

?>

<title><?= $lang["menu"]["bookmarks"]." :: ".$config["title"] ?></title>

<?php include("../parts/menu.php"); ?>

<?php if(!isset($_COOKIE[$config["cookie"]."_cookie-consent"]) || empty($_COOKIE[$config["cookie"]."_cookie-consent"])) { include("../parts/cookies.php"); } ?>

<div class="row">
    <div class="col-sm-12">
        <h2 class="text-center"><?= $lang["menu"]["bookmarks"] ?></h2>
    </div>
    <?php foreach($titles as $manga) { ?>
    <?php if(isset($_COOKIE[$config["cookie"]."_bookmark-".$manga["slug"]]) && $_COOKIE[$config["cookie"]."_bookmark-".$manga["slug"]]==$manga["slug"]) { ?>
    <?php $mid = $manga["id"]; $chapters = $conn->query("SELECT * FROM `chapters` WHERE `mid`='$mid' ORDER BY `chapter` DESC"); ?>
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-2">
                <a href="<?= $config["url"] ?>manga/<?= $manga["slug"] ?>">
                    <img src="<?= $config["url"] ?>data/covers/<?= $manga["cover"] ?>" class="loading" width="100%" alt="<?= $manga["title"] ?>" title="<?= $manga["title"] ?>">
                </a>
            </div>
            <div class="col-sm-8">
                <h2>
                    <?= glyph("bookmark","Bookmarked") ?>
                    <a href="<?= $config["url"] ?>manga/<?= $manga["slug"] ?>">
                        <b><u><?= $manga["title"] ?></u></b>
                    </a>
                </h2>
                <div class="table-responsive" id="latest-titles">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th style="width:20%">Chapter</th>
                            <th style="width:60%;">Chapter Title</th>
                            <th class="text-right" style="width:20%">Added</th>
                        </thead>
                        <tbody>
                            <?php foreach($chapters as $chapter) { ?>
                            <?php if(isset($_COOKIE[$config["cookie"]."_chapter-".$chapter["slug"]]) && $_COOKIE[$config["cookie"]."_chapter-".$chapter["slug"]]==$chapter["slug"]) { ?>
                            <tr>
                                <td>
                                    <a href="<?= $config["url"] ?>chapter/<?= $chapter["slug"] ?>">
                                        <?php if(isset($_COOKIE[$config["cookie"]."_chapter-".$chapter["slug"]]) && $_COOKIE[$config["cookie"]."_chapter-".$chapter["slug"]]==$chapter["slug"]) echo glyph("bookmark","Bookmarked"); ?>
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
                                </td>
                                <td class="text-right"><?= $chapter["added"] ?></td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel panel-default panel-body">
                    <?= $manga["description"] ?>
                </div>
            </div>
        </div>
        <br>
    </div>
    <?php } ?>
    <?php } ?>
</div>

<?php include("../parts/footer.php"); ?>
