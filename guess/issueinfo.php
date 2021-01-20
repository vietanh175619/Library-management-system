<?php
    include "connection.php";
    include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Book Request</title>
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
    <h3 style="text-align: center;"><b>Information of Borrowed Books</b></h3>
    <?php
    $c=0;
        if(isset($_SESSION['login_user']))
        {
            $sql="SELECT guess.username,roll,books.bid,name,authors,issue_book.issue,returnbook
            FROM guess inner join issue_book ON guess.username=issue_book.username inner join books
            ON issue_book.bid=books.bid WHERE issue_book.approve ='Yes' ORDER BY `issue_book`.`returnbook` ASC";
            $res=mysqli_query($db,$sql);

            echo "<table class='table table-bordered table-hover' style='background-color: white';>";
            echo "<tr style='background-color: #cccccc;'>";
            //Table header
            echo "<th>"; echo "Username";	echo "</th>";
            echo "<th>"; echo "Roll No";  echo "</th>";
            echo "<th>"; echo "BID";  echo "</th>";
            echo "<th>"; echo "Book Tittle";  echo "</th>";
            echo "<th>"; echo "Authors Name";  echo "</th>";
            echo "<th>"; echo "Issue Date";  echo "</th>";
            echo "<th>"; echo "Return Date";  echo "</th>";

            echo "</tr>";

           while($row=mysqli_fetch_assoc($res))
           {
           $d=date("Y-m-d");
           if($d > $row['returnbook'])
           {
           $c=$c+1;
           $var='<p style="color:yellow; background-color:red;">EXPIRED</p>';

           mysqli_query($db,"UPDATE issue_book SET approve='$var' where `returnbook`='$row[returnbook]'
           and approve='Yes' limit $c;");

           echo $d."</br>";
           }
           echo "<tr>";
           echo "<td>"; echo $row['username']; echo "</td>";
           echo "<td>"; echo $row['roll']; echo "</td>";
           echo "<td>"; echo $row['bid']; echo "</td>";
           echo "<td>"; echo $row['name']; echo "</td>";
           echo "<td>"; echo $row['authors']; echo "</td>";
           echo "<td>"; echo $row['issue']; echo "</td>";
           echo "<td>"; echo $row['returnbook']; echo "</td>";
           echo "</tr>";
           }
           echo "</table>";
        }
        else
        {
            ?>
                <h4 style="text-align: center; color: red;"><b>Please login first!</b></h4>v
            <?php
        }
    ?>
</div>
</div>
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