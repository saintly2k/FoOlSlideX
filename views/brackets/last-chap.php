<?php
$lastChapters = $config["chapters"];
$latestSQL = "SELECT * FROM chapters ORDER BY date DESC LIMIT $lastChapters";
$latestResult = $conn->query($latestSQL);

if ($latestResult->num_rows > 0) {
    while($lrow = $latestResult->fetch_assoc()) {
        $currChapter = $lrow["chapter"];
        $currID = $lrow["id"];
        $currManga = $lrow["manga"];
        $mangaID = $lrow["manga"];
        $mangaSQL = "SELECT * FROM mangas WHERE id='$mangaID'";
        $mangaResult = $conn->query($mangaSQL);
        if($mangaResult->num_rows > 0) {
            while($mrow = $mangaResult->fetch_assoc()) {
                $mangaTITLE = $mrow["title"];
                $mangaURL = $mrow["url"];
            }
        }
        $nextSQL = "SELECT * FROM chapters WHERE id > '$currID' ORDER BY
        date ASC LIMIT 1";
        $nextResult = $conn->query($nextSQL);
        if($nextResult->num_rows > 0) {
            while($nrow = $nextResult->fetch_assoc()) {
                $nextManga = $nrow["manga"];
            }
        }
        if($nextManga!==$currManga) {
            echo "<b><a href='?page=view&manga=".$mangaURL."'><i class='bi bi-book'></i> ".$mangaTITLE."</b></a><span class='align-right'>";
            if(isset($_SESSION["username"])) {
                echo "<a href='?page=view&manga=".$mangaURL."&action=edit'><i class='bi bi-pencil-fill'></i> Edit Manga</a>&#8192";
            }
            echo "</span><br>";
        }
        echo "<li><a href='?page=view&chapter=".$lrow["url"]."'>Chapter ".$lrow["chapter"].": ".$lrow["title"]."</a>";
        echo "<span class='align-right'>".$lrow["date"];
        if(isset($_SESSION["username"])) {
            echo " | <a href='?page=view&chapter=".$lrow["url"]."&action=edit'><i class='bi bi-pencil'></i> Edit Chapter</a>";
        }
        echo "</span></li>";
    }
} else {
    echo "Manga Error";
}
?>
