<?php

$mangaURL = $_GET["manga"];

$sql2 = "SELECT * FROM mangas WHERE url='$mangaURL'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while($mrow = $result2->fetch_assoc()) {
        $manga["title"] = $mrow["title"];
        $manga["cover"] = $mrow["cover"];
        $manga["alternates"] = $mrow["alternates"];
        $manga["scanlating"] = $mrow["scanlating"];
        $manga["description"] = $mrow["description"];
        if($manga["scanlating"]=="1") {
            $manga["scanlating"] = "Scanlating";
        } else {
            $manga["scanlating"] = "Finished";
        }
        $mID = $mrow["id"];
    }
} else {
    echo "Error?!";
}

?>

<div id="content">

<div class="row">

<div class="col-2">
<img src="assets/covers/<?php echo $manga["cover"]; ?>" style="width:100%;">
</div>

<div class="col-3">
    <h3><?php echo $manga["title"]; ?></h3>
</div>

<div class="col-7">
    <p><?php echo $manga["description"]; ?></p>
</div>

<div class="col-12">
<?php
$sql3 = "SELECT * FROM chapters WHERE manga='$mID' ORDER BY chapter ASC";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
    while($crow = $result3->fetch_assoc()) {
        echo "Chapter ".$crow["chapter"]." - <a href='?page=view&chapter=".$crow["url"]."'>".$crow["title"]."</a> <span class='align-right'>".$crow["date"]."</span><br>";
    }
} else {
    echo "No chapters yet?!";
}
?>
</div>

</div>

</div>