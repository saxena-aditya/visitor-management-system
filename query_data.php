<?php session_start();
	include("db_connect_db_new.php");
	if($_SESSION["loggedIn"] == 0)
	 	header("location: index.php");
$user2 = $_SESSION["user"];


	 ?>
<html>
	<head>
	<link rel = "stylesheet" href= "BootStrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="navbar.css">
		<link rel="stylesheet" type="text/css" href="footer.css">
	<script src= "BootStrap/js/bootstrap.min.js"></script>
    <script src="BootStrap/js/jQuery.min.js"></script>
    <script src="BootStrap/js/bootstrap.min.js"></script>
	<style>
	body{ 
		width: 100%;
		overflow-x: hidden;
		position: relative;
		height: auto;

		
	}

	#body{
		padding-left: 30px;
	}

	table{
	        border-collapse: collapse;
		}

	th, td {
    		padding: 15px;
    		text-align: left;
		}

	#day_end, #day_start{
		width: 65px;
	}

	 #month_start, #month_end{
		width: 85px;
	}

	#year_start, #year_end{
	    width: 65px;
	}

	

.affix {
      top:0;
      width: 100%;
      z-index: 9999 !important;
  }
  
  .FormLabel {padding-top: 20px;}
  .FormLabel input[type="radio"]{float: right;}
  #button{padding-top: 20px;}
 	</style>

	</head>
	<body>


	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header ">
     <a class="navbar-brand" href="#" id = "li"><?php echo "Logged in as : ".$user2;?></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="front.php" id = "li">Home</a></li>
      <li ><a href="myform.php" id = "li">Add Visitor</a></li>
      <li><a href="logoutform.php" id = "li">Logged Out Visitors</a></li>
      <li class="active"><a href="query_data.php">View Data</a></li> 
      <li><a href="logout.php" id = "li">Logout</a></li> 
    </ul>
  </div>
</nav>

	<div id='body'>
			
		<div class="row" style = "padding-bottom: 40px;height: auto;margin-left: -30;">
		<div class="col-sm-2" style="border-right: solid 2px; height: 85%;margin-bottom: 40px;background-color: rgba(35, 213, 216, 0.34);float: left;">	
		<h2>Search By  </h2>
		
		<form action = "<?php echo $_SERVER["PHP_SELF"] ;?>" method = "POST" style = "padding-top:20px;">
		
		<div class="FormLabel" style="border-top: solid 2px;">		
		 <label for = "all" >View All Entries :</label><input type = "radio" name = "allData" value = "all">
		 </div>
		 <div class="FormLabel" style="border-top: solid 2px;">
		 <label for =" active entries">View all Active Visitors : </label><input type = "radio" name="active">
		 </div>
		 <div style="border-bottom: solid 2px;padding-bottom: 12px;">
		 <div class="FormLabel" style="border-top: solid 2px;">
		 <label for = "date">Search By Date :</label> <input type = "radio" id = "bydate" name = "bydate" 
		        data-toggle="collapse" data-target="#inputdate">
		</div>
<?php 
  	$datePF = "";
	$dateFP = "";
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
	     $datePF = $_POST['dateP'];
	     $dateFP = $_POST['dateF'];
	 }
					
?>
    
    <div id ="inputdate" class="collapse">
          
          <input type="date" name = "dateP" value= "<?php echo $datePF;?>" id = "in1" oninput = "onDateInput()" /> 
          <input type="date" name = "dateF" value= "<?php echo $dateFP;?>" id = "in2" />
		
	</div>
</div>
<script type="text/javascript">

function onDateInput(){				
var inputDateA = document.getElementById('in1').value;
		
		if(inputDateA)
			document.getElementById('in2').setAttribute('min', inputDateA);


}

</script>
	
	<script type="text/javascript">
		
	 var dateInput = document.getElementById('in1');
	 var dateInput2 = document.getElementById('in2');
	   
	   if(dateInput.value != "" || dateInput2.value != "")
          document.getElementById('inputdate').removeAttribute("class");
			

	</script>
  <div id = "button">
   <button type= "submit" name = "submit"  class="btn btn-success"><span class="glyphicon glyphicon-search"></span>&nbsp;Search</button>
  </div>
  </form>
  </div>

 <div class="col-sm-10">
	
