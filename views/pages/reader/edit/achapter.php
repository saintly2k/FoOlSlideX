<title>Add Chapter .::. <?php echo $config["name"]; ?></title>
<?php
$energy = $_GET["file"];
?>
<link href="assets/themes/<?php echo $config["theme"]; ?>/css/edit.css" type="text/css" rel="stylesheet">
<?php if(isset($_SESSION["username"])) { ?>

<form name="add-chapter" method="POST" action="">
<div class="row">
    <?php if(!isset($energy)) {
        include("views/pages/mini/unzip.php");
    } else { ?>
    <div class="col-9">
        <h3>Add a Chapter for <a href="?page=view&manga=<?php echo $manga["url"]; ?>"><?php echo $manga["title"]; ?></a></h3>
        <input type="text" name="manga_title" placeholder="Manga Title" value="<?php echo $mTITLE; ?>"><br><br>
        <textarea name="manga_alternates" placeholder="Alternate Manga Titles" style="width:100%;"><?php echo $mALTER; ?></textarea><br><br>
        <input type="text" name="manga_scanlating" placeholder="Scanlation Status (1 for Scanlating, 0 for Dropped/Finished)" value="<?php echo $mSCANL; ?>"><br><br>
        <textarea name="manga_description" placeholder="Manga Description" style="width:100%;"><?php echo $mDESC; ?></textarea><br><br>
        <input type="text" name="manga_url" value="<?php echo $mURL; ?>" style="display:none"><br><br>
        <input type="text" name="manga_cover" value="<?php echo $kami; ?>" style="display:none"><br><br>
    </div>
    <div class="col-12">
        <input id="submit" type="submit" name="edit-manga" value="Update Manga!">
    </div>
    <?php } ?>
</div>
</form>

<?php } else {
echo "<script type='text/javascript'> document.location = 'index.php?page=login'; </script>";
} ?>