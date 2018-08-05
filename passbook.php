<!DOCTYPE html>
<html>
<head>
	<?php include "menu.php"; ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Yatra Budget - Passbook </title>
    <script type="text/javascript">
		function validate(){
			var name = document.newtr.tname.value;
			var place = document.newtr.tplace.value;
			var bud = document.newtr.tbudget.value;
			if(name == "" || place == "" || bud == ""){
				alert("All fields are mandatory.");
				return false;
			}
			return true;
			
		}
	</script>
	<link href="css/NewTr.css" rel="stylesheet" type="text/css">
</head>

<body>	
	<div class="form">
	<h2> Select Tour</h2>
    <form name="newtr" action="passbookdisplay.php" method="post" onsubmit="return validate()"> 
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
					echo "<option value='$id'>$name in $place </option>";
				}
				echo "</select>";
			}
			else{
				echo "Sorry! Error: " . mysqli_error($connection);
			}
			
		?>
		<p></p>
        <input type="submit" name="submit" value="Select" />
    </form>
    </div>
	
</body>
</html>