<?php

if(isset($_SESSION["username"])) { ?>

<div id="content">

    <title>Add Manga .::. <?php echo $config["name"]; ?></title>

    <h3>Add Manga</h3>

    <?php include("views/pages/mini/upload.php"); ?>

    <form name="add-manga" method="post" action="">
        Manga Title: <input type="text" name="manga_title"><br>
        Alternative Names: <textarea type="textfield" name="manga_alternates"></textarea><br>
        Scanlting Currently (1 for yes, 0 for no): <input type="text" name="manga_scanlating"><br>
        Description: <textarea type="textfield" name="manga_description"></textarea><br>
        <input required value="<?php echo $kami; ?>" style="display:none" name="manga_cover">
        <input type="submit" value="Add Manga!" name="add-manga">
    </form>

</div>

<?php } else {
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}

?>