<?php

if(isset($_SESSION["username"])) { ?>

<div id="content">

    <title>Add Manga .::. <?php echo $config["name"]; ?></title>

    <h3>Add Manga</h3>


    <form name="add-manga" method="post" action="">
        <div class="row">
            <div class="col-4">
                <?php include("views/pages/mini/upload.php"); ?>
            </div>
            <div class="col-8">
                <input type="text" name="manga_title" style="width:100%;" placeholder="[Required] Manga Title"><br><br>
                <textarea type="textfield" name="manga_alternates" style="width:100%;" placeholder="Alternative Titles (Other Languages, Romaji, Original Japanese, etc)"></textarea><br><br>
                <input type="text" name="manga_scanlating" style="width:100%;" placeholder="[Required] Status of scanlation (1 for Scanlating, 0 for Dropped or Finished)"><br><br>
                <textarea type="textfield" name="manga_description" style="width:100%;" placeholder="Description of Manga"></textarea><br><br>
                <input value="<?php echo $kami; ?>" style="display:none" name="manga_cover">
            </div>
            <div class="col-12">
                <input type="submit" value="Add Manga!" name="add-manga" style="width:100%">
            </div>
        </div>
    </form>

</div>

<?php } else {
    echo "<script type='text/javascript'> document.location = 'index.php?page=login'; </script>";
}

?>