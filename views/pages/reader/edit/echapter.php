<title>Edit Chapter .::. <?php echo $config["name"]; ?></title>
<link href="assets/themes/<?php echo $config["theme"]; ?>/css/edit.css" type="text/css" rel="stylesheet">

<form name="edit-chapter" method="POST" action="">
    <div class="row">
        <div class="col-12">
            <h3>Edit Chapter <?php echo $chapterNumber; ?> of <a href="?page=view&manga=<?php echo $mID; ?>"><?php echo $mTITLE; ?></a></h3>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">chapters/</span>
                <input type="text" class="form-control" name="chapter_directory" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $chapterDirectory; ?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Title</span>
                <input type="text" class="form-control" name="chapter_title" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $chapterTitle; ?>">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Chapter (NO ZEROPADDING)</span>
                <input type="text" class="form-control" name="chapter_number" id="basic-url" aria-describedby="basic-addon3" value="<?php echo $chapterNumber; ?>">
            </div>
            <input type="text" name="manga_url" value="<?php echo $mID; ?>" style="display:none">
            <input type="text" name="chapter_url" value="<?php echo $_GET["chapter"]; ?>" style="display:none">
            <input type="text" name="manga_id" value="<?php echo $mID2; ?>" style="display:none">
        </div>
        <div class="col-12">
            <input id="submit" type="submit" name="edit-chapter" value="Edit Chapter!">
        </div>
    </div>
</form>
