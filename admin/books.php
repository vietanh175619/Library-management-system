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
<!-------------search bar---------------->
<h2 style="text-align: center;">List Of Books</h2>

<div class="search">
    <form class="navbar-form" method="post" name="form1">
            <input class="form-control" type="text" name="search" placeholder="search books..." required="">
            <button style="background-color: #ffb12a;" type="submit" name="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
    </form>

    <form class="navbar-form" method="post" name="form1">
            <input class="form-control" type="text" name="bid" placeholder="Enter Book ID..." required="">
            <button style="background-color: #ffb12a;" type="submit" name="submit1" class="btn btn-default">Delete
            </button>
    </form>
</div>
	<?php

        if(isset($_POST['submit']))
        		{
        			$q=mysqli_query($db,"SELECT * from books where name like '%$_POST[search]%'");

        			if(mysqli_num_rows($q)==0)
        			{
        				echo "Sorry! No book found. Try searching again.";
        			}
        		else
        		{
        		    echo "<table class='table table-bordered table-hover' style='background-color: white';>";
                    			echo "<tr style='background-color: #cccccc;'>";
                    				//Table header
                    				echo "<th>"; echo "ID";	echo "</th>";
                                    echo "<th>"; echo "Title";  echo "</th>";
                                    echo "<th>"; echo "Authors";  echo "</th>";
                                    echo "<th>"; echo "Status";  echo "</th>";
                                    echo "<th>"; echo "Quantity";  echo "</th>";
                                    echo "<th>"; echo "Publisher";  echo "</th>";
                    			echo "</tr>";

                    			while($row=mysqli_fetch_assoc($q))
                    			{
                    				echo "<tr>";
                    				echo "<td>"; echo $row['bid']; echo "</td>";
                                    echo "<td>"; echo $row['name']; echo "</td>";
                                    echo "<td>"; echo $row['authors']; echo "</td>";
                                    echo "<td>"; echo $row['status']; echo "</td>";
                                    echo "<td>"; echo $row['quantity']; echo "</td>";
                                    echo "<td>"; echo $row['publisher']; echo "</td>";

                    				echo "</tr>";
                    			}
                    		echo "</table>";
        		    }
        		}
        		else
        		{
                    		$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");

                    		echo "<table class='table table-bordered table-hover' style='background-color: white';>";
                    			echo "<tr style='background-color: #cccccc;'>";
                    				//Table header
                    				echo "<th>"; echo "ID";	echo "</th>";
                                    echo "<th>"; echo "Title";  echo "</th>";
                                    echo "<th>"; echo "Authors";  echo "</th>";
                                    echo "<th>"; echo "Status";  echo "</th>";
                                    echo "<th>"; echo "Quantity";  echo "</th>";
                                    echo "<th>"; echo "Publisher";  echo "</th>";
                    			echo "</tr>";

                    			while($row=mysqli_fetch_assoc($res))
                    			{
                    				echo "<tr>";
                    				echo "<td>"; echo $row['bid']; echo "</td>";
                                    echo "<td>"; echo $row['name']; echo "</td>";
                                    echo "<td>"; echo $row['authors']; echo "</td>";
                                    echo "<td>"; echo $row['status']; echo "</td>";
                                    echo "<td>"; echo $row['quantity']; echo "</td>";
                                    echo "<td>"; echo $row['publisher']; echo "</td>";

                    				echo "</tr>";
                    			}
                    		echo "</table>";
        		}
        		if(isset($_POST['submit1']))
        		{
        		    if(isset($_SESSION['login_user']))
        		    {
        		        mysqli_query($db, "DELETE from books where bid='$_POST[bid]';");
        		        ?>
        		            <script type="text/javascript">
        		                alert("Delete successful");
        		                window.location="books.php";
        		            </script>
        		        <?php

        		    }
        		    else
                    {
                       ?>
                         <script type="text/javascript">
                         alert("Please Login First.");
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
        Mobile:&nbsp 0963741868
    </p>
</footer>

</body>
</html>