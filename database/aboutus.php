<?php
	session_start();
	
	require 'connect.php';
	require 'functions.php';
	
	if(isset($_SESSION['username'], $_SESSION['password'])) {
		
	
?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Profile</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/main.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Blinker:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
 
<body>
	<?php
		 include 'header.php'; 
		 
	?>
	<section>
		<div class="container-fluid text-center bg-grey">
  		<h2>Co-Founder</h2><br>
  		<h4>What we have created</h4>
  			<div class="row text-center">
    			<div class="col-sm-4">
      				<div class="card">
  						<img src="assets/image/Tharm.jpg" alt="John" style="weight:100px;height:200px;">
  						<h1>Tharm T.</h1>
  						<p class="title" style="color: grey; font-size: 16px;" >CEO</p>
  						<p>I am da boss of these guys.</p>
  						<div style="margin: 24px 0;">
  					    	 
    						<a href="https://www.facebook.com/taipey.ruchutrakool/" target="_blank"><i class="fa fa-facebook"></i></a> 
  							</div>
  							<p><button>Contact</button></p>
						</div>
    			</div>
				
    			<div class="col-sm-4">
      				<div class="card">
  						<img src="assets/image/g.jpg" alt="John" style="weight:150px;height:230px;">
  						<h1>GodJi</h1>
  						<p class="title" style="color: grey; font-size: 16px;" >Owner</p>
  						<p>Chulalongkorn University</p>
  						<div style="margin: 24px 0;">
    						<a href="#"><i class="fa fa-facebook"></i></a> 
  							</div>
  							<p><button>Contact</button></p>
						</div>
    			</div>
				
    			<div class="col-sm-4">
      				<div class="card">
  						<img src="assets/image/teeratouch.jpg" alt="John" style="weight:100px;height:200px;">
  						<h1>Teeratouch</h1>
  						<p class="title" style="color: grey; font-size: 16px;" >Founder</p>
  						<p>York University</p>
  						<div style="margin: 24px 0;">  
    						<a href="https://web.facebook.com/teeratouch.prapasanobol/" target="_blank"><i class="fa fa-facebook"></i></a> 
  							</div>
  							<p><button>Contact</button></p>
						</div>
    			</div>
  			</div>
		</div>
		
		<br>
		<br>
		<br>
		<br>
		
		
		
		
	</section>

	
	
	
	
	
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>

<?php
	}else {
		header("location: index.php");
		exit;
	}
	
	unset($_SESSION['prompt']);
	mysqli_close($con);

?>
