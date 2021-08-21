<?php
	session_start();

			if (!isset($_SESSION['sattus'])) 
			{
				header('location:Index.php');
			}
?>

<!DOCTYPE html>
<html>
<head>
	<title>  Library Management System</title>
	<link rel="icon" type="image/icon" href="images/titlebarlogo01.jpg" sizes="2083">
	
<!--	<link rel="stylesheet" type="text/css" href="CSS Files/Details of member.css"> -->
</head>



<?php 

$FullName='';
$ISBN_No='';
$Book_Author='';
$Written_Year='';
$Number_Of_Books='';
$Book_Catagory='';




include('connection.php');
//echo "hi Asanka";
//echo "<br>".$_SESSION["regno"];


$reg=$_SESSION["ISBNNumber"];

$sql = "SELECT * FROM book WHERE ISBN='$reg';";

$result = mysqli_query($connection,$sql);

$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		//echo $row['address'];


		
		$FullName=$row['book_name'];
		$ISBN_No=$row['ISBN'];
		$Book_Author=$row['book_author'];
		$Written_Year=$row['written_year'];
		$Number_Of_Books=$row['number_of_books'];
		$Book_Catagory=$row['book_catagory'];

	

		//$_SESSION['Address']=$row['address'];
	}
}

?>

<body>
	<style type="text/css">
		
		body
		{
			margin: 0;
			padding: 0;
			font-family: sans-serif;
			background: url(images/DetailsOfBookForRemove.jpg);
			background-size: cover;
			background-attachment: fixed;
		}
		.box 
		{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			width:500px;
			padding: 5px;
			padding-left: 50px;
			padding-right: 50px;
			background: rgb(0,0,0,.5);
			box-sizing: border-box;
			box-shadow: 0 15px 25px rgb(0,0,0,.5);
			border-radius:10px;


		}
		.box h2
		{
			margin: 0 0 30px;
			padding: 0;
			color: #fff;
			font-family: initial;
			text-align: center;

		}

		h3,#details
		{
			color:white;
			font-size: 14px;

		}
		.box input
		{
			width:100%;
			padding:10px 0;
			margin-bottom:30px;
			border:1px solid white;
			border-radius: 5px;
			border-bottom:1px solid #03a9f4;
			outline: none;
			background:transparent;
			color:white;
			background: rgb(0,0,0,.8);
			text-align: center;
		}
			
			
		button
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

	<form method="post">

	<div class="box">
		<h2>Details of Remove Book</h2>
		 <h3>Full Name</h3>
		 <?php 
	echo "<input type='text'  value='$FullName'>"; ?>
		 
		<h3>ISBN</h3>
		 <?php 
	echo "<input type='text' name='ISBNNumber' value='$ISBN_No'>"; ?>

		<h3>Book Author</h3>
		 <?php 
	echo "<input type='text'  value='$Book_Author'>"; ?>

		  
		<h3>Written Year</h3>
		  <?php 
	echo "<input type='text'  value='$Written_Year'>"; ?>
		   
	<!--	<h3>Number of Books</h3>
		   <?php 
	//echo "<input type='text'  value='$Number_Of_Books'>"; ?> -->
		 
		<h3>Book Category</h3>
		 <?php 
	echo "<input type='text'  value='$Book_Catagory'>"; ?>
		 
		  
		  
		
			<button type="submit" name="Remove">Remove</button>
	</div>

	</form>


<?php
		if (isset($_POST['Remove'])) {
			$sql = "DELETE FROM book WHERE ISBN='$reg';";

			mysqli_query($connection,$sql);
			session_destroy();
			echo "Book Removed Successfully!";


		}
	


?>

</body>
</html>