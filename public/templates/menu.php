<?php // parts/menu.part.php - Mononoke ?>
<nav id="top_nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"><?= $lang["navbar"]["toggle"] ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" id="home_button" href="<?php echo $config["url"]; ?>"><?php if(empty($config["logo"])) { echo $group["name"]; } else { echo "<img src=\"".$config["url"].$config["logo"]."\" style='height:100%' alt='".$group["name"]."s Logo'>"; } ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav" id="nav_links">
                <li class="<?php if($page=="releases") { echo "active"; } ?>" id="titles">
                    <a href="<?= $config["url"] ?>?page=releases"><?= glyph("time",$lang["releases"]["title"]) ?> <?= $lang["releases"]["title"] ?></a>
                </li>
                <li class="<?php if($page=="projects") { echo "active"; } ?>" id="titles">
                    <a href="<?= $config["url"] ?>?page=projects"><?= glyph("th-list",$lang["projects"]["title"]) ?> <?= $lang["projects"]["title"] ?></a>
                </li>
                <li class="<?php if($page=="about") { echo "active"; } ?>" id="titles">
                    <a href="<?= $config["url"] ?>?page=about"><?= glyph("question-sign",$lang["navbar"]["about"]) ?> <?= $lang["navbar"]["about"] ?></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= glyph("info-sign",$lang["navbar"]["socials"]) ?> <span class="nav-label-1440"><?= $lang["navbar"]["socials"] ?></span> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php foreach($group["socials"] as $social) { ?>
                        <li><a href="<?= $social["url"] ?>" target="_blank"><?= $social["title"] ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right" id="pm">
                <li class="dropdown">
                    <?php if($loggedin==false) { ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= glyph("user",$lang["navbar"]["account"]) ?> <span class="nav-label-1440"><?= $lang["navbar"]["account"]?></span> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li <?php if($page=="login") { echo "class=\"active\""; } ?>>
                            <a href="<?= $config["url"] ?>?page=login"><?= glyph("log-in",$lang["navbar"]["login"]) ?> <?= $lang["navbar"]["login"] ?></a>
                        </li>
                        <li <?php if($page=="signup") { echo "class=\"active\""; } ?>>
                            <a href="<?= $config["url"] ?>?page=signup"><?= glyph("log-in",$lang["navbar"]["signup"]) ?> <?= $lang["navbar"]["signup"] ?></a>
                        </li>
                    </ul>
                    <?php } else { ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= glyph("user",$lang["navbar"]["account"]) ?> <span class="nav-label-1440"><?= $user["username"] ?></span> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?= $config["url"] ?>?page=user&id=<?= $user["id"] ?>"><?= glyph("user",$lang["navbar"]["profile"]) ?> <?= $lang["navbar"]["profile"] ?></a>
                        </li>
                        <li>
                            <a href="<?= $config["url"] ?>?page=bookmarks&id=<?= $user["id"] ?>"><?= glyph("bookmark",$lang["navbar"]["watchlist"]) ?> <?= $lang["navbar"]["watchlist"] ?></a>
                        </li>
                        <li>
                            <a href="<?= $config["url"] ?>?page=settings"><?= glyph("cog",$lang["navbar"]["settings"]) ?> <?= $lang["navbar"]["settings"] ?></a>
                        </li>
                        <li>
                            <a href="<?= $config["url"] ?>?page=logout" style="color:red"><?= glyph("log-out",$lang["navbar"]["logout"]) ?> <?= $lang["navbar"]["logout"] ?></a>
                        </li>
                    </ul>
                    <?php } ?>
                </li>
            </ul>

            <form role="search" class="navbar-form navbar-right nav-label-992" action="" name="search" method="post">
                <div class="input-group">
                    <input type="text" class="form-control quick_search_input" placeholder="<?= $lang["navbar"]["search"] ?>" name="query" value="">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" id="quicks_search_buton"><?= glyph("search",$lang["navbar"]["search"]) ?></button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</nav>
