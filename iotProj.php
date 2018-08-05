<?php
	$connection = mysqli_connect("localhost" , "id350292_saikarthik" , "abcd1234");
	if(!$connection){
		die("Could not connect");
		echo mysqli_error($connection);		
	}
	include "menu.php";
	$members = array("Module","Adarsh","Anuraag");
	
	$devices = array(array(1,"98:D3:32:11:18:6F","98:D3:32:11:18:6A","A6:57:00:B3:35:42"),array(2,"30:5A:3A:17:64:0C","C0:EE:FB:56:08:95","98:D3:32:11:18:6A"),array(3,"C0:EE:FB:56:08:94","7E:43:CE:22:83:80","A4:91:F3:5C:01:EA"));
	
	$mapping = array(array("44:3B:8B:A8:64:41","Keychain"),array("7E:43:CE:22:83:80","Wallet"),array("A4:91:F3:5C:01:EA","ID Card"),array("1A:F7:81:A3:D2:33","Glasses"),array("A6:57:00:B3:35:42","Watch"),array("00:6F:64:00:C0:D6","on7"),array("98:D3:32:11:18:6A","Bluetooth Module"),array("30:5A:3A:17:64:0C","Adarsh Phone"),array("C0:EE:FB:56:08:94","myself"));
	
	mysqli_select_db($connection , "id350292_yatrabudget");
	$mac = $_POST["BlueMAC"];
	$mymac = $_POST["MyMAC"];
	$status = "found";
    $t=time();
	date_default_timezone_set('Asia/Kolkata');
	$time_stamp = date("d/m/Y h:i:s a",$t);
	
	for($i = 0; $i<3; $i++){
			for($j = 1; $j < 4; $j++){
				if($devices[$i][$j] == $mac){
					$name = $members[$devices[$i][0]-1];	
				}
				if($devices[$i][$j] == $mymac){
					$foundby = $members[$devices[$i][0]-1];					
				}
			}		
	}
	$flag = "0";
	for($i = 0; $i<9; $i++){
		if($mapping[$i][0] == $mac){
			$itemname = $mapping[$i][1];					
			$flag = "1";
		}
	}
	
	
	$sql = "INSERT INTO iotdata(mac, mymac, status, time_stamp, name, foundby, itemname) VALUES ('$mac','$mymac','$status','$time_stamp','$name','$foundby','$itemname')";			
	$result = mysqli_query($connection , $sql);
	if(!$result){
		echo "Something went wrong. <br>" . mysqli_error($connection);
	}
	else{
		echo "<span style='font-size:25px;color:white;font-weight:bold;'>Data Successfully Added.</span>";
	}


?>