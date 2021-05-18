<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">TTT Club</a>
			<a class="navbar-brand" href="aboutus.php">About Us</a>
		</div>
		
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			
			<?php
				
				if(isset($_SESSION['username'],$_SESSION['password']))
				{
					
				
			?>
			
			
			
			<form class="navbar-form navbar-right" action="searchresults.php" method="get">
				<div class="search-area">
					<div class="form-group">
						<div class="search-warp">
							<label for="searchbox" class="sr-only">Search:</label>
							<input type="text" class="form-control" name="searchbox" id="searchbox" placeholder="Search Student Here" required autocompleted="off">
							
							<div class="search-results hide"></div>
						</div>
					</div>
					<input type="submit" name="search" id="search-btn" value="Search"" class="btn btn-default">
				</div>
				<div class="welcome"><?php echo "Welcome, <a href='profile.php'>".$_SESSION['username']."</a>" ?></div>
				<a href="logout.php">Log Out<span class="glyphicon glyphicon-off" aria-hidden="true"></span></a>
			</form>
			
			<?php
				
				}
				else
				{
					echo "<span class='not-logged'>Do not log in yet.</span>";
				}
				
			?>
			
			
			
			
		</div>
	</div><!--container-->
</nav>
