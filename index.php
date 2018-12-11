 <html>
<?php require_once('include/head.php'); ?>
  <body>

    <div class="container">

      <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputName" class="sr-only">Email address</label>
        <input type="name" id="inputName" class="form-control" placeholder="Username" name="inputName" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="inputPassword" required>
        <div class="checkbox">
            <label>
                Don't have an account? 
          <a href="register.php" class="link">Register here</a>
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
        
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
<?php
require_once('include/dbConn.php');
$Connection = DBconnectUsers('read');
if(isset($_POST['login'])){
    $user = $_POST['inputName'];
    $userpass = $_POST['inputPassword'];
    $checkUser = null;
    $sql = "SELECT id, user, userPass FROM users WHERE user='$user'";
    $result = $Connection->query($sql);
    foreach ($result as $check){
        $checkUser = $check['user'];
        $hash = $check['userPass'];
    }
    if(is_null($checkUser)){
        echo "<script>alert(User does not exist);</script>";
    }
    else{
        if(password_verify($userpass, $hash)){
        echo "Yesss";
            session_start();
            $_SESSION['userName']=$user;
            $Connection=null;
        echo '<meta http-equiv="refresh" content="0; url=success.php" />';
                           exit();
    }
    else{
        echo '<script>alert("Incorrect Password");</script>';
    }
    }
}//isset
?>