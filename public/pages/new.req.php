<?php

$action = mysqli_real_escape_string($conn, $_GET["action"]);

if($action=="project") { ?>

<?= title($lang["new"]["project"]["title"]) ?>

<?php 
    
} elseif($action=="chapter") {

?>

Add a new chapter!

<?php } else { ?>

No... that's not how it should go!

<?php } ?>
