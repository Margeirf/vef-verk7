<?php 
require_once('include/head.php');
session_start();
if(!isset($_SESSION['userName'])){
    echo '<script>alert("You need to sign in to access this page");</script>';
    echo '<meta http-equiv="refresh" content="0; url=index.php" />';
}
?>

<body>
    <p class="username">Welcome 
<?php echo $_SESSION['userName']; ?>
    </p>
    <div class="buttonContainer">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <button class="btn btn-lg btn-primary btn-block buttonSignOut" type="submit" name="signout">Sign out
            </button>
        </form>
    </div>
</body>

<?php
    if(isset($_POST['signout'])){
        session_destroy();
        echo '<meta http-equiv="refresh" content="0; url=index.php" />';
    }
?>