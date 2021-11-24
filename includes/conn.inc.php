<?php

$conn = new mysqli($based["host"], $based["user"], $based["pass"], $based["table"]);
$conn->set_charset('utf8mb4'); // For proper encoding & no errors

if ($conn->connect_error) {
    // Something went wrong?
  die("Couldn't connect to Database: " . $conn->connect_error);
}

if(isset($_SESSION["username"])) {
    // Execute Database search for user with username
    $uName = $_SESSION["username"];
    $userquery = $conn->query("SELECT * FROM `users` WHERE `username`='$uName' LIMIT 1");
    $user = mysqli_fetch_assoc($userquery);
    $uName = $user["username"];
    $uTheme = $user["theme"];
    $uGroup = $user["usergroup"];
} else {
    // Guest User
    $uTheme = $config["theme"]; // Get default theme
    $uGroup = "3"; // 3 = Reader; 2 = Uploader; 1 = Administrator, see "devnotes.txt"
}

?>
