<div class="sidebar" id="sidebar">
    <a href="loginuser.php">
    <?php 
    $user_check = $_SESSION['login_user'];
    $ses_sql = mysqli_query($db, "select FirstName, LastName from plainuser where Username = '$user_check' ");
    $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
    $count = 0;
    $sq = mysqli_query($db, "select icon from plainuser where Username = '$user_check'");
    $r = mysqli_fetch_array($sq, MYSQLI_ASSOC);
    $icon = $r['icon'];
    foreach ($row as $data) {
        $count+=1;
        if ($count == 1){
            
            print "<i class='$icon'></i><span>$data</span>";
        }
        else {
            print "<span>$data</span>";
        }
        print " ";
    }
    ?></a>
    <hr>
    <a href="plain.php" title="Home"> <i class="fa fa-fw fa-home" onclick="closeNav()"></i><span>Home</span></a>
    <a href="users.php" title="Plain Users"> <i class="fa fa-users" onclick="closeNav()"></i><span>Plain Users</span> </a>
    <a href="settings.php" title="Settings"> <i class="fa fa-cogs" onclick="closeNav()"></i><span>Settings</span> </a>
    <a href="help.php" title="Manual"> <i class="fa fa-book" onclick="closeNav()"></i><span>Help</span> </a>
    <hr>
    <br>
    <!-- <div class="socials">
        <a href="#" title="Plain Users"> <i class="fa fa-facebook"></i></a><span>
        <a href="#" title="Settings"> <i class="fa fa-instagram"></i></a></span><span>
        <a href="#" title="Manual"> <i class="fa fa-twitter"></i></a></span>
    </div> -->
</div>


