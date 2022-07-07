</head>

<body>

    <nav id="top_nav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="home_button" href="<?= $config["url"] ?>">
                    <?php if(empty($config["logo"])) { ?>
                    <?= $config["title"] ?>
                    <?php } else { ?>
                    <img src="<?= $config["url"].$config["logo"] ?>" style="margin-top:-9px; max-width: 200px; max-height: 200%" alt="<?= $config["title"] ?>" title="<?= $config["title"]." - ".$config["slogan"] ?>">
                    <?php } ?>
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav" id="nav_links">
                    <?php $c = 1; ?>
                    <?php foreach($d as $menu) { ?>
                    <?php if($menu["hidden"]!=true) { ?>
                    <?php if(empty($menu["text"])) { $glyph_text = $lang["menu"][$menu["item"]]; } else { $glyph_text = $menu["item"]; } ?>
                    <li class="<?php if($page==$glyph_text) { echo "active"; } ?>" id="titles">
                        <a href="<?php if(strpos($menu["item"], "http") === 0) { echo $menu["item"]; } else { echo $config["url"].$menu["item"]; } ?>">
                            <?= glyph($menu["icon"], $glyph_text) ?>
                            <?php if($menu["displayed"]==true) { ?>
                            <?php if(empty($menu["text"])) { ?>
                            <?= $lang["menu"][$menu["item"]] ?>
                            <?php } else { ?>
                            <?= $menu["text"] ?>
                            <?php } ?>
                            <?php } ?>
                        </a>
                    </li>
                    <?php } ?>
                    <?php $c++ ?>
                    <?php } ?>
                </ul>

                <ul class="nav navbar-nav navbar-right" id="pm">
                    <li class="dropdown">
                        <?php if($loggedin==false) { ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= glyph("user",$lang["menu"]["account"]) ?> <span class="nav-label-1440"><?= $lang["menu"]["account"] ?></span> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="<?php if($page==$lang["menu"]["login"]) { echo "active"; } ?>">
                                <a href="<?= $config["url"] ?>login"><?= glyph("log-in",$lang["menu"]["login"]) ?> <?= $lang["menu"]["login"] ?></a>
                            </li>
                            <li class="<?php if($page==$lang["menu"]["signup"]) { echo "active"; } ?>">
                                <a href="<?= $config["url"] ?>signup"><?= glyph("log-in",$lang["menu"]["signup"]) ?> <?= $lang["menu"]["signup"] ?></a>
                            </li>
                        </ul>
                        <?php } else { ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= glyph("user",$lang["menu"]["account"]) ?> <span class="nav-label-1440"><?= $user["username"] ?></span> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php if(($user["level"]==1 || $user["level"]==2 || $user["level"]==3) && $user["active"]==true) { ?>
                            <?php if($user["level"]==1 && $user["active"]==true) { ?>
                            <li class="<?php if($page==$lang["menu"]["config"]) { echo "active"; } ?>">
                                <a href="<?= $config["url"] ?>admin/config"><?= glyph("pencil",$lang["menu"]["config"]) ?> <?= $lang["menu"]["config"] ?></a>
                            </li>
                            <li class="<?php if($page==$lang["menu"]["menu_dis"]) { echo "active"; } ?>">
                                <a href="<?= $config["url"] ?>admin/menu_display"><?= glyph("cog",$lang["menu"]["menu_dis"]) ?> <?= $lang["menu"]["menu_dis"] ?></a>
                            </li>
                            <?php } ?>
                            <li class="<?php if($page==$lang["menu"]["add_new"]) { echo "active"; } ?>">
                                <a href="<?= $config["url"] ?>admin/new_title"><?= glyph("plus-sign",$lang["menu"]["add_new"]) ?> <?= $lang["menu"]["add_new"] ?></a>
                            </li>
                            <?php } ?>
                            <li class="<?php if($page==$lang["menu"]["settings"]) { echo "active"; } ?>">
                                <a href="<?= $config["url"] ?>admin/settings"><?= glyph("wrench",$lang["menu"]["settings"]) ?> <?= $lang["menu"]["settings"] ?></a>
                            </li>
                            <li class="<?php if($page==$lang["menu"]["logout"]) { echo "active"; } ?>">
                                <a href="<?= $config["url"] ?>logout"><?= glyph("log-out",$lang["menu"]["logout"]) ?> <?= $lang["menu"]["logout"] ?></a>
                            </li>
                        </ul>
                        <?php } ?>
                    </li>
                </ul>
                <form role="search" class="navbar-form navbar-right nav-label-992" action="<?= $config["url"] ?>titles" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control quick_search_input" placeholder="<?= $lang["menu"]["quicksearch"] ?>" name="mtitle" value="<?php if(isset($_GET["mtitle"])) echo mysqli_real_escape_string($conn, $_GET["mtitle"]); ?>">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" id="quick_search_button"><?= glyph("search",$lang["menu"]["search"]) ?></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
