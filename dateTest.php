<?php

$input= "";
$input = $_GET['name'];


?>
<form method = "GET" action="">
<input type="date" name="name" id = "name" value = "<?php echo $input;?>" >
<input type="submit" name="name1" id = "submit">
</form>
<span id = "span">asas
</span>
<script type="text/javascript">
	
var x = document.getElementById('name');
if(x.value == ""){

	document.getElementById('span').innerHTML = "input not recieved";

}
else
	document.getElementById('span').innerHTML = "input recieved";


</script>