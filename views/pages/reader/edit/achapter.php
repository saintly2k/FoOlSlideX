<title>Add Chapter .::. <?php echo $config["name"]; ?></title>
<?php
$energy = $_GET["file"];
$addStep = $_GET["step"];
if(empty($addStep)) {
    $addStep = "1";
}
?>
<link href="assets/themes/<?php echo $config["theme"]; ?>/css/edit.css" type="text/css" rel="stylesheet">
<?php if(isset($_SESSION["username"])) { ?>

<?php if($addStep=="1") { ?>
<?php if(isset($_POST["xxxkasgd"])) {
    $wtfXDD = $_POST["kysxdd"];
}
?>
<form name="wadhugdsiuhfiuh" method="POST" action="">
    <?php if(isset($wtfXDD)) { ?>
    <div class="row">
        <div class="col-6">
            <p><b><?php echo $wtfXDD; ?></b></p>
        </div>
        <div class="col-6">
            <a href="index.php?page=view&manga=<?php echo $manga["url"]; ?>&action=add&step=2&file=<?php echo $wtfXDD; ?>">Yeah, that's where my Chapter is located!</a><br><br>
            <a href="">Nope, that ain't my Chapter...</a>
        </div>
    </div>
    <?php } else { ?>
    <input type="text" name="kysxdd" placeholder="Directory with Images inside (located in: chapters/)"><br><br>
    <input type="submit" name="xxxkasgd" value="Set Chapter-Directory!">
    <?php } ?>
</form>
<?php } ?>

<?php if($addStep=="2") { ?>
<form name="add-chapter" method="POST" action="">
    <div class="row">
        <div class="col-12">
            <h3>Add a Chapter for <a href="?page=view&manga=<?php echo $manga["url"]; ?>"><?php echo $manga["title"]; ?></a></h3>
            <input type="text" name="chapter_title" placeholder="Chapter Title (leave blank for no title)"><br><br>
            <input type="text" name="chapter_number" placeholder="[REQUIRED] Chapter Number (DON'T ZEROPAD like 02, tpye 2!!!)">
            <input type="text" name="manga_url" value="<?php echo $manga["url"]; ?>" style="display:none">
            <input type="text" name="manga_id" value="<?php echo $mID; ?>" style="display:none">
            <input type="text" name="chapter_directory" value="<?php echo $energy; ?>" style="display:none"><br><br>
        </div>
        <div class="col-12">
            <input id="submit" type="submit" name="add-chapter" value="Add Chapter!">
        </div>
    </div>
</form>
<?php } ?>

<?php } else {
echo "<script type='text/javascript'> document.location = 'index.php?page=login'; </script>";
} ?>
