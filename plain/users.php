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
            <h1 onclick="closeNav()">Plain Users</h1>
            <!-- <hr> -->
        <?php
        // SELECT * FROM comments ORDER BY Count DESC;
            $users = mysqli_query($db, "select icon, FirstName, LastName from plainuser order by UserID");
            $count = 0;
            while ($row = mysqli_fetch_array($users, MYSQLI_ASSOC)) {
                print "<div class='people' onclick='closeNav()'>";
                foreach ($row as $data) {
                    $count += 1;
                    if (($count % 3) == 1){
                    print "<i class='$data'></i>";
                    } else{

                        print  $data;
                    }
                    print " ";
                    // echo "<br>", $data, "</br>";
                    
                }
                print "</div>";
            }
        ?>
        </main>
        <script src="js/plain.js"></script>
    </body>

</html>