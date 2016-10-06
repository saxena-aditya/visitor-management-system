<?php
session_start();
if($_SESSION["loggedIn"] == 0)
	 	header("location: index.php");
	 $userOf = $_SESSION["user"];

?>


	<?php
		$name = $rid = $time = $date = $success="";
		$server = "localhost";
		$uname = "root";
		$pass = "Aditya@602";
		$db = "db_new";
		$connect = mysqli_connect($server, $uname, $pass, $db);
		
		if(!$connect)
		die ("Error". mysqli_connect_error());


	if($_SERVER["REQUEST_METHOD"]== "POST"){

		
	
		if(!empty($_POST["rid"]))
			$rid = $_POST["rid"];
	
			$time = date("H:i:s");
			$date = date("d/m/Y");

	if(empty($rid))
		echo "You have not entered the required fields Correctly !!";
	else {
	
		$query_s = "SELECT ReceiptID FROM info_visitor WHERE ReceiptID = '$rid'";
	
		$query = "UPDATE info_visitor SET Status = 'OFFLINE' , TimeOUT = '$time', loggedOutBy = '$userOf' WHERE ReceiptID = '$rid' ";
	
	
	if(mysqli_num_rows(mysqli_query($connect,$query_s))>0){

	
		mysqli_query($connect,$query);
		$success = 1;
		//echo $success;
		// and refresh
		
		}

	else{
	 	 $success =0;
	 //echo $success;
	}
	}

	}


	?>



	