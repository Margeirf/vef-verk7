<html>
<?php require_once('include/head.php'); ?>
  <body>

    <div class="container">

      <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2 class="form-signin-heading">Create an account</h2>
        <label for="inputName" class="sr-only">Email address</label>
        <input type="name" id="inputName" class="form-control" placeholder="Username" name="userName" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="inputPassword" placeholder="Password" required>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="inputPassword2" placeholder="Password repeated" required>
        <div class="checkbox">
            <label>
                Already have an account? 
          <a href="index.php" class="link">Login here</a>
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register</button>
        
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

<?php
if(isset($_POST['register'])){
require_once("include/dbConn.php");
    $DBconnect=DBconnectUsers('write');
    $userpass = $_POST['inputPassword'];
    
        $hash = password_hash($userpass, PASSWORD_DEFAULT);
        $stmt = $DBconnect->prepare("INSERT INTO users (user, userPass) 
        VALUES(:user, :userpass)");
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':userpass', $hash);
        $user = $_POST['userName'];
        $hash;
        $stmt->execute();
        header("Location: index.php");
}//isset
?>