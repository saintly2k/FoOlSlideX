<?php

$addStep = $_GET["step"];
if(empty($addStep)) {
    $addStep = "1";
}
if(isset($_SESSION["username"])) { ?>

<div id="content">

    <title>Add Manga .::. <?php echo $config["name"]; ?></title>

    <h3>Add Manga</h3>

    <?php if($addStep=="1") { ?>
    <?php include("views/pages/mini/upload-img.php"); ?>
    <?php } ?>

    <?php if($addStep=="2") { ?>
    <form name="add-manga" method="post" action="">
        <div class="row">
            <div class="col-12">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Manga Title*</span>
                    <input type="text" class="form-control" name="manga_title" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group">
                    <span class="input-group-text">Alternative Titles</span>
                    <textarea type="textfield" name="manga_alternates" class="form-control"></textarea>
                </div><br>
                <select class="form-select" name="manga_scanlating" aria-label="Default select example">
                    <option selected>Scanlation Status*</option>
                    <option value="0">Planned</option>
                    <option value="1">In Work</option>
                    <option value="2">Hiatus</option>
                    <option value="3">Finished</option>
                    <option value="4">Dropped</option>
                </select><br><br>
                <div class="input-group mb-3">
                    <span class="input-group-text">Description</span>
                    <textarea type="textfield" name="manga_description" class="form-control"></textarea>
                </div>
                <input value="<?php echo $_GET["file"]; ?>" style="display:none" name="manga_cover">
            </div>
            <div class="col-12">
                <input type="submit" value="Add Manga!" name="add-manga" style="width:100%">
            </div>
        </div>
    </form>

    <?php } ?>

</div>

<?php } else {
    echo "<script type='text/javascript'> document.location = 'index.php?page=login'; </script>";
}

?>
