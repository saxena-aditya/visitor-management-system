<?php

 $server = "localhost";
$user = "root";
 $dbName = "db_new"; 
 $pass = "Aditya@602";
	$link = mysqli_connect($server, $user, $pass, $dbName);
		if(!$link)
			die("Error connecting database");




?>