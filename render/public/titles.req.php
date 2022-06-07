<?php

// Note to my future self: Someday I'll need to make this proccess automated...

require("../../requires.php");

$page = $lang["menu"]["titles"];

include("../parts/header.php");

$titles_1 = $conn->query("SELECT * FROM `titles` WHERE `scan-status`='1' ORDER BY `title` ASC");
$titles_2 = $conn->query("SELECT * FROM `titles` WHERE `scan-status`='2' ORDER BY `title` ASC");
$titles_3 = $conn->query("SELECT * FROM `titles` WHERE `scan-status`='3' ORDER BY `title` ASC");
$titles_4 = $conn->query("SELECT * FROM `titles` WHERE `scan-status`='4' ORDER BY `title` ASC");
$titles_5 = $conn->query("SELECT * FROM `titles` WHERE `scan-status`='5' ORDER BY `title` ASC");
$titles_6 = $conn->query("SELECT * FROM `titles` WHERE `scan-status`='6' ORDER BY `title` ASC");

?>

<title><?= $lang["menu"]["titles"]." :: ".$config["title"] ?></title>

<?php include("../parts/menu.php"); ?>

<?php if(!isset($_COOKIE[$config["cookie"]."_cookie-consent"]) || empty($_COOKIE[$config["cookie"]."_cookie-consent"])) { include("../parts/cookies.php"); } ?>

<div class="row" onmouseover="search_manga()">
    <div class="col-sm-12">
        <input type="text" id="mangaSearch" class="form-control" onkeyup="search_manga()" placeholder="Search for Manga..." value="<?php if(isset($_GET["mtitle"])) echo mysqli_real_escape_string($conn, $_GET["mtitle"]); ?>">
    </div>

    <div id="mangaSearchList">
        <div class="col-sm-12">
            <h2 class="text-center"><?= $lang["add_manga"]["scanst"][1] ?></h2>
            <?php foreach($titles_1 as $manga) { ?>
            <div class="col-sm-2 mangaSearchItem">
                <a href="<?= $config["url"] ?>manga/<?= $manga["slug"] ?>" class="thumbnail">
                    <p class="text-center mangaSearchText" style="position: absolute; margin-bottom:-10px;color: black; text-shadow: 0.05em 0 white, 0 0.05em white, -0.05em 0 white, 0 -0.05em white, -0.05em -0.05em white, -0.05em 0.05em white, 0.05em -0.05em white, 0.05em 0.05em white;" title="<?= $manga["title"] ?>">
                        <?php if(isset($_COOKIE[$config["cookie"]."_bookmark-".$manga["slug"]]) && $_COOKIE[$config["cookie"]."_bookmark-".$manga["slug"]]==$manga["slug"]) echo glyph("bookmark","Bookmarked"); ?>
                        <?= $manga["title"] ?>
                    </p>
                    <img src="<?= $config["url"] ?>data/covers/<?= $manga["cover"] ?>" width="100%" alt="<?= $manga["title"] ?>" title="<?= $manga["title"] ?>">
                </a>
            </div>
            <?php } ?>
        </div>

        <div class="col-sm-12">
            <hr>
        </div>

        <div class="col-sm-12">
            <h2 class="text-center"><?= $lang["add_manga"]["scanst"][2] ?></h2>
            <?php foreach($titles_2 as $manga) { ?>
            <div class="col-sm-2 mangaSearchItem">
                <a href="<?= $config["url"] ?>manga/<?= $manga["slug"] ?>" class="thumbnail">
                    <p class="text-center mangaSearchText" style="position: absolute; margin-bottom:-10px;color: black; text-shadow: 0.05em 0 white, 0 0.05em white, -0.05em 0 white, 0 -0.05em white, -0.05em -0.05em white, -0.05em 0.05em white, 0.05em -0.05em white, 0.05em 0.05em white;" title="<?= $manga["title"] ?>">
                        <?php if(isset($_COOKIE[$config["cookie"]."_bookmark-".$manga["slug"]]) && $_COOKIE[$config["cookie"]."_bookmark-".$manga["slug"]]==$manga["slug"]) echo glyph("bookmark","Bookmarked"); ?>
                        <?= $manga["title"] ?>
                    </p>
                    <img src="<?= $config["url"] ?>data/covers/<?= $manga["cover"] ?>" width="100%" alt="<?= $manga["title"] ?>" title="<?= $manga["title"] ?>" class="loading">
                </a>
            </div>
            <?php } ?>
        </div>

        <div class="col-sm-12">
            <hr>
        </div>

        <div class="col-sm-12">
            <h2 class="text-center"><?= $lang["add_manga"]["scanst"][3] ?></h2>
            <?php foreach($titles_3 as $manga) { ?>
            <div class="col-sm-2 mangaSearchItem">
                <a href="<?= $config["url"] ?>manga/<?= $manga["slug"] ?>" class="thumbnail">
                    <p class="text-center mangaSearchText" style="position: absolute; margin-bottom:-10px;color: black; text-shadow: 0.05em 0 white, 0 0.05em white, -0.05em 0 white, 0 -0.05em white, -0.05em -0.05em white, -0.05em 0.05em white, 0.05em -0.05em white, 0.05em 0.05em white;" title="<?= $manga["title"] ?>">
                        <?php if(isset($_COOKIE[$config["cookie"]."_bookmark-".$manga["slug"]]) && $_COOKIE[$config["cookie"]."_bookmark-".$manga["slug"]]==$manga["slug"]) echo glyph("bookmark","Bookmarked"); ?>
                        <?= $manga["title"] ?>
                    </p>
                    <img src="<?= $config["url"] ?>data/covers/<?= $manga["cover"] ?>" width="100%" alt="<?= $manga["title"] ?>" title="<?= $manga["title"] ?>" class="loading">
                </a>
            </div>
            <?php } ?>
        </div>

        <div class="col-sm-12">
            <hr>
        </div>

        <div class="col-sm-12">
            <h2 class="text-center"><?= $lang["add_manga"]["scanst"][4] ?></h2>
            <?php foreach($titles_4 as $manga) { ?>
            <div class="col-sm-2 mangaSearchItem">
                <a href="<?= $config["url"] ?>manga/<?= $manga["slug"] ?>" class="thumbnail">
                    <p class="text-center mangaSearchText" style="position: absolute; margin-bottom:-10px;color: black; text-shadow: 0.05em 0 white, 0 0.05em white, -0.05em 0 white, 0 -0.05em white, -0.05em -0.05em white, -0.05em 0.05em white, 0.05em -0.05em white, 0.05em 0.05em white;" title="<?= $manga["title"] ?>">
                        <?php if(isset($_COOKIE[$config["cookie"]."_bookmark-".$manga["slug"]]) && $_COOKIE[$config["cookie"]."_bookmark-".$manga["slug"]]==$manga["slug"]) echo glyph("bookmark","Bookmarked"); ?>
                        <?= $manga["title"] ?>
                    </p>
                    <img src="<?= $config["url"] ?>data/covers/<?= $manga["cover"] ?>" width="100%" alt="<?= $manga["title"] ?>" title="<?= $manga["title"] ?>" class="loading">
                </a>
            </div>
            <?php } ?>
        </div>

        <div class="col-sm-12">
            <hr>
        </div>

        <div class="col-sm-12">
            <h2 class="text-center"><?= $lang["add_manga"]["scanst"][5] ?></h2>
            <?php foreach($titles_5 as $manga) { ?>
            <div class="col-sm-2 mangaSearchItem">
                <a href="<?= $config["url"] ?>manga/<?= $manga["slug"] ?>" class="thumbnail">
                    <p class="text-center mangaSearchText" style="position: absolute; margin-bottom:-10px;color: black; text-shadow: 0.05em 0 white, 0 0.05em white, -0.05em 0 white, 0 -0.05em white, -0.05em -0.05em white, -0.05em 0.05em white, 0.05em -0.05em white, 0.05em 0.05em white;" title="<?= $manga["title"] ?>">
                        <?php if(isset($_COOKIE[$config["cookie"]."_bookmark-".$manga["slug"]]) && $_COOKIE[$config["cookie"]."_bookmark-".$manga["slug"]]==$manga["slug"]) echo glyph("bookmark","Bookmarked"); ?>
                        <?= $manga["title"] ?>
                    </p>
                    <img src="<?= $config["url"] ?>data/covers/<?= $manga["cover"] ?>" width="100%" alt="<?= $manga["title"] ?>" title="<?= $manga["title"] ?>" class="loading">
                </a>
            </div>
            <?php } ?>
        </div>

        <div class="col-sm-12">
            <hr>
        </div>

        <div class="col-sm-12">
            <h2 class="text-center"><?= $lang["add_manga"]["scanst"][6] ?></h2>
            <?php foreach($titles_6 as $manga) { ?>
            <div class="col-sm-2 mangaSearchItem">
                <a href="<?= $config["url"] ?>manga/<?= $manga["slug"] ?>" class="thumbnail">
                    <p class="text-center mangaSearchText" style="position: absolute; margin-bottom:-10px;color: black; text-shadow: 0.05em 0 white, 0 0.05em white, -0.05em 0 white, 0 -0.05em white, -0.05em -0.05em white, -0.05em 0.05em white, 0.05em -0.05em white, 0.05em 0.05em white;" title="<?= $manga["title"] ?>">
                        <?php if(isset($_COOKIE[$config["cookie"]."_bookmark-".$manga["slug"]]) && $_COOKIE[$config["cookie"]."_bookmark-".$manga["slug"]]==$manga["slug"]) echo glyph("bookmark","Bookmarked"); ?>
                        <?= $manga["title"] ?>
                    </p>
                    <img src="<?= $config["url"] ?>data/covers/<?= $manga["cover"] ?>" width="100%" alt="<?= $manga["title"] ?>" title="<?= $manga["title"] ?>" class="loading">
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    function search_manga() {
        let input = document.getElementById('mangaSearch').value
        input = input.toLowerCase();
        let x = document.getElementsByClassName('mangaSearchItem');

        for (i = 0; i < x.length; i++) {
            if (!x[i].innerHTML.toLowerCase().includes(input)) {
                x[i].style.display = "none";
            } else {
                x[i].style.display = "block";
            }
        }
    }

</script>

<?php include("../parts/footer.php"); ?>
