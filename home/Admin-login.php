<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="apple-touch-icon" href="https://upload.wikimedia.org/wikipedia/en/7/77/OLFU_official_logo.png">
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/en/7/77/OLFU_official_logo.png">

</head>
<body>
	<header>
		<div class="container-fluid " style="background-color: #1b274f">
    		<div class="row"> 			
    			<div class="col">				
    				<a class="nav-link text-light text-right" href="Admin-login.php">Admin login</a>
    			</div>  			
    		</div>
    	</div>

		<div class="container-fluid">
			
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
			        <a class="nav-link" href="index.php#About">About</a>
			      </li>
			      
			      <li class="nav-item">
			        <a class="nav-link" href="gallery.php">Gallery</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="Alumni-register.php">New Alumni</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="Staff-register.php">New Staff</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="login.php">Login</a>
			      </li>
			    </ul>
			  </div>
			</nav>
		</div>
		<div class="container">

			<div class="">

				<div class="col-sm-6 mx-auto mt-5">
					  <form class="form-container" action="code.php" method="post">
					   		<?php if (isset($_GET['error'])) { ?>
					 <p class="error" style="background:#F2DEDE; color: #A94442; padding: 10px;
					 border-radius: 5px;"><?php echo $_GET['error']; ?></p>
					   		
					   		<?php } ?>

					   		<div class="form-group">
					   			<div class="row">
					   			<div class="col text-center">
					  					<h3>ADMIN LOGIN</h3>
					  				</div>
					  				</div>
					   		</div>
						  <div class="form-group">
						    <label for="exampleUsername">Username</label>
						    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Password</label>
						    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						  </div>
						 
						  <div class="col text-center mt-4">
						  <button type="submit" class="btn" style="background-color: #1b274f">Login</button>
						  <button type="button" class="btn btn-light" >Cancel</button>
						</div>

					</form>
				</div>
			</div>
		</div>





	</header>
				<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		</body>
		</html>