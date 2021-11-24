<nav id="top_nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" id="home_button" href="<?php echo $config["url"]; ?>"><?php if(empty($config["logo"])) { echo $config["name"]; } else { echo "<img src='".$config["url"].$config["logo"]."' style='height:100%'>"; } ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav" id="nav_links">
                <li class="<?php if($rPage=="home") { echo "active"; } ?>" id="titles">
                    <a href="<?php echo $config["url"]; ?>home"><i class="bi bi-clock-history"></i> Releases</a>
                </li>
                <li class="<?php if($rPage=="mangas") { echo "active"; } ?>" id="titles">
                    <a href="<?php echo $config["url"]; ?>mangas"><i class="bi bi-book"></i> Mangas</a>
                </li>
                <li class="<?php if($rPage=="about") { echo "active"; } ?>" id="titles">
                    <a href="<?php echo $config["url"]; ?>about"><i class="bi bi-info"></i> About</a>
                </li>
                <li class="<?php if($rPage=="credits") { echo "active"; } ?>" id="titles">
                    <a href="<?php echo $config["url"]; ?>credits"><i class="bi bi-person"></i> Credits</a>
                </li>
            </ul>


            <ul class="nav navbar-nav navbar-right" id="pm">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="bi bi-person-circle"></i> <?php if(!isset($uName)) { ?>Account<?php } else { echo $uName; } ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <?php if(!isset($_SESSION["username"])) { ?>
                            <a href="<?php echo $config["url"]; ?>login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                            <?php if($config["registration"]=="1") { ?><a href="<?php echo $config["url"]; ?>signup"><i class="bi bi-person-plus"></i> Register</a><?php } ?>
                            <?php } else { ?>
                            <?php if($uGroup=="1") { ?>
                            <a href="<?php echo $config["url"]; ?>admin"><i class="bi bi-wrench"></i> Administration Panel (Soon)</a>
                            <?php } if($uGroup=="2" || $uGroup=="1") { ?>
                            <a href="<?php echo $config["url"]; ?>new_manga"><i class="bi bi-plus"></i>Add new Manga</a>
                            <a href="<?php echo $config["url"]; ?>uploads"><i class="bi bi-journal"></i> My Uploads</a>
                            <?php } ?>
                            <a href="<?php echo $config["url"]; ?>comments"><i class="bi bi-chat-dots"></i> Comments</a>
                            <a href="<?php echo $config["url"]; ?>logout"><i class="bi bi-box-arrow-right"></i> Logout</a>
                            <?php } ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
