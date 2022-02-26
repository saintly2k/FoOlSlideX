<?php

if(empty($_GET["page"])) {
    header("location: ?page=releases");
}

$page = mysqli_real_escape_string($conn, $_GET["page"]);

?>
