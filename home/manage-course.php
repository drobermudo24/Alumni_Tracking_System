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
			        <a class="nav-link active" href="#">Manage course</a>
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
		

		<!--END OF MODAL DELETE-->

			<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledy="exampleModallabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
							</div>
			<form action="code.php" method="POST">
				<div class="modal-body">
					<input type="hidden" name="delete_id" id="delete_id">
					<p>Do you want to delete?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary"data-dismiss="modal">Cancel</button>
					<button type="submit" name="deletecourse" id="deletecourse" class="btn btn-danger">Delete</button>
				</div>
			</form>
			</div>
			</div>
			</div>
			<!--END OF MODAL DELETE-->
			<!-- MODAL FOR EDIT -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledy="exampleModallabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				</div>

				<form action="code.php" method="POST">
					<input type="hidden" name="courseid" id="courseid">
				<div class="modal-body">
					<div class="form-group">
						<label>Course name</label>
						<input type="text" name="mcourse" id="mcourse" class="form-control" placeholder="Enter Course name">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary"data-dismiss="modal">Cancel</button>
					<button type="submit" name="updatecourse" class="btn btn-primary" style="background-color: #1b274f">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--END OF MODAL EDIT-->
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm" style="top: 10vh; margin-bottom: 20px;">

					  <form class="form-container" action="code.php" method="post">
          				<?php if (isset($_GET['error'])) { ?>
     					<p class="error" style="background:#F2DEDE; color: #A94442; padding: 10px;
					 	border-radius: 5px;"><?php echo $_GET['error']; ?></p>
     					<?php } ?>

          				<?php if (isset($_GET['success'])) { ?>
               			<p class="success" style="background:#D4EDDA; color: #A94442; padding: 10px;
					 	border-radius: 5px;"><?php echo $_GET['success']; ?></p>
          				<?php } ?>
          				 <input type="hidden" name="id" id="id" value="">
					 	<div class="form-group row">				 		
							    <label for="inputEmail" class="col-sm-2 col-form-label">Course</label>
							    <div class="col-sm-10"> 
							      <input type="text" class="form-control" id="inputName" placeholder="Enter Course name" name="course">
							    </div>
							  </div>
							  
						
						  <div class="col text-center">
						  <button type="submit" name="btnADD" class="btn-md" style="background-color: #1b274f">Add</button>
						
						</div>

					</form>
				</div>
				
          
					<?php //connection | TABLE IN NEW ADMIN
					$sname = "localhost";
					$uname = "root";
					$password = "";

					$db_name = "dbats";

					$conn = mysqli_connect($sname, $uname, $password, $db_name);
					$sql = "SELECT * FROM course";

					$result = mysqli_query($conn, $sql);
					?>
				<div class="col-sm" style="top: 10vh;">
					<div class="table-responsive" style="height: 310px; overflow: auto;">
						<table id="table" class="table table-bordered table-striped">
						 <thead class="thead" style="background:#1b274f; color: #fff;">
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Program name</th>
						      <th scope="col">Edit</th>
						      <th scope="col">Delete</th>
						     
						    </tr>
						    <?php while($row = mysqli_fetch_array($result)){?>
						  </thead>
						  <tbody>
						    <tr>

						      <td scope=><?php echo $row['ID'];?></td>
						      <td><?php echo $row['COURSE'];?></td>
						       	
						         <td><button type="button" name="EDIT" class="btn btn-success editbtn" ><i class="fa fa-edit"></i></button></td>	
						         <td><button type="button" class="btn btn-danger deletebtn" ><i class="fa fa-trash"></i></button></td>					          
						    </tr>
						   <?php } ?>
						  </tbody>
						</table>


  
					</table>
					</div>
				</div>

			</div>
		</div>
		
		

		</header>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script  src="jquery.tabledit.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function()
	{
		$('.deletebtn').on('click', function(){
			$('#deletemodal').modal('show');

			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();
			console.log(data);

			$('#delete_id').val(data[0]);
		});

	});
</script>
<script>
	$(document).ready(function()
	{
		$('.editbtn').on('click', function(){
			$('#editmodal').modal('show');

			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();
			console.log(data);

			$('#courseid').val(data[0]);
			$('#mcourse').val(data[1]);
			
		
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
