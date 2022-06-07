<?php

require("../../requires.php");

$slug = mysqli_real_escape_string($conn, $_GET["slug"]);
$chapter = $conn->query("SELECT * FROM `chapters` WHERE `slug`='$slug' LIMIT 1");
$chapter = mysqli_fetch_assoc($chapter);
$mid = $chapter["mid"];
$manga = $conn->query("SELECT * FROM `titles` WHERE `id`='$mid' LIMIT 1");
$manga = mysqli_fetch_assoc($manga);

if(empty($chapter["title"])) $chapter["title"] = $lang["chapter"]["oneshot"];

include("../parts/header.php");

if(isset($_COOKIE[$config["cookie"]."_bookmark-".$manga["slug"]])) {
    $bookmarked = true;
    if(isset($_COOKIE[$config["cookie"]."_chapter-".$chapter["slug"]])) {
        $bookmarked_ch = $_COOKIE[$config["cookie"]."_chapter-".$chapter["slug"]];
    } else {
        $bookmarked = 0;
    }
} else {
    $bookmarked = false;
}

$chapters = $conn->query("SELECT * FROM `chapters` WHERE `mid`='$mid' ORDER BY `chapter`ASC");

$next_chapter = $conn->query("SELECT * FROM `chapters` WHERE `mid`='$mid' AND `chapter`>'".$chapter["chapter"]."' ORDER BY `chapter` ASC LIMIT 1");
$prev_chapter = $conn->query("SELECT * FROM `chapters` WHERE `mid`='$mid' AND `chapter`<'".$chapter["chapter"]."' ORDER BY LENGTH(`chapter`) DESC, `chapter` DESC LIMIT 1");
$next_chapter = mysqli_fetch_assoc($next_chapter);
$prev_chapter = mysqli_fetch_assoc($prev_chapter);

$files = array();
$dir = opendir("../../data/chapters/".$chapter["slug"]); // open the cwd..also do an err check.
while(false != ($file = readdir($dir))) {
        if(($file != ".") and ($file != "..") and ($file != "index.php")) {
                $files[] = $file;
        }   
}
natsort($files);

if(isset($_POST["add_bookmark"])) {
    if(!isset($_COOKIE[$config["cookie"]."_cookie-consent"]) || empty($_COOKIE[$config["cookie"]."_cookie-consent"]) || $_COOKIE[$config["cookie"]."_cookie-consent"]==2) {
        setcookie($config["cookie"]."_cookie-consent", false, time() - 3600, "/");
        header("Refresh: 0;");
    } else {
        setcookie($config["cookie"]."_bookmark-".$manga["slug"], $manga["slug"], time()+31556926, "/");
        setcookie($config["cookie"]."_chapter-".$chapter["slug"], $chapter["slug"], time()+31556926, "/");
        header("Refresh: 0;");
    }
}

if(isset($_POST["remove_bookmark"])) {
    if(!isset($_COOKIE[$config["cookie"]."_cookie-consent"]) || empty($_COOKIE[$config["cookie"]."_cookie-consent"]) || $_COOKIE[$config["cookie"]."_cookie-consent"]==2) {
        setcookie($config["cookie"]."_cookie-consent", false, time() - 3600, "/");
        header("Refresh: 0;");
    } else {
//        setcookie($config["cookie"]."_bookmark-".$manga["slug"], $manga["slug"], time() - 3600, "/");
        setcookie($config["cookie"]."_chapter-".$chapter["slug"], $chapter["slug"], time() - 3600, "/");
        header("Refresh: 0;");
    }
}

if(isset($_POST["update_bookmark"])) {
    if(!isset($_COOKIE[$config["cookie"]."_cookie-consent"]) || empty($_COOKIE[$config["cookie"]."_cookie-consent"]) || $_COOKIE[$config["cookie"]."_cookie-consent"]==2) {
        setcookie($config["cookie"]."_cookie-consent", false, time() - 3600, "/");
        header("Refresh: 0;");
    } else {
        setcookie($config["cookie"]."_chapter-".$chapter["slug"], $chapter["slug"], time()+31556926, "/");
        header("Refresh: 0;");
    }
}

?>

