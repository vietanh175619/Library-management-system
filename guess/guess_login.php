<?php
    include "connection.php";
    include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Guest Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style type="text/css">
        section
        {
            margin-top: -20px;
        }
    </style>
</head>
<body>
<header class="header_login">

</header>
<section>
    <div class="sec_img">
        <br> <br><br>
        <div class="box1">
            <h1 style="text-align: center; font-size: 25px;font-family: Arial;">Library Management System</h1>
            <h1 style="text-align: center; font-size: 25px;">Login Here</h1>
            <form name="login" action="" method="post">
                <div class="login">
                    <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
                    <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
                    <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black;
                    width: 90px; height: 30px; margin-left: 90px;">
                </div>
            <br>
            <p style="color: white; padding-left: 15px;">
                <a style="color: white; font-size: 18px; margin-left: 35px;" href="">Forgot password?</a>
                <a style="color: white; font-size: 18px; margin-left: 45px;" href="registration.php">Sign up</a>
            </p>
            </form>
        </div>
    </div>
        <?php

            if(isset($_POST['submit']))
            {
                $count=0;
                $res=mysqli_query($db, "SELECT * FROM `guess` WHERE username='$_POST[username]'
                 && password='$_POST[password]';");

                $row=mysqli_fetch_assoc($res);

                $count=mysqli_num_rows($res);

                if($count==0)
                {
                    ?>
                    <div class="alert alert-danger" style="width: 500px; height: 60px; margin-left: 510px;
                    margin-top: -500px; background-color: #f16e6e; color: white; text-align: center; font-size: 20px;">
                    <strong>Your username and password do not match!</strong>
                    <?php
                }
                else
                {
                    $_SESSION['login_user']=$_POST['username'];
                    $_SESSION['pic']=$row['pic'];
                    ?>
                       <script type="text/javascript">
                       window.location="index.php";
                       </script>
                    <?php
                }
            }

        ?>
</section>



<footer class="footer_login">
    <p style="color:white; text-align: center; ">
        <br><br>
        Address:&nbsp Đại học Bách khoa Hà Nội <br>
        Email:&nbsp anh.pv175619@sis.hust.edu.vn <br>
        Contact:&nbsp 0963741868
    </p>
</footer>
</body>
</html>