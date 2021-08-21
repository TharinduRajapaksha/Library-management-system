<?php
	$host = 'localhost';
	$user = 'root';
	$password = 'root';
	$databasename = 'library';

	$connection = mysqli_connect($host,$user,$password,$databasename);

	if ($connection)
	{
		echo "connected successfully to database<br>";
	}
	else
	{
		echo "connection failed to database";
	}
?>