<?php
    include "connection.php";
    include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Guess Login</title>
    <meta charset="UTF-8">
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
        section
        {
        height: 600px;
        margin-top: 0px;
        background-image: url("images/fb.jpg");
        background-size: cover;
        }
        .wrapper
            	{
            		padding: 10px;
            		margin: -20px auto;
            		width:900px;
            		height: 450px;
            		background-color: black;
            		opacity: .8;
            		color: white;
            	}
        .form-control
            	{
            		height: 70px;
            		width: 95%;
            	}
        .scroll
            	{
            		width: 100%;
            		height: 300px;
            		overflow: auto;
            	}

    </style>
</head>
<body>

<header class="header_login">

</header>
<section>
<div class="wrapper">
		<h3>If you have any suggesions or questions please comment below</h3>
		<form style="" action="" method="post">
			<input class="form-control" type="text" name="comment" placeholder="Write something..."><br>
			<input class="btn btn-default" type="submit" name="submit" value="Send" style="width: 100px; height: 35px; ">
		</form>

<br><br>
	<div class="scroll">
		<?php
			if(isset($_POST['submit']))
			{
				$sql="INSERT INTO `comments` VALUES('', 'Admin','$_POST[comment]');";
				if(mysqli_query($db,$sql))
				{
					$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
					$res=mysqli_query($db,$q);

					echo "<table class='table table-bordered' style='color: white';>";
					while ($row=mysqli_fetch_assoc($res))
					{
						echo "<tr>";
						    echo "<td>"; echo $row['username']; echo "</td>";
							echo "<td>"; echo $row['comment']; echo "</td>";
						echo "</tr>";
					}
				}

			}

			else
			{
				$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
					$res=mysqli_query($db,$q);

					echo "<table class='table table-bordered' style='color: white';>";
					while ($row=mysqli_fetch_assoc($res))
					{
						echo "<tr>";
						    echo "<td>"; echo $row['username']; echo "</td>";
							echo "<td>"; echo $row['comment']; echo "</td>";
						echo "</tr>";
					}
			}
		?>
	</div>
	</div>
</section>


</body>
</html>