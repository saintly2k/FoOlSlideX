<?php

// User-Registration
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

    // Checking if user already exists
    $user_check_query = "SELECT * FROM `users` WHERE `username`='$username' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
  
    if ($user) { // if already exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already taken!");
        }
    }

    // Register User, if everything fine
    if (count($errors) == 0) {
        $password = md5($password_1); //Encrypting password
        
        $hella = $conn->query("SELECT `id` FROM `users` ORDER BY `id` DESC LIMIT 1");
        if($row = mysqli_fetch_assoc($hella)) {
            $latestID = $row['id'];
        }
        $latestID++;
        
        $source = 'uploads/avatars/0.jpg'; 
        $destination = 'uploads/avatars/'.$latestID.'.jpg'; 
        
        if(!copy($source, $destination)) { 
            echo "Avatar couldn't be created! \n"; 
        } 
        else { 
            echo "Avatar has been created! \n"; 
        }

        $query = "INSERT INTO `users` (`id`, `username`, `password`, `usergroup`, `theme`, `image`) VALUES (NULL,'$username', '$password', '3', '1', 'jpg')";
        mysqli_query($conn, $query);
        header('location: '.$config["url"].'login');
    }
}

if(isset($_POST["login_user"])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $staylogged = mysqli_real_escape_string($conn, $post["remember_me"]);
    $hpassword = md5($password);
    $checkAccount = $conn->query("SELECT * FROM `users` WHERE `username`='$username' AND `password`='$hpassword' LIMIT 1");
    if(mysqli_num_rows($checkAccount) == 1) {
        $_SESSION['username'] = $username;
        if($staylogged=="1") {
            setcookie("loggedincookie", $username, time()+(86400*30), "/");
        }
        header('location: '.$config["url"].'');
    } else {
        echo '<div class="container"><div id="announcement" class="alert alert-danger alert-dismissible text-center" role="alert"><strong>Error:</strong> Your Login-details are wrong!</div></div>';
    }
}

?>