<?php
	
	
     if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	
	if(empty($_POST["allData"]) && empty($_POST["dateP"]) && empty($_POST["dateF"]) && empty($_POST["active"])){
			echo "<br><br><span style = 'color : red;'>PLease Select any field !</span>"; exit();}

		if(!empty($_POST["allData"]) && !empty($_POST["active"]) && (!empty($_POST["day_end"]) || !empty(["day_start"]))) { 


			echo "<br><br><span style = 'color : red;'>Select one at a time</span>"; exit();
		}
		
	/*-----------------------------------DSPAYING ALL DATA------------------------------------------*/
	
 if(!empty($_POST["allData"])){ 
	if( empty($_POST["day_start"]) && empty($_POST["day_end"]) && empty($_POST["active"])) {

    $query = "SELECT * FROM info_visitor";
	$result = mysqli_query( $link,$query);
	$count = mysqli_num_rows($result);
			    
	if($count){
		echo "<br><h3 style = 'padding-left: 16px;''>Visitor Information from the begning :</h3><br/>";
		headingMake($result);
	}else{echo "<br><span style = 'color : red;'>No Entries to Display</span>";}
   			
	}else{echo "<br><span style = 'color : red;'>select one at a time1.</span>";} 
}

		/* -----------------------------------DISPLAY ACTIVE VISITORS------------------------------------*/
 		
 else if(!empty($_POST["active"])){
 	if(empty($_POST["allData"]) && empty($_POST["day_start"]) && empty($_POST["day_end"])){

 	 $sql = "SELECT * FROM info_visitor WHERE Status = 'ONLINE'";
 	 $result = mysqli_query($link, $sql);
 	 $count = mysqli_num_rows($result);
 			
 		if($count){

 			echo "<br><h3 style = 'padding-left: 16px;''>Visitor Information for Active Visitors :</h3><br/>";
 			headingMake($result);

 		}else{echo "<br><span style = 'color : red;'>No Entry Found !</span>";}
 	}else{echo "<br><span style = 'color : red;'>Select one at a time !</span>";}
 }




	/*-------------------------DISPALYING SELECTED DATA--------------------------------------------------*/

else if(empty($_POST["allData"]) && empty($_POST["active"])){

 if( empty($_POST["dateP"])|| empty($_POST["dateF"])) 
	 echo "<br><br><span style = 'color : red;'>Select a valid option</p>";
else{
		$dateP =explode('-',$_POST['dateP']);
	 	$dateF = explode('-', $_POST['dateF']);		     
	 													 /* Vriables used many times seperatly , 
	 													  * so can't use arrray now !! 
	 													  * future Reminder 
	 													  */

		$day_start = $dateP[2];
		$day_end = $dateF[2];
		$month_start = $dateP[1];
	    $month_end = $dateF[1];
	    $year_start = $dateP[0];
		$year_end = $dateF[0];
	    $inputDate = array("$day_start", "$day_end", "$month_start", "$month_end", "$year_start", "$year_end");
			 
	 if($day_end >= $day_start && $month_end >= $month_start && $year_end >= $year_start){
	 if($day_start <=31 && $day_end<=31){
		$sql = "SELECT * FROM info_visitor WHERE day >= '$day_start' AND day <= '$day_end' AND year >= '$year_start' 
              AND year <= '$year_end' AND month >= '$month_start' AND month <='$month_end'";
		 $result = mysqli_query($link,$sql);
         $count = mysqli_num_rows($result);
	 if($count){

	 if($inputDate[0] == $inputDate[1])
		echo "<br><br><h3 style = 'padding-left: 16px;'>Visitor Information for $inputDate[0]-$inputDate[2]-$inputDate[4]<br/> :</h3>";
	 else
		echo "<br><br><h3 style = 'padding-left: 16px;'>Visitor Information from $inputDate[0]-$inputDate[2]-$inputDate[4] to 
	          $inputDate[1]-$inputDate[3]-$inputDate[5] : <br/></h3>";
		
		headingMake($result);
	 
	 }else{echo "<br><br><span style = 'color : red;'>No Match Found Sorry</span>";}
	 }else{echo "<br><br><span style = 'color : red;'>Their are max 31 days in any month !</span>";}
	
  	} else echo "<br><br><p style = 'color : red;'>select correct order, from past  to future !</p>";}
   } 

   /*-----------------------------------------------------------------------------------------------------------*/	

   }

function echoDetails($row){
 	if($row["TimeOUT"] == NULL) $row["TimeOUT"] = "Not Yet Logged out";
	  echo "<tr><td>" .$row['Name']."</td><td>"
	                  .$row['Contact'] ."</td><td>"
	                  .$row["Purpose"]."</td><td>"
	                  .$row["Date"]."</td><td>"
	      
	                    .$row["TimeIN"]."</td><td>".$row["TimeOUT"]. "</td><td>"
	                    .$row["Comment"]."</td><td>"
	                    .$row["Status"]."</td><td>"
	                    .$row["registeredBy"]."</td></tr>" ;  
	
}
	
	function headingMake($res){
         
      while($result = mysqli_fetch_array($res, MYSQLI_ASSOC)){

   echo '<div class="col-sm-2">
             <div class="thumbnail" style = "width:175px;">
	           <img src="'.$result['imagePath'].'" alt="photo" width="400px" height="300px">
	           <p style = "text-align:center;"><strong>'.$result['Name'].' </strong></p>
	           <p>Receipt ID : '.$result['ReceiptID'].'</p>
	           <p>Contact : '.$result['Contact'].'</p>
	           <p>Time In : '.$result['TimeIN'].'</p>
	           <p>Date    : '.$result['Date'].'</p>
	           <p>Meeting : '.$result['meetingTo'].'</p>
	        </div>
	       </div>';
	   }
  }         
?>

       
	</div>
	</div>
	<?php
include('footerForAll.php');
?>
	</body> 
</html>