<?php 
include('db_connect_db_new.php');  
session_start();	
if($_SESSION["loggedIn"] == 0)
	 	header("location: index.php");
	$user_ = $_SESSION["user"];

?>
<html>
<head>
<!--  <meta http-equiv = "refresh" content = "10;url= front.php"/>  -->
<link rel = "stylesheet" href= "BootStrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="navbar.css">
<script src= "BootStrap/js/bootstrap.min.js"></script>
<script src="BootStrap/js/jQuery.min.js"></script>
<script src="BootStrap/js/bootstrap.min.js"></script>

  
<script type="text/javascript" src="images/webcam.js"></script>

 <style>
 html {
  position: relative;
  min-height: 100%;
}
body {
  /* Margin bottom by footer height */
  margin-bottom: 40px;
}
 #head{
	  text-decoration:underline;
}
}
  input:required:invalid, input:focus:invalid, input:invalid {
    border-radius: 5px;
    border:soild 1px;

 }
 input:required:valid, input:valid {
    border-radius: 5px;
  }

 input[type='number'] {
    -moz-appearance:textfield;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
}

	
.affix {
      top:0;
      width: 100%;
      z-index: 9999 !important;
  }
  

</style>

</head><body>
<?php


$success =0;

if(!$link)
	die("error". mysqli_link_error());


if($_SERVER["REQUEST_METHOD"] =="POST"){

if(empty($_POST["name"]))
	$name_error = "Enter the Name Properly !";
else{
$name = $_POST["name"];

}

if(strlen($_POST["cno"]) != 10)
	$cno_error = "Enter Valid Contact number";
else{
$cno = $_POST["cno"];

}
if(empty($_POST["purpose"]))
	$p_error = "Enter Valid Purpose";
else
	$p = $_POST["purpose"];

$timein = date("H:i:s");
$rid = rand(100000,900000);
$_SESSION["rid"] = $rid ;

$date = date("Y/m/d");
$comment = $_POST["comment"];
$day = date("d");
$month = date("m");
$year = date("Y");
$meet =$_POST["MeetingTo"];
$studentName = $_POST['studentName'];
$Cyear = $_POST['Cyear'];
$hostel = $_POST['hostel'];

	/*----   PHOTO UPLOADING SCRIPT ----*/

    $encoded_data = $_POST['mydata'];
    $binary_data = base64_decode( $encoded_data );
    $imgName = "$name"."$rid".".jpg";
    $imgName  = preg_replace('/\s/','',$imgName);
    $dir = "img/$imgName";
    // save to server (beware of permissions)
    $result = file_put_contents( "$dir", $binary_data );

    
    if (!$result) {//echo("Could not save image!  Check file permissions.");die();}
}

if(empty($name) || empty($cno) || empty($p) || strlen($cno)!=10)
{
	 $displayError = "You have not entered the details correctly !"; }
else{
$sql = "INSERT INTO info_visitor(Name, Contact, Purpose, meetingTo, day, month, year, Date, TimeIN, ReceiptID,Status,Comment,registeredBy,imagePath,studentName, courseYear, Hostel) VALUES ('$name','$cno','$p','$meet', '$day', 
    '$month', '$year', '$date','$timein','$rid','ONLINE', '$comment', '$user_', '$dir', '$studentName', '$Cyear', '$hostel')";

if(mysqli_query($link,$sql)) 
	$success =1;   //redirection to the printing page.
else
	echo "Error: " . $sql . "<br>" . mysqli_error($link);}

//echo "<h4>You will be redirected to the home page after 10 secs !</h4> ";
	
	
if($success == 1)
	header('location: user_profile.php');
   
 }

?>
	<!--   Navigation Menu   -->

	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" id = "li"><?php echo "Logged in as : ".$user_;?></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="front.php" id = "li">Home</a></li>
      <li class="active"><a  href="myform.php">Add Visitor</a></li>
      <li ><a  id = "li" href="logoutform.php">Logged Out Visitors</a></li>
      <li><a id = "li" href="query_data.php">View Data</a></li> 
      <li><a id = "li" href="logout.php">Logout</a></li> 
    </ul>
  </div>
</nav>

