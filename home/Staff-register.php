<?php
include 'include/connection.php';
include 'include/code.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>Our Lady of Fatima University</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- START== Para to sa logo sa taas ng tab -->

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
			        <a class="nav-link" href="index.php#About">About</a>
			      </li>
			      
			      <li class="nav-item">
			        <a class="nav-link" href="gallery.php">Gallery</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="Alumni-register.php">New Alumni</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link active" href="Staff-register.php">New Staff</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="login.php">Login</a>
			      </li>
			    </ul>
			  </div>
			</nav>
		

		<div class="container">
			
			<div class="">
				<div class="col mx-auto mt-4">
					
				<form method="POST" action="Staff-register.php" enctype="multipart/form-data">	
					<?php if (isset($_GET['error'])) { ?>
					 <p class="error" style="background:#F2DEDE; color: #A94442; padding: 10px;
					 border-radius: 5px;"><?php echo $_GET['error']; ?></p>
					   		
					   		<?php } ?>

					   		<?php if (isset($_GET['success'])) { ?>
               			<p class="success" style="background:#D4EDDA; color: #A94442; padding: 10px;
					 	border-radius: 5px;"><?php echo $_GET['success']; ?></p>
          			<?php } ?>
					<div class="form-group">
						<div class="row mt-4">
							<div class="col">
								<h3>Staff Registration</h3>
							</div>
						</div>
					</div>	

					<div class="form-group">
						    <label for="exampleInputEmail1">Full Name</label>
						    	<input type="text" name="fullnameStaffReg" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Full Name">
					</div>

					

					
					<div class="form-group">
							<div class="row">
								<div class="col">
									<label for="formFile" class="form-label">Qualification</label>
  									<input type="Text" name="qualStaffReg" class="form-control" placeholder="Enter Qualification">
    							
    							</div>
							</div>
					</div>



					<div class="form-group date">
						<div class="row">
							<div class="col " data-provide="datepicker">
								<label for="formFile" class="form-label">Date of Birth</label>
  								<input type="date" name="birthStaffReg" class="form-control">
    							
    							
							</div>
						</div>
					</div>

					<div class="form-group">
							<div class="row">
								<div class="col">
									<label for="formFile" class="form-label">Designation</label>
  									<input type="Text" name="desigStaffReg" class="form-control" placeholder="Designation">
    							
    							</div>
							</div>
					</div>

					<div class="form-group">
							<div class="row">
								<div class="col">
									<label for="formFile" class="form-label">Address</label>
  									<input type="aria" name="addStaffReg" class="form-control" placeholder="Enter Complete Address">
    							
    							</div>
							</div>
					</div>

					<div class="form-group">
							<div class="row">
								<div class="col">
									<label for="formFile" class="form-label">Contact Number</label>
  									<input type="Text" name="contactStaffReg" class="form-control" placeholder="Contact Number">
    							
    							</div>
							</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col">
								<label for="formFile" class="form-label">Profile Photo</label>
  								<input class="form-control" type="file" id="formFile" name="image">
							</div>
						</div>
					</div>

					<div class="form-group">
							<div class="row">
								<div class="col">
									<label for="formFile" class="form-label">Email</label>
  									<input type="Email" name="emailStaffReg" class="form-control" placeholder="Email">
    							
    							</div>
							</div>
					</div>

					<div class="form-group">
							<div class="row">
								<div class="col">
									<label for="formFile" class="form-label">Password</label>
  									<input type="Password" name="passStaffReg" class="form-control" placeholder="Password">
    							
    							</div>
							</div>
					</div>

					<div class="form-group">
							<div class="row">
								<div class="col">
									<label for="formFile" class="form-label">Confirm Password</label>
  									<input type="Password" name="conPassStaffReg" class="form-control" placeholder="Confirm Password">
    							
    							</div>
							</div>
					</div>

					

					
					

					<!-- Buttons -->
					<div class="col text-center">
						  	<button type="submit" name="staffReg" class="btn" style="background-color: #1b274f">Register</button>
						  	<a type="button" class="btn btn-light " href="index.php">Cancel</a>
					</div>
					<!-- Buttons -->
					
				
					</div>

				</form>

				<div class="col">

				
				
				</div>
			</div>
			
		</div>

<!--footer -->
 <div class="foot mt-5">
<link rel="stylesheet" type="text/css" href="css/style2.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
 <footer class="footer" style="background-color: #1b274f">
     <div class="container">
        <div class="row">
            <div class="footer-col">
                <h4>company</h4>
                <ul>
                    <li><a href="#">about us</a></li>
                    <li><a href="#">our services</a></li>
                </ul>
            </div>
            <style type="text/css">
                .footer-col h4::before{
                    background-color: green;
                }
            </style>
            <div class="footer-col">
                <h4>get help</h4>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Alumni</a></li>
                    <li><a href="#">Staff</a></li>
                    
                </ul>
            </div>
            <div class="footer-col">
                <h4>activities</h4>
                <ul>
                    <li><a href="#">event</a></li>
                    <li><a href="#">jobs</a></li>
                    <li><a href="#">job posting</a></li>
                    
                </ul>
            </div>
            <div class="footer-col">
                <h4>follow us</h4>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
     </div>
  </footer>
</div>
	</header>

</body>
</html>