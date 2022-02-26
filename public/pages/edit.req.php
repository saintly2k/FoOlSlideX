<?php 

$type = mysqli_real_escape_string($conn, $_GET["type"]);
$id = mysqli_real_escape_string($conn, $_GET["id"]);

if($type=="manga") {
    
    $manga = $conn->query("SELECT * FROM `project` WHERE `id`='$id' LIMIT 1");
    $manga = mysqli_fetch_assoc($manga);

?>

Edit Manga!

<?php } elseif($type=="chapter") { ?>

Edit Chapter!

<?php } else { ?>

This should NOT have happened...

<?php } ?>