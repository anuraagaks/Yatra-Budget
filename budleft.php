<!DOCTYPE html>
<html>
<?php 
	include "../connection.php";
	include "menu.php";
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
	<h2> Budget Left</h2>
    <form name="newtr" action="budleft.php" method="post">
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
	</form>	
	<?php
	if(isset($_POST["trselect"])){		
		$tourid = $_POST["tour"];		
		$sql1 = "SELECT budleft FROM tours WHERE id=$tourid";
		$result1 = mysqli_query($connection , $sql1);		
		if(mysqli_num_rows($result1) == 0){
			echo "<br>No Transactions Yet..";
		}
		else{
			while($row = mysqli_fetch_array($result1)){				
				echo "Budget Left: " . $row["budleft"];
			}
			echo "<br><br><br><p></p>";
			
		}
		if(!$result1){
			echo mysqli_error($connection);
		}	
	}	
	?>	 
    </div>	
</body>
</html>