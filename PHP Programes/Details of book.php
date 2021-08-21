<!DOCTYPE html>
<html>
	<?php
		session_start();

		include('connection.php');
		//echo "hi Asanka";
		//echo "<br>".$_SESSION["regno"];


		$ISBN = $_SESSION['ISBN'];

		$sqlq1 = "SELECT * FROM book WHERE ISBN='$ISBN';";

		$result = mysqli_query($connection,$sqlq1);

		$resultCheck = mysqli_num_rows($result);

		if ($resultCheck > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				//echo $row['address'];


				
				$BookName=$row['book_name'];
				$ISBN=$row['ISBN'];
				$WrittenYear=$row['written_year'];
				$NumberOfBook=$row['number_of_books'];
				$BookCatogary=$row['book_catagory'];
				$Permitting=$row['permitting'];


				//$_SESSION['Address']=$row['address'];
			}
		}

		if (isset($_REQUEST['submit']))//checking wether the submit button have pressed
		{
			

			$Reg_No = $_REQUEST['Reg_Number'];

			$sqlq2 = "SELECT member_reg_num FROM member WHERE member_reg_num='$Reg_No';";

			$Result = mysqli_query($connection,$sqlq2);

			$ResultCheck = mysqli_num_rows($Result);

			if ($ResultCheck == 1) 
			{
				
				$Issue_Date = $_REQUEST['Issue_Date'];
				$Due_Date = $_REQUEST['Due_Date'];

				
				$sqlq3 = "insert into borrow_book(member_reg_num,ISBN,issue_date,return_date) values('$Reg_No','$ISBN','$Issue_Date','$Due_Date');";

				if(mysqli_query($connection,$sqlq3))
				{
					echo "book issue sucsessfully";
					session_destroy();
					header("location:Issue book.php");
				}
				else
				{
					echo "book issue unsucsessfully";
				}

			}
			else
			{
				
				echo "<br>"."This is not a valid member <br>Please enter a valid registeration number";
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
		
			<label id="details">Book Name : </label>
			<label id="details"> <?php echo $BookName ?>    </label>
			<br><br>
		
			<label id="details">ISBN Number : </label>
			<label id="details"> <?php echo $ISBN ?>    </label>
			<br><br>

			<label id="details"> Current No.Of Copies : </label>
			<label id="details"> <?php echo $NumberOfBook ?>    </label>
			<br><br>

			<label id="details"> Book Catogary : </label>
			<label id="details"> <?php echo $BookCatogary ?>    </label>
			<br><br>

			<form method="post">
				
				<h3>Issuing Member Registration Number : </h3> 
				<input type="text" name="Reg_Number" id="Reg_Number" required="">
				<br><br>

				<h3>Issue Date : </h3>
				<input type="date" name="Issue_Date" id="Issue_Date">
				<br><br>

			
				<h3>Due date : </h3> 
				<input type="date" name="Due_Date" id="Due_Date">
				<br><br>
			
				<input type="submit" name="submit" value="Issue">
			</form>
		
			
		
	</div>

</body>
</html>