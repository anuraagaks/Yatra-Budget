<?php
	include "../connection.php";
	include "menu.php";
	mysqli_select_db($connection , "id350292_yatrabudget");
	$name = "chgv";//$_POST["tname"];
	$budget = 152;//$_POST["tbudget"];
	$place = "chgv";//$_POST["tplace"];
	$sql = "INSERT INTO tours(tname, tbudget ,budleft ,tplace) VALUES ('$name' , $budget , $budget , '$place')";			
	$result = mysqli_query($connection , $sql);
	if(!$result){
		echo "Something went wrong. <br>" . mysqli_error($connection);
	}
	else{
		echo "<span style='font-size:25px;color:white;font-weight:bold;'>Data Successfully Added.</span>";
	}


?>