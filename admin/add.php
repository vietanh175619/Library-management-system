<?php
    include "connection.php";
    include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
    <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
              background-color: wheat;
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
            .book
            {
                width: 400px;
                margin: 0px auto;
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

  <div class="h"><a href="add.php">Add books</a></div>
  <div class="h"><a href="request.php">Book Request</a></div>
  <div class="h"><a href="issueinfo.php">Issue Information</a></div>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer; color: black;" onclick="openNav()">&#9776; Option</span>
  <div class="container" style="text-align: center;">
    <h2 style="color: black; font-family: Lucia Console; text-align: center;"><b>Add New Books</b></h2>

    <form class="book" action="" method="post">

        <input type="text" name="bid" class="form-control" placeholder="Book ID"><br>
        <input type="text" name="name" class="form-control" placeholder="Book Name"><br>
        <input type="text" name="authors" class="form-control" placeholder="Author"><br>
        <input type="text" name="status" class="form-control" placeholder="Status"><br>
        <input type="text" name="quantity" class="form-control" placeholder="Quantity"><br>
        <input type="text" name="publisher" class="form-control" placeholder="Publisher"><br>

        <button style="text-align: center;" class="btn btn-default" type="submit" name="submit">
        ADD
        </button>
    </form>
    </div>
    <?php
       if(isset($_POST['submit']))
           {
             if(isset($_SESSION['login_user']))
             {
                $ok = false;
                $res=mysqli_query($db,"SELECT * from `books`;");
                $_SESSION['bid'] = $_POST['bid'];
                while($row=mysqli_fetch_assoc($res)) {
                    if ($row['bid']==$_SESSION['bid']) {
                        $ok = true;
                        mysqli_query($db,"UPDATE `books` SET `quantity` = `quantity`+ 1 where `bid`='$_SESSION[bid]' ;");
                        mysqli_query($db,"UPDATE `books` SET `status`='Available' where `bid`='$_SESSION[bid]';");
                        break;
                    }
                }
               if ($ok == false) mysqli_query($db,"INSERT INTO books VALUES ('$_POST[bid]', '$_POST[name]',
               '$_POST[authors]', '$_POST[status]', '$_POST[quantity]', '$_POST[publisher]') ;");
               ?>
                 <script type="text/javascript">
                   alert("Book Added Successfully.");
                   window.location="books.php";
                 </script>

               <?php

             }
             else
             {
               ?>
                 <script type="text/javascript">
                   alert("You need to login first.");
                 </script>
               <?php
             }
           }
    ?>
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "wheat";
}
</script>

</body>
</html>

