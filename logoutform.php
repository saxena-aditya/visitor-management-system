<?php

include('visitor_out.php');
 
$userM = $_SESSION['user'];
if($_SESSION["loggedIn"] == 0)
	 	header("location: index.php");

?>



<html>

<head>
<link rel = "stylesheet" href= "BootStrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="navbar.css">
<script src="BootStrap/js/jQuery.min.js"></script>
<script src="BootStrap/js/bootstrap.min.js"></script>

<style type="text/css">	

		

	


</style>

</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" id = "lii"><?php echo "Logged in as : ".$userM;?></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a id = "li" href="front.php">Home</a></li>
      <li ><a id = "li" href="myform.php">Add Visitor</a></li>
      <li class="active"><a href="logoutform.php">Logged Out Visitors</a></li>
      <li><a id = "li" href="query_data.php">View Data</a></li> 
      <li ><a id = "li" href="logout.php">Logout</a></li> 
    </ul>
  </div>
</nav>
<div>
  <p ><h3 style = "padding-left: 25px">These visitors were Logged out Today!</h3></p><br>

</div>
<div class="row" style = "padding-left: 25px">

<?php 
include('db_connect_db_new.php');
$date = date("Y/m/d");
$query = "SELECT * FROM info_visitor WHERE Date = '$date' AND Status = 'OFFLINE'";
$res = mysqli_query( $link,$query);

    
      while($result = mysqli_fetch_array($res, MYSQLI_ASSOC))
        
            

            echo '<div class="col-sm-2">

             
  
             
       <div class="thumbnail" style = "width:175px;">
          <img src="'.$result['imagePath'].'" alt="photo" width="400" height="300">
          <p style = "text-align:center;"><strong>'.$result['Name'].' </strong></p>
          <p>Receipt ID : '.$result['ReceiptID'].'</p>
          <p>Contact : '.$result['Contact'].'</p>
          <p>Time In : '.$result['TimeIN'].'</p>
          <p>Date    : '.$result['Date'].'</p>
          
          <p>Meeting : '.$result['meetingTo'].'</p>
         
         
        </div></div>';

?>
</div>
<?php
include('footerForAll.php');
?>
</body>
</html>