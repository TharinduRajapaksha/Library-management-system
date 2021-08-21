 <!DOCTYPE html>
<html>
<?php
		session_start();

		if (!isset($_SESSION['sattus'])) 
		{
			header('location:Index.php');
		}
		
		include('connection.php');
				$bookname = $bookisbn = $bookauthor = $writtenyear = $number= $bookcatagory=$permitting="";


		$status = "active";

		if(isset($_REQUEST['submit']))
		{

		
		$bookname = test_input($_POST['bname']);

			if (!preg_match("/^[a-zA-Z ]*$/",$bookname))
			{
				echo "Only letters and white space allowed<br>";
				$status = "deactive";
			}

		
		$bookisbn = test_input($_POST['isbn']);

			if (!preg_match("/^[0-9A-Z ]*$/",$bookisbn))
			{
				echo "Only capital letters and numbers allowed<br>";
				$status = "deactive";
			}
		
		$bookauthor = test_input($_POST['author']);

			if (!preg_match("/^[a-zA-Z ]*$/",$bookauthor))
			{
				echo "Only letters and white space allowed<br>";
				$status = "deactive";
			}
		
		
		$writtenyear=$_POST['writtenyear'];
		
		$number = test_input($_POST['numbers']);

			if (!preg_match("/^[0-9 ]*$/",$number))
			{
				echo "Only capital letters and numbers allowed<br>";
				$status = "deactive";
			}
		
		$bookcatagory=$_POST['bookcatagory'];
		$permitting=$_POST['permitting'];
		


		$sqlq = "insert into book(book_name,ISBN,book_author,written_year,number_of_books,book_catagory,permitting) values('$bookname','$bookisbn','$bookauthor','$writtenyear','$number','$bookcatagory','$permitting');";

	if ($status == "active") 
			{
				mysqli_query($connection,$sqlq);
				echo "data insert sucsessfully";
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

	<!--<link rel="stylesheet" type="text/css" href="CSS Files/Book Registration.css">-->

	<style type="text/css">
		
			body{
					background-image: url(images/2.jpg); 
					background-repeat: no-repeat;
					background-size: cover;
					}
					::-webkit-scrollbar
					{
						width: 12px;
					}
					::-webkit-scrollbar-thumb
					{
						background: grey;
						border-radius: 6px;
					}
					.simple-form{
						text-align: center;
						margin: 100px 80px;
					}
					#Registration{
						width: 100%;
						background-color: #051019;
						opacity: 0.8;
						padding: 50px 8px;
					}
					#button{
						width: 250px;
						padding: 10px;
						border-radius: 5px;
					}
					#ph{
						width: 100px;
						padding: 10px;
						border-radius: 5px;
					}
					#rd{

					}
					#but{
						color: white;
						font-size: 18px;
					}
					#butt{
							background: transparent;
						border: none;
						outline: none;
						padding: 10px 20px;
						text-decoration :none;
						cursor: pointer;
						border-radius: 5px;
						margin-left: 1%;
						color: #fff;
						background: #03a9f4;
					}

					#p1{
							color: white;
						font-size: 22px;
						
					}
					#p2{
						color: white;
						font-size: 22px;
					}





					.simple-form h2
					{
						margin: 0 0 30px;
						padding: 0;
						color: #fff;
						text-align: center;
						font-size:32px;
					}
	</style>
</head>
<body>


<div class="simple-form">
				
	<form id="Registration" action="" method="post">

				<h2>Book Registration</h2>
		<input type="text" name="bname"  id="button" placeholder="Enter Book name" required> <br><br>

		<input type="text" name="isbn" id="button" placeholder="Enter ISBN number" required > <br><br>
		

		<input type="text" name="author" id="button" placeholder="Enter Book aurthor name" required> <br><br>
		

		<input type="date" name="writtenyear" id="button" placeholder="Book written year" required > <br><br>
		

		<p id="p1"> No.Of.Copies available
		<input type="number" name="numbers" max="100" min="0"  required><br><br>
		
		<p id="p1">Book catagory  
			<select id="ph" name="bookcatagory">
				<option>science</option>
				<option>Art</option>
				<option>Mathematics</option>
				<option>Story</option>
			</select>
		</p> 
		
        <p id="p2"> Is it permitted to carry the book out? 
        	<input type="radio" name="permitting" <?php if (isset($permitting) && $permitting="no") ?> value="yes">&nbsp;&nbsp;&nbsp;&nbsp;
        	<span id="but">Yes</span>
        	<input type="radio" name="permitting" <?php if (isset($permitting) && $permitting="yes") ?> value="no" >&nbsp;&nbsp;&nbsp;&nbsp;
        	<span id="but">No</span></p><br><br>

         <input type="submit" name="submit" value="Register" id="butt">
		</form>
	</div>

</body>
</html>