</body>
</html>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<style>
body{
	font-family: "Quikhand";
	background-image: url('bg/img12.jpg');
}
h2{
	font-family: "Quikhand";
	word-spacing: 10px;
	font-size: 40px;
	color:Black;	
}
.overlay {
    height: 0%;
    width: 100%;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0, 0.9);
    overflow-y: hidden;
    transition: 0.5s;
}

.overlay-content {
    position: relative;
    top: 25%;
    width: 100%;
    text-align: center;
    margin-top: 30px;
}

.overlay a {
    padding: 8px;
    text-decoration: none;
    font-size: 36px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
    color: #f1f1f1;
}

.overlay .closebtn {
    position: absolute;
    top: 20px;
    right: 45px;
    font-size: 60px;
}

@media screen and (max-height: 450px) {
  .overlay {overflow-y: auto;}
  .overlay a {font-size: 20px}
  .overlay .closebtn {
    font-size: 40px;
    top: 15px;
    right: 35px;
  }
}
.symbol:after{
	content: '\25b6';
}
.lefttopside{
	top: 1px;
	right: 2px;x
}
</style>
</head>
<body>
<div id="myNav" class="overlay">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
        <a href="newTransaction.php">New Transaction</a>
        <a href="viewTransaction.php">View Transaction</a>
        <a href="passbook.php">Passbook for the Trip</a>
        <a href="bill.php">Bill for trip</a>
        <a href="visited.php">Visited places</a>        
  </div>
</div>   
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style="padding-top:0px;">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#inverseNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      
      <div style="width:210px"><h2 style="color:orange">Yatra Budget</h2></div>            
 
    </div>
     <div class="navbar-header" style="padding-top:0px;">   
      
      <div style="padding:15px;color:RoyalBlue; "><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></div>            
 
  </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="inverseNavbar1" style="padding-top:5px;font-size:24px">
      <ul class="nav navbar-nav">
        <li class="active"><div style="padding:15px">	
        
        <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true" style="font-size:30px;cursor:pointer;color:ForestGreen" onclick="openNav()"></span>
</div></li>
        <li><a href="newTour.php"><span class="symbol"> New Tour </a></span></li>        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="budleft.php">Check The budget left</a></li>        
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
    
<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script>
		function openNav() {
			document.getElementById("myNav").style.height = "100%";
		}
		
		function closeNav() {
			document.getElementById("myNav").style.height = "0%";
		}
	</script>