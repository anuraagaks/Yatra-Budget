<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Yatra Budget - New Tour </title>
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
<?php   
	include "menu.php";
?>
<body>	
	<div class="form">
	<h2> New Tour</h2>
    <form name="newtr" action="addnewtour.php" method="post" onsubmit="return validate()"> 
		Tour Name: <br />
        <input type="text" name="tname" maxlength="20" />
        <p></p>
        Tour Place: <br />
        <input type="text" name="tplace" maxlength="20" />
        <p></p>
		Estimated Budget:<br />
		<input type="number" name="tbudget" min="1" />
        <p></p>      
        <input type="submit" name="submit" value="Go" />
    </form>
    </div>
	
</body>
</html>