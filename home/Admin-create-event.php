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
			        <a class="nav-link" href="manage-course.php">Manage course</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="Admin-verify.php">Verify</a>
			      </li>
			        <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
			        <a class="nav-link" href="admin-jobposting.php">Job Posting</a>
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
							    <label for="" class="col-sm-2 col-form-label">Event Title</label>
							    <div class="col-sm-10">
							    	<?php if (isset($_GET['title'])) { ?>
							      <input type="text" class="form-control" id="inputTitle" placeholder="Event Name" name="title" value="<?php echo $_GET['title']; ?>">
							      <?php }else{ ?>
							      	<input type="text" class="form-control" id="inputTitle" placeholder="Event Name" name="title">
							      	<?php } ?>
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputEmail" class="col-sm-2 col-form-label">Location</label>
							    <div class="col-sm-10">
							    	<?php if (isset($_GET['location'])) { ?>
							      <input type="text" class="form-control" id="inputLocation" placeholder="Event Location" name="location" value="<?php echo $_GET['location']; ?>">
							  <?php }else{ ?>
							  	<input type="text" class="form-control" id="inputLocation" placeholder="Event Location" name="location">
							  <?php } ?>
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputDate" class="col-sm-2 col-form-label">Event Date</label>
							    <div class="col-sm-10">
							    	<?php if (isset($_GET['date'])) { ?>
							      <input type="date"  class="form-control" id="dateControl" placeholder="dd-mm-yyyy" name="date" value="<?php echo $_GET['date']; ?>">
							      <?php }else{ ?>
							      	<input type="Date" class="form-control" id="dateControl" placeholder="dd-mm-yyyy" name="date">
							      <?php } ?>
							    </div>
							  </div>

					   		
							  <div class="form-group row">
							    <label for="inputDesc" class="col-sm-2 col-form-label">Description</label>
							    <div class="col-sm-10">
							   <?php if (isset($_GET['description'])) { ?>
							    <textarea class="form-control" aria-label="With textarea" id="inputTime" placeholder="Description" name="description" value="<?php echo $_GET['description']; ?>"></textarea>
							 <?php }else{ ?>
							 	<textarea class="form-control" aria-label="With textarea" id="inputTime" placeholder="Description" name="description"></textarea>
							 	<?php } ?>
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="inputStatus" class="col-sm-2 col-form-label">Status</label>
							    <div class="col-sm-10">

							       <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="status">
						        
						        <option value="Active">Active</option>
						        <option value="Inactive">Inactive</option>
						      </select>
							    </div>
							  </div>

							  <div class="form-group row">
							    <label for="exampleFormControlFile1" class="col-sm-2 col-form-label">Image</label>
							    <div class="col-sm-10">
							      <input type="file" class="form-control" name="image" id="exampleFormControlFile1">
							  </div>
							 
							  <div class="col text-center">
							  <button type="submit" name="addEvent" class="btn-md mt-4" style="background-color: #1b274f">Submit</button>
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
