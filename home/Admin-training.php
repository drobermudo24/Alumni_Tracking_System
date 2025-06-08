<?php 
session_start();
if (isset($_SESSION['ID']) && isset($_SESSION['NAME'])) {

include 'include/code.php';
include 'include/connection.php';




?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/skin.css">
	<link rel="apple-touch-icon" href="https://upload.wikimedia.org/wikipedia/en/7/77/OLFU_official_logo.png">
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/en/7/77/OLFU_official_logo.png">

</head>
<body>
	<header>
		<div class="container-fluid " style="background-color: #1b274f">
    		<div class="row"> 			
    			<div class="col">				
    				<a class="nav-link text-light text-right">Welcome <?php echo $_SESSION['NAME'];?></a>
    			</div>  			
    		</div>
    	</div>

			
			<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
			  <a class="navbar-brand" href="#">
			  	<img src="img/l.png" width="35" height="35" class="d-inline-block align-top" alt=""> Example University</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNav">
			    <ul class="navbar-nav ml-auto">
			      <li class="nav-item">
			        <a class="nav-link" href="Admin-home.php">Home </a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="Newadmin.php">New Admin</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="manage-course.php">Manage course</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="Admin-verify.php">Verify</a>
			      </li>
			       <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		         Event
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="Admin-create-event.php">Create Event</a>
		          <a class="dropdown-item" href="Admin-view-event.php">Manage Event </a>
		        </div>
		      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="Admin-gallery.php">Gallery</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="Admin-jobposting.php">Job Posting</a>
			      </li>

			       <li class="nav-item dropdown active">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		         Training
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="Admin-training.php">Create Training</a>
		          <a class="dropdown-item" href="Admin-training-man.php">Manage Training </a>
		        </div>
		      	</li>

			       
			     <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          My Account
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Profile</a>
		          <a class="dropdown-item" href="logout.php">Logout</a>
		        </div>
		      </li>
			      
			    </ul>
			  </div>
			</nav>
		

		

	<div class="container">
			
			<div class="row ">
				<div class="col">
					<form class="form-container" action="Admin-training.php" method="POST">

						
					
					<div class="form-group">
						<div class="row mt-4">
							<div class="col">
								<h3>Training</h3>
							</div>
						</div>
					</div>	

					<div class="form-group">
						    <label for="exampleInputEmail1">Topic*</label>
						    	<input type="text" name="Atopic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Topic" required>
					</div>


					<div class="form-group">
							<div class="row">
								<div class="col">
									<label for="formFile" class="form-label">Description</label>
  									<input type="Text" class="form-control" placeholder="Enter Description" name="Adesc" required>
    							
    							</div>
							</div>
					</div>

					<div class="form-group">
							  <label for="exampleInputEmail1">Select Course*</label>
							  <?php
							   
								$mysqli= NEW MySQLi('localhost', 'root','','dbats');

								$result = $mysqli->query("SELECT COURSE FROM COURSE");
							   ?>

						      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="Acourse"required >
						      	<option selected>Choose...</option>
						      	<?php
						      	while ($rows = $result->fetch_assoc()) {
						      		$cname =  $rows['COURSE'];
						      		echo "<option value='$cname'>$cname</option>";
						      	}
						      	?>
						        
						        
						      </select>
					</div>
		

					<div class="form-group date">
						<div class="row">
							<div class="col " data-provide="datepicker">
								<label for="formFile" class="form-label">Training Date</label>
  								<input type="date" class="form-control" name="Atraining" required>
    							
    							
							</div>
						</div>
					</div>

					


					
					<div class="form-group">
							<div class="row">
								<div class="col">
									<label for="formFile" class="form-label">Duration</label>
  									<input type="Text" class="form-control" placeholder="Enter Duration" name="Aduration" required>
    							 
    							</div>
							</div>
					</div>

					

					
					

					
					<div class="form-group">
							<div class="row">
								<div class="col">
									<label for="formFile" class="form-label">Venue</label>
  									<input type="aria" class="form-control" placeholder="Enter Venues" name="Avenue" required>
    							
    							</div>
							</div>
					</div>


					<div class="form-group">
							  <label for="exampleInputEmail1">Status</label>
						      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="Astatus" required>
						        <option selected>Choose...</option>
						        <option value="Active">Active</option>
						        <option value="Inactive">Inactive</option>
						      </select>
					</div>

					

					

					
					

					<!-- Buttons -->
					<div class="col text-center">
						  	<button type="submit" class="btn" style="background-color: #1b274f" name="Train">Submit</button>
						  	<a type="button" class="btn btn-light " href="index.php">Cancel</a>
					</div>
					<!-- Buttons -->
					</form>

				</div>

				

				<div class="col">

				
				
				</div>
			</div>
			
		</div>
		
		
					 
	</header>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php 
}else{
	header("Location:Admin-login.php");
	exit();
}
 ?>
