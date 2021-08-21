<?php require_once('inc/connection.php'); ?>


<?php
	/*

	INSERT INTO table_name {column1,column2, etc )
	VALUES (value1,value2,etc)

	}
	*/

	$first_name ='Dileep';
	$last_name 	='kariyawasam';
	$email		='academy@gmail.com';
	$password   ='mypassword';
	$is_deleted =0;

    // Encrypet the password

	$hashed_password =sha1($password);

	// Example below display encrypted password

	//echo "Hashed Password is : {$hashed_password} ";


	$query = "INSERT INTO user(first_name, last_name, email,password,is_deleted) VALUES ('{$first_name}','{$last_name}','{$email}','{$password}',{$is_deleted})";

	// Execute the Query

	$result=mysqli_query($connection , $query);

	if($result)
		{
			echo "1 Record Added";
		}
	else
		{
			echo " Database Query failed";
		}

?>