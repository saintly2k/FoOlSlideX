<?php

if (!file_exists(ps(__DIR__ . "/../secrets/started.txt"))) die("started.txt is missing. did you install the software properly?");
$started = file_get_contents(ps(__DIR__ . "/../secrets/started.txt"));
