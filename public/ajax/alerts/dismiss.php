<?php

require "../../../autoload.php";

if (!$logged) die("You're not logged in!");

$topAlert = $db["alerts"]->findAll(["id" => "DESC"], 1)[0];
if (!empty($topAlert)) {
    $readAlert = !empty($db["alerts"]->findOneBy([["user", "=", $user["id"]], "AND", ["alert", "=", $topAlert["id"]]])) ? true : false;

    if (!$readAlert) {
        $data = array(
            "user" => $user["id"],
            "alert" => $topAlert["id"],
            "timestamp" => now()
        );
        $db["alertReads"]->insert($data);
        die("success");
    } else {
        die("Already dismissed!");
    }
} else {
    die("No alert to dismiss!");
}
