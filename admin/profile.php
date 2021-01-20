<?php
    include "connection.php";
    include "navbar.php";
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>User Profile</title>
        <style type="text/css">
            .wrapper
            {
                height: 600px;
                width: 500px;
                margin-top: 50px;
                margin-left: 330px;

            }
            .information
            {
                margin-top: -350px;
                margin-left: 390px;
                background-color: white;
                width: 500px;
                height: auto;
                border: 1px solid black;
                font-size: 20px;
            }
        </style>
    </head>

    <body style="background-color: wheat;">
        <div class="container">
            <form action="" method="post">
                <button class="btn btn-default" style="float: right; width: 70px; margin-top: 270px;
                margin-right: 170px;" name="submit1" type="submit">Edit</button>
            </form>
            <div class="wrapper" >
                <?php

                if(isset($_POST['submit1']))
                {
                    ?>
                    <script type="text/javascript">
                        window.location="edit.php"
                    </script>
                    <?php
                }

                    $q=mysqli_query($db, "SELECT * FROM admin where username='$_SESSION[login_user]';");
                ?>
                <h2 style="text-align: center; margin-top: -30px;">My Profile</h2>
                <?php
                    $row=mysqli_fetch_assoc($q);

                    echo "<div style='text-align: center'><img class='img-circle profile_img'
                    height=110px width=auto src='images/".$_SESSION['pic']."'></div>"
                ?>
                <div style="text-align:center; font-size: 18px;"><b>Welcome</b></div>
                    <h4 style="text-align:center; font-size: 18px;">
                        <?php
                            echo $_SESSION['login_user'];
                        ?>
                    </h4>
                </div>
                <div class="information">
                <?php
                    echo "<b>";
                    echo "<table class='table table-bordered'>";
                        echo "<tr>";
                            echo "<td>";
                                echo "<b> First Name: </b>";
                            echo "</td>";

                            echo "<td>";
                                echo $row['first'];
                            echo "</td>";
                        echo "<tr>";

                        echo "<tr>";
                        echo "<td>";
                                echo "<b> Last Name: </b>";
                        echo "</td>";

                        echo "<td>";
                                echo $row['last'];
                        echo "</td>";
                        echo "<tr>";

                        echo "<tr>";
                        echo "<td>";
                                echo "<b> Username: </b>";
                        echo "</td>";

                        echo "<td>";
                                echo $row['username'];
                        echo "</td>";
                        echo "<tr>";

                        echo "<tr>";
                        echo "<td>";
                                echo "<b> Password: </b>";
                        echo "</td>";

                        echo "<td>";
                                echo $row['password'];
                        echo "</td>";
                        echo "<tr>";

                        echo "<tr>";
                        echo "<td>";
                                echo "<b> Email: </b>";
                        echo "</td>";

                        echo "<td>";
                                echo $row['email'];
                        echo "</td>";
                        echo "<tr>";

                        echo "<tr>";
                        echo "<td>";
                                echo "<b> Contact: </b>";
                        echo "</td>";

                        echo "<td>";
                                echo $row['contact'];
                        echo "</td>";
                        echo "<tr>";
                    echo "</table >";
                    echo "</b>";
                ?>
                </div>
        </div>
        <footer class="footer_login">
            <p style="color:white; text-align: center; ">
                <br><br>
                Address:&nbsp Đại học Bách khoa Hà Nội <br>
                Email:&nbsp anh.pv175619@sis.hust.edu.vn <br>
                Mobile:&nbsp 0963741868
            </p>
        </footer>
    </body>
    </html>