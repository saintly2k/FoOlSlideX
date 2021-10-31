<?php

session_start(); 
session_unset(); 
session_destroy(); 

?>
<title>Logout .::. <?php echo $config["name"]; ?></title>

<script type='text/javascript'> document.location = 'index.php'; </script>
