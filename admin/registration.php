<?php
    include "connection.php";
    include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Admin Registration</title>
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
<header class="header_registration">

</header>
<section>
    <div class="sec_img">
        <br>
        <div class="box2">
            <h1 style="text-align: center; font-size: 25px;font-family: Lucida Console;">Library Management System</h1>
            <h1 style="text-align: center; font-size: 25px;">Registration Form</h1>
            <form name="Registration" action="" method="post">
                <div class="login">
                    <input class="form-control" type="text" name="first" placeholder="First Name" required=""> <br>
                    <input class="form-control" type="text" name="last" placeholder="Last Name" required=""> <br>
                    <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
                    <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>


                    <input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
                    <input class="form-control" type="text" name="contact" placeholder="Phone No" required=""><br>

                    <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black;
                    width: 80px; height: 30px; margin-left: 90px;">
                </div>
            </form>
        </div>
    </div>
</section>

    <?php

          if(isset($_POST['submit']))
          {
            $count=0;
            $sql="SELECT username from `admin`";
            $res=mysqli_query($db,$sql);

            while($row=mysqli_fetch_assoc($res))
            {
              if($row['username']==$_POST['username'])
              {
                $count=$count+1;
              }
            }
            if($count==0)
            {
              mysqli_query($db,"INSERT INTO `admin` VALUES('', '$_POST[first]', '$_POST[last]', '$_POST[username]',
              '$_POST[password]', '$_POST[email]', '$_POST[contact]', 'avatarmale.png');");
            ?>
              <script type="text/javascript">
               alert("Registration successful");
              </script>
            <?php
            }
            else
            {

              ?>
                <script type="text/javascript">
                  alert("The username already exist.");
                </script>
              <?php

            }

          }

        ?>

<footer class="footer_registration">
    <p style="color:white; text-align: center; ">
        <br><br>
        Address:&nbsp Đại học Bách khoa Hà Nội <br>
        Email:&nbsp anh.pv175619@sis.hust.edu.vn <br>
        Mobile:&nbsp 0963741868
    </p>
</footer>
