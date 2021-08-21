 <!DOCTYPE html>
<html>
	
	<?php

		 

		session_start();

		if (!isset($_SESSION['sattus'])) 
		{
			header('location:Index.php');
		}

	
		
		include('connection.php');//we can use recuard it's better

		$fullname = $regnum = $coursetitle = $address = $date = $email = "";

		$status = "active";

		if (isset($_REQUEST['butt']))//checking wether the submit button have pressed
		{

			//data validation part
			$fullname = test_input($_POST['fname']);

			if (!preg_match("/^[a-zA-Z ]*$/",$fullname))
			{
				echo "Only letters and white space allowed<br>";
				$status = "deactive";
			}

			$regnum = test_input($_POST['regnum']);

			if (!preg_match("/^[0-9A-Z ]*$/",$regnum))
			{
				echo "Only capital letters and numbers allowed<br>";
				$status = "deactive";
			}

			$coursetitle = $_POST['coursetitle'];

			$address = test_input($_POST['address']);

			if (!preg_match("/^[a-zA-Z ]*$/",$address))
			{
				echo "Only letters and white space allowed<br>";
				$status = "deactive";
			}
			
			$date = $_POST['date'];

			$email = test_input($_POST['email']);

			if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {

                $emailErr = "Invalid email format"; 
                $status = "deactive";
            }
			//var_dump($email);//for testing purpuses


            $confermationcode = intval(((date('d')+time('sa')+date('y')*5/3))/10);

            echo $confermationcode;


			$sqlq = "insert into member(member_full_name,member_reg_num,course_title,address,date_of_birth,email,confermationcode) values('$fullname','$regnum','$coursetitle','$address','$date','$email','$confermationcode');";

			if ($status == "active") 
			{
				if(mysqli_query($connection,$sqlq))
				{
					echo "data insert sucsessfully";
				}
				else
				{
					echo "data insert unsucsessfully";
				}
				
			}
			else
			{
				echo "data insert unsucsessfully";
			}
			

			

			
			//for testing purpuses
			/*
			if (mysqli_query($connection,$sqlq)) 
			{
				echo "data insert sucsessfully";
			}
			else
			{
				echo "data insert unsucsessfully";
			}
			*/
			

		}

		function test_input($data) 
        {

            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;

        }

        
		

	?>
	
<head >
	<title>  Library Management System</title>

	<link rel="icon" type="image/icon" href="images/titlebarlogo01.jpg" sizes="2083">

	<!-- <link rel="stylesheet" type="text/css" href="CSS Files/Member Registation.css">  -->

	<style type="text/css">
		body
		{
			background-image: url(images/RegisterAMember.jpg); 
			background-repeat: no-repeat;
			background-size: cover;
		}

		{
			width: 12px;
		}

		{
			background: grey;
			border-radius: 6px;
		}
		.simple-form{
			text-align: center;
			margin: 100px 80px;
			border-radius: 20px;
		}
		h2
		{
			margin: 0 0 30px;
			padding: 0;
			color:white;
			text-align: center;
			font-size:32px;
		}
		#Registration
		{
			width: 80%;
			background-color: #051019;
			opacity: 0.8;
			padding: 50px 8px;
		        margin-left:85px;
		        border-radius:10px;
		        
		}
		select
		{
			font-size: 13px;
			padding:5px;
			
		}
		.button{
			width: 250px;
			padding: 10px;
			border-radius: 5px;

		}
		.ph{
			width: 200px;
			padding: 10px;
			border-radius: 5px;
		}

		#butt
						{
							background: transparent;
							border: none;
							outline: none;
							color: #fff;
							background: #03a9f4;
							padding: 10px 20px;
							cursor: pointer;
							border-radius: 5px;
							margin-left: 2%;
							font-size: 15px;
						}


		.p{
				color: white;
				font-size: 19px;
			
		}
		#p2
		{
			width: 90px;
			padding: 10px;
			border-radius: 5px;
		}

	</style>


</head>
<body>


	<div class="simple-form">
		
		<form id="Registration"  method="post">

		<h2>Member Registration</h2>

		<input type="text" name="fname" class="button"   placeholder="Enter Your Full name" required > 

		<br><br>

		
		<input type="text" name="regnum" class="button"   placeholder="Enter Your Registation Number" required >

		
		 <br><br>


		<p class="p">Course Title 
		 <select class="ph" name="coursetitle">
		 	<option>Computer Science</option>
		 	<option>Physical Science</option>
		 	<option>Language & Communication Studies</option>
		 	<option>Buisiness & Management Studies </option>
		 </select>
		</p>

		
		<input type="text" name="address" class="button"  placeholder="Enter Your Address" required> 
		
		
		<br><br>


		<p class="p">Date of birth 
		<input type="date" name="date" class="ph"   required>
		</p>
		<br>
	
	
		<input type="Email" name="email" class="button"  placeholder="Enter your Email Address" required> 

		<br><br>
	
		

		
		
         <input type="submit" value="Register" id="butt" name="butt">
		</form>
	</div>

</body>
</html>