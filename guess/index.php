<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        LIBRARY MANAGEMENT SYSTEM
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style type="text/css">
        nav
        {
            float: right;
            word-spacing: 30px;
            padding: 20px;
        }
        nav li
        {
            display: inline-block;
            line-height: 80px;
        }
    </style>
</head>


<body>
<div class="wrapper">
    <header>
        <div class="logo">
            <img class="bklogo" src="images/BKlogo.png">
            <h1 class="name">LIBRARY MANAGEMENT SYSTEM</h1>
        </div>

        <?php
        if(isset($_SESSION['login_user']))
        {
            ?>
                <nav>
                    <ul>
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="books.php">BOOKS</a></li>
                        <li><a href="logout.php">LOGOUT</a></li>
                        <li><a href="feedback.php">FEEDBACK</a></li>
                    </ul>
                </nav>
            <?php
        }
        else
        {?>
        <nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="books.php">BOOKS</a></li>
                <li><a href="guess_login.php">GUEST-LOGIN</a></li>
                <li><a href="feedback.php">FEEDBACK</a></li>
            </ul>
        </nav>
        <?php
        }
        ?>


    </header>
    <section>
        <div class="sec_img">
            <br><br><br>
            <div class="box">
                <br><br><br><br>
                <h1 style="text-align: center; font-size: 35px;">Welcom to library</h1><br><br>
                <h1 style="text-align: center;font-size: 25px;">Opens at: 09:00 </h1><br>
                <h1 style="text-align: center;font-size: 25px;">Closes at: 17:00 </h1><br>
            </div>
        </div>
    </section>
    <footer>
        <p style="color:white; text-align: center;">
            <br><br>
            Address:&nbsp Đại học Bách khoa Hà Nội <br>
            Email:&nbsp anh.pv175619@sis.hust.edu.vn <br>
            Mobile:&nbsp 0963741868
        </p>
    </footer>
</div>
</body>

</html>