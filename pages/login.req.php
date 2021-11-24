<title>Login | <?php echo $config["name"]; ?></title>
<?php if(!isset($_SESSION["username"])) { ?>
<div style="margin: 0 auto; width: 300px" id="login_container">
    <form method="post" id="login_form" name="login_user">
        <h1 class="text-center">Login</h1>
        <hr>
        <div class="form-group">
            <label for="login_username" class="sr-only">Username</label>
            <input tabindex="1" type="text" name="username" id="login_username" class="form-control" placeholder="Username" required>
        </div>

        <div class="form-group">
            <label for="login_password" class="sr-only">Password</label>
            <input tabindex="2" type="password" name="password" id="login_password" class="form-control" placeholder="Password" required>
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember_me" value="1"> Remember me (1 month)
            </label>
        </div>

        <button tabindex="3" class="btn btn-lg btn-success btn-block" type="submit" id="login_button" name="login_user">Login</button>
        <hr>
        <p>Don't have an account? <a href="<?php echo $config["url"]; ?>/signup">Register!</a></p>
        <!--<a href="#" class="btn btn-lg btn-warning btn-block" id="forgot_button"> Reset Password</a>-->
    </form>
</div>
<?php } else {
    echo "<script type='text/javascript'> document.location = '".$config["url"]."'; </script>";
} ?>