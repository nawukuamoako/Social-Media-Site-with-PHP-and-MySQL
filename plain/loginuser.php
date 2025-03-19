<!-- <?php include ('session.php'); ?> -->

<html lang="en">
    <head>
        <?php include 'head.php'?>
    </head>
    <body>
        <?php include "header.php"?>
        <?php include "sidebar.php"?>
        <?php include "rightbar.php"?>
        <main>
        <div id="btn" onclick="openNav()">&#9776; </div>
            <h1 onclick="closeNav()"><?php echo $_SESSION['login_user'];print"'s Posts"?></h1>
            <!-- <hr> -->
        <?php
        $user=$_SESSION['login_user'];
        $posts = mysqli_query($db, "select icon, Comment from comments where Username = '$user' order by Count DESC ");
        $sql = "SELECT Comment FROM comments WHERE Username = '$user'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $check = mysqli_num_rows($result);
        $count = 0;
        $monitor = 0;
        if ($check == 0){
            print "<div class='comments' onclick='closeNav()'>";
            print "You have $check posts";
            print "</div>";
        } else{
        while ($row = mysqli_fetch_array($posts, MYSQLI_ASSOC)) {
            print "<div class='comments' onclick='closeNav()'>";
            foreach ($row as $data) {
                $count += 1;
                if (($count % 2) == 1){
                    $user = $data;
                    print "<i class='$data' ></i>";
                    // echo "<br>", $data, "</br>";
                    // echo $count;
                } else if (($count % 2) == 0){
                    $msg = $data;
                    // print '"';
                    echo "<br>", "<em>", '"',$data,'"', "</em>";
                    // print '"';
                    print "<br>";
                } 
                }
                print "</div>";
            }
        }
    ?>
        </main>
        <script src="js/plain.js"></script>
    </body>

</html>