<?php  include('db_connect_db_new.php');

        include('visitor_out.php');
    
		$user1 = $_SESSION["user"];
		
	if($_SESSION["loggedIn"] == 0)
	 	header("location: index.php");

   $tody = date("Y:m:d");
	 $sql = "SELECT Name FROM info_visitor WHERE Date = '$tody'";
  
   $sqlOnline = "SELECT * FROM info_visitor WHERE Status = 'ONLINE' LIMIT 10";

    $sqlRecent = "SELECT * FROM (SELECT * FROM info_visitor ORDER BY Serial DESC LIMIT 10) a ORDER BY Serial DESC";

   $resultToday = mysqli_num_rows(mysqli_query($link,$sql));   //recent Visitors
   $resultS = mysqli_query($link,$sqlOnline);       //Online Visitors




  
   $onlineVsitor = mysqli_num_rows($resultS);
  

	 
    $sqlResRecent = mysqli_query($link,$sqlRecent);


?>
<!DOCTYPE HTML5>
<html>
<head>

<link rel = "stylesheet" href= "BootStrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="navbar.css">
<script src="BootStrap/js/jQuery.min.js"></script>
<script src="BootStrap/js/bootstrap.min.js"></script>




<style>

 body {
    max-width: 100%;
    max-height: 100%;
    overflow-y: hidden;
    overflow-x: hidden;
    
   }

	
img {width:100%;}
.affix {
      top:0;
      width: 100%;
      z-index: 9999 !important;
  }
  .navbar {
      margin-bottom: 0px;
  }

  .affix ~ .container-fluid {
     position: relative;
     top: 50px;
  }

  #coverPic{

    width: 100%;
    height:35%;
}
  .popover-title{
    background: #3EFE00 !important;
    color: #000000;
}
input[type='number'] {
    -moz-appearance:textfield;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
}
	
</style>
</head>
<body>
<div style="height:200px;position: relative;" >
  <img src = "asa.jpg" style="height: inherit;">
  

</div>
  <!-- Left and right controls -->



	<nav class="navbar navbar-default" data-spy="affix" data-offset-top="228">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" id = "lii"><span  >GEU VISITOR MANAGEMENT</span></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a  href="front.php">Home</a></li>
      <li><a id = "li" href="myform.php" >Add Visitor</a></li>
      <li><a id = "li" href="logoutform.php" >Logged Out Visitors</a></li>
      <li><a id = "li" href="query_data.php" >View Data</a></li> 
      <li><a id = "li" href="logout.php" >Logout</a></li> 
    </ul>
  </div>
</nav>

<!--<?php echo "<h3 style = 'padding-left:15px;''> Welcome ' $user1 ' :</h3>";?> -->

	
  <div class="row">
    
<div class="col-sm-3" style="padding-left:50px;height:100%;"> 

 <div><h3>Logout Visitor</h3></div>
 <div style="padding-top:20px;display:block;">
    <form method= "POST" action = "">
   

   
  


    <div class="form-group">
<label class="control-label" id ="t" for="recept_id">Receipt ID :</label>
 
<input class = "form-control" name= "rid" type = "number"  placeholder="Enter Receipt ID." required/>
 
    </div>


<?php {?>

<input id="x" name ="logout" value = "Logout" type ="submit" onclick='return confirm("Are you sure you want to Logout?")'>

<?php }?>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
if($success == 1)
  echo "<span style = 'color:green;'>Done !</span>";

else 
echo "<span style = 'color:red;''>Sorry ! No match found.</span>";

}
?>
    </form><br>

</div>



</div>
<div class="col-sm-5" style="padding-left: 50px;"> 
<h3 style="padding-left:10px;text-align:center;">Details</h3>

<?php 

  $showResultFor = 0;

  if(isset($_GET['rid'])){
    $showResultFor = $_GET['rid'];
  }
  $query = "SELECT * FROM info_visitor WHERE ReceiptID = '$showResultFor' AND Status = 'ONLINE' ";

            $getresult = mysqli_query($link,$query);
            $resultDetails = mysqli_fetch_array($getresult, MYSQLI_ASSOC);

           

   if($resultDetails) {?>
      
        <div  class="row" >

      <div class="col-sm-4" style = "padding-left:20px;padding-top:15px" > 
      
      <img style="width: 180px; height: 190px;" src="<?php echo $resultDetails['imagePath']?>"> </div>

      
      <div class="col-sm-8" style = "padding-left:25px;padding-top:15px; font-size:16px;">

    
        <p style="width: 678px;" id="col-1">Date :<?php echo $resultDetails['Date'];?>&nbsp;&nbsp;
          Time in :&nbsp;<?php echo $resultDetails['TimeIN'];?></p>
        
        <span id="col-1" name="main">Name :&nbsp;
          <?php echo $resultDetails['Name'];?></span><br>
        <span id="col-1">Contact No :&nbsp;
          <?php echo $resultDetails['Contact']?><br>
          <span id="col-1">Purpose :&nbsp;
            <?php echo $resultDetails['Purpose'];?></span><br>
          <span id="col-1">Meeting :&nbsp;
            <?php echo $resultDetails['meetingTo'];?></span><br>
          <span id="col-1">Receipt ID :&nbsp;
            <?php echo $resultDetails['ReceiptID'];?></span><br>
          <span id="col-1">Comment :&nbsp;
            <?php echo $resultDetails['Comment'];?></span><br>
        </span>
        
        </div>
    </div>

<?php }?>

</div>
<div class="col-sm-4" style="height:100%;"> 
<h3 style="margin-right:auto;padding-left:40px;">Recent Visitors :&nbsp;<?php echo $onlineVsitor;?></h3>
<ul class="list-group" style="width:80%;padding-top:20px;">
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
    container: 'body'
});
});
</script>
<?php 

  while($result2 = mysqli_fetch_array($resultS, MYSQLI_ASSOC))
     
     echo '<div  style = "padding-right:45px;padding-left:20px;">
            
            <li class = "list-group-item" style="height :30px;padding-top:3px;"> 
            
            <a style = "font-size:15px;"  href="front.php?rid='.$result2['ReceiptID'].'" data-html="true"  

            title="<b>'.$result2['Name'].'<b>" data-toggle="popover" data-trigger="hover"

            data-content="Contact : '.$result2['Contact'].' <br>Time in : '.$result2['TimeIN'].' 

            <br>Purpose : '.$result2['Purpose'].'
            
            <br> R ID : '.$result2['ReceiptID'].'">'.$result2['Name'].'</a>
          
          
          
          </li>
          </div>'
?>
</ul>
</div>
<?php
include('footerForAll.php');
?>
<body/>
<html/>
