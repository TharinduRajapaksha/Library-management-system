<!DOCTYPE html>
<html>
	<?php
		session_start();

		include('connection.php');
		//echo "hi Asanka";
		//echo "<br>".$_SESSION["regno"];


		$ISBN = $_SESSION['ISBN'];

		$sqlq1 = "SELECT * FROM borrow_book WHERE ISBN='$ISBN';";

		$result = mysqli_query($connection,$sqlq1);

		$resultCheck = mysqli_num_rows($result);

		if ($resultCheck > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				//echo $row['address'];

				$ISBN = $row['ISBN'];
				$RegisterNo = $row['member_reg_num'];
				$IssueDate = $row['issue_date'];
				$DueDate = $row['return_date'];



				
			}
		}

		if (isset($_REQUEST['submit']))//checking wether the submit button have pressed
		{
			

				$sqlq = "DELETE FROM borrow_book WHERE ISBN = '$ISBN';";
				
				

				if(mysqli_query($connection,$sqlq))
				{
					echo "book return sucsessfully";
					session_destroy();
					header("location:Return book.php");
				}
				else
				{
					echo "book issue unsucsessfully";
				}

			

		}


	?>
<head>
	<title>  Library Management System</title>
	<link rel="icon" type="image/icon" href="images/titlebarlogo01.jpg" sizes="2083">
	
	<!--<link rel="stylesheet" type="text/css" href="CSS Files/Details of book.css">-->
	<style type="text/css">
		
		body
		{
			margin: 0;
			padding: 0;
			font-family: sans-serif;
			background: url(images/IssuebookBGIMG.jpg);
			background-size: cover;
			background-attachment: fixed;
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

		h3,#details
		{
			color:white;
			font-size: 11px;

		}
		.box input
		{
			width:100%;
			padding:10px 0;
			margin-bottom:30px;
			border:none;
			border-bottom:1px solid white;
			outline: none;
			background:transparent;
			color:white;
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
			
			/*		
			font-size: 25px;
			
			border-radius: 5px;*/
			width: 100px;
			
			margin-left: 35%;
		}
	</style>
</head>

<body>

	<div class="box">
		<h2>Details of Book</h2>
		
			<!--
			<label id="details">Book Name : </label>
			<label id="details"> /*<?php /*echo */$BookName ?>    </label>
			<br><br>-->
		
			<label id="details">ISBN Number : </label>
			<label id="details"> <?php echo $ISBN ?>    </label>
			<br><br>

			<!--
			<label id="details"> Current No.Of Copies : </label>
			<label id="details"> <?php /*echo */$NumberOfBook ?>    </label>
			<br><br>-->

			<!--
			<label id="details"> Book Catogary : </label>
			<label id="details"> <?php /*echo */$BookCatogary ?>    </label>
			<br><br>-->

			
				
			<h3>Issued Member Registration Number : </h3> 
			<label id="details"> <?php echo $RegisterNo ?>    </label>
			<br><br>

			<h3>Issued Date : </h3>
			<label id="details"> <?php echo $IssueDate ?>    </label>
			<br><br>

			
			<h3>Due date : </h3> 
			<label id="details"> <?php echo $DueDate ?>    </label>
			<br><br>

			<form method="post">
				<input type="submit" name="submit" value="Return">
			</form>
		
			
		
	</div>

</body>
</html>