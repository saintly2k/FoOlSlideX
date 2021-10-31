<div id="menu">
    <nav class="navbar top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo $config["url"]; ?>">
            <?php if(empty($config["logo"])) { ?>
            <i class="bi bi-lightning-charge"></i> <?php echo $config["name"]; ?>
            <?php } else { ?>
            <img src="assets/themes/<?php echo $config["theme"]; echo "/img/"; echo $config["logo"]; ?>" height="50px" width="300px" alt="<?php echo $config["name"]; ?> Logo">
            <?php } ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php if($page=="home") { echo "active";} ?>">
                    <a class="nav-link" href="?page=home"><i class="bi bi-house-door"></i> Home</a>
                </li>
                <li class="nav-item <?php if($page=="latest") { echo "active";} ?>">
                    <a class="nav-link " href="?page=latest"><i class="bi bi-clock-history"></i> Latest</a>
                </li>
                <li class="nav-item <?php if($page=="manga") { echo "active";} ?>">
                    <a class="nav-link" href="?page=manga"><i class="bi bi-journals"></i> Manga</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-share"></i> Socials
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php if(!empty($socials["twitter"])) { ?><a class="dropdown-item"
                            href="<?php echo $socials["twitter"]; ?>" target="_blank"><i class="bi bi-twitter"></i>
                            Twitter</a><?php } ?>
                        <?php if(!empty($socials["mangadex"])) { ?><a class="dropdown-item"
                            href="<?php echo $socials["mangadex"]; ?>" target="_blank"><i class="bi bi-book"></i>
                            MangaDex</a><?php } ?>
                        <?php if(!empty($socials["discord"])) { ?><a class="dropdown-item"
                            href="<?php echo $socials["discord"]; ?>" target="_blank"><i class="bi bi-discord"></i>
                            Discord</a><?php } ?>
                        <?php if(!empty($socials["facebook"])) { ?><a class="dropdown-item"
                            href="<?php echo $socials["facebook"]; ?>" target="_blank"><i class="bi bi-facebook"></i>
                            Facebook</a><?php } ?>
                        <?php if(!empty($socials["website"])) { ?><a class="dropdown-item"
                            href="<?php echo $socials["website"]; ?>" target="_blank"><i
                                class="bi bi-arrow-up-right-square"></i> Website</a><?php } ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?page=github"><i class="bi bi-github"></i> GitHub</a>
                        <a class="dropdown-item" href="?page=about"><i class="bi bi-info-square"></i> About</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <?php if(!isset($_SESSION['loggedin'])) { ?>
                <b class="nav-item align-right <?php if($page=="login") { echo "active";} ?>">
                    <a class="nav-link" href="?page=login"><i class="bi bi-person-check-fill"></i> Login</a>
                </b>
                <?php } else { ?>
                <b class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-person-circle"></i> Account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="?page=admin"><i class="bi bi-sliders"></i> Admin CP</a>
                        <a class="dropdown-item" href="?page=add"><i class="bi bi-journal-plus"></i> Add Manga</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?page=logout"><i class="bi bi-box-arrow-right"></i> Logout</a>
                    </div>
                </b>
                <?php } ?>
            </form>
        </div>
    </nav>
</div>

<div id="container">