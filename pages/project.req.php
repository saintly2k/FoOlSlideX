<?php

$projectURL = $_GET["manga"];
$projectSQL = $conn->query("SELECT * FROM `mangas` WHERE `url`='$projectURL' LIMIT 1");
$manga = mysqli_fetch_assoc($projectSQL);
$mangaID = $manga["id"];
$chapterSQL = $conn->query("SELECT * FROM `chapters` ORDER BY LENGTH(`episode`), `episode` WHERE `mid`='$mangaID'");

if($manga["status"]=="1") {
    $manga["status"] = "Planned";
} elseif($manga["status"]=="2") {
    $manga["status"] = "Scanlating";
} elseif($manga["status"]=="3") {
    $manga["status"] = "Hiatus";
} elseif($manga["status"]=="4") {
    $manga["status"] = "Finished";
} else {
    $manga["status"] = "Dropped";
}

?>

<title><?= $manga["name"] ?> | <?= $config["name"] ?></title>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="bi bi-book"></i> <?= $manga["name"]; ?></h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div id="view-manga" style="display:block">
                <div class="col-sm-3">
                    <img src="<?= $config["url"]."uploads/covers/".$manga["id"].".".$manga["cover"] ?>" width="100%" alt="<?= $manga["name"] ?> Cover Image" title="<?= $manga["name"] ?>">
                </div>
                <div class="col-sm-9">
                    <table class="table table-condensed">
                        <tr>
                            <th style="border-top: 0;">Alternate Titles:</th>
                            <td style="border-top: 0;"><?= $manga["alternates"] ?></td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td><?= $manga["status"] ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-12">
                    <br>
                    <?= $manga["description"] ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title">Chapter List</h3>
    </div>
    <div class="panel-body">

    </div>
</div>
