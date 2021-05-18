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
<title>Search</title>
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
		
		<?php
			if(isset($_GET['search']))
			{
				$s = clean($_GET['searchbox']);
				$query = "SELECT studentno, firstname, lastname, course, yrlevel, phone, lineid, DATE_FORMAT(date_joined, '%m/%d/%Y') as date_joined, CONCAT(firstname, ' ', lastname) as fullname 
				FROM students WHERE CONCAT(firstname, ' ', lastname) = '$s' OR firstname = '$s' OR lastname = '$s' ORDER BY date_joined DESC LIMIT 5";
			
		?>
		
		
		
		
		
		<div class="container">
			<strong class="title">Search Result for " <?php echo $s; ?> "</strong>
			
			<?php
				
				if($result = mysqli_query($con,$query))
				{
					if(mysqli_num_rows($result) == 0)
					{
						echo "<p>No results matches to your query.</p>";
						echo "</div>";
					}
					else
					{
						echo "</div>";
						echo "<ul class='profile-results'>";
						
						while($row = mysqli_fetch_assoc($result))
						{
							
			?>
			
			<li>
				<div class="result-box box-left">
					<div class="info"><strong>Student No.   </strong><span><?php echo $row['studentno']; ?></span></div>
					<div class="info"><strong>Student Name.   </strong><span><?php echo $row['firstname']." ".$row['lastname']; ?></span></div>
					<div class="info"><strong>Course:   </strong><span><?php echo $row['course']; ?></span></div>
					<div class="info"><strong>Year Level:   </strong><span><?php echo $row['yrlevel']; ?></span></div>
					<div class="info"><strong>Date Joined:   </strong><span><?php echo $row['date_joined']; ?></span></div>
					<div class="info"><strong>Phone:   </strong><span><?php echo $row['phone']; ?></span></div>
					<div class="info"><strong>Line ID:   </strong><span><?php echo $row['lineid']; ?></span></div>
				</div>
			</li>
			
			<?php
						}echo "</ul>";
					}
				}
				else
				{
					die("Error with the query");
				}
	}
			?>
			
			
		</div>
		
		<div class="form-footer" style="text-align:center;">
				<a href="profile.php">Go Back</a>
							
		</div>
		<br>
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
	
	}
	else
	{
		header("location: index.php");
		exit;
	}
	mysqli_close($con);
?>
