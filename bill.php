<!DOCTYPE html>
<html>
<?php 
	include "../connection.php";
	include "menu.php";
	mysqli_select_db($connection , "id350292_yatrabudget");
?>
<head>
	<title> Yatra Budget - View Transaction </title>
    <script type="text/javascript"> 
		function change(){
			document.newtr.tour.value = <?php if(isset($_POST["trselect"])){echo $_POST["tour"];}?>;			
		}		
	</script>
	

	<link href="css/NewTr.css" rel="stylesheet" type="text/css">
</head>
	
<body onload="change()">		
	<div class="form">	
	<h2> Bill for the Trip</h2>
    <form name="newtr" action="bill.php" method="post">
		Select Tour:
		<?php 
			include "../connection.php";
			mysqli_select_db($connection , "id350292_yatrabudget");
			$sql = "SELECT id,tplace,tname FROM tours";
			$result = mysqli_query($connection , $sql);
			if($result){
				echo "<select id='mainselection' name='tour'>";
				while($row = mysqli_fetch_array($result)){
					$id = $row["id"];
					$place = $row["tplace"];
					$name = $row["tname"];
					echo "<option value='$id'> $name in $place </option>";
				}
				echo "</select>";
			}
			else{
				echo "Sorry! Error: " . mysqli_error($connection);
			}
			
		?>		
		<p></p>
		<input type="submit" name="trselect" value="Select">
		<p></p>		
	</form>	
	<?php
	if(isset($_POST["trselect"])){	
		$tourid = $_POST["tour"];		
		$sql1 = "SELECT name,sum(amount) AS total FROM data WHERE tourid=$tourid GROUP BY name ORDER BY total";
		$result1 = mysqli_query($connection , $sql1);
		if(mysqli_num_rows($result1) == 0){
			echo "<br>No Transactions Yet..";
		}
		else{
			echo "<table><tr><th>Name</th><th>Total Amount</th></tr>";
			$tot = 0;
			while($row = mysqli_fetch_array($result1)){	
				$tot = $tot + $row["total"];
				echo "<tr><td>" . $row["name"] . "</td><td>" . $row["total"] . "</td></tr>";
			}
			echo "</table><br><br><span style='font-size:25px;color:red;font-weight:bold'>Total Spendings on the trip:</span><span style='font-size:25px;font-weight:bold'> " . $tot . "</span>";
			
			
			echo "<br><p></p>";
			
		}
		if(!$result1){
			echo mysqli_error($connection);
		}	
	}	
	?>	 
    </div>	
</body>
</html>