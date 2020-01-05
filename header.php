<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
    <nav>
        <div class="main-wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php
                    if(isset($_SESSION['u_id'])){
                        echo '<li><a href="posts.php">Posts</a></li>';



                    }
                ?>
            </ul>
            <div class="nav-login">
                <?php
                if(isset($_SESSION['u_id'])){
                       echo '<form action="includes/logout.inc.php" method="POST">
                            <a href="#" class="names">';
                       echo $_SESSION['u_uid'];
                       echo'</a>
                            <button class="btn" type="submit" name="submit" >Logout</button>
                            </form>';
                }
                else{
                    echo'                <form action="includes/login.inc.php" method="POST">
                    <input type="text" name="uid" placeholder="Username/e-mail">
                    <input type="password" name="pwd" placeholder="password">
                    <button type="submit" name="submit">Login</button>
                   </form>
                  <a href="signup.php" ><div class="sign">Sign up</div></a>';
                }
                ?>




            </div>
        </div>
    </nav>
</header>