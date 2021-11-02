<div id="content">
    <title>Latest Releases .::. <?php echo $config["name"]; ?></title>
    <link tyep="text/css" rel="stylesheet" href="assets/themes/<?php echo $config["theme"]; ?>/css/pagination.css">
    <?php
        
$latestSQL = "SELECT * FROM chapters ORDER BY date DESC";
$latestResult = $conn->query($latestSQL);

$total_pages = $conn->query("SELECT COUNT(*) FROM chapters ORDER BY date DESC")->fetch_row()[0];

        // Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
        $page = isset($_GET['p']) && is_numeric($_GET['p']) ? $_GET['p'] : 1;
        if(empty($page)) {
            $page = "1";
        }

        // Wie viele Anime sollen pro Seite angezeigt werden?
        $num_results_on_page = $perpage["latest"];

        if ($stmt = $conn->prepare("SELECT * FROM chapters ORDER BY  date DESC LIMIT ?,?")) {
            // Calculate the page to get the results we need from our table.
            $calc_page = ($page - 1) * $num_results_on_page;
            $stmt->bind_param('ii', $calc_page, $num_results_on_page);
            $stmt->execute(); 
            // Ausgaben bekommen.........::))))
            $result = $stmt->get_result();
            $stmt->close();
        }

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

<center>
        <?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
        <ul class="pagination">
            <?php if ($page > 1): ?>
            <li class="prev"><a href="?page=latest&p=<?php echo $page-1 ?>">Previous</a></li>
            <?php endif; ?>

            <?php if ($page > 3): ?>
            <li class="start"><a href="?page=latest&p=1">1</a></li>
            <li class="dots">...</li>
            <?php endif; ?>

            <?php if ($page-2 > 0): ?>
            <li class="page">
                <a href="?page=latest&p=<?php echo $page-2 ?>">
                    <?php echo $page-2 ?>
                </a>
            </li>
            <?php endif; ?>
            <?php if ($page-1 > 0): ?>
            <li class="page">
                <a href="?page=latest&p=<?php echo $page-1 ?>">
                    <?php echo $page-1 ?>
                </a>
            </li>
            <?php endif; ?>

            <li class="currentpage">
                <a href="?page=latest&p=<?php echo $page ?>">
                    <?php echo $page ?>
                </a>
            </li>

            <?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?>
            <li class="page">
                <a href="?page=latest&p=<?php echo $page+1 ?>">
                    <?php echo $page+1 ?>
                </a>
            </li>
            <?php endif; ?>
            <?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?>
            <li class="page">
                <a href="?page=latest&p=<?php echo $page+2 ?>">
                    <?php echo $page+2 ?>
                </a>
            </li>
            <?php endif; ?>

            <?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
            <li class="dots">...</li>
            <li class="end">
                <a href="?page=latest&p=<?php echo ceil($total_pages / $num_results_on_page) ?>">
                    <?php echo ceil($total_pages / $num_results_on_page) ?>
                </a>
            </li>
            <?php endif; ?>

            <?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
            <li class="next"><a href="?page=latest&p=<?php echo $page+1 ?>">Next</a>
            </li>
            <?php endif; ?>
        </ul>
        <?php endif; ?>
    </center>

</div>