<?php
header('Content-Type: text/javascript');
echo file_get_contents('js/instantclick.js') . file_get_contents('js/loading-indicator.js');
