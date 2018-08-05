<?php 
	include "../connection.php";
	include "menu.php";
	mysqli_select_db($connection , "id350292_yatrabudget");
	$sql = "SELECT id,tplace,tname FROM tours";
	$result = mysqli_query($connection , $sql);
	if($result){	
		echo "<div style='padding:15px;color:white;font-size:20px'>";
		while($row = mysqli_fetch_array($result)){
			$id = $row["id"];
			$place = $row["tplace"];
			$name = $row["tname"];
			echo "<span style='font-weight:bold;color:black;font-size:30px;'>Tour Name:</span><span style='font-size:30px;'> $name in $place</span>";
			$sql1 = "SELECT DISTINCT place FROM data WHERE tourid=$id";
			$result1 = mysqli_query($connection , $sql1);
			if($result1){
				while($row = mysqli_fetch_array($result1)){
					echo "<br><span style='font-weight:bold;`color:black;font-spx;'>Place: </span>" . $row["place"];	
				}
			}			
			
			echo "<p></p>";
		}
		echo "</select>";
	}
	else{
		echo "Sorry! Error: " . mysqli_error($connection);
	}
?>