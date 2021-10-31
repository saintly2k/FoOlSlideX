<?php

$mangaURL = $_GET["manga"];

$sql2 = "SELECT * FROM mangas WHERE url='$mangaURL'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    while($mrow = $result2->fetch_assoc()) {
        $manga["title"] = $mrow["title"];
        $manga["url"] = $mrow["url"];
        $manga["cover"] = $mrow["cover"];
        $manga["alternates"] = $mrow["alternates"];
        $manga["scanlating"] = $mrow["scanlating"];
        $manga["description"] = $mrow["description"];
        if($manga["scanlating"]=="1") {
            $manga["scanlating"] = "Scanlating (In work)";
        } else {
            $manga["scanlating"] = "Paused/Finished";
        }
        $mID = $mrow["id"];
    }
} else {
    echo "Error?!";
}

?>

<div id="content" style="height:100%;background:cornsilk;">
<title><?php echo $manga["title"]; ?> .::. <?php echo $config["name"]; ?></title>

    <div class="row">

        <div class="col-2">
            <img src="assets/covers/<?php echo $manga["cover"]; ?>" style="width:100%;">
        </div>

        <div class="col-3">
            <h3><?php echo $manga["title"]; ?></h3>
            <?php if(!empty($manga["alternates"])) { ?>
            <p>Alternate Titles:<br> <?php echo $manga["alternates"]; ?></p>
            <?php } ?>
            <?php if(isset($_SESSION["username"])) { ?>
            <li class="nav-item dropdown" style="list-style:none">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-cpu"></i> Admin Tools
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?page=view&manga=<?php echo $manga["url"]; ?>&action=edit"><i class="bi bi-pencil"></i> Edit Manga</a>
                    <a class="dropdown-item" href="?page=view&manga=<?php echo $manga["url"]; ?>&action=add"><i class="bi bi-file-earmark-plus"></i> Add Chapter</a>
                </div>
            </li>
            <?php } ?>
        </div>

        <div class="col-7">
            <p><?php echo $manga["description"]; ?></p>
            <p>Progress: <?php echo $manga["scanlating"]; ?></p>
        </div>

        <div class="col-12">
            <hr>
        </div>

        <div class="col-12">
            <?php
$sql3 = "SELECT * FROM chapters WHERE manga='$mID' ORDER BY chapter ASC";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
    while($crow = $result3->fetch_assoc()) {
        echo "<a href='?page=view&chapter=".$crow["url"]."'>Chapter ".$crow["chapter"]." - ".$crow["title"]."</a> <span class='align-right'>".$crow["date"];
        if(isset($_SESSION["username"])) {
            echo " | <a href='?page=view&chapter=".$crow["url"]."&action=edit'><i class='bi bi-pencil'></i> Edit Chapter</a>";
        }
        echo "</span><br>";
    }
} else {
    echo "No chapters yet?!";
}
?>
        </div>

    </div>

</div>
