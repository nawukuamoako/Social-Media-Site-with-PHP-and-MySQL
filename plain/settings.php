<!-- <?php include ('session.php'); ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Nathan Awuku Amoako">
    <title>Settings | Plain Social</title>
    <link rel="icon" type="image/x-icon" href="images/plain.png">
    <link rel="stylesheet" href="css/plain.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include "header.php"?>
    <?php include "sidebar.php"?>
    <?php include "rightbar.php"?>
<?php

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_SESSION['login_user'];
    $ses_sql = mysqli_query($db, "select FirstName, LastName, Passkey from plainuser where Username = '$user' ");
    $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $passkey = mysqli_real_escape_string($db, $_POST['passkey']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $icon = mysqli_real_escape_string($db, $_POST['icon']);
    
    if (empty($_POST['firstname'])) {
        $firstname = $row['FirstName'];
    }
    if (empty($_POST['lastname'])) {
        $lastname = $row['LastName'];
    }

    if (empty($_POST['passkey']) && empty($_POST['password'])) {
        $error = "Enter password to confirm changes.";
    } else if ($_POST['passkey'] != $row['Passkey']){
        $error = "Wrong password";
    } else if (!empty($_POST['passkey']) && empty($_POST['password'])){
        $error = "Enter new password";
        // $passkey = $row['Passkey'];
    }  else if (empty($_POST['password'])) {
        $error = "Invalid";
    } else {$passkey = $password;
        $sql = "UPDATE plainuser SET FirstName = '$firstname', LastName = '$lastname', Passkey = '$password', icon = '$icon' WHERE Username = '$user'";
        $sq = "UPDATE comments SET icon = '$icon' WHERE Username = '$user'";
        $result = mysqli_query($db, $sql);
        $res = mysqli_query($db, $sq);
    
        header("location:settings.php");}
    }
    ?>

<main>
    <div id="btn" onclick="openNav()">&#9776; </div>
    <h1 onclick="closeNav()">Settings</h1>
    <!-- <hr> -->
    <form action="" method="post" class="share" onclick="closeNav()">
        <!-- <label>Change Username :</label><input type="text" name="username" class="box" /> -->
        <!-- <br> -->
        <div class="error">
            <?php echo $error; ?>
        </div>
        Profile Character
        <hr><br>
        <input type="radio" name="icon" checked="checked" value="fa fa-user-circle-o"/><i class="fa fa-user-circle-o" ></i>
        <input type="radio" name="icon" value="fa fa-smile-o"/><i class="fa fa-smile-o"></i>
        <input type="radio" name="icon" value="fa fa-lightbulb-o"/><i class="fa fa-lightbulb-o"></i>
        <input type="radio" name="icon" value="fa fa-desktop"/><i class="fa fa-desktop"></i>
        <br><br>
        Change Name<hr>
        <label for="fn">First Name: </label><input id="fn" type="text" name="firstname" class="box" />
        <br>
        <label for="ln">Last Name: </label><input id="ln" type="text" name="lastname" class="box" />
        <br>
        Change Password<hr>
        <!-- <br> -->
        <label for="oldpswd">Old Password: </label><input id="oldpswd" type="password" name="passkey" class="box" />
        <br>
        <label for="newpswd">New Password: </label><input id="newpswd" type="password" name="password" class="box" />
        <br>
        <!-- <script>
            var res = "success";
        </script> -->
        <!-- <?php echo "<script>document.writeln(one);</script>";?> -->
        <br>
        <input type="submit" value="Submit" /> <br/>
    </form>
    
    
</main>
<script src="js/plain.js"></script>
</body>