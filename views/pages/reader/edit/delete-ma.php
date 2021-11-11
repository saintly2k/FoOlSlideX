<?php

$manga2delete = $_GET["manga"];

?>
<?php if(isset($_SESSION["username"])) { ?>
<title>Delete Manga .::. <?php echo $config["name"]; ?></title>
<link type="text/css" href="assets/themes/<?php echo $config["theme"]; ?>/css/login.css" rel="stylesheet">
<form action="" method="POST" name="delete-manga">
    <div class="row">
        <div class="col-12">
            <b>Are you sure you want to do that? (Won't delete Chapters)</b>
            <input type="text" style="display:none" name="manga_url" value="<?php echo $manga2delete; ?>">
        </div><br><br>
        <div class="col-6">
            <input style="color:red" type="submit" name="delete-manga" value="Yes, delete the Manga.">
        </div>
        <div class="col-6">
            <a href="index.php?page=view&manga=<?php echo $manga2delete; ?>">No, I reconsidered.</a>
        </div>
    </div>
</form>
<?php } else {
echo "<script type='text/javascript'> document.location = 'index.php?page=login'; </script>";
} ?>