<div style= "float:right; padding-right:8px;padding-top:10px;">
 <p id = "timeDisplay"> Time : <?php echo date("H:i:s");?></p>
 <p id = "dateDisplay"> Date : <?php echo date("d/m/Y");?></p>
	</div>	 
    <div style="margin-left:110px;padding-bottom:12px">
     <h2>Add Visitor</h2>

     <p id = "redBoxSyndrome"><p>
    </div>
	<div class="row" style="margin-left:100px">
	<div class="col-sm-6">
	<form class= "myForm" action= "<?php echo $_SERVER["PHP_SELF"];?>" method= "POST" id ="form">

	<?echo $displayError ;?>
	

	
	<div class="row">
    <div class="col-sm-7">

	<div class="form-group">
	<label for="name"> Name :</label> 
	<input autocomplete="off" class="form-control" type= "text" name ="name" placeholder= "Enter Visitor's Name." required id = "name"
	oninvalid="this.setCustomValidity(this.willValidate?'':'Name is required')" onblur="isEmpty('name')" onfocus="onfo('name')"
	data-toggle="popover" title="Popover Header" data-content="Some content inside the popover" data-trigger = "onfocus"
	>
	</div></div>

<div class="col-sm-5">
<div class="form-group">
<label for ='#'> Number of People :</label>
<input autocomplete="off" class="form-control" type="number" required id = "peopleCount" name = "NofPeople" placeholder="Number of people ?" oninvalid="this.setCustomValidity(this.willValidate?'':'Please Enter how many people are there')"  min="1" onblur="isEmpty('peopleCount')" 
data-toggle="popover" title="Popover Header" data-content="Some content inside the popover" data-trigger = "onfocus"
/>
</div>
</div>
</div>

	

	<div class="form-group">
	<label for="cno"> Contact No. :</label> <span id = "span" style = "padding-bottom: 5px;float:right;"></span>
	
	
	<input autocomplete="off" class="form-control" type="number" id = "ContactInfo" onkeyup = "Ccheck('ContactInfo')" 
	       onblur = "isEmpty('ContactInfo')" onfocus = "onfo('ContactInfo')" name="cno" placeholder="Enter Contact Number." 
	       required min="1000000000" max = "9999999999" 
	       oninvalid="this.setCustomValidity(this.willValidate?'':'Enter correct Contact number please')"
		   data-toggle="popover" title="Popover Header" data-content="Some content inside the popover" data-trigger = "onfocus"/>

	</div>
	
	<div class="form-group">
	<label for ="prps">Purpose :</label> 
	<input autocomplete="off" class="form-control" type="text" name="purpose" placeholder="Enter Purpose." required id = "Purpose" 
	       oninvalid="this.setCustomValidity(this.willValidate?'':'Enter your Purpose')" maxlength="30" onblur="isEmpty('Purpose')"
	       data-toggle="popover" title="Popover Header" data-content="Some content inside the popover" data-trigger = "onfocus"
	/>
	</div>

	<div class="row">
	<div class="col-sm-7">
	<div class="form-group">
	<label for = "meetingTo">Meeting to :</label>
	<input autocomplete="off" class="form-control" type="text" required name = "MeetingTo" id = "meetingTo" placeholder="Whom will you meet ?"       oninvalid="this.setCustomValidity(this.willValidate?'':'Whom do you want to meet ?')" maxlength="30"  onblur="isEmpty('meetingTo')"
	       data-toggle="popover" title="Popover Header" data-content="Some content inside the popover" data-trigger = "onfocus"
	/>
	</div>
    </div>
	
	<div class="col-sm-5">

	<label style="padding-top:25px;">Parents ? : &nbsp;&nbsp;<span><input autocomplete="off" id = "parents" name ="parents" type="checkbox"       data-toggle="collapse" data-target="#clgStudent"/></span></label>

<script>
	
	$('#parents' ).change(function () {
    if(this.checked) {
        $('#studentName, #Cyear, #hostel').prop('required', true);
    } else {
        $('#studentName, #Cyear, #hestel').prop('required', false);
    }
});
</script>

</div></div>
<div id="clgStudent" class="collapse">
    <div class="row">
    <div class = "col-sm-6">
    	<div class="form-group">
    	<label for = "nameStudent">Name of Student :</label>
    	<input type="text" class="form-control" id="studentName" name="studentName" placeholder="Student's Name" oninvalid="this.setCustomValidity(this.willValidate?'':'Enter Name !)" maxlength="30">
    	</div>
    	</div>
    	<div class= "col-sm-6">
    	<div class="form-group">
    	<label for = "nameStudent">Course Year :</label>
    	<input type="number" class="form-control" name="Cyear" id = "Cyear" placeholder="1/2/3/4" oninvalid="this.setCustomValidity(this.willValidate?'':'Choose Course year from 1 to 4)" maxlength="1" value = 0  >
    	</div>
    	</div>

    </div>
	
	<div class="form-group">
    <label  for = "comment">Hostel :</label> 
	<input autocomplete="off" class="form-control" id = "hostel" minlenght = 0 
	       type= "text" maxlength="40" name = "hostel" type = "text" placeholder="Name of the Hostel">
	</div>    

    </div>
 
    <div class="form-group">
    <label  for = "comment">Comment :</label> 
	<input autocomplete="off" class="form-control" type= "varchar" maxlength="30" name = "comment" height="50px" ><br>
	</div>

    
	<div>
    <input id="submitme" type="submit" name="submit_post" class="btn btn-success" value="Submit" onclick="return emptys()">

    <input autocomplete="off" id="mydata" type="hidden" name="mydata">
				
				<script type="text/javascript">
						function emptys() {
					    	var x;
					    		x = document.getElementById("mydata").value;
					    	if (x == "") {
					        alert("please take a proper phto!");
					        return false;
					    };
					}

					 
				</script>

   </div>
	
	</form>
	</div>
	
    <div class="col-sm-4" style="padding-top:40px;padding-left:30px">
	
	<div style="width: 360px; height: 260px;" id="my_camera">No Camera Detected !</div>

			
	<div  id="pre_take_buttons" style="padding-top:20px;text-align:center;">
      <input autocomplete="off" value="Take Snapshot" onclick="preview_snapshot()" type="button">
	</div>
	<div id="post_take_buttons" style="display: none;padding-top:20px;text-align:center;">
	  <input autocomplete="off" value="&lt; Take Another" onclick="cancel_preview()" type="button">
	  <input autocomplete="off" value="Save Photo &gt;" onclick="save_photo()" style="font-weight:bold;" type="button">
	</div>
	</div></div>
		

	<script language="JavaScript">

	
		Webcam.set({
			width: 360,
			height: 260,
			image_format: 'jpeg',
			jpeg_quality: 90,

		});
		Webcam.attach( '#my_camera' );

		function Ccheck(element){

			 var sx = document.getElementById(element);
			if(sx.value.toString().length !=10){
				document.getElementById('span').style.color="red";
				document.getElementById('span').innerHTML = "Invalid Contact Number";
			}
			else{
				document.getElementById('span').style.color="green";
				document.getElementById('span').innerHTML = "Valid Contact Number";
			}

			
		}


		function isEmpty(field){

			 x = document.getElementById(field);
			if(x.value.length == 0){
			//	notifyEmpty(1);
				x.style.borderColor="red";
				document.getElementById('redBoxSyndrome').style.color = "red";
				document.getElementById('redBoxSyndrome').innerHTML = "** Please correct the red boxes!";
				
			}


		}

 			
	function notifyEmpty(a){

		if(a == 1){
		$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
       });

	}}

	function s(){
		$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
       });
}
		
		</script>
			

 
	<!-- Code to handle taking the snapshot and displaying -->
	<script language="JavaScript">
		function preview_snapshot() {
			// freeze camera so user can preview pic
			Webcam.freeze();
			
			// swap button sets
			document.getElementById('pre_take_buttons').style.display = 'none';
			document.getElementById('post_take_buttons').style.display = '';
		}
		
		function cancel_preview() {
			// cancel preview freeze and return to live camera feed
			Webcam.unfreeze();
			
			// swap buttons back
			document.getElementById('pre_take_buttons').style.display = '';
			document.getElementById('post_take_buttons').style.display = 'none';
		}
		
		function save_photo() {
			// actually snap photo (from preview freeze) and display it
			Webcam.snap( function(data_uri) {
				// display results in page
				document.getElementById('my_camera').innerHTML = 
					  
					'<img src="'+data_uri+'"/>';
				 var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
				  document.getElementById('mydata').value = raw_image_data;

				
				document.getElementById('pre_take_buttons').style.display = '';
				document.getElementById('post_take_buttons').style.display = 'none';
			} );
		}
	</script>



<?php
include('footerForAll.php');
?>
	</body>
</html>