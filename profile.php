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
</head>
 
<body>
	<?php
		 include 'header.php'; 
		 
	?>
	<section>
		<div class="container">
			<strong class="title">My Profile</strong>
		</div>
		
		<div class="profile-box box-left">
			
		<?php
			
			if(isset($_SESSION['prompt'])) {
				showPrompt();
			}	
			
			$query = "SELECT * FROM students WHERE username = '".$_SESSION['username']."' AND password = '".$_SESSION['password']."' ";
			
			if($result = mysqli_query($con,$query)) {
			 $row = mysqli_fetch_assoc($result);
			 
			 echo "<div class='info'><strong>Student No:</strong> <span>".$row['studentno']."</span></div>";
			 echo "<div class='info'><strong>Student Name:</strong> <span>".$row['firstname']." ".$row['lastname']."</span></div>";
			 echo "<div class='info'><strong>Student Course:</strong> <span>".$row['course']."</span></div>";
			 echo "<div class='info'><strong>Student Year Level:</strong> <span>".$row['yrlevel']."</span></div>";
			 echo "<div class='info'><strong>Phone Number:</strong> <span>".$row['phone']."</span></div>";
			 
			 
			 $query_date = "SELECT DATE_FORMAT(date_joined, '%m/%d/%y') FROM students WHERE id = '".$_SESSION['userid']."' ";
			 $result = mysqli_query($con,$query_date);
			 
			 $row = mysqli_fetch_row($result);
			 
			 echo "<div class='info'><strong>Date Joined:</strong> <span>".$row[0]."</span></div>";
			}else {
			 die("Error with the query in the database");
			}
		?>
			
			
			<div class="options">
				<a href="editprofile.php" class="btn btn-primary">Edit Profile</a>
				<a href="changepassword.php" class="btn btn-success">Change Password</a>
			</div>
			
		</div>
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
