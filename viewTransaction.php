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
		function achange(){	
			document.newtr.sorttype.value = <?php if(isset($_POST["trselect"])){$type = $_POST["sorttype"];echo $type;}?>;
			
		}
	</script>

	<link href="css/NewTr.css" rel="stylesheet" type="text/css">
</head>
	
<body onload="change();achange()">		
	<div class="form">	
	<h2> View</h2>
    <form name="newtr" action="viewTransaction.php" method="post">
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
		Sort By:
		<select id="mainselection" name="sorttype">
			<option value="1">Tour Place </option>
			<option value="2">Date </option>
			<option value="3">Purpose </option>
			<option value="4">Transactor Name </option>
		</select>
		<p></p>
		<input type="submit" name="trselect" value="Select">
	</form>	
	<?php
	if(isset($_POST["trselect"])){
		$type = $_POST["sorttype"];	
		$tourid = $_POST["tour"];
		if($type == 1){
			$type = "place";
		}
		if($type == 2){
			$type = "date";
		}
		if($type == 3){
			$type = "purpose";
		}
		if($type == 4){
			$type = "name";
		}
		$sql1 = "SELECT name,place,sum(amount) AS total,purpose,date FROM data WHERE tourid=$tourid GROUP BY name";
		$result1 = mysqli_query($connection , $sql1);
		$v1 = "place";
		$v2 = "name";
		$v3 = "total";
		$v4 = "purpose";
		$v5 = "date";
		if($type == "name"){
			$v1 = "name";
			$v2 = "place";			
		}
		if($type == "purpose"){
			$v1 = "purpose";
			$v4 = "place";			
		}
		if($type == "date"){
			$v1 = "date";
			$v5 = "place";			
		}		
		if(mysqli_num_rows($result1) == 0){
			echo "<br>No Transactions Yet..";
		}
		else{
			echo "<table><tr><th>$v1</th><th>$v2</th><th>$v3</th><th>$v4</th><th>$v5</th></tr>";
			while($row = mysqli_fetch_array($result1)){				
				echo "<tr><td>" . $row["$v1"] . "</td><td>" . $row["$v2"] . "</td><td>" . $row["$v3"] . "</td><td>" . $row["$v4"] . "</td><td>" . $row["$v5"] . "</td></tr>";
			}
			echo "</table><br><br><br><p></p>";
			
		}
		if(!$result1){
			echo mysqli_error($connection);
		}	
	}	
	?>	 
    </div>	
</body>
</html>