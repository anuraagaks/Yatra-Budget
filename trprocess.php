<?php 
	include "../connection.php";
	include "menu.php";
	mysqli_select_db($connection , "id350292_yatrabudget");
	$name = $_POST["name"];
	$amt = $_POST["amt"];
	$place = $_POST["place"];
	date_default_timezone_set("Asia/Kolkata");
	$date = date("d M Y H:i:s D ");
	$purpose = $_POST["pfor"];
	if($purpose == "other"){
		$purpose = $_POST["other"];
	}
	$tourid = $_POST["tour"];
	$sql1 = "UPDATE tours SET budleft=budleft-$amt WHERE id=$tourid";
	$result1 = mysqli_query($connection , $sql1);
	$sql = "INSERT INTO data(name, amount, place, purpose, tourid, date) VALUES ('$name' , '$amt' , '$place' , '$purpose' , '$tourid' , '$date')";	
	$result = mysqli_query($connection , $sql);
	if(!$result){
		echo "Something went wrong. <br>" . mysqli_error($connection);
	}
	else{
		echo "<span style='font-size:25px;color:white;font-weight:bold;'>Data Successfully Added .Try going to home page...</span>";
	}

?>