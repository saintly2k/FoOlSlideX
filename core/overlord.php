<?php

function generateURL($length = 5) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$ranSlug = generateURL(5)."-".generateURL(5)."-".generateURL(5)."-".generateURL(5);

if(isset($_POST["add-manga"])) {
    $cover = mysqli_real_escape_string($conn, $_POST["manga_cover"]);
    $title = mysqli_real_escape_string($conn, $_POST["manga_title"]);
    $alternates = mysqli_real_escape_string($conn, $_POST["manga_alternates"]);
    $scanlating = mysqli_real_escape_string($conn, $_POST["manga_scanlating"]);
    $url = mysqli_real_escape_string($conn, $ranSlug);
    $description = mysqli_real_escape_string($conn, $_POST["manga_description"]);
    
    $query = "INSERT INTO `mangas`(`title`, `cover`, `alternates`, `scanlating`, `url`, `description`) VALUES ('$title','$cover','$alternates','$scanlating','$url','$description')";
    mysqli_query($conn, $query);
    echo "<script type='text/javascript'> document.location = 'index.php?page=view&manga=$url'; </script>";
}

?>