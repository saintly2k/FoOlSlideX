<title>Edit Chapter .::. <?php echo $config["name"]; ?></title>
<link href="assets/themes/<?php echo $config["theme"]; ?>/css/edit.css" type="text/css" rel="stylesheet">

<form name="edit-chapter" method="POST" action="">
    <div class="row">
        <div class="col-12">
            <h3>Edit Chapter <?php echo $chapterNumber; ?> of <a
                    href="?page=view&manga=<?php echo $mID; ?>"><?php echo $mTITLE; ?></a></h3>
            <input type="text" name="chapter_directory" placeholder="Image Direcory (Located in chapters/ ENDS WITH SLASH!!)" value="<?php echo $chapterDirectory; ?>"><br><br>
            <input type="text" name="chapter_title" placeholder="Chapter Title (leave blank for no title)" value="<?php echo $chapterTitle; ?>"><br><br>
            <input type="text" name="chapter_number"
                placeholder="[REQUIRED] Chapter Number (DON'T ZEROPAD like 02, tpye 2!!!)" value="<?php echo $chapterNumber; ?>">
            <input type="text" name="manga_url" value="<?php echo $mID; ?>" style="display:none">
            <input type="text" name="manga_id" value="<?php echo $mID2; ?>" style="display:none"><br><br>
        </div>
        <div class="col-12">
            <input id="submit" type="submit" name="edit-chapter" value="Edit Chapter!">
        </div>
    </div>
</form>