<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guest</title>

        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

    <nav class="navbar navbar-inverse" style="width: 1526px; margin-left: -7px;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand active">LIBRARY MANAGEMENT SYSTEM</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index.php">HOME</a></li>
                <li><a href="books.php">BOOKS</a></li>
                <li><a href="feedback.php">FEEDBACK</a></li>
            </ul>
            <?php
                if(isset($_SESSION['login_user']))
                {
                    ?>
<!-------------------countdown-------------------!>
// <script>
//
//     var countDownDate = new Date("Jan 5, 2022 15:37:25").getTime();
//
//     var x = setInterval(function() {
//
//       var now = new Date().getTime();
//
//       var distance = countDownDate - now;
//
//       var days = Math.floor(distance / (1000 * 60 * 60 * 24));
//       var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//       var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//       var seconds = Math.floor((distance % (1000 * 60)) / 1000);
//
//       document.getElementById("demo").innerHTML = days + "d " + hours + "h "
//       + minutes + "m " + seconds + "s ";
//
//       if (distance < 0) {
//         clearInterval(x);
//         document.getElementById("demo").innerHTML = "EXPIRED";
//       }
//     }, 1000);
//     </script>
<!-------------------countdown-------------------!>


                    <ul class="nav navbar-nav">
                        <li><a href="profile.php">PROFILE</a></li>
                        <li><a href="fine.php">FINE</a></li>
                    </ul>
                        <ul class="nav navbar-nav navbar-right">
                        <li><a><p style="color: #ff1503; font-size: 20px;" id="demo">
                        </p></a></li>
                        <li><a href="">
                            <div style="color: white;">
                            <?php
                                echo "<img class='img-circle profile_img'
                                height=30px width=auto
                                src='images/".$_SESSION['pic']."'>";
                                echo " ".$_SESSION['login_user'];
                            ?>
                            </div>
                        </a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                        </ul>
                    <?php
                }
                else
                {
                    ?>
                        <ul class="nav navbar-nav navbar-right">

                            <li><a href="guess_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>

                            <li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
                        </ul>
                    <?php
                }

            ?>


        </div>
    </nav>
    <?php
          if(isset($_SESSION['login_user']))
          {
            $day=0;

            $exp='<p style="color:yellow; background-color:red;">EXPIRED</p>';
            $res= mysqli_query($db,"SELECT * FROM `issue_book` where username ='$_SESSION[login_user]' and approve ='$exp' ;");

          while($row=mysqli_fetch_assoc($res))
          {
            $d= strtotime($row['returnbook']);
            $c= strtotime(date("Y-m-d"));
            $diff= $c-$d;

            if($diff>=0)
            {
              $day= $day+floor($diff/(60*60*24));
            } //Days

          }
          $_SESSION['fine']=$day*.10;
        }
    ?>
<header style="height: 50px; margin-top: -70px;">
</header>
</body>
</html>