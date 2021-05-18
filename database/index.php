<?php
	
	session_start();
	require 'connect.php';
	require 'functions.php';
	
	if(isset($_POST['login'])){
		$uname = clean($_POST['username']);
		$pword = clean($_POST['password']);
		
		$query = " SELECT * FROM students WHERE username = '$uname' AND password = '$pword' ";
		
		$result = mysqli_query($con,$query);
		
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			
			$_SESSION['userid'] = $row['id'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['password'] = $row['password'];
			
			header("location: profile.php");
			exit;
		}
		else
		{
			$_SESSION['errprompt'] = 'Wrong username or password.';
		}
		
	}
	
	if(!isset($_SESSION['username'],$_SESSION['password'])){
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Login</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/main.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Blinker:wght@300&display=swap" rel="stylesheet">
</head>
 
<body>
	
	<?php include 'header.php';?>
	
	<div class="warptext">
  		<span class="text1">Welcome to</span>
  		<span class="text2">TTT Club</span>
		</div><br><br>
	
	<section class="center-text">
		
		
		<div class="login-form box-center">
			
			<?php
				
				if(isset($_SESSION['prompt']))
				{
					showPrompt();
				}
				if(isset($_SESSION['errprompt']))
				{
					showError();
				}
				
				
			?>
			
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
				<div class="form-group">
					<label for="username" class="sr-only">Username</label>
					<input type="text" class="form-control" name="username" placeholder="Username" required autofocus>				
				</div>
				<div class="form-group">
					<label for="password" class="sr-only">Password</label>
					<input type="text" class="form-control" name="password" placeholder="Password" required>				
				</div>
				<a href="register.php">Sign Up</a>
				<input class="btn btn-primary" style="float:right; padding-right: 10px;" type="submit" name="login" value="Log in">
			</form>
		
		
		</div>
	</section>
	
	
	
	
	
	<script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	
	
	
</body>
</html>




<?php
	}
	else
	{
		header("location: profile.php");
		exit;
	}
	unset($_SESSION['prompt']);
	unset($_SESSION['errprompt']);
	
	mysqli_close($con);
?>
