<?php

if(file_exists(".installed")) {
    die("Error: System already installed.");
    header("Refresh: 1; url=titles");
}

require("config.php");

if(empty($slave["host"]) || empty($slave["user"]) || empty($slave["table"])) {
    die("Error: config.php not properly filled out.");
}

$config["url"] = "";
$config["title"] = "FoOlSlideX";
$version = "v0.1.4";
$user["theme"] = 3;

require("vhs/conn.php");
require("vhs/funky.php");

if(isset($_POST["install"])) {
    $c_title = mysqli_real_escape_string($conn, $_POST["title"]);
    $c_slogan = mysqli_real_escape_string($conn, $_POST["slogan"]);
    $c_logo = mysqli_real_escape_string($conn, $_POST["logo"]);
    $c_cookie = mysqli_real_escape_string($conn, $_POST["cookie"]);
    $c_url = mysqli_real_escape_string($conn, $_POST["url"]);
    $c_theme = mysqli_real_escape_string($conn, $_POST["theme"]);
    $c_start = mysqli_real_escape_string($conn, $_POST["start"]);
    if(isset($_POST["blog"])) { $c_blog = "1"; } else { $c_blog = "0"; }
    if(isset($_POST["news"])) { $c_news = "1"; } else { $c_news = "0"; }
    $c_lang = mysqli_real_escape_string($conn, $_POST["lang"]);
    $c_disqus = mysqli_real_escape_string($conn, $_POST["disqus"]);
    
    // Import Database - https://stackoverflow.com/questions/19751354/how-do-i-import-a-sql-file-in-mysql-database-using-php Thx!
    $filename = 'mangareaderx.sql';
    $templine = '';
    $lines = file($filename);
    foreach ($lines as $line) {
        if (substr($line, 0, 2) == '--' || $line == '')continue;
        $templine .= $line;
        if (substr(trim($line), -1, 1) == ';') {
            $conn->query($templine);
            $templine = '';
        }
    }
    
    $file = fopen(".installed", "w") or die("Error: Missing permissions to create file (Fix: CHMOD 755 all files)");
    fwrite($file, $version);
    fclose($file);
    
    $conn->query("INSERT INTO `config`(`title`, `slogan`, `logo`, `cookie`, `url`, `theme`, `start`, `blog`, `news`, `lang`, `disqus`) VALUES('$c_title', '$c_slogan', '$c_logo', '$c_cookie', '$c_url', '$c_theme', '$c_start', '$c_blog', '$cnews', '$c_lang', '$c_disqus')");
    $conn->query("INSERT INTO `invites`(`token`,`used`) VALUES('FoOlSlideX', NULL)");
    
    header("Location: signup");
    unlink("install.php"); # FFS NOT AGAIN PLEASE I ACCIDENTALLY DELETED YOU ALREADY AND GOT TO REWRITE YOU NOW FROM SCRATCH REEEEEEEEEEEEE PAINNNNNNNNNNN WHY WHY WHY WHY WHY WHY WHY WHY WHY WHY
}

if(!isset($_GET["lang"]) || empty($_GET["lang"])) {
    header("Location: ?lang=en");
}
$lang = $_GET["lang"];
require("lang/".$lang.".lang.php");

include("./render/parts/header.php");

?>

<title><?= $lang["install"]["title"] ?></title>

</head>

