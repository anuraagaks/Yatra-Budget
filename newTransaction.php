<!DOCTYPE html>
<html>
<head>
	<title> Yatra Budget - New Transaction </title>
    <script type="text/javascript"> 
		function display(){
			var name = document.newtr.pfor.value;
			if(name == "other"){
				document.getElementById("others").type = "text";
			}
			if(name != "other"){
				document.getElementById("others").type = "hidden";
			}
		}
		function validate(){
			var name = document.newtr.name.value;
			var amt = document.newtr.amt.value;
			var place = document.newtr.place.value;
			if(name == "" || amt == "" || place == ""){
				alert("All fields are mandatory.");
				return false;
			}
			return true;
			
		}
	</script>
	<link href="css/NewTr.css" rel="stylesheet" type="text/css">
</head>
<?php   
	include "menu.php";
?>
<body>	
	<div class="form">
	<h2> New Transaction</h2>
    <form name="newtr" action="trprocess.php" method="post" onsubmit="return validate()"> 
		Tour:
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
		Name: <br />
        <input type="text" name="name" maxlength="20" />
        <p></p>
        Amount: <br />
        <input type="number" name="amt" min="0" /> 
        <p></p>
		Paid For:<br />
		<select id="mainselection" name="pfor" onblur="display()">
			<option value="hotel"> Hotel </option>
			<option value="restaurant"> Restaurant </option>
			<option value="water"> Water </option>
			<option value="temple"> Temples </option>
			<option value="travel"> Travel(Rail/Flight...) </option>
			<option value="other"> Others </option>
		</select>
        <p></p>
        <input type="hidden" name="other" id="others" placeholder="Others..."/>
        <p></p>
		Place: <br />
        <input type="text" name="place" />
        <p></p>
        <input type="submit" name="submit" value="Go" />
    </form>
    </div>
	
</body>
</html>