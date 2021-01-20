
<?php
    include "connection.php";
    include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fine Calculation</title>
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
                padding-left: 850px;
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
                width: 300px;
                height: 50px;
                background-color: #c97e2a;
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
</div>
<!----------------List of guests-------------->
<div class="container">
<h2 style="text-align: center;">List Of Guests</h2>
	<?php

    $res=mysqli_query($db,"SELECT * FROM `fine` where username='$_SESSION[login_user]' ;");

        		    echo "<table class='table table-bordered table-hover' style='background-color: white';>";
                    echo "<tr style='background-color: #cccccc;'>";
                    				//Table header
                    				echo "<th>"; echo "Guest Name";	echo "</th>";
                    				echo "<th>"; echo "Bid";  echo "</th>";
                    				echo "<th>"; echo "Returned";  echo "</th>";
                    				echo "<th>"; echo "Days";  echo "</th>";
                    				echo "<th>"; echo "Fines in VND";  echo "</th>";
                    				echo "<th>"; echo "Status";  echo "</th>";
                    			echo "</tr>";

                    			while($row=mysqli_fetch_assoc($res))
                    			{
                    				echo "<tr>";
                    				echo "<td>"; echo $row['username']; echo "</td>";
                    				echo "<td>"; echo $row['bid']; echo "</td>";
                    				echo "<td>"; echo $row['returned']; echo "</td>";
                    				echo "<td>"; echo $row['day']; echo "</td>";
                    				echo "<td>"; echo $row['fine']; echo "</td>";
                    				echo "<td>"; echo $row['status']; echo "</td>";
                    				echo "</tr>";
                    			}
                    		echo "</table>";

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
</div>
</body>
</html>