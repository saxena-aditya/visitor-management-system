<html>

<head>
<meta http-equiv = "refresh" content = "10;url= front.php"/>

</head><body>
<?php



$name = $cno=$p_error=$name_error=$time_error=$rid_error="";
$server = "localhost";
$user = "root";
$pass = "Aditya@602";
$db = "db_new";
$connect = mysqli_connect($server,$user,$pass,$db);

if(!$connect)
	die("error". mysqli_connect_error());




if($_SERVER["REQUEST_METHOD"] == "POST"){

if(empty($_POST["name"]))
	$name_error = "Enter the Name Propery !";
else{
$name = $_POST["name"];

}


if(empty($_POST["cno"]) && strlen($_POST["cno"] != 10) )
	$cno_error = "Enter Valid Contact number";
else{
$cno = $_POST["cno"];

}
if(empty($_POST["purpose"]))
	$p_error = "Enter Valid Purpose";
else
	$p = $_POST["purpose"];


$timein = $_POST["timein"];
$rid = $_POST["id"];
$date = $_POST["date"];
$day = date("d");
$month = date("m");
$year = date("Y");
	
if(empty($name) || empty($cno) || empty($p) || strlen($cno)!=10)
{
	echo "<br><br><h4>You have not entered the details correctly !!</h4>";
}
else{
$sql = "INSERT INTO info_visitor(Name, Contact, Purpose, day, month, year, Date, TimeIN, ReceiptID,Status) VALUES ('$name','$cno','$p','$day', '$month', '$year','$date','$timein','$rid','ONLINE' )";
if(mysqli_query($connect,$sql)) echo "<br><br><h3>Your Data has been saved to the database !!<h3/>";
else  echo "Error: " . $sql . "<br>" . mysqli_error($connect);}

echo "<h4>You will be redirected to the home page after 10 secs !</h4> ";	


}?>
</body>
</html>
