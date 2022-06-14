<?php

require("../../requires.php");

$page = $lang["menu"]["releases"];

if(isset($_GET["logout"])) {
    // Removing token from Database and destroy entire session and so on
    $uid = $user["id"];
    $conn->query("DELETE FROM `sessions` WHERE `user-id`='$uid'");
    setcookie($config["cookie"]."_session", "", time() - 3600, "/", "");
    session_destroy();
    session_unset();
    header("Refresh: 0; url=./");
}

include("../parts/header.php");

$carousels = $conn->query("SELECT * FROM `titles` ORDER BY RAND() LIMIT 5");
$latest_titles = $conn->query("SELECT * FROM `titles` ORDER BY `added` DESC");
$latest_chapters = $conn->query("SELECT * FROM `chapters` ORDER BY `added` DESC");

?>

<title><?= $config["title"]." :: ".$config["slogan"] ?></title>

<?php include("../parts/menu.php"); ?>

<?php if(!isset($_COOKIE[$config["cookie"]."_cookie-consent"]) || empty($_COOKIE[$config["cookie"]."_cookie-consent"])) { include("../parts/cookies.php"); } ?>

<div class="row">
    
    <div class="col-sm-4">
        <div id="manga-carousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php $c = 1; foreach($carousels as $item) { ?>
                <li data-target="#carousel-example-generic" data-slide-to="0" <?php if($c==1) { ?>class="active" <?php } ?>></li>
                <?php $c++; ?>
                <?php } ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php $q = 1; foreach($carousels as $item) { ?>
                <div class="item <?php if($q==1) { ?>active<?php } ?>">
                    <a href="<?= $config["url"] ?>manga/<?= $item["slug"] ?>">
                        <img src="data/covers/<?= $item["cover"] ?>" alt="<?= $item["title"] ?>" class="loading">
                        <div class="carousel-caption">
                            <?= $item["title"] ?>
                        </div>
                    </a>
                </div>
                <?php $q++; ?>
                <?php } ?>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#manga-carousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#manga-carousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <style>
        #latest-titles {
            max-height: 500px;
        }

        #manga-carousel {
            max-height: 520px;
        }

    </style>

    <div class="col-sm-8">
        <h3 class="text-center" style="max-height:20px;padding: 0; margin: 0;"><?= $lang["home"]["added_titles"] ?></h3>
        <div class="table-responsive" id="latest-titles">
            <table class="table table-hover table-striped">
                <thead>
                    <th style="width:5%"><?= $lang["home"]["type"] ?></th>
                    <th><?= $lang["home"]["title"] ?></th>
                    <th class="text-right" style="width:20%"><?= $lang["home"]["added"] ?></th>
                </thead>
                <tbody>
                    <?php foreach($latest_titles as $item) { ?>
                    <tr>
                        <?php if($item["type"]==$lang["add_manga"]["manga"]) { ?>
                        <td><span class="label label-primary"><?= $lang["add_manga"]["manga"] ?></span></td>
                        <?php } elseif($item["type"]==$lang["add_manga"]["manwha"]) { ?>?>
                        <td><span class="label label-success"><?= $lang["add_manga"]["manwha"] ?></span></td>
                        <?php } else { ?>?>
                        <td><span class="label label-info"><?= $lang["add_manga"]["manhua"] ?></span></td>
                        <?php } ?>
                        <td>
                            <?php if(isset($_COOKIE[$config["cookie"]."_bookmark-".$item["slug"]]) && $_COOKIE[$config["cookie"]."_bookmark-".$item["slug"]]==$item["slug"]) echo glyph("bookmark","Bookmarked"); ?>
                            <a href="<?= $config["url"] ?>manga/<?= $item["slug"] ?>"><?= $item["title"] ?></a>
                            <?php if($loggedin==true) { ?>
                            <a href="<?= $config["url"] ?>admin/edit_title/<?= $item["slug"] ?>">
                                <span class="badge"><?= glyph("pencil",$lang["manga"]["edit_title"]) ?> <?= $lang["manga"]["edit_title"] ?></span>
                            </a>
                            <?php } ?>
                        </td>
                        <td><?= $item["added"] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-sm-12">
        <h3 class="text-center"><?= $lang["home"]["released_chap"] ?></h3>
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
                    <?php foreach($latest_chapters as $chapter) { ?>
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
        </div>
    </div>

</div>

<?php include("../parts/footer.php"); ?>
