<?php 
	include "../connection.php";
	include "menu.php";
	mysqli_select_db($connection , "id350292_yatrabudget");
	$tid = $_POST["tour"];
	$sql = "SELECT * FROM data WHERE tourid=$tid";
	$result = mysqli_query($connection , $sql);
	echo "<div style='padding:15px;color:white;font-size:20px'>";
	if($result){
		while($row = mysqli_fetch_array($result)){
			echo "<fieldset><legend></legend>";
			echo "<span style='font-weight:bold;color:black'>Name: </span> " . $row["name"] . "<br>";
			echo "<span style='font-weight:bold;color:black'>Amount: </span> " . $row["amount"] . "<br>";
			echo "<span style='font-weight:bold;color:black'>For: </span> " . $row["purpose"] . "<br>";			
			echo "<span style='font-weight:bold;color:black'>At: </span> " . $row["place"] . "<br>";
                        echo "<span style='font-weight:bold;color:black'>On: </span> " . $row["date"] . "<br>"; 
			echo "</fieldset>";
		}
		if(mysqli_num_rows($result) < 1){
			echo "No Transactions done yet..";
		}
	}	
	else{
		echo "something went wrong. " . mysqli_error($connection);
	}
	echo "</div>";
	
	
?>