<title><?php if(empty($chapter["volume"]) && empty($chapter["chapter"])) { ?> <?= $chapter["title"] ?> <?php } elseif(empty($chapter["volume"]) && !empty($chapter["chapter"])) { ?> Ch. <?= $chapter["chapter"] ?> <?php } else { ?> Vol. <?= $chapter["volume"] ?> Ch. <?= $chapter["chapter"] ?> <?php } ?> <- <?= $manga["title"] ?> :: <?= $config["title"] ?> </title>

        </head>

        <body>

            <?php if(!isset($_COOKIE[$config["cookie"]."_cookie-consent"]) || empty($_COOKIE[$config["cookie"]."_cookie-consent"])) { include("../parts/cookies.php"); } ?>

            <style>
                .sidenav {
                    height: 100%;
                    position: fixed;
                    z-index: 1;
                    top: 0;
                    overflow-x: hidden;
                    padding-top: 40px;
                }

                .mini-submenu {
                    display: none;
                    background-color: rgba(0, 0, 0, 0);
                    border: 1px solid rgba(0, 0, 0, 0.9);
                    border-radius: 4px;
                    padding: 9px;
                    /*position: relative;*/
                    width: 42px;

                }

                .mini-submenu:hover {
                    cursor: pointer;
                }

                .mini-submenu .icon-bar {
                    border-radius: 1px;
                    display: block;
                    height: 2px;
                    width: 22px;
                    margin-top: 3px;
                }

                .mini-submenu .icon-bar {
                    background-color: #000;
                }

                #slide-submenu {
                    background: rgba(0, 0, 0, 0.45);
                    display: inline-block;
                    padding: 0 8px;
                    border-radius: 4px;
                    cursor: pointer;
                }

            </style>

            <script>
                $(function() {

                    $('#slide-submenu').on('click', function() {
                        $(this).closest('.list-group').fadeOut('slide', function() {
                            $('.mini-submenu').fadeIn();
                        });

                    });

                    $('.mini-submenu').on('click', function() {
                        $(this).next('.list-group').toggle('slide');
                        $('.mini-submenu').hide();
                    })
                });

                $(document).ready(function() {
                    $(".scroll").click(function(event) {
                        $('html, body').animate({
                            scrollTop: '+=600px'
                        }, 800);
                    });
                });

            </script>

            <div class="container content">

                <div class="row">

                    <div class="sidenav">
                        <div class="sidebar">
                            <div class="mini-submenu">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </div>
                            <div class="list-group">
                                <span href="#" class="list-group-item active">
                                    <?= $lang["chapter"]["menu"] ?>
                                    <span class="pull-right" id="slide-submenu">
                                        <?= glyph("remove",$lang["chapter"]["close"]) ?>
                                    </span>
                                </span>
                                <a href="<?= $config["url"] ?>manga/<?= $manga["slug"] ?>" class="list-group-item">
                                    <?= glyph("book",$lang["chapter"]["back_to_m"]) ?> <?= $lang["chapter"]["back_to_m"] ?>
                                </a>
                                <form method="post" name="bookmark">
                                    <?php if($bookmarked==true && $bookmarked_ch==$chapter["slug"]) { ?>
                                    <button type="submit" name="remove_bookmark" class="list-group-item">
                                        <?= glyph("remove",$lang["chapter"]["remove_bm"]) ?> <?= $lang["chapter"]["remove_bm"] ?>
                                    </button>
                                    <?php } elseif($bookmarked==true && $bookmarked_ch!=$chapter["slug"]) { ?>
                                    <button type="submit" name="update_bookmark" class="list-group-item">
                                        <?= glyph("refresh",$lang["chapter"]["update_bm"]) ?> <?= $lang["chapter"]["update_bm"] ?>
                                    </button>
                                    <?php } else { ?>
                                    <button type="submit" name="add_bookmark" class="list-group-item">
                                        <?= glyph("bookmark",$lang["chapter"]["bookmark"]) ?> <?= $lang["chapter"]["bookmark"] ?>
                                    </button>
                                    <?php } ?>
                                </form>
                                <a href="#" class="list-group-item">
                                    <select class="selectpicker form-control" onChange="window.location.href=this.value">
                                        <?php foreach($chapters as $chp) { ?>
                                        <option <?php if($chp["slug"]==$chapter["slug"]) echo "selected"; ?> value="<?= $config["url"] ?>chapter/<?= $chp["slug"] ?>">
                                            <?php if(empty($chp["volume"]) && empty($chp["chapter"])) { ?> <?= $lang["chapter"]["oneshot"] ?> <?php } elseif(empty($chp["volume"]) && !empty($chp["chapter"])) { ?> Ch. <?= $chp["chapter"] ?> <?php } else { ?> Vol. <?= $chp["volume"] ?> Ch. <?= $chp["chapter"] ?> <?php } ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </a>
                                <a <?php if(!empty($prev_chapter["slug"])) { ?> href="<?= $config["url"] ?>chapter/<?= $prev_chapter["slug"] ?>" class="list-group-item" <?php } else { ?> class="list-group-item disabled" <?php } ?>>
                                    <i class="fa fa-folder-open-o"></i> <?= $lang["chapter"]["prev"] ?>
                                </a>
                                <a <?php if(!empty($next_chapter["slug"])) { ?> href="<?= $config["url"] ?>chapter/<?= $next_chapter["slug"] ?>" class="list-group-item" <?php } else { ?> class="list-group-item disabled" <?php } ?>>
                                    <i class="fa fa-bar-chart-o"></i> <?= $lang["chapter"]["next"] ?>
                                </a>
                                <a href="#disqus_thread" class="list-group-item">
                                    <?= glyph("comment",$lang["chapter"]["comments"]) ?> <?= $lang["chapter"]["comments"] ?>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <h1 class="text-center"><?= $manga["title"] ?> - <?php if(empty($chapter["volume"]) && empty($chapter["chapter"])) { ?> <?= $chapter["title"] ?> <?php } elseif(empty($chapter["volume"]) && !empty($chapter["chapter"])) { ?> Ch. <?= $chapter["chapter"] ?> <?php } else { ?> Vol. <?= $chapter["volume"] ?> Ch. <?= $chapter["chapter"] ?> <?php } ?></h1>
                    </div>

                    <div class="col-sm-6">
                        <a href="<?php if(!empty($prev_chapter["id"])) { echo $config["url"]."chapter/".$prev_chapter["slug"]; } ?>" class="btn btn-primary <?php if(empty($prev_chapter["id"])) echo 'disabled'; ?>" style="width:100%"><?= $lang["chapter"]["prev"] ?></a>
                    </div>

                    <div class="col-sm-6">
                        <a href="<?php if(!empty($next_chapter["id"])) { echo $config["url"]."chapter/".$next_chapter["slug"]; } ?>" class="btn btn-primary <?php if(empty($next_chapter["id"])) echo 'disabled'; ?>" style="width:100%"><?= $lang["chapter"]["next"] ?></a>
                    </div>

                    <div class="col-sm-12">
                        <br>
                    </div>

                    <div class="col-sm-2"></div>

                    <div class="col-sm-8">
                        <?php $i = 1; ?>
                        <?php foreach($files as $image) { ?>
                        <img src="<?= $config["url"] ?>data/chapters/<?= $chapter["slug"] ?>/<?= $image ?>" title="<?= $image ?>" alt="<?= $manga["title"] ?> <?php if(empty($chapter["volume"]) && empty($chapter["chapter"])) { ?> <?= $chapter["title"] ?> <?php } elseif(empty($chapter["volume"]) && !empty($chapter["chapter"])) { ?> Ch. <?= $chapter["chapter"] ?> <?php } else { ?> Vol. <?= $chapter["volume"] ?> Ch. <?= $chapter["chapter"] ?> <?php } ?> - Page <?= $i ?>" style="width:100%" class="loading">
                        <?php $i++; ?>
                        <?php } ?>
                    </div>
                    <div class="col-sm-2"></div>

                    <div class="col-sm-12">
                        <br>
                    </div>

                    <div class="col-sm-6">
                        <a href="<?php if(!empty($prev_chapter["id"])) { echo $config["url"]."chapter/".$prev_chapter["slug"]; } ?>" class="btn btn-primary <?php if(empty($prev_chapter["id"])) echo 'disabled'; ?>" style="width:100%"><?= $lang["chapter"]["prev"] ?></a>
                    </div>

                    <div class="col-sm-6">
                        <a href="<?php if(!empty($next_chapter["id"])) { echo $config["url"]."chapter/".$next_chapter["slug"]; } ?>" class="btn btn-primary <?php if(empty($next_chapter["id"])) echo 'disabled'; ?>" style="width:100%"><?= $lang["chapter"]["next"] ?></a>
                    </div>

                    <div class="col-sm-12">
                        <hr>
                    </div>

                    <div class="col-sm-12">
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



                <?php include("../parts/footer.php"); ?>
