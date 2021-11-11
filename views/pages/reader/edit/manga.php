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
        $mALTER = $erow["alternates"];
        $mSCANL = $erow["scanlating"];
        $mURL = $erow["url"];
        $mDESC = $erow["description"];
        if(empty($kami)) {
            $kami = $mCOVER;
        }
    }
} else {
    echo "Manga Error";
} ?>

<form name="edit-manga" method="POST" action="">
    <div class="row">
        <div class="col-12">
            <h3>Update Manga Info for <a href="?page=view&manga=<?php echo $mURL; ?>"><?php echo $mTITLE; ?></a></h3>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Manga Title</span>
                <input type="text" name="manga_title" value="<?php echo $mTITLE; ?>" class="form-control" aria-describedby="basic-addon1">
            </div>
            <div class="input-group">
                <span class="input-group-text">Alternative Titles</span>
                <textarea type="textfield" name="manga_alternates" class="form-control"><?php echo $mALTER; ?></textarea>
            </div><br>
            <select class="form-select" name="manga_scanlating" aria-label="Default select example">
                <option value="0">Scanlation Status*</option>
                <option <?php if($mSCANL=="0") { echo "selected"; } ?> value="0">Planned</option>
                <option <?php if($mSCANL=="1") { echo "selected"; } ?> value="1">In Work</option>
                <option <?php if($mSCANL=="2") { echo "selected"; } ?> value="2">Hiatus</option>
                <option <?php if($mSCANL=="3") { echo "selected"; } ?> value="3">Finished</option>
                <option <?php if($mSCANL=="4") { echo "selected"; } ?> value="4">Dropped</option>
            </select><br><br>
            <div class="input-group">
                <span class="input-group-text">Description<br>[Supports HTML]</span>
                <textarea type="textfield" name="manga_description" class="form-control"><?php echo $mDESC; ?></textarea>
            </div>
            <input type="text" name="manga_url" value="<?php echo $mURL; ?>" style="display:none">
            <input type="text" name="manga_cover" value="<?php echo $kami; ?>" style="display:none"><br>
        </div>
        <div class="col-12">
            <input id="submit" type="submit" name="edit-manga" value="Update Manga!">
        </div>
    </div>
</form>

<?php } else {
    echo "<script type='text/javascript'> document.location = 'index.php?page=login'; </script>";
} ?>
