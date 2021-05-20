<?php
  session_start();
  
  require 'connect.php';
  require 'functions.php';
  
  if(isset($_POST['register'])) {
    $uname = clean($_POST['username']);
    $pword = clean($_POST['password']);
    $studno = clean($_POST['studentno']);
    $fname = clean($_POST['firstname']);
    $lname = clean($_POST['lastname']);
    $course = clean($_POST['course']);
    $yrlevel = clean($_POST['yrlevel']);
    $phone = clean($_POST['phone']);
    
    
     $query = "SELECT username FROM students WHERE username ='$uname'";
     $result = mysqli_query($con,$query);
     
     if(mysqli_num_rows($result) == 0) 
     {
       $query = "SELECT studentno FROM students WHERE studentno = '$studno'";
       $result = mysqli_query($con,$query);
       
       if(mysqli_num_rows($result) == 0) 
       {
         $query = "INSERT INTO students(username, password, studentno, firstname, lastname, course, yrlevel, phone, date_joined)
          VALUES ('$uname','$pword', '$studno', '$fname', '$lname', '$course', '$yrlevel','$phone', NOW())";
         
         
         if(mysqli_query($con,$query))
         {
           $_SESSION['prompt'] = "Account registered. You can now login.";
           header("location: index.php");
           exit;
         } 
         else
          {
           die("Error with the query");
          }
       } 
         
         else 
         {
         $_SESSION['errprompt'] = "That student number already exits."; 
        }
       
     }
     
     else
     {
       $_SESSION['errprompt'] = "Username already exits.";
     }
    
  }
  ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Register - Student Information System </title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/main.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Blinker:wght@300&display=swap" rel="stylesheet">
  

  </head>
  
  <body>
	  
	  <?php
    include 'header.php'; 
    ?>
	  
	  <section class="center-text">
		  <strong>Register</strong>
		  
		  <div class="registration-form box-center clearfix">
        
       <?php
          if(isset($_SESSION['errprompt'])) {
           showError();
          }
       ?>
			  
			  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> " method="post">
				  <div class="row">
					  <div class="account-info col-sm-6">
						  <fieldset>
							  <legend>Account Info</legend>
							  
							  <div class="form-group">
								  <label for="username">Username</lable>
								  <input type="text" class="form-control" name="username" placeholder="(Must be unique)" required>
								  
							  </div>
							  
							  <div class="form-group">
								  <label for="password">Password</lable>
                  <p style="color: grey;font-size: 10px;">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.</p>
								  <input type="password" class="form-control" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>			  
							  </div>
							  
						  </fieldset>		  
					  </div> <!-- acount-info -->	
					  
					  <div class="personal-info col-sm-6">
						  <fieldset>
							  <legend>Personal Info</legend>
							  
							  <div class="form-group">
								  <label for="studentno">Student Number</label>
								  <input type="text" class="form-control" name="studentno" placeholder="Student Number (must be unique)" required>
							  </div>
							  
							  <div class="form-group">
								  <label for="firstname">First Name</label>
								  <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
							  </div>
							  
							  <div class="form-group">
								  <label for="lastname">Last Name</label>
								  <input type="text" class="form-control" name="lastname" placeholder="Lastname" required>
							  </div>
                
                <div class="form-group">
                  <label for="course">Course</label>
                  <select name="course" class="form-control">
                    <option value="medicine">Faculty of Medicine</option>
                    <option value="science">Faculty of Science</option>
                    <option value="engineering">Faculty of Engineering</option>
                    <option value="architecture">Faculty of Architecture</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="yrlevel">Year Level</label>
                  
                  <select name="yrlevel" class="form-control">
                    <option>1st Year</option>
                    <option>2nd Year</option>
                    <option>3rd Year</option>
                    <option>4th Year</option>
                  </select>
                </div>
                
                <div class="form-group">
								  <label for="phone">Phone Number</lable>
								  <input type="text" class="form-control" name="phone" placeholder="xxx-xxx-xxxx" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"  required>					
							  </div>
                
               
                
               
                
							  
						  </fieldset>
					  </div>	  				  
				  </div>
            <a href="index.php">Go Back</a>
            <input class="btn btn-primary" type="submit" name="register" value="Register">
			  </form>
		  </div>
	  </section>
	  
	  
	  
	 <script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>

<?php
  unset($_SESSION['errprompt']);
  mysqli_close($con);
?>
