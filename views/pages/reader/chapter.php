    <?php

$chID = $_GET["chapter"];
        
$mangaSQL = "SELECT * FROM chapters WHERE url='$chID'";
$mangaResult = $conn->query($mangaSQL);

if ($mangaResult->num_rows > 0) {
    while($mrow = $mangaResult->fetch_assoc()) {
        $mID2 = $mrow["manga"];
        $chapterTitle = $mrow["title"];
        $chapterNumber = $mrow["chapter"];
    }
} else {
    echo "Manga Error";
}

$sql2 = "SELECT * FROM mangas WHERE id='$mID2'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while($mrow = $result2->fetch_assoc()) {
        $mID = $mrow["url"];
        $mTITLE = $mrow["title"];
    }
} else {
    echo "Error?!";
}

$chapterSQL = "SELECT * FROM chapters WHERE manga='$mID2' AND url='$chID' ORDER BY chapter ASC";
$chapterResult = $conn->query($chapterSQL);

if ($chapterResult->num_rows > 0) {
    while($chrow = $chapterResult->fetch_assoc()) {
        $imageFolder = "chapters/".$chrow["images"]."/";
    }
} else {
    echo "Error??!?";
}

?>
    <div id="content" style="height:100%;background:cornsilk;">

        <style>
            span.currManga {
                color: orange;
            }

        </style>
        <div class="row">
            <div class="col-10">
                <h3><?php echo $mTITLE; ?> - Chapter <?php echo $chapterNumber; ?>: <?php echo $chapterTitle; ?></h3>
                <?php include("views/pages/reader/images.php"); ?>
            </div>
            <div class="col-2" id="chapter-select" style="position: sticky; top: 0;padding-top:25%;height:min-content;border-radius:5px;width:100px;">

                <li class="nav-item dropdown" style="list-style:none;">
                    <a href="?page=view&manga=<?php echo $mID; ?>" class="nav-link" role="button"><i class="bi bi-arrow-return-right"></i> Back to Manga</a>
                    <div class="dropdown-menu"></div>
                </li>


                <li class="nav-item dropdown" style="list-style:none;">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-list-ol"></i> Chapter Select
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
        
        $chapterSQL = "SELECT * FROM chapters WHERE manga='$mID2' ORDER BY chapter ASC";
        $chapterResult = $conn->query($chapterSQL);

        if ($chapterResult->num_rows > 0) {
            while($chrow = $chapterResult->fetch_assoc()) {
                echo "<a class='dropdown-item' href='?page=view&chapter=";
                echo $chrow["url"];
                echo "'><span";
                if($chrow["url"]==$chID) {
                    echo " class='currManga'";
                }
                echo ">Chapter ".$chrow["chapter"]."</span></a>";
            }
        } else {
            echo "No chapters yet?!";
        }
        
        ?>
                    </div>
                </li>
            </div>
        </div>
        
<title><?php echo $mTITLE; ?> - Chapter <?php echo $chapterNumber; ?>: <?php echo $chapterTitle; ?> .::. <?php echo $config["name"]; ?></title>

    </div>
