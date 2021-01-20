<?php
    include "navbar.php";
    include "connection.php";
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Edit Profile</title>
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
            .form-control
            {
            	width:300px;
            	height: 38px;
            	margin-left: 90px;
            }
            .form1
            {
            	margin:0 540px;
            }
            	label
            {
            	color: black;
            }
        </style>
    </head>

    <body style="background-color: wheat;">

        <h2 style="text-align: center; color: black;">Edit Information</h2>
        <?php

        		$sql = "SELECT * FROM admin WHERE username='$_SESSION[login_user]'";
        		$result = mysqli_query($db,$sql) or die (mysql_error());

        		while ($row = mysqli_fetch_assoc($result))
        		{
        			$first=$row['first'];
        			$last=$row['last'];
        			$username=$row['username'];
        			$password=$row['password'];
        			$email=$row['email'];
        			$contact=$row['contact'];
        		}

        	?>

        <div class="profile_info" style="text-align: center;">
            <span style="color: black;">Welcome</span>
            <h4 style="color: red;"><?php echo $_SESSION['login_user']; ?></h4>
        </div>

        <div class="form1">
        		<form action="" method="post" enctype="multipart/form-data">

        		<input class="form-control" type="file" name="file">

        		<label><h5 style="margin-left: 90px;"><b>First Name: </b></h5></label>
        		<input class="form-control" type="text" name="first" value="<?php echo $first; ?>">

        		<label><h5 style="margin-left: 90px;"><b>Last Name</b></h5></label>
        		<input class="form-control" type="text" name="last" value="<?php echo $last; ?>">

        		<label><h5 style="margin-left: 90px;"><b>Username</b></h5></label>
        		<input class="form-control" type="text" name="username" value="<?php echo $username; ?>">

        		<label><h5 style="margin-left: 90px;"><b>Password</b></h5></label>
        		<input class="form-control" type="text" name="password" value="<?php echo $password; ?>">

        		<label><h5 style="margin-left: 90px;"><b>Email</b></h5></label>
        		<input class="form-control" type="text" name="email" value="<?php echo $email; ?>">

        		<label><h5 style="margin-left: 90px;"><b>Contact No</b></h5></label>
        		<input class="form-control" type="text" name="contact" value="<?php echo $contact; ?>">

        		<br>
        		<div style="padding-left: 200px;">
        			<button class="btn btn-default" type="submit" name="submit">save</button></div>
        	</form>
        </div>

        <?php

        		if(isset($_POST['submit']))
        		{
        			move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);

        			$first=$_POST['first'];
        			$last=$_POST['last'];
        			$username=$_POST['username'];
        			$password=$_POST['password'];
        			$email=$_POST['email'];
        			$contact=$_POST['contact'];
        			$pic=$_FILES['file']['name'];

        			$sql1= "UPDATE admin SET pic='$pic', first='$first', last='$last', username='$username',
        			password='$password', email='$email', contact='$contact'
        			WHERE username='".$_SESSION['login_user']."';";

        			if(mysqli_query($db,$sql1))
        			{
        				?>
        					<script type="text/javascript">
        						alert("Saved Successfully.");
        						window.location="profile.php";
        					</script>
        				<?php
        			}
        		}
         	?>

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