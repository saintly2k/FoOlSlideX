<?php

if(in_array($page, $require_login) && $loggedin==false) {
    header("location: ?page=login");
}

if(in_array($page, $require_team) && $user["level"]>10) {
    header("location: ?page=404");
}

if(in_array($page, $require_admin) && $user["level"]!=0) {
    header("location: ?page=404");
}

/* ************************************** */

if(!in_array($page, $pages)) {
    $page = "404";
}

?>
