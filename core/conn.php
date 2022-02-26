<?php

$conn = new mysqli($db["host"], $db["user"], $db["pass"], $db["tale"]);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    // Something went wrong?
    die("Couldn't connect to Database: " . $conn->connect_error);
}

?>
