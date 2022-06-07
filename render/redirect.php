<?php

if($_GET["page"]=="login") {
    header("location: login");
} elseif($_GET["page"]=="signup") {
    header("location: signup");
}

?>