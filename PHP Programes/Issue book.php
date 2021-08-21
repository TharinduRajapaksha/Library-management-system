<!DOCTYPE html>
<html>
	<?php

		session_start();

		if (!isset($_SESSION['sattus'])) 
		{
			header('location:Index.php');
		}
		

		include('connection.php');

	

		if (isset($_REQUEST['submit']))
		{
		
				$ISBN = $_REQUEST['ISBN'];

				$_SESSION["ISBN"]= $ISBN;

				//echo $_SESSION["regno"];

				$sql = "SELECT ISBN FROM book WHERE ISBN ='$ISBN';";

				$Result = mysqli_query($connection,$sql);

				$ResultCheck = mysqli_num_rows($Result);

				if ($ResultCheck==0) 
				{
					echo "<br>"."This is not a valid ISBN <br>Please enter a valid ISBN";

				}
				else
				{
					header("location:Details of book.php");
				}


				


		}

	?>
<head>
	<title>  Library Management System</title>
	<link rel="icon" type="image/icon" href="images/titlebarlogo01.jpg" sizes="2083">
	
	<!--<link rel="stylesheet" type="text/css" href="CSS Files/Issue book.css">-->

	<style type="text/css">
		
		body
			{
				margin: 0;
				padding: 0;
				font-family: sans-serif;
				background: url(images/library.jpg);
				background-size: cover;
			}
			.box 
			{
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%,-50%);
				width:400px;
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
			.box .inputBox
			{
				position: relative;
			}
			.box .inputBox input
			{
				width: 2s00px;
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

			.box .inputBox input:focus ~ label,
			.box .inputBox input:valid ~ label
			{
				top: -18px;
				left: 0;
				color: #03a9f4;
				font-size: 12px;

			}



			.box button
			{
				background: transparent;
				border: none;
				outline: none;
				padding: 10px 20px;
				text-decoration :none;
				cursor: pointer;
				border-radius: 5px;
				margin-left: 38%;
				color: #fff;
				background: #03a9f4;
			}
	

	</style>
</head>

<body> 

	<div class="box">
		<h2>Issue book</h2>
		<form method="post">
			<div class="inputBox">
				<input type="text" name="ISBN" id="ISBN" required="">
				<label>ISBN: Number</label>
			</div>
			
			
		<button  name="submit" id="submit">search</button>
		</form>
	</div>

</body>
</html>