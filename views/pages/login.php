<div id="content">
    <title>Login .::. <?php echo $config["name"]; ?></title>
    <link type="text/css" href="assets/themes/<?php echo $config["theme"]; ?>/css/login.css" rel="stylesheet">

    <style>
    </style>

    <?php

$included=true;
require_once("users.php");
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    echo 'You are already logged in.';
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}

if (!isset($_POST['username'])) {
echo '<form name="login" method="post" action="">
<div class="row">
<div class="col-6">
<input type="text" id="login-name" name="username" placeholder="Username" value="Username"><br><br>
</div>
<div class="col-6">
<input type="password" id="login-password" name="password" placeholder="Password"><br><br>
</div>
<div class="col-12">
<input id="submit" type="submit" value="Login!">
</div>
</div>
</form>';
} else {
   if (in_array($_POST['username'], $usernames))  {
       if ($passwords[$_POST['username']] == $_POST['password']) {
         $_SESSION['loggedin'] = true;
         $_SESSION['username'] = $_POST['username'];
         $_SESSION['password'] = $_POST['password'];
         echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
       } else {
         echo 'Invalid username or password given!';
       }
    } else {
      echo "This is not a recognised user!";
   }
}

?>

</div>