<?php

require("config.php");

$conn = new mysqli($based["host"], $based["user"], $based["pass"], $based["table"]);

// Check connection
if ($conn->connect_error) {
  die("Connection failed. Error: " . $conn->connect_error);
}
$success = "Connected successfully!";

?>