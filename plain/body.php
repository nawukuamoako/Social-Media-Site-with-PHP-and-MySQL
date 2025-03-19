<?php

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = $_SESSION['login_user'];
    $mypost = mysqli_real_escape_string($db, $_POST['comment']);
    
    if (empty($_POST['comment'])) {
        $error = "Invalid";
    } else {
        $image = mysqli_query($db, "select icon from plainuser where Username = '$myusername'");
        $row = mysqli_fetch_array($image, MYSQLI_ASSOC);
        $icon = $row['icon'];
        $sql = "INSERT INTO comments (Username, Comment, likes, icon) values ('$myusername', '$mypost', 0, '$icon')";
    
        $result = mysqli_query($db, $sql);
}

        header("location:plain.php");
}
?>

<main>
<div id="btn" onclick="openNav()">&#9776; </div>
    <form action="" method="post" class="share" onclick="closeNav()">
        <label>
            <?php $myusername = $_SESSION['login_user'];
            $sq = mysqli_query($db, "select icon from plainuser where Username = '$myusername'");
            $row = mysqli_fetch_array($sq, MYSQLI_ASSOC);
            $icon = $row['icon'];
        print "<i class='$icon' title='$myusername'></i><span><b>Share something today!</b></span>";
        print "<br>";
        ?>
        <br>
    </label>
    <textarea type="text" name="comment" placeholder="What's on your mind?" class="tbox"></textarea>
    <br>
    <input type="submit" value="Share" /> <br/>
</form>

<h2>Feed</h2>
<hr>
        
<?php
// SELECT * FROM comments ORDER BY Count DESC;
    $posts = mysqli_query($db, "select icon, Comment from comments order by Count DESC");
    $count = 0;
    $monitor = 0;
    while ($row = mysqli_fetch_array($posts, MYSQLI_ASSOC)) {
        print "<div class='comments' onclick='closeNav()'>";
        foreach ($row as $data) {
            $count += 1;
            if (($count % 2) == 1){
                // $user = $data;
                print "<i class='$data'></i>";
                // echo "<br>", $data, "</br>";
                // echo $count;
            } else if (($count % 2) == 0){
                $msg = $data;
                // print '"';
                echo "<br>", "<em>", '"',$data,'"', "</em>";
                // print '"';
                print "<br>";
            } 
            // else {
            //     $monitor +=1; 
            //     // print "<hr>";
            //     // echo $msg;
            //     print "<br>";
            //     echo $data;
            //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //         $add = $data + 1;
            //         $pluscount = mysqli_real_escape_string($db, $_POST['comment']);
            //         $sql = "UPDATE comments SET likes ='$add' WHERE comment = '$msg'";
                    
            //         $result = mysqli_query($db, $sql);
            //         header("location:plain.php");
            //     }
            //            print "<form action='' method='post' >";
            //            print "<input type='submit' value='like' /> <br/>
            //            </form>";
            //     }
                
            }
            print "</div>";
        }
        
?>

    
</div>
</main>