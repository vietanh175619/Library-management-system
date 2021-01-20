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
<br><br>

<div class="container">
    <div class="srch">
		<br><form method="post" action="" name="form1">
			<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input type="text" name="bid" class="form-control" placeholder="BID" required=""><br>
			<button class="btn btn-default" name="submit" type="submit">Submit</button><br></form>
	</div>

<h3 style="text-align: center;"><b>Request of Book</b></h3>
<?php
if(isset($_SESSION['login_user']))
{
    $sql= "SELECT guess.username,roll,books.bid,name,authors,status FROM guess inner join
    issue_book ON guess.username=issue_book.username INNER JOIN books ON issue_book.bid=books.bid
    WHERE issue_book.approve=''";
    $res= mysqli_query($db, $sql);

    if(mysqli_num_rows($res)==0)
    {
        echo "<h3><b>";
        echo "There's no pending request!";
        echo "</b><h3>";
    }
    else
    {
        echo "<table class='table table-bordered table-hover' style='background-color: white';>";
                    			echo "<tr style='background-color: #cccccc;'>";
                    				//Table header
                    				echo "<th>"; echo "Guest Name";	echo "</th>";
                    				echo "<th>"; echo "Roll No";  echo "</th>";
                    				echo "<th>"; echo "BID";  echo "</th>";
                    				echo "<th>"; echo "Book Tittle";  echo "</th>";
                    				echo "<th>"; echo "Authors Names";  echo "</th>";
                    				echo "<th>"; echo "Status";  echo "</th>";

                    			echo "</tr>";

                    			while($row=mysqli_fetch_assoc($res))
                    			{
                    				echo "<tr>";
                    				echo "<td>"; echo $row['username']; echo "</td>";
                    				echo "<td>"; echo $row['roll']; echo "</td>";
                    				echo "<td>"; echo $row['bid']; echo "</td>";
                    				echo "<td>"; echo $row['name']; echo "</td>";
                    				echo "<td>"; echo $row['authors']; echo "</td>";
                                    echo "<td>"; echo $row['status']; echo "</td>";
                    				echo "</tr>";
                    			}
                    		echo "</table>";
        		    }
    }
    else
    	{
    		?>
    		<br>
    			<h3 style="text-align: center;color: #ff0000;"><b>You need to login to see the request!</b></h3>

    		<?php
    	}

    	if(isset($_POST['submit']))
    	{
    		$_SESSION['name']=$_POST['username'];
    		$_SESSION['bid']=$_POST['bid'];

    		?>
    			<script type="text/javascript">
    				window.location="approve.php"
    			</script>
    		<?php
    	}
                ?>
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