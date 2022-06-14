<?php

$conn = new mysqli($slave["host"],$slave["user"],$slave["pass"],$slave["table"]);
$conn->set_charset("utf8mb4");

if($conn->connect_error) {
    die("Database Error: " . $conn->connect_error);
}

?>