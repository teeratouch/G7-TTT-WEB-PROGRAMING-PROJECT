<?php
	session_start();
	
	require 'connect.php';
	require 'functions.php';
	
	if(isset($_POST['update'])) {
		$oldpass = clean($_POST['oldpass']);
		$newpass = clean($_POST['newpass']);
		$confirmpass = clean($_POST['confirmpass']);
		
		$query = "SELECT password FROM students WHERE password = '$oldpass'";
		$result = mysqli_query($con,$query);
		
		if(mysqli_num_rows($result) > 0) {
			if($newpass == $confirmpass) {
				$query = "UPDATE students SET password = '$newpass' WHERE id = '".$_SESSION['userid']."' ";
				
				if($result = mysqli_query($con,$query)) {
					$_SESSION['prompt'] = "Password updated.";
					$_SESSION['password'] = $newpass;
					header("location: profile.php");
					exit;
				} else {
					die("Error with the query");
				} 
			} else {
					$_SESSION['errprompt'] = "The new password you enter does not match.";
				}
		} else {
			$_SESSION['errprompt'] = "You have entered a wrong old password.";
		}
	}
	
	if(isset($_SESSION['username'],$_SESSION['password'])) {
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Change Password</title>
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
			<strong class="title">Change Password</strong>
		</div>
		
		<div class="edit-form box-left clearfix">
			
			<?php
				if(isset($_SESSION['errprompt'])) {
					showError();
				}
			?>
			
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
				
				<div class="form-group">
					<label for="oldpass">Old Password</label>
					<input type="password" class="form-control" name="oldpass" placeholder="Old Password" required>
				</div>
				
				<div class="form-group">
					<label for="newpass">New Password</label>
					<input type="password" class="form-control" name="newpass" placeholder="New Password" required>
				</div>
				
				<div class="form-group">
					<label for="confirmpass">Confirm Password</label>
					<input type="password" class="form-control" name="confirmpass" placeholder="Confirm Password" required>
				</div>
				
				<div class="form-footer">
					<a href="profile.php">Go Back</a>
					<input class="btn btn-primary" type="submit" name="update" value="Update Password">
				</div>
				
			</form>
				
		</div>
		
		
	</section>
	
	
	
	
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
	
	
</body>
</html>


<?php
	} else {
		header("location: profile.php");
	}	
	
	unset($_SESSION['errpromt']);
	mysqli_close($con);
?>
