<?php
session_start();
include 'include/connection.php';
include 'include/code.php';

?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>Our Lady of Fatima University</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<!-- START== Para to sa logo sa taas ng tab -Jabson -->
	<link rel="apple-touch-icon" href="https://upload.wikimedia.org/wikipedia/en/7/77/OLFU_official_logo.png">
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/en/7/77/OLFU_official_logo.png">
	<!-- END== Para to sa logo sa taas ng tab -->

	
</head>
<body>
	<header>
		<div class="container-fluid" style="background-color: #1b274f;">
			
			<nav class="navbar navbar-light ">
			  <a class="navbar-brand" href="#">
			  </a>
			  
			  
			    <ul class="navbar-nav ml-auto">
			      <li class="nav-item">
			        <a  href="Admin-login.php" class="text-light text-decoration-none" style="text-decoration: none;">Admin login </a>
			      </li>
			      
			    </ul>
			  </div>
			</nav>
		</div>

		
			
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			    <a class="navbar-brand" href="#">
			  	<img src="https://upload.wikimedia.org/wikipedia/en/7/77/OLFU_official_logo.png" width="35" height="35" class="d-inline-block align-top" alt="">Our Lady Of Fatima University</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNav">
			    <ul class="navbar-nav ml-auto">
			      <li class="nav-item">
			        <a class="nav-link" href="index.php">Home </a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">About</a>
			      </li>
			      
			      <li class="nav-item">
			        <a class="nav-link" href="#">Gallery</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="Alumni-register.php">New Alumni</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="Staff-register.php">New Staff</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link active" href="login.php">Login</a>
			      </li>
			    </ul>
			  </div>
			</nav>
		

	</header>
				


		<div class="container">
			<div class="">
				<div class="col-sm-6 mx-auto mt-5">
					  <form class="form-container" method="POST" action="login.php" >
					  	
					 <!-- Start- inserted--> 
					  	<div class="form-group">

					  			<div class="row">
					  				<div class="col text-center">
					  					<h3>USER LOGIN</h3>
					  				</div>
					  			</div>
						      
						</div>
					 <!-- End- inserted-->
					
					  	
						<div class="form-group">
						    <label for="exampleInputEmail1">Email</label>
						    	<input type="email" name="email_log" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
						</div>
						<div class="form-group">
						    <label for="exampleInputPassword1">Password</label>
						    	<input type="password" name="pass_log" class="form-control" id="exampleInputPassword1" placeholder="Password">
						</div>
						<div class="row">
						  	<a class="nav-link" href="Alumni-register.php">New Alumni?</a>
						  	<a class="nav-link">or</a>
						  	<a class="nav-link" href="Staff-register.php">New Staff?</a>
						</div>
						<div class="col text-center mt-4">
						  	<button type="submit" name="login_btn" class="btn" style="background-color: #1b274f">Login</button>
						  	<a type="button" class="btn btn-light " href="index.php">Cancel</a>
						</div>

					</form>
				</div>
			</div>
		</div>





	
				<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		</body>
		</html>