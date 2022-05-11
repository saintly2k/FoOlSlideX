<?php

require("../../requires.php");

//$page = $lang["menu"]["home"];

include("../parts/header.php");

$slug = mysqli_real_escape_string($conn, $_GET["slug"]);
$manga = $conn->query("SELECT * FROM `titles` WHERE `slug`='$slug' LIMIT 1");
$manga = mysqli_fetch_assoc($manga);

$mid = $manga["id"];

$chapters = $conn->query("SELECT * FROM `chapters` WHERE `mid`='$mid' ORDER BY `chapter` DESC");

if(empty($manga["author"])) $manga["author"] = $lang["manga"]["unknown"];
if(empty($manga["genre"])) $manga["genre"] = $lang["manga"]["unknown"];
if(empty($manga["author"])) $manga["author"] = $lang["manga"]["unknown"];
if(empty($manga["released"])) $manga["released"] = $lang["manga"]["unknown"];
if(empty($manga["description"])) $manga["description"] = $lang["manga"]["unknown"];
if(empty($manga["author"])) $manga["author"] = $lang["manga"]["unknown"];

if($manga["raw-status"]==1) {
    $manga["raw-status"] = $lang["add_manga"]["rawst"][1];
} elseif($manga["raw-status"]==2) {
    $manga["raw-status"] = $lang["add_manga"]["rawst"][2];
} elseif($manga["raw-status"]==3) {
    $manga["raw-status"] = $lang["add_manga"]["rawst"][3];
} elseif($manga["raw-status"]==4) {
    $manga["raw-status"] = $lang["add_manga"]["rawst"][4];
} elseif($manga["raw-status"]==5) {
    $manga["raw-status"] = $lang["add_manga"]["rawst"][5];
} else {
    $manga["raw-status"] = $lang["add_manga"]["rawst"][6];
}

if($manga["scan-status"]==1) {
    $manga["scan-status"] = $lang["add_manga"]["scanst"][1];
} elseif($manga["scan-status"]==2) {
    $manga["scan-status"] = $lang["add_manga"]["scanst"][2];
} elseif($manga["scan-status"]==3) {
    $manga["scan-status"] = $lang["add_manga"]["scanst"][3];
} elseif($manga["scan-status"]==4) {
    $manga["scan-status"] = $lang["add_manga"]["scanst"][4];
} elseif($manga["scan-status"]==5) {
    $manga["scan-status"] = $lang["add_manga"]["scanst"][5];
} else {
    $manga["scan-status"] = $lang["add_manga"]["scanst"][6];
}

if(isset($_POST["add_bookmark"])) {
    if(!isset($_COOKIE[$config["title"]."_cookie-consent"]) || empty($_COOKIE[$config["title"]."_cookie-consent"]) || $_COOKIE[$config["title"]."_cookie-consent"]==2) {
        setcookie($config["title"]."_cookie-consent", false, time() - 3600, "/");
        header("Refresh: 0;");
    } else {
        setcookie($config["title"]."_bookmark-".$manga["slug"], $manga["slug"], time()+31556926, "/");
        header("Refresh: 0;");
    }
}

if(isset($_POST["remove_bookmark"])) {
    if(!isset($_COOKIE[$config["title"]."_cookie-consent"]) || empty($_COOKIE[$config["title"]."_cookie-consent"]) || $_COOKIE[$config["title"]."_cookie-consent"]==2) {
        setcookie($config["title"]."_cookie-consent", false, time() - 3600, "/");
        header("Refresh: 0;");
    } else {
        setcookie($config["title"]."_bookmark-".$manga["slug"], $manga["slug"], time() - 3600, "/");
        foreach($chapters as $rch) {
            if(isset($_COOKIE[$config["title"]."_chapter-".$rch["slug"]])) {
                setcookie($config["title"]."_chapter-".$rch["slug"], $rch["slug"], time() - 3600, "/");
            }
        }
        header("Refresh: 0;");
    }
}

?>

<?php if(!empty($manga["id"])) { ?>
<title><?= $manga["title"]." :: ".$config["title"] ?></title>
<?php } else { ?>
<title><?= $lang["login"]["error"]." :: ".$config["title"] ?></title>
<?php } ?>

<?php include("../parts/menu.php"); ?>

<?php if(!isset($_COOKIE[$config["title"]."_cookie-consent"]) || empty($_COOKIE[$config["title"]."_cookie-consent"])) { include("../parts/cookies.php"); } ?>

