<?php
include ("config.php");
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $myfirstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $mylastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);
    if (empty($mypassword)){
        $error = "Type password";
    }

    $search = "SELECT UserId FROM plainuser WHERE Username = '$myusername'";
    // check for duplicate Username 
    $res = mysqli_query($db, $search);
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $count = mysqli_num_rows($res);

    // insert into database
    if ($count == 0){
    $sql = "INSERT INTO plainuser (Username, FirstName, LastName, Passkey, icon) values ('$myusername', '$myfirstname', '$mylastname', '$mypassword', 'fa fa-user-circle-o')";
    $result = mysqli_query($db, $sql);
    $_SESSION['login_user'] = $myusername;

        header("location:login.php");
}
else if (empty($myusername)){
    $error = "Choose username";
} 
    else {
        
        $error = "Username already taken";
    }
}
    // if ($result == 1) {
    //     $_SESSION['login_user'] = $myusername;

    //     header("location:login.php");
    // } 
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
        <div id="box">
            <h2>SignUp</h2>
            <hr>
            <br>
            <div class="error">
                <?php echo $error; ?>
            </div>
            <form action="" method="post">
                <label for="uname">Username :</label><input id="uname" type="text" name="username" class="box" />
                <br>
                <label for="fname">First Name :</label><input id="fname" type="text" name="firstname" class="box" />
                <br>
                <label for="lname">Last Name :</label><input id="lname" type="text" name="lastname" class="box" />
                <br>
                <label for="pssd">Password :</label><input id="pssd" type="password" name="password" class="box" />
                <br><br>
                <input type="submit" value="Submit" /> <br/>
                <br>
                <div class="clause">Already have an account? <a href="login.php">Sign In</a></div>
            </form>
        </div>
    </main>
    <script src="js/plain.js"></script>
</body>

</html>