<?php

$projectURL = $_GET["manga"];
$projectSQL = $conn->query("SELECT * FROM `mangas` WHERE `url`='$projectURL' LIMIT 1");
$manga = mysqli_fetch_assoc($projectSQL);
$mangaID = $manga["id"];
$chapterSQL = $conn->query("SELECT * FROM `chapters` WHERE `mid`='$mangaID' ORDER BY LENGTH(`number`), `number` DESC");
$editChN = $_GET["chapter"];
echo $editChN;
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
                        <tr>
                            <th>Author(s):</th>
                            <td><?= $manga["author"] ?></td>
                        </tr>
                        <tr>
                            <th>Artist(s):</th>
                            <td><?= $manga["artist"] ?></td>
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
    <div class="panel-body" id="chapter-list" style="display:block">
        <?php
        if ($chapterSQL->num_rows > 0) { ?>
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover">
                <thead>
                    <tr>
                        <th width="10%">Chapter</th>
                        <th width="60%">Title</th>
                        <th width="10%" class="text-right">Uploaded</th>
                        <?php if($uGroup=="2" || $uGroup=="1") { ?><th width="10%" class="text-right">Actions</th> <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php while($crow = $chapterSQL->fetch_assoc()) { ?>
                    <tr>
                        <td>Chapter <?= $crow["number"] ?></td>
                        <td><a href="<?= $config["url"] ?>chapter/<?= $crow["url"] ?>"><?= $crow["title"] ?></a></td>
                        <td class="text-right"><?= $crow["timestamp"] ?></td>
                        <?php if($uGroup=="2" || $uGroup=="1") { ?><th width="10%" class="text-right"><a onclick="editChapter()" href="#edit?chapter=<?= $crow["number"] ?>">Edit</a></th> <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php } else {
            echo "No Chapters have been uploaded for this Manga yet..."; 
        }
        ?>
    </div>
    <div class="panel-body" id="edit-chapter" style="display:none">
        <?php if($uGroup=="2" || $uGroup=="1") { ?>
        <div class="row">
            <?php
            $editSQL = $conn->query("SELECT * FROM `chapters` WHERE `mid`='$mangaID' AND `number`='$editChN' LIMIT 1");
            $edit = mysqli_fetch_assoc($editSQL); ?>
            <form name="edit-chapter" action="" method="POST">
                <div class="form-group">
                    <label class="col-sm-2">Chapter:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?= $edit["number"] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-success" style="width:100%" value="Save Chapter">
                    </div>
                </div>
            </form>
            <div class="col-sm-12">
                <hr>
                <button class="btn btn-danger" onclick="breakChapter()" style="width:100%">Cancel Editing</button>
            </div>
        </div>
        <?php } else {
            echo "Missing Perms";
        } ?>
    </div>
</div>

<script>
    function editChapter() {
        document.getElementById("chapter-list").style.display = "none";
        document.getElementById("edit-chapter").style.display = "block";
    }

    function breakChapter() {
        document.getElementById("chapter-list").style.display = "block";
        document.getElementById("edit-chapter").style.display = "none";
    }

</script>