<div class="row">

    <div class="col-sm-3">
        <a href="<?= $config["url"] ?>data/covers/<?= $manga["cover"] ?>" target="_blank">
            <img src="<?= $config["url"] ?>data/covers/<?= $manga["cover"] ?>" width="100%" alt="<?= $manga["title"] ?>" class="loading">
        </a>
    </div>

    <div class="col-sm-9">
        <h2>
            <?php if(isset($_COOKIE[$config["title"]."_bookmark-".$manga["slug"]]) && $_COOKIE[$config["title"]."_bookmark-".$manga["slug"]]==$manga["slug"]) { ?>
            <?= glyph("bookmark","Bookmarked") ?>
            <?php } ?>
            <b><u><?= $manga["title"] ?></u></b>
            <form method="post" name="bookmark">
                <?php if($loggedin==true) { ?>
                <a href="<?= $config["url"] ?>admin/edit_title/<?= $manga["slug"] ?>"><small class="badge"><?= glyph("pencil",$lang["manga"]["edit_title"]) ?> <?= $lang["manga"]["edit_title"] ?></small></a>
                <a href="<?= $config["url"] ?>admin/add_chapter/<?= $manga["slug"] ?>"><small class="badge"><?= glyph("plus",$lang["manga"]["add_ch"]) ?> <?= $lang["manga"]["add_ch"] ?></small></a>
                <?php } ?>
                <?php if(!isset($_COOKIE[$config["title"]."_bookmark-".$manga["slug"]])) { ?>
                <button type="submit" name="add_bookmark" class="badge"><?= glyph("bookmark",$lang["chapter"]["bookmark"]) ?> <?= $lang["chapter"]["bookmark"] ?></button>
                <?php } else { ?>
                <button type="submit" name="remove_bookmark" class="badge"><?= glyph("remove",$lang["chapter"]["remove_bm"]) ?> <?= $lang["chapter"]["remove_bm"] ?></button>
                <?php } ?>
            </form>
        </h2>
        <p><b><?= $lang["manga"]["alt"] ?>:</b> <?= $manga["alt"] ?></p>
        <p><b><?= $lang["manga"]["author"] ?>:</b> <?= $manga["author"] ?></p>
        <p><b><?= $lang["manga"]["genre"] ?>:</b> <?= $manga["genre"] ?></p>
        <p><b><?= $lang["manga"]["type"] ?>:</b> <?= $manga["type"] ?></p>
        <p><b><?= $lang["manga"]["released"] ?>:</b> <?= $manga["released"] ?></p>
        <p><b><?= $lang["manga"]["raw-status"] ?>:</b> <?= $manga["raw-status"] ?></p>
        <p><b><?= $lang["manga"]["scan-status"] ?>:</b> <?= $manga["scan-status"] ?></p>
        <?php if(!empty($manga["raw-url"])) { ?>
        <p><a href="<?= $manga["raw-url"] ?>" target="_blank"><?= $lang["manga"]["raw"] ?></a></p>
        <?php } ?>
        <?php if(!empty($manga["licensed"])) { ?>
        <p><a href="<?= $manga["official-url"] ?>" target="_blank"><?= $lang["manga"]["licensed"] ?></a></p>
        <?php } ?>
        <p><i><?= $lang["manga"]["added"] ?> <?= $manga["added"] ?></i></p>
        <div class="panel panel-default panel-body">
            <?= $manga["description"] ?>
        </div>
    </div>

    <div class="col-sm-12">
        <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#chapters" aria-controls="chapters" role="tab" data-toggle="tab">Chapters</a></li>
                <li role="presentation"><a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">Comments</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="chapters">
                    <div class="table-responsive" id="latest-titles">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th style="width:10%">Chapter</th>
                                <th style="width:60%;">Chapter Title</th>
                                <th style="width:10%" class="text-center">Uploader</th>
                                <th class="text-right" style="width:20%">Added</th>
                            </thead>
                            <tbody>
                                <?php foreach($chapters as $chapter) { ?>
                                <tr>
                                    <td>
                                        <a href="<?= $config["url"] ?>chapter/<?= $chapter["slug"] ?>">
                                            <?php if(isset($_COOKIE[$config["title"]."_chapter-".$chapter["slug"]]) && $_COOKIE[$config["title"]."_chapter-".$chapter["slug"]]==$chapter["slug"]) echo glyph("bookmark","Bookmarked"); ?>
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
                                    <td class="text-center">
                                        <?php $uploader = $conn->query("SELECT * FROM `user` WHERE `id`='".$chapter["user"]."' LIMIT 1"); $uploader = mysqli_fetch_assoc($uploader); echo $uploader["username"]; ?>
                                    </td>
                                    <td class="text-right"><?= $chapter["added"] ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="comments">
                    <div id="disqus_thread"></div>
                    <script>
                        /**
                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                        /*
                        var disqus_config = function () {
                        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };
                        */
                        (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document,
                                s = d.createElement('script');
                            s.src = 'https://<?= $config["disqus"] ?>.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();

                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                </div>
            </div>

        </div>
    </div>

</div>

<?php include("../parts/footer.php"); ?>
