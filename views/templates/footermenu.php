<div id="menu">
    <nav class="navbar bottom navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo $config["url"]; ?>">
            <?php if(empty($config["logo"])) { ?>
            <i class="bi bi-lightning-charge"></i> <?php echo $config["name"]; ?>
            <?php } else { ?>
            <img src="assets/themes/<?php echo $config["theme"]; echo "/img/"; echo $config["logo"]; ?>" height="25px" width="150px" alt="<?php echo $config["name"]; ?> Logo">
            <?php } ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php if($hh=="home") { echo "active";} ?>">
                    <a class="nav-link" href="?page=home"><i class="bi bi-house-door"></i> Home</a>
                </li>
                <li class="nav-item <?php if($hh=="latest") { echo "active";} ?>">
                    <a class="nav-link " href="?page=latest"><i class="bi bi-clock-history"></i> Latest</a>
                </li>
                <li class="nav-item <?php if($hh=="manga") { echo "active";} ?>">
                    <a class="nav-link" href="?page=manga"><i class="bi bi-journals"></i> Manga</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input action="action" onclick="window.history.go(-1); return false;" type="submit" value="Go one step back" />
            </form>
        </div>
    </nav>
</div>
