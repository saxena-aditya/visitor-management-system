<html>


<form action="" method = "POST">

<label>Name : </label><input name = "name" type = "text">
<label>C No. :</label><input name = "cno" type = "number">
<input name = "submit" type = "submit">
</form>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

echo $_POST["name"];
if(strlen($_POST["cno"]) !=10)
echo "wrong input";
else
echo $_POST["cno"];


}





?>

</html>