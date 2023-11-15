<?php

// Creation Time
$end = microtime(true);
$creationtime = ($end - $start);
$renderTime = $creationtime;
$smarty->assign("rendertime", $renderTime);
