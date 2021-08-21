<!DOCTYPE html>
<html>
	<?php
		session_start();

		include('connection.php');//we can use recuard it's better

		if (isset($_REQUEST['submit']))//checking wether the submit button have pressed
		{
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];
			//echo $username;
			//echo $password;

			$sqlq = "select * from user where user_name = '$username' && user_password = '$password'";
		
			$result = mysqli_query($connection,$sqlq);

			$num = mysqli_num_rows($result);

			//echo "<br>" . $num;

			if ($num == 1) 
			{
				$_SESSION['username'] = $username;
				header('location:Home.php');
			}
		
			else
			{
				echo "<br>username or password incorect";
				//header('location:Login.php');
				session_destroy();

			}
		}
		
		

		

	?>
		
<head>
	<title>  Library Management System</title>
	<link rel="icon" type="image/icon" href="images/titlebarlogo01.jpg" sizes="2083">

	<!--<link rel="stylesheet" type="text/css" href="CSS Files/LoginPage.css"> -->

	<style type="text/css">
		body
		{
			margin: 0;
			padding: 0;
			font-family: sans-serif;
			background: url(../images/login2.jpg);
			background-size: cover;
		}
		.box 
		{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			width:450px;
			padding: 40px;
			background: rgb(0,0,0,.8);
			box-sizing: border-box;
			box-shadow: 0 15px 25px rgb(0,0,0,.5);
			border-radius:10px;

		}
				.box h2
				{
					margin: 0 0 30px;
					padding: 0;
					color: #fff;
					text-align: center;

				}

				.box img
				{
					width: 50px;
					height: 50px;
					margin-bottom: 20px;
				}
						.box .inputBox
						{
							position: relative;
						}


						.box .inputBox input
						{
							width: 200px;
							padding: 10px 0;
							font-size: 16px;
							color: #fff;
							margin-bottom:30px;
							border: none;
							border-bottom: 1px solid #fff;
							outline: none;
							background: transparent;
							letter-spacing:1px;
						}

						.box .inputBox label
						{
							position: absolute;
							top: 0;
							left: 0;
							padding: 10px 0;
							font-size: 16px;
							color: #fff;
							pointer-events: none;
							transition: .5s;

						}
						
						.box .inputbox a
						{
							color:red;
							text-decoration: none;
						}
						/*
						.navbar .inputbox a:hover{color:white;}
						*/
						.box .inputBox input:focus ~ label,
						.box .inputBox input:valid ~ label
						{
							top: -18px;
							left: 0;
							color: #03a9f4;
							font-size: 12px;

						}


						.box input[type="submit"]
						{
							background: transparent;
							border: none;
							outline: none;
							color: #fff;
							background: #03a9f4;
							padding: 10px 20px;
							cursor: pointer;
							border-radius: 5px;
							
									
							/*font-size: 25px;
							
							border-radius: 5px;
							width: 150px;
							height: 50px;*/
							margin-left: 38%;
						}




	</style>
</head>

<body>

	<div class="box">
		<h2>Login</h2>

		<img src="images/LoginPageIMG.png">

		<form action="Login.php" method="post">
			<div class="inputBox">
				<input type="text" name="username" required="">
				<label>Username</label>
			</div>
			<div class="inputBox">
				<input type="password" name="password" required="">
				<label>password</label>

				<a href="#.php">Forget password </a> 
			</div>
			<input type="submit"  id = "submit" name = "submit" value="Login">
		</form>
	</div>

</body>
</html>