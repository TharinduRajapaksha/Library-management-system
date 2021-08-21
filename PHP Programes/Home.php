<!DOCTYPE html>
<html>
	
	<?php 

		session_start();

		if (!isset($_SESSION['sattus'])) 
		{
			header('location:Index.php');
		}
	 ?>
<head>
	<title>  Library Management System</title>

	<link rel="icon" type="image/icon" href="images/titlebarlogo01.jpg" sizes="2083">

	<!--<link rel="stylesheet" type="text/css" href="CSS Files/HomePage.css">-->
	
	<style type="text/css">
		body
		{
			background-image: url(images/homepagebackimg.jpg);
			background-size:cover;
			background-attachment: fixed;
			
		}



		.navbar
				{
					position:absolute;
					overflow: hidden;
					width:99%;
					height:6%;
					top: 5%;
					left: 50%;
					text-align: center;
					
					align-content: middle;
					padding: 20px 5px 5px 5px;
					
					
					transform: translate(-50%,-50%); 
					background:black;
					background: rgba(0,0,0,.8);/* Setting background as transperant */ 
					border-radius: 10px;
					/*border: 5px solid lightgrey;*/
					

				}
						.navbar a 
					    {
					      font-size: 15px;
					      font-family:Arial;
					      color:#85929E;
					      text-align: center;
					      padding: 20px 20px;/*space bitween the a*/
					     
					      text-decoration: none;
					    }
					    .navbar a:hover
					    {
					    	color:white;
					    }

					    

						/* The container <div> - needed to position the dropdown content */
						.dropdown
						 {
						  position:absolute;
						  top: 2%;
						  display: inline-block;
						  background: rgba(0,0,0,.8);
						}

								/* Dropdown Button */
								.dropbtn 
								{
									background-color:none; 
								  padding:20px 20px;
								  font-size:15px;
								  font-family: Arial;
								  color:#85929E;
								  border: none;
								  background: rgba(0,0,0,.8);
								}
										/* Change the background color of the dropdown button when the dropdown content is shown */
										.dropdown:hover .dropbtn 
										{
											color:white;
											cursor: pointer;
										}


								/* Dropdown Content (Hidden by Default) */
								.dropdown-content
								{
								  display: none;
								  position:absolute;
								  background: rgba(0,0,0,.8);
								  background: black;
								  min-width: 160px;
								  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
								  z-index: 1;
								}

								/* Links inside the dropdown */
								.dropdown-content a 
								{
									align-content:left;
								  color:#85929E;
								  padding: 12px 16px;
								  text-decoration: none;
								  display: block;
								}

										/* Change color of dropdown links on hover */
										.dropdown-content a:hover {color:white;}


										/* Show the dropdown menu on hover */
										.dropdown:hover .dropdown-content {display: block;}
					
					.navbar .login
					{
						position: absolute;
						top: 50%;
						left: 95%;
					}

							.navbar .login a
							{
								color:blue;
							}

							.navbar .login a:hover{color:white;}

		.searchbox
				{
					position:absolute;
					top: 35%;
					left: 35%;
					width: 34%;
					height: 33%;
					background: rgba(0,0,0,.8);
					box-sizing: border-box;
					/*box-shadow: 0 15px 25px rgba(0,0,0,.8);*/
					border-radius: 10px;
				}
				
				.searchbox h2
				{
					/*margin:100px 300px 10px ;*/
					text-align: center;
					padding: 0;
					margin-bottom: 40px;
					color: #fff;
					font-size:25px;

				}
		.searchbox .inputbox
		{
			position:absolute;
			top: 45%;
			left: 10%;
		}

				.searchbox .inputbox input
				{
					
					width:160%;
					height:30px;
					padding: 1px 0;
					
					padding-bottom: 1px;
					/*
					margin-left:10%;
					margin-bottom:10%;
					*/ 
					border:none;
					border-bottom: 1px solid #fff;
					outline: none;
					background: transparent;
					font-size: 20px;
					color: #fff;
					
				}
				
				.searchbox .inputbox label
				{
					position: absolute;
					top: 0;
					left: 0;
					padding-bottom: 1px;
					font-size: 20px;
					color: #fff;
					pointer-events: none;
					transition: .5s;

				}

				
				.searchbox .inputbox input:focus~ label,
				.searchbox .inputbox input:valid~ label
				{
					top: -20px;
					color: #03a9f4;
					font-size: 15px;
				}

				.searchbox input[type="submit"]
				{
					background: transparent;
					border:none;
					outline: none;
					color: #fff;
					background:#03a9f4;
					font-size: 15px;
					padding: 5px 10px;
					cursor: pointer;
					border-radius: 5px;
					width: 100px;
					height: 30px;

					margin-left: 38%;
					margin-top: 20%;

				}

				/*.searchbox input[type="submit"]:hover{color: solid silver}*/

		

	

	</style>
</head>
<body>

	<div class="navbar">
					<a href="Home.html">Home</a>
					<a href="Member Registration.php">Register A Member</a>
					<a href="Remove member.php">Remove Member</a>
					<a href="Book Registration.php">Register A Book</a>
					<a href="Remove Book.php">Remove A Book</a>
					<a href="Issue Book.php">Issue Book</a>
					<a href="Return book.php">Return Book</a>
					<div class="dropdown">
					 	<button class="dropbtn">About</button>
					  	<div class="dropdown-content">
						    <a href="#">Library administrative</a>
						    <a href="#">History of library</a>
						    
					</div>
					</div>
					<a href="">Help</a>

					<div class="login">
						<a href="Logout.php">Logout</a>
					</div>
	</div> 

	<div class="searchbox">
		<h2>Search Book </h2>
		<form>
			<div class="inputbox">
				<input type="text" name="" required="">
				<label>Bookname</label>
			</div>
			<input type="submit" name="" value="search">
			
		</form>
		
	</div>


</body>
</html>