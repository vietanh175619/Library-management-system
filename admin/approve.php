<?php
    include "connection.php";
    include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Approve Request</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css">
            section
            {
                margin-top: -20px;
                background-color: wheat;
            }
            .header_books {
                height: 50px;
                width: auto;
                background-color: #9b7337;
                padding: 10px;
            }
            .search
            {
                padding-left: 1200px;
            }
            body {
              font-family: "Lato", sans-serif;
              transition: background-color .5s;
            }

            .sidenav {
              height: 100%;
              margin-top: 50px;
              width: 0;
              position: fixed;
              z-index: 1;
              top: 0;
              left: 0;
              background-color: #222;
              overflow-x: hidden;
              transition: 0.5s;
              padding-top: 60px;
            }

            .sidenav a {
              padding: 8px 8px 8px 32px;
              text-decoration: none;
              font-size: 25px;
              color: #818181;
              display: block;
              transition: 0.3s;
            }

            .sidenav a:hover {
              color: #f1f1f1;
            }

            .sidenav .closebtn {
              position: absolute;
              top: 0;
              right: 25px;
              font-size: 36px;
              margin-left: 50px;
            }

            #main {
              transition: margin-left .5s;
              padding: 16px;
            }

            @media screen and (max-height: 450px) {
              .sidenav {padding-top: 15px;}
              .sidenav a {font-size: 18px;}
            }
            .h:hover
            {
                color: white;
                height: 50px;
                background-color: #c97e2a;
            }
            .container
            {
                height: 450px;
                opacity: .7;
                color: black;
            }
            .Approve
            {
              margin-left: 300px;
              margin-right: 300px;
            }
        </style>
</head>
<body>
<header class="header_books">

</header>

<section>
<!-------------sidenav------------->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  <div style="color: white; margin-left: 80px;">
    <?php
        if(isset($_SESSION['login_user']))
        {
            echo "<img class='img-circle profile_img' height=100px width=auto src='images/".$_SESSION['pic']."'>";
            echo "</br></br>";

            echo "Welcome ".$_SESSION['login_user'];
        }

    ?>
  </div></br>

  <div class="h"> <a href="books.php">Books</a></div>
  <div class="h"><a href="request.php">Book Request</a></div>
  <div class="h"><a href="issueinfo.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>

</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Option</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
<div class="container">
    <h3 style="text-align: center;">Approve Request</h3>

    <form class="Approve" action="" method="post">
        <input class="form-control" type="text" name="approve" placeholder="Yes or No" required=""><br>
        <input type="text" name="issue" placeholder="Issue Date yyyy-mm-dd" required="" class="form-control"><br>
        <input type="text" name="returnbook" placeholder="Return Date yyyy-mm-dd" required="" class="form-control"><br>
        <input type="text" name="tm" class="form-control" placeholder="Return Date Feb 18, 2021 15:00:00" required="">
        <button class="btn btn-default" type="submit" name="submit" style="margin-left: 240px;">Approve</button>
    </form>
</div>
</div>

    <?php
      if(isset($_POST['submit']))
      {
        mysqli_query($db, "INSERT into timer VALUES ('$_SESSION[name]', '$_SESSION[bid]', '$_POST[tm]') ;");
        mysqli_query($db,"UPDATE  `issue_book` SET  `approve` =  '$_POST[approve]', `issue` =  '$_POST[issue]', `returnbook` =  '$_POST[returnbook]'
        WHERE `username`='$_SESSION[name]' and `bid`='$_SESSION[bid]';");

        mysqli_query($db,"UPDATE `books` SET `quantity` = `quantity`-1 where `bid`='$_SESSION[bid]' ;");

        $res=mysqli_query($db,"SELECT `quantity` from `books` where `bid`='$_SESSION[bid]';");

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['quantity']==0)
          {
            mysqli_query($db,"UPDATE `books` SET `status`='Not-available' where `bid`='$_SESSION[bid]';");
          } else
          {
            mysqli_query($db,"UPDATE `books` SET `status`='Available' where `bid`='$_SESSION[bid]';");
          }
        }
        ?>
          <script type="text/javascript">
            alert("Updated successfully.");
            window.location="request.php"
          </script>
        <?php
      }
    ?>

</section>


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