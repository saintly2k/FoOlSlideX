<?php

if(isset($_GET["manga"])) {
    include("views/pages/reader/manga.php");
}
if(!isset($_GET["manga"])) {
    include("views/pages/reader/chapter.php");
}

?>