<body>

    <div id="container">

        <?php if(!empty($error_msg)) { ?>
        <div class="alert alert-warning alert-dismissible text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><?= $lang["login"]["error"] ?>:</strong> <?= $error_msg ?>
        </div>
        <?php } ?>
        <div style="margin: 0 auto; width: 300px" id="login_container">
            <form method="post" name="edit_config">
                <h1 class="text-center"><?= $lang["install"]["title"] ?></h1>
                <hr>

                <div class="form-group">
                    <label for="config_title"><?= $lang["config"]["title2"] ?> </label>
                    <input required tabindex="1" type="text" name="title" id="config_title" class="form-control" placeholder="<?= $lang["config"]["title2"] ?>">
                </div>

                <div class="form-group">
                    <label for="config_slogan"><?= $lang["config"]["slogan"] ?> </label>
                    <input required tabindex="2" type="text" name="slogan" id="config_slogan" class="form-control" placeholder="<?= $lang["config"]["slogan"] ?>">
                </div>

                <div class="form-group">
                    <label for="config_logo"><?= $lang["config"]["logo"] ?> </label>
                    <input tabindex="3" type="text" name="logo" id="config_logo" class="form-control" value="assets/img/logo.png" placeholder="<?= $lang["config"]["logo"] ?>">
                </div>

                <div class="form-group">
                    <label for="config_cookie"><?= $lang["config"]["cookie"] ?> </label>
                    <input required tabindex="4" type="text" name="cookie" id="config_cookie" class="form-control" placeholder="<?= $lang["config"]["cookie"] ?>">
                </div>

                <div class="form-group">
                    <label for="config_url"><?= $lang["config"]["url"] ?> </label>
                    <input required tabindex="5" type="text" name="url" id="config_url" class="form-control" value="https://" placeholder="<?= $lang["config"]["url"] ?>">
                </div>

                <div class="form-group">
                    <label for="config_theme"><?= $lang["config"]["theme"] ?></label>
                    <select required tabindex="6" name="theme" id="config_theme" class="form-control selectpicker" title="<?= $lang["config"]["theme"] ?>">
                        <option value="1"><?= $lang["config"]["themes"][1] ?></option>
                        <option value="2"><?= $lang["config"]["themes"][2] ?></option>
                        <option value="3" selected><?= $lang["config"]["themes"][3] ?></option>
                        <option value="4"><?= $lang["config"]["themes"][4] ?></option>
                        <option value="5"><?= $lang["config"]["themes"][5] ?></option>
                        <option value="6"><?= $lang["config"]["themes"][6] ?></option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="config_start"><?= $lang["config"]["start"] ?> </label>
                    <input required tabindex="7" type="number" name="start" id="config_start" class="form-control" placeholder="<?= $lang["config"]["start"] ?>">
                </div>
                
                <div class="form-group">
                    <div class="checkbox">
                        <label title="<?= $lang["menu"]["blog2"] ?>">
                            <input type="checkbox" name="blog" checked> <?= $lang["menu"]["blog2"] ?>
                        </label>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="checkbox">
                        <label title="<?= $lang["menu"]["news2"] ?>">
                            <input type="checkbox" name="news" checked> <?= $lang["menu"]["news2"] ?>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="config_lang"><?= $lang["config"]["lang"] ?> </label>
                    <select required tabindex="8" name="lang" id="config_lang" class="form-control selectpicker" title="<?= $lang["config"]["lang"] ?>">
                        <option value="de">Deutsch</option>
                        <option value="en" selected>English</option>
                        <option value="pt">Português</option>
                        <option value="ru">Русский</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="config_disqus"><?= $lang["config"]["disqus"] ?> </label>
                    <input tabindex="9" type="text" name="disqus" id="config_disqus" class="form-control" placeholder="<?= $lang["config"]["disqus"] ?>">
                </div>

                <p><i><?= $lang["add_manga"]["all_required"] ?></i></p>
                <button tabindex="10" class="btn btn-lg btn-success btn-block" type="submit" id="upload-file" name="install"><?= glyph("ok",$lang["install"]["confirm"]) ?> <?= $lang["install"]["confirm"] ?></button>
                <hr>
                <p id="copy"><?= $lang["install"]["after"] ?> <a href="#copy" onclick="navigator.clipboard.writeText('FoOlSlideX')"><b>FoOlSlideX</b> (<?= $lang["install"]["copy"] ?>)</a></p>
            </form>
        </div>

        <?php include("./render/parts/footer.php"); ?>
