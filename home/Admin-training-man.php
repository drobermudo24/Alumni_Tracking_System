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
		

						<?php //connection | TABLE IN NEW ADMIN
					$sname = "localhost";
					$uname = "root";
					$password = "";

					$db_name = "dbats";

					$conn = mysqli_connect($sname, $uname, $password, $db_name);
					$sql = "SELECT * FROM training";

					$result = mysqli_query($conn, $sql);
					?>
				<div class="col-sm" style="top: 10vh;">
					<?php if (isset($_GET['error'])) { ?>
     					<p class="error" style="background:#F2DEDE; color: #A94442; padding: 10px;
					 	border-radius: 5px;"><?php echo $_GET['error']; ?></p>
     					<?php } ?>

          				<?php if (isset($_GET['success'])) { ?>
               			<p class="success" style="background:#D4EDDA; color: #A94442; padding: 10px;
					 	border-radius: 5px;"><?php echo $_GET['success']; ?></p>
          			<?php } ?>
					<div class="table-responsive" style="height: 500px; overflow: auto;">
						<table id="table" class="table table-bordered table-striped">
						 <thead class="thead" style="background:#1b274f; color: #fff;">
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Topic</th>
						      <th scope="col">Description</th>
						      <th scope="col">Course</th>
						      <th scope="col">Training Date</th>
						      <th scope="col">Duration</th>
						      <th scope="col">Venue</th>
						      <th scope="col">Interested</th>
						      <th scope="col">Edit</th>
						      <th scope="col">Delete</th>
						     
						    </tr>
						    <?php while($row = mysqli_fetch_array($result)){?>
						  </thead>
						  <tbody>
						    <tr>

						      <td scope=><?php echo $row['id'];?></td>
						      <td><?php echo $row['topic'];?></td>
						       <td><?php echo $row['description'];?></td>
						        <td><?php echo $row['course'];?></td>
						         <td><?php echo $row['training'];?></td>	
						          <td><?php echo $row['duration'];?></td>	
						          <td><?php echo $row['venue'];?></td>
						           <td><?php echo $row['total_part'];?></td>
						         <td><button type="button" name="EDIT" class="btn btn-success editTraininig" ><i class="fa fa-edit">Edit</i></button></td>	
						         <td><button type="button" class="btn btn-danger deleteTraining" ><i class="fa fa-trash">Delete</i></button></td>					          
						    </tr>
						   <?php } ?>
						  </tbody>
						</table>


  
					</div>
				</div>
	

	
		<!-- MODAL FOR EDIT -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledy="exampleModallabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				</div>

				<form action="code.php" method="POST">
					<input type="hidden" name="train_id" id="train_id">
				<div class="modal-body">
					<div class="form-group">
						<label>Topic</label>
						<input type="text" name="topic" id="topic" class="form-control" placeholder="Enter Topic">
					</div>
					<div class="form-group">
						<label>Description</label>
						<input type="text" name="desc" id="desc" class="form-control" placeholder="Enter Description">
					</div>
					<div class="form-group">
						<label>Course</label>
						<input type="text" name="courses" id="course" class="form-control" placeholder="Enter Course">
					</div>
					<div class="form-group">
						<label>Training Date</label>
						<input type="text" name="training" id="training" class="form-control" placeholder="Enter Training Date">
					</div>

					<div class="form-group">
						<label>Duration</label>
						<input type="text" name="duration" id="duration" class="form-control" placeholder="Enter Duration">
					</div>
					<div class="form-group">
						<label>Venue</label>
						<input type="text" name="venue" id="venue" class="form-control" placeholder="Enter Venue">
					</div>
					

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary"data-dismiss="modal">Cancel</button>
					<button type="submit" name="updateTraining" class="btn btn-primary" style="background-color: #1b274f">Update</button>
				</div>
</form>
</div>
</div>
</div>

<!-- MODAL FOR DELETE -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledy="exampleModallabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				</div>
<form action="code.php" method="POST">
	<div class="modal-body">
		<input type="hidden" name="delete_training" id="delete_training">
		<p>Do you want to delete?</p>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary"data-dismiss="modal">Cancel</button>
		<button type="submit" name="deleteTraining" id="deleteTraining" class="btn btn-danger">Delete</button>
	</div>
</form>
</div>
</div>
</div>
<!--END OF MODAL DELETE-->



		
					 
	</header>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



		<script>
	$(document).ready(function()
	{
		$('.editTraininig').on('click', function(){
			$('#editmodal').modal('show');

			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();
			console.log(data);

			$('#train_id').val(data[0]);
			$('#topic').val(data[1]);
			$('#desc').val(data[2]);
			$('#course').val(data[3]);
			$('#training').val(data[4]);
			$('#duration').val(data[5]);
			$('#venue').val(data[6]);
			
			
			
		});

	});
</script>

<script>
	$(document).ready(function()
	{
		$('.deleteTraining').on('click', function(){
			$('#deletemodal').modal('show');

			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();
			console.log(data);

			$('#delete_training').val(data[0]);
		});

	});
</script>

</body>
</html>

<?php 
}else{
	header("Location:Admin-login.php");
	exit();
}
 ?>
