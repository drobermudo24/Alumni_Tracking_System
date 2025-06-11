<?php
session_start();
include 'include/code.php';
include 'include/connection.php'; 

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
			        <a class="nav-link active" href="Alumni-register.php">New Alumni</a>
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
		
	
	
	 
		<div class="container">
			
			<div class="">
				<div class="col mx-auto mt-4" style="">
					<form class="form-container" action="Alumni-register.php" method="POST" enctype="multipart/form-data">

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
								<h3>Alumni Registration</h3>
							</div>
						</div>
					</div>	

					<div class="form-group">
						    <label for="exampleInputEmail1">Full Name*</label>
						     <?php if (isset($_GET['FnameReg'])) { ?>
						    	<input type="text" name="FnameReg" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $_GET['FnameReg']; ?>" placeholder="Enter Full Name" required>

						    	 <?php }else{ ?>
						    	 	<input type="text" name="FnameReg" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Full Name" required>
						    	 	<?php } ?>

					</div>

					 
						
					<div class="form-group">
						<div class="row">
							<div class="col">
								<label for="formFile" class="form-label">Profile Photo</label>
								<?php if (isset($_GET['image'])) { ?>
  								<input class="form-control" type="file" id="formFile" name="image" value="<?php echo $_GET['image']; ?>">
  								 <?php }else{ ?>
  								 	<input class="form-control" type="file" id="formFile" name="image">
  								 <?php } ?>	
							</div>
						</div>
					</div>

					<div class="form-group">
							  <label for="exampleInputEmail1">Password*</label>
							  
						      <input type="password" class="form-control" placeholder="Password" name="passReg" required>
					</div>

					<div class="form-group">
							  <label for="exampleInputEmail1">Confirm Password*</label>
						     
						      <input type="password" class="form-control" placeholder="Confirm Password" name="CpassReg" required>
					</div>

					<div class="form-group">
							  <label for="exampleInputEmail1">Gender*</label>
							   <?php if (isset($_GET['genderReg'])) { ?>
						      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="genderReg" required>
						        
						        <option value="<?php echo $_GET['genderReg']; ?>"><?php echo $_GET['genderReg'];?></option>
						        
						      </select>

						       <?php }else{ ?> 

						      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="genderReg" required>
						        <option selected>Choose...</option>
						        <option value="Male">Male</option>
						        <option value="Female">Female</option>
						      </select>
						      <?php } ?>
					</div>

					<div class="form-group date">
						<div class="row">
							<div class="col " data-provide="datepicker">
								<label for="formFile" class="form-label">Date of Birth*</label>
								<?php if (isset($_GET['birthReg'])) { ?>
  								<input type="date" class="form-control" name="birthReg" value="<?php echo $_GET['birthReg']; ?>" required>
  								<?php }else{ ?> 
  									<input type="date" class="form-control" name="birthReg" required>
  									 <?php } ?>
							</div>
						</div>
					</div>

					<div class="form-group">
							<div class="row">
								<div class="col">
									<label for="formFile" class="form-label">Email*</label>
									<?php if (isset($_GET['emailReg'])) { ?>
  									<input type="Email" class="form-control" placeholder="Enter Email" name="emailReg" value="<?php echo $_GET['emailReg']; ?>" required>
  									<?php }else{ ?>
    							<input type="Email" class="form-control" placeholder="Enter Email" name="emailReg" required="">
    							 <?php } ?>
    							</div>
							</div>
					</div>
					<div class="form-group">
							<div class="row">
								<div class="col">
									<label for="formFile" class="form-label">Contact Number*</label>
									<?php if (isset($_GET['CnumReg'])) { ?>
  									<input type="Text" class="form-control" placeholder="Enter Contact Number" name="CnumReg" value="<?php echo $_GET['CnumReg']; ?>" required>
    							 <?php }else{ ?>
    							 	<input type="Text" class="form-control" placeholder="Enter Contact Number" name="CnumReg" required="">
    							 	 <?php } ?>
    							</div>
							</div>
					</div>

					

					<div class="form-group date">
						<div class="row">
							<div class="col " data-provide="datepicker">

								<label for="formFile" class="form-label">Year Passout*</label>
								<?php if (isset($_GET['PoutReg'])) { ?>
  								<input type="month" class="form-control" pattern="YYYY" name="PoutReg" value="<?php echo $_GET['PoutReg']; ?>" required>
    							<?php }else{ ?>
    							<input type="month" class="form-control" pattern="YYYY" name="PoutReg" required="">
    							 <?php } ?>
							</div>
						</div>
					</div>

					<div class="form-group">


							 <label for="exampleInputEmail1">Select Course*</label>
							 <?php if (isset($_GET['courseReg'])) { ?>
							 	 <?php
							   
								$mysqli= NEW MySQLi('localhost', 'root','','dbats');

								$result = $mysqli->query("SELECT COURSE FROM COURSE");
							   ?>

						      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="courseReg"required >
						      	<option value="<?php echo $_GET['courseReg']; ?>"><?php echo $_GET['courseReg']; ?></option>     
						      	<?php
						      	while ($rows = $result->fetch_assoc()) {
						      		$cname =  $rows['COURSE'];
						      		echo "<option value='$cname'>$cname</option>";
						      	}
						      	?>

						      </select>
						      <?php }else{ ?>

							  <?php
							   
								$mysqli= NEW MySQLi('localhost', 'root','','dbats');

								$result = $mysqli->query("SELECT COURSE FROM COURSE");
							   ?>

						      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="courseReg"required >
						      	<option selected>Choose...</option>
						      	<?php
						      	while ($rows = $result->fetch_assoc()) {
						      		$cname =  $rows['COURSE'];
						      		echo "<option value='$cname'>$cname</option>";
						      	}
						      	?>
						          
						      </select>
						       <?php } ?>
					</div>

					

					<div class="form-group">
							<div class="row">
								<div class="col">
									<label for="formFile" class="form-label">Occupation  (If you dont have occupation please put N/A)*</label>
									<?php if (isset($_GET['occuReg'])) { ?>
  									<input type="Text" class="form-control" placeholder="Enter Occupation" name="occuReg" value="<?php echo $_GET['occuReg']; ?>" required>
    							<?php }else{ ?>
    								<input type="Text" class="form-control" placeholder="Enter Occupation" name="occuReg" required="">
    								 <?php } ?>
    							</div>
							</div>
					</div>

					<div class="form-group">
							<div class="row">
								<div class="col">
									<label for="formFile" class="form-label">Address*</label>
									<?php if (isset($_GET['addReg'])) { ?>
  									<input type="aria" class="form-control" placeholder="Enter Complete Address" name="addReg" value="<?php echo $_GET['addReg']; ?>" required>
    								<?php }else{ ?>
    									<input type="aria" class="form-control" placeholder="Enter Complete Address" name="addReg" required="">
    									<?php } ?>
    							</div>
							</div>
					</div>
				

					

					

					
					

					<!-- Buttons -->
					<div class="col text-center mb-4">
						  	<button type="submit" class="btn" style="background-color: #1b274f" name="AlReg">Register</button>
						  	<a type="button" class="btn btn-light " href="index.php">Cancel</a>
					</div>
					<!-- Buttons -->
					</form>

				</div>

				

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
		
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	
</body>
</html>