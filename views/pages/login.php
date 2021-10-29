<div id="content">

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
Username: <input type="text" name="username"><br>
Password: <input type="password" name="password"><br>
<input type="submit" value="Login!">
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