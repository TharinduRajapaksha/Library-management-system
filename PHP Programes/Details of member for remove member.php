<?php
		
	session_start();

	include('connection.php');
		//echo "hi Asanka";
		//echo "<br>".$_SESSION["regno"];


	$reg=$_SESSION["regno"];

	$sql = "SELECT * FROM member WHERE member_reg_num='$reg';";

	$result = mysqli_query($connection,$sql);

	$resultCheck = mysqli_num_rows($result);

	if ($resultCheck > 0) 
	{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				//echo $row['address'];


				
				$FullName=$row['member_full_name'];
				$RegisterNo=$row['member_reg_num'];
				$CourseTitle=$row['course_title'];
				$DOB=$row['date_of_birth'];
				$Email=$row['email'];
				$Address=$row['address'];


				//$_SESSION['Address']=$row['address'];
			}

	}


	if (isset($_POST['Remove'])) 
	{
		$sql = "DELETE FROM member WHERE member_reg_num='$reg';";

		mysqli_query($connection,$sql);

		header("location:Home.php");


	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>  Library Management System</title>
	<link rel="icon" type="image/icon" href="images/titlebarlogo01.jpg" sizes="2083">
	
	<!--<link rel="stylesheet" type="text/css" href="CSS Files/Details of member.css">-->

	<style type="text/css">
				
				body
			{
				margin: 0;
				padding: 0;
				font-family: sans-serif;
				background: url(../images/DetailsOfmember.jpg);
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
			.box label{
			color: white;
			}	

			/*
			.box label
			{
				width:100%;
				padding:10px 0;
				
				border:none;
				border-bottom:1px solid white;
				outline: none;
				background:transparent;
				color:white;
			}
				*/
				
			.box button
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
	<form method="POST">

			<div class="box">

				<h2>Details of Member</h2>
				

				 <label>Title  :   </label>             <label> Remove a member   </label>             <br><br>
				 <label>Full Name  :   </label>             <label> <?php echo $FullName ?>    </label>             <br><br>
				  <label> Registation Number  :   </label>             <label><?php echo $RegisterNo ?>     </label>             <br><br>
				   <label>Course title  :   </label>             <label><?php echo $CourseTitle ?>     </label>             <br><br>
				    <label>Address  :   </label>             <label><?php echo $Address ?>    </label>             <br><br>
					 <label>Date of Birth  :   </label>             <label> <?php echo $DOB ?>    </label>             <br><br>
					  <label>Email  :   </label>             <label> <?php echo $Email ?>    </label>             <br><br>
					
				
					<!--<input type="submit" name="" value="Remove">-->
					<button type="submit" name="Remove">Remove</button>
			
			</div>

	</form>

</body>

</html>