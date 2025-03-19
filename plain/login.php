<?php
include ("config.php");
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT UserId FROM plainuser WHERE Username = '$myusername' and Passkey = '$mypassword'";
    
    $result = mysqli_query($db, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['login_user'] = $myusername;

        header("location:plain.php");
    } else {
        $error = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'?>
<body>
    <header>
        
        
        <a href="plainsocial.html"><img src="images/plain1.png" alt="Plain" title="Plain" ><span><h2>Plain</h2></span></a>            
    
        <p ><a href="login.php" class="login">Log in</a>
        <a href="signup.php" class="signup">Sign up</a></p>
            
    </header>
    <main>
        <!-- <h1>Plain Social</h1> -->
        <div id="lbox">
            <h2>Login</h2>
            <hr>
            <br>
            <div class="error">
                <?php echo $error; ?>
            </div>
            <form action="" method="post">
                <label for="uname">Username :</label><input id="uname" type="text" name="username" class="box" />
                <br>
                <label for="pssd">Password :</label><input id="pssd" type="password" name="password" class="box" />
                <br><br>
                <input type="submit" value="Submit" /> <br/><br>
                <div class="clause">Don't have an account? <a href="signup.php">Create Account</a></div>
            </form>
        </div>
    </main>

    <script src="js/plain.js"></script>
</body>

</html>