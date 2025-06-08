<?php 
session_start();
if (isset($_SESSION['ID']) && isset($_SESSION['NAME'])) {

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

		
			
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			 <a class="navbar-brand" href="#">
			  	<img src="https://upload.wikimedia.org/wikipedia/en/7/77/OLFU_official_logo.png" width="35" height="35" class="d-inline-block align-top" alt="">Our Lady Of Fatima University</a>
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
			        <a class="nav-link" href="manage-course">Manage course</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="Admin-verify.php">Verify</a>
			      </li>
			        <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		         Event
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item active" href="#">Create Event</a>
		          <a class="dropdown-item" href="Admin-view-event.php">Manage Event </a>
		        </div>
		      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="Admin-gallery.php">Gallery</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link active" href="admin-jobposting.php">Job Posting</a>
			      </li>
			       
			       <li class="nav-item dropdown">
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
		

<div class="container-fluid">
	
			<div class="flex-row">
				<div class="col-sm" style="top: 10vh; margin-bottom: 20px;">
					  <form class="form-container" action="code.php" method="post" enctype="multipart/form-data">

					 <?php if (isset($_GET['error'])) { ?>
     					<p class="error" style="background:#F2DEDE; color: #A94442; padding: 10px;
					 	border-radius: 5px;"><?php echo $_GET['error']; ?></p>
     					<?php } ?>

          				<?php if (isset($_GET['success'])) { ?>
               			<p class="success" style="background:#D4EDDA; color: #A94442; padding: 10px;
					 	border-radius: 5px;"><?php echo $_GET['success']; ?></p>
          			<?php } ?>
          					
          				
					 	<div class="form-group row">				 		
							    <label for="inputTitle" class="col-sm-2 col-form-label">Company</label>
							    <div class="col-sm-10">
							    	<?php if (isset($_GET['company'])) { ?>
							      <input type="text" class="form-control" id="inputCompany" placeholder="Company " name="company" value="<?php echo $_GET['company']; ?>">
							      <?php }else{ ?>
							      	<input type="text" class="form-control" id="company" placeholder="Company " name="company">
							      	<?php } ?>
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputEmail" class="col-sm-2 col-form-label">Location</label>
							    <div class="col-sm-10">
							    	<?php if (isset($_GET['joblocation'])) { ?>
							      <input type="text" class="form-control" id="inputLocation" placeholder="Location" name="joblocation" value="<?php echo $_GET['joblocation']; ?>">
							  <?php }else{ ?>
							  	<input type="text" class="form-control" id="inputLocation" placeholder="Location" name="joblocation">
							  <?php } ?>
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputText" class="col-sm-2 col-form-label">Job Title</label>
							    <div class="col-sm-10">
							    	<?php if (isset($_GET['jobtitle'])) { ?>
							      <input type="text"  class="form-control" id="" placeholder="Job titile" name="jobtitle" value="<?php echo $_GET['jobtitle']; ?>">
							      <?php }else{ ?>
							      	<input type="text" class="form-control" id="" placeholder="Job titile" name="jobtitle">
							      <?php } ?>
							    </div>
							  </div>

							     <div class="form-group row">
							    <label for="inputText" class="col-sm-2 col-form-label">Qualification</label>
							    <div class="col-sm-10">
							    	<?php if (isset($_GET['qualification'])) { ?>
							      <input type="text"  class="form-control" id="" placeholder="Qualification" name="qualification" value="<?php echo $_GET['qualification']; ?>">
							      <?php }else{ ?>
							      	<input type="text" class="form-control" id="" placeholder="Qualification" name="qualification">
							      <?php } ?>
							    </div>
							  </div>

					   		
							   <div class="form-group row">
							    <label for="inputText" class="col-sm-2 col-form-label">Job Description</label>
							    <div class="col-sm-10">
							    	<?php if (isset($_GET['jobdescription'])) { ?>
							      <textarea type="text"  class="form-control" id="" placeholder="Job Description" name="jobdescription" value="<?php echo $_GET['jobdescription']; ?>"></textarea>
							      <?php }else{ ?>
							      	<textarea type="text" class="form-control" id="" placeholder="Job Description" name="jobdescription"></textarea>
							      <?php } ?>
							    </div>
							  </div>


							   <div class="form-group row">
							    <label for="inputText" class="col-sm-2 col-form-label">Key Skills</label>
							    <div class="col-sm-10">
							    	<?php if (isset($_GET['keyskills'])) { ?>
							      <input type="text"  class="form-control" id="" placeholder="Key Skiils" name="keyskills" value="<?php echo $_GET['keyskills']; ?>">
							      <?php }else{ ?>
							      	<input type="text" class="form-control" id="" placeholder="keyskills" name="keyskills">
							      <?php } ?>
							    </div>
							  </div>

							   <div class="form-group row">
							    <label for="inputText" class="col-sm-2 col-form-label">Job Requirements</label>
							    <div class="col-sm-10">
							    	<?php if (isset($_GET['jobreq'])) { ?>
							      <input type="text"  class="form-control" id="" placeholder="Job Requirements" name="jobreq" value="<?php echo $_GET['jobreq']; ?>">
							      <?php }else{ ?>
							      	<input type="text" class="form-control" id="" placeholder="Job Requirements" name="jobreq">
							      <?php } ?>
							    </div>
							  </div>

							   <div class="form-group row">
							    <label for="inputText" class="col-sm-2 col-form-label">No. of Vacancy</label>
							    <div class="col-sm-10">
							    	<?php if (isset($_GET['vacancy'])) { ?>
							      <input type="text"  class="form-control" id="" placeholder="No. of Vacancy" name="vacancy" value="<?php echo $_GET['vacancy']; ?>">
							      <?php }else{ ?>
							      	<input type="text" class="form-control" id="" placeholder="No. of Vacancy" name="vacancy">
							      <?php } ?>
							    </div>
							  </div>

							   <div class="form-group row">
							    <label for="inputText" class="col-sm-2 col-form-label">Reference Email</label>
							    <div class="col-sm-10">
							    	<?php if (isset($_GET['refemail'])) { ?>
							      <input type="email"  class="form-control" id="" placeholder="Reference Email" name="refemail" value="<?php echo $_GET['refemail']; ?>">
							      <?php }else{ ?>
							      	<input type="email" class="form-control" id="" placeholder="Reference Email" name="refemail">
							      <?php } ?>
							    </div>
							  </div>

							   <div class="form-group row">
							    <label for="inputText" class="col-sm-2 col-form-label">Last Date</label>
							    <div class="col-sm-10">
							    	<?php if (isset($_GET['lastdate'])) { ?>
							      <input type="date"  class="form-control" id="dateControl" placeholder="Last Date" name="lastdate" value="<?php echo $_GET['lastdate']; ?>">
							      <?php }else{ ?>
							      	<input type="date" class="form-control" id="dateControl" placeholder="Last Date" name="lastdate">
							      <?php } ?>
							    </div>
							  </div>


							  <div class="col text-center">
							  <button type="submit" name="postevent" class="btn-md mt-4" style="background-color: #1b274f">Submit</button>
							   <button type="button" name="btn" class="btn-md btn-light">Cancel</button>

						</div>
					</form>
				</div>




		</header>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script  src="jquery.tabledit.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

</body>
</html>
<script>
	$(document).ready(function(){
		var dtToday = new Date();

		var month = dtToday.getMonth()+1;
		var day = dtToday.getDate();
		var year = dtToday.getFullYear();
		
		if(month<10)
			month = '0' + month.toString();
		if(day <10)
			day = '0' + day.toString();
		var maxDate = year + '-' + month + '-' + day;

		$('#dateControl').attr('min', maxDate);
	})
</script>
<?php 
}else{
	header("Location:Admin-login.php");
	exit();
}
 ?>
