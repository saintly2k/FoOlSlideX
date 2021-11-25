<?php

// Get the total number of records from our table "students".
$total_pages = $conn->query('SELECT COUNT(*) FROM `mangas`')->fetch_row()[0];

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['pagination']) && is_numeric($_GET['pagination']) ? $_GET['pagination'] : 1;

// Number of results to show on each page.
$num_results_on_page = "25";

if ($stmt = $conn->prepare('SELECT * FROM `mangas` ORDER BY `name` LIMIT ?,?')) {
	// Calculate the page to get the results we need from our table.
	$calc_page = ($page - 1) * $num_results_on_page;
	$stmt->bind_param('ii', $calc_page, $num_results_on_page);
	$stmt->execute(); 
	// Get the results...
	$result = $stmt->get_result();
	$stmt->close();
}

?>

<title>Mangas - Page <?php echo $page; ?> | <?php echo $config["name"]; ?></title>
<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">Mangas</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover">
                <thead>
                    <tr>
                        <th width="15%">Cover</th>
                        <th width="65%">Title</th>
                        <th width="10%" class="text-right">Chapters</th>
                        <th width="10%" class="text-right">Latest</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($mrow = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><a href="<?php echo $config["url"]."project/".$mrow["url"]; ?>"><img src="<?php echo $config["url"]."uploads/covers/".$mrow["id"].".".$mrow["cover"]; ?>" width="100%"></a></td>
                        <td><b><a href="<?php echo $config["url"]."project/".$mrow["url"]; ?>"><?php echo $mrow["name"]; ?></a></b><br><i><?php echo $mrow["alternates"]; ?></i><br><?php echo $mrow["description"]; ?></td>
                        <td class="text-right">
                            <?php
                                $mid = $mrow["id"];
                                $chapters = $conn->query("SELECT COUNT(*) AS total FROM `chapters` WHERE `mid`='$mid'");
                                $chapters=mysqli_fetch_assoc($chapters);
                                echo $chapters["total"];
                            ?>
                        </td>
                        <td class="text-right">
                            <?php
                                /*latestk = $conn->query("SELECT `timestamp` FROM `chapters` AS tstamp ORDER BY `timestamp` DESC WHERE `mid`='$mid' LIMIT 1");
                                $latestm=mysqli_fetch_assoc($latestk);
                                echo $latestm["tstamp"];*/
                                echo "WIP";
                            ?>
                        </td>
                    </tr>
                    <?php }
                    } else {
                        echo "No Mangas found.";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel-body text-center">

        <?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
        <ul class="pagination">
            <?php if ($page > 1): ?>
            <li class="prev"><a href="<?php echo $config["url"]; echo "mangas/"; echo $page-1 ?>">Prev</a></li>
            <?php endif; ?>

            <?php if ($page > 3): ?>
            <li class="start"><a href="<?php echo $config["url"]; echo "mangas/"; ?>1">1</a></li>
            <li class="dots"></li>
            <?php endif; ?>

            <?php if ($page-2 > 0): ?><li class="page"><a href="<?php echo $config["url"]; echo "mangas/"; echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
            <?php if ($page-1 > 0): ?><li class="page"><a href="<?php echo $config["url"]; echo "mangas/"; echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

            <li class="currentpage"><a href="<?php echo $config["url"]; echo "mangas/"; echo $page; ?>"><?php echo $page ?></a></li>

            <?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="<?php echo $config["url"]; echo "mangas/"; echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
            <?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="<?php echo $config["url"]; echo "mangas/"; echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

            <?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
            <li class="dots"></li>
            <li class="end"><a href="<?php echo $config["url"]; echo "mangas/"; echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
            <?php endif; ?>

            <?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
            <li class="next"><a href="<?php echo $config["url"]; echo "mangas/"; echo $page+1 ?>">Next</a></li>
            <?php endif; ?>
        </ul>
        <?php endif; ?>
    </div>
</div>
