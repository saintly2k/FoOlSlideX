<title>Edit Manga .::. <?php echo $config["name"]; ?></title>
<link href="assets/themes/<?php echo $config["theme"]; ?>/css/edit.css" type="text/css" rel="stylesheet">
<?php if(isset($_SESSION["username"])) {

    $editSQL = "SELECT * FROM mangas WHERE url='$mangaURL' LIMIT 1";
$editResult = $conn->query($editSQL);

if ($editResult->num_rows > 0) {
    while($erow = $editResult->fetch_assoc()) {
        $mID = $erow["id"];
        $mTITLE = $erow["title"];
        $mCOVER = $erow["cover"];
        if(empty($kami)) {
            $kami = $mCOVER;
        }
        $mALTER = $erow["alternates"];
        $mSCANL = $erow["scanlating"];
        $mURL = $erow["url"];
        $mDESC = $erow["description"];
    }
} else {
    echo "Manga Error";
} ?>

<form name="edit-manga" method="POST" action="">
    <div class="row">
        <div class="col-3">
            <?php include("views/pages/mini/upload.php"); ?>
        </div>
        <div class="col-9">
            <h3>Update Manga Info for <a href="?page=view&manga=<?php echo $mURL; ?>"><?php echo $mTITLE; ?></a></h3>
            <input type="text" name="manga_title" placeholder="Manga Title" value="<?php echo $mTITLE; ?>"><br><br>
            <textarea name="manga_alternates" placeholder="Alternate Manga Titles" value="<?php echo $mALTER; ?>" style="width:100%;"></textarea><br><br>
            <input type="text" name="manga_scanlating" placeholder="Scanlation Status (1 for Scanlating, 0 for Dropped/Finished)" value="<?php echo $mSCANL; ?>"><br><br>
            <textarea name="manga_description" placeholder="Manga Description" value="<?php echo $mDESC; ?>" style="width:100%;"></textarea><br><br>
            <input type="text" name="manga_url" value="<?php echo $mURL; ?>" style="display:none"><br><br>
            <input type="text" name="manga_cover" value="<?php echo $kami; ?>" style="display:none"><br><br>
        </div>
        <div class="col-12">
            <input id="submit" type="submit" name="edit-manga" value="Update Manga!">
        </div>
    </div>
</form>

<?php } else {
    echo "<script type='text/javascript'> document.location = 'index.php?page=login'; </script>";
} ?>