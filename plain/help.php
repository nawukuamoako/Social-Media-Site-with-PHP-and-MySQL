<!-- <?php include ('session.php'); ?> -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Nathan Awuku Amoako">
    <title>Help | Plain Social</title>
    <link rel="icon" type="image/x-icon" href="images/plain.png">
    <link rel="stylesheet" href="css/plain.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php include "header.php"?>
    <?php include "sidebar.php"?>
    <?php include "rightbar.php"?>
    <main>
    <div id="btn" onclick="openNav()">&#9776; </div>
        <h1 onclick="closeNav()">Help</h1>
        <!-- <hr> -->
        <div class="help" onclick="closeNav()">
            <h3>About</h3>
            <!-- <br> -->
            <p>Plain Social is a free speech social platform where users can freely share their views. Due to Plain Social's free speech policy, this platform is an 18+ age restricted platform.</p>
        </div>
        <div class="help" onclick="closeNav()">
            <h3>Features</h3>
            <ul>
            <li>To create an account, you will need to set a unique username, fill in your Name and secure your account with a password.</li>
            <li>Your username is a one-time-set feature and cannot be changed once you create your account. To sign in, you will need to type in your username and poassword.</li>
            <li>Once you are logged in, you can share your views and ideas with other users. You cannot comment on other posts, neither can other users comment on your posts.</li>
            <li>You can edit your Name and change your password and profile icon in settings.</li>
            <li>You can view other users Plain Social. However, you cannot their posts based on their accounts. Same as others for you.</li>
            </ul>
        </div>
        <div class="help" onclick="closeNav()">
            <form method="post" class="share" onclick="closeNav()">
                <h3>Contact Us</h3>
                <!-- <label for="">Name: </label><input type="text" class="box"/>
                <br> -->
                <label for="help">How can we help? </label><select id="help" class="box">
                    <option value="">How to change settings</option>
                    <option value="">Delete account</option>
                    <option value="">Change username</option>
                    <option value="">Other...</option>
                </select>
            </form>
        </div>
</main>
<script src="js/plain.js"></script>
</body>