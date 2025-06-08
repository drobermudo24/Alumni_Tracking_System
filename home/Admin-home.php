<?php 
session_start();
if (isset($_SESSION['ID']) && isset($_SESSION['NAME'])) {

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>Our Lady of Fatima University</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/skin.css">
	<link rel="apple-touch-icon" href="https://upload.wikimedia.org/wikipedia/en/7/77/OLFU_official_logo.png">
  <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/en/7/77/OLFU_official_logo.png">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

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
			        <a class="nav-link active" href="Admin-home.php">Home </a>
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
            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Event
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item active font-weight-bold" href="Admin-create-event.php">Create Event</a>
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
   			<div class="row mt-5">
   				<div class="col">
   					<h3 class="text-center">Dashboard</h3>
   				</div>
   			</div>
   			<div class="row mt-5">

   				<div class="col">
   					<div class="card border-success mb-3" style="max-width: 18rem;">
  						<div class="card-header">Total User</div>
  						<div class="card-body text-success">
  							<div class="row">
    							<div class="col-xl-2">
    								<i class="far fa-users fa-4x card-text"></i>
    							</div>
    							<div class="col">
					    				<?php //connection | TABLE IN NEW ADMIN
										$sname = "localhost";
										$uname = "root";
										$password = "";
										$db_name = "dbats";
										$conn = mysqli_connect($sname, $uname, $password, $db_name);
										$sql = "SELECT * FROM alumnireg WHERE access = 'alumni' AND status = 'verified' ";
										$sql2 = "SELECT * FROM alumnireg WHERE access = 'staff' AND status = 'verified'";

										$connStatus = $conn->query($sql);
										$numberRows = mysqli_num_rows($connStatus);

										$connStatus2 = $conn->query($sql2);
										$numberRows2 = mysqli_num_rows($connStatus2);
										 ?>
    								<h5 class="card-text text-center"> Alumni: <?php echo $numberRows; ?>  </h5>
    								<?php $conn->close(); ?>
    								<h5 class="card-text text-center"> Staff:  <?php echo $numberRows2; ?> </h5>
    							</div>
    						</div>
    					</div>
					</div>
   				</div>

   				<div class="col">
   					<div class="card border-success mb-3" style="max-width: 18rem;">
   										<?php //connection |
										$sname = "localhost";
										$uname = "root";
										$password = "";
										$db_name = "dbats";
										$conn = mysqli_connect($sname, $uname, $password, $db_name);
										$sql = "SELECT * FROM alumnireg WHERE occupation != 'N/A' AND status = 'verified'";

										$connStatus = $conn->query($sql);
										$numberRows = mysqli_num_rows($connStatus);
										 ?>
  						<div class="card-header">Total Employed</div>
  						<div class="card-body text-success">
  							<div class="row">
    							<div class="col-sm-1">
    								<i class="fas fa-laptop-code fa-4x card-text"></i>
    							</div>
    							<div class="col mt-3">
    								<h4 class="card-text text-center"><?php echo $numberRows; ?></h4>
    							</div>
    						</div>
    					</div>
					</div>
   				</div>	
   				<div class="col">
   					<div class="card border-success mb-3" style="max-width: 18rem;">
   										<?php 
										$sname = "localhost";
										$uname = "root";
										$password = "";
										$db_name = "dbats";
										$conn = mysqli_connect($sname, $uname, $password, $db_name);
										$sql = "SELECT * FROM alumnireg WHERE occupation = 'N/A' AND status = 'verified'";

										$connStatus = $conn->query($sql);
										$numberRows = mysqli_num_rows($connStatus);
										 ?>
  						<div class="card-header">Total Unemployed</div>
  						<div class="card-body text-success">
  							<div class="row">
    							<div class="col-xl-1">
    								<i class="far fa-home fa-4x card-text"></i>
    							</div>
    							<div class="col mt-3">
    								<h4 class="card-text text-center"><?php echo $numberRows; ?></h4>
    							</div>
    						</div>
    					</div>
					</div>
				</div>
   				<div class="col">
   					<div class="card border-success mb-3" style="max-width: 18rem;">
   										<?php 
										$sname = "localhost";
										$uname = "root";
										$password = "";
										$db_name = "dbats";
										$conn = mysqli_connect($sname, $uname, $password, $db_name);
										$sql = "SELECT * FROM event";

										$connStatus = $conn->query($sql);
										$numberRows = mysqli_num_rows($connStatus);
										 ?>
  						<div class="card-header">Total Events</div>
  						<div class="card-body text-success">
  							<div class="row">
    							<div class="col-xl-1">
    								<i class="fal fa-calendar-star fa-4x card-text"></i>
    							</div>
    							<div class="col mt-3">
    								<h4 class="card-text text-center"><?php echo $numberRows; ?></h4>
    							</div>
    						</div>
    					</div>
					</div>
   				</div>
   				<div class="col">
   					<div class="card border-success mb-3" style="max-width: 18rem;">
   										<?php 
										$sname = "localhost";
										$uname = "root";
										$password = "";
										$db_name = "dbats";
										$conn = mysqli_connect($sname, $uname, $password, $db_name);
										$sql = "SELECT * FROM job";

										$connStatus = $conn->query($sql);
										$numberRows = mysqli_num_rows($connStatus);
										 ?>
  						<div class="card-header">Total Jobs Posted</div>
  						<div class="card-body text-success">
  							<div class="row">
    							<div class="col-xl-1">
    								<i class="fad fa-user-tie fa-4x card-text"></i>
    							</div>
    							<div class="col mt-3">
    								<h4 class="card-text text-center"><?php echo $numberRows; ?></h4>
    							</div>
    						</div>
    					</div>
					</div>
   				</div>
   			</div>
   		</div>


   		<div class="container-fluid mt-5">
			<div class="row">
				<div class="col">
						
						<!-- DataTales Example -->
          			<div class="card shadow mb-4">
            			<div class="card-header py-3">
              				<h3 class="text-center font-weight-bold">Unemployed User Table</h3>
	                	</div>

        
            			<div class="card-body">
              				<div class="table-responsive table-hover">
                
              					<table id="example" class="display table-bordered" id="dataTable" width="100%">
                  					<thead style="background:#1b274f; color: #fff;">
                    					<tr>
                      						<th>ID</th>
                      						<th>Fullname</th>
                      						<th>Account Type</th>
                      						<th>Gender</th>
                      						<th>Occupation</th>
                      						<th>Employment Status</th>
                      					</tr>
                  					</thead>
                  					<tbody>
                  						
                  						<?php
								           $table = mysqli_query($conn,'SELECT * FROM alumnireg WHERE occupation = "N/A" AND status = "verified" ');

								               if(mysqli_num_rows($table) > 0)
								               { 
								                            
								                   while ($row = mysqli_fetch_assoc($table)) 
								                				  {  
								                                 $oc = $row["occupation"];
								                                 $row["occupation"] = "Unemployed";
								                                  ?>	
                      					<tr>
                      						<td><?php echo $row["id"]; ?></td>
                      						<td><?php echo $row["fullname"];?></td>
                      						<td><?php echo $row["access"]; ?></td>
                      						<td><?php echo $row["gender"]; ?></td>
                      						<td><?php echo $oc; ?></td>
                      						<td><?php echo $row["occupation"]; ?></td>
                      					</tr>
                      					
                      					<?php
		                                   	}
		                                
		                                  }


		                                ?>  
                					</tbody>
                				</table>
              				</div>
           	 			</div>
          			</div>
        		</div>
			</div>
		</div>

		<div class="container-fluid mt-5">
			<div class="row">
				<div class="col">
						
						<!-- DataTales Example -->
          			<div class="card shadow mb-4">
            			<div class="card-header py-3">
              				<h3 class="text-center font-weight-bold">Employed User Table</h3>
	                	</div>

        
            			<div class="card-body">
              				<div class="table-responsive table-hover">
                
              					<table id="example" class="display table-bordered" id="dataTable" width="100%">
                  					<thead style="background:#1b274f; color: #fff;">
                    					<tr>
                      						<th>ID</th>
                      						<th>Fullname</th>
                      						<th>Account Type</th>
                      						<th>Gender</th>
                      						<th>Occupation</th>
                      						<th>Employment Status</th>
                      					</tr>
                  					</thead>
                  					<tbody>
                  						
                  						<?php
								           $table = mysqli_query($conn,'SELECT * FROM alumnireg WHERE occupation != "N/A" AND status = "verified" ');

								               if(mysqli_num_rows($table) > 0)
								               { 
								                            
								                   while ($row = mysqli_fetch_assoc($table)) 
								                				  {  
								                                 $oc = $row["occupation"];
								                                 $row["occupation"] = "Employed";
								                                  ?>	
                      					<tr>
                      						<td><?php echo $row["id"]; ?></td>
                      						<td><?php echo $row["fullname"];?></td>
                      						<td><?php echo $row["access"]; ?></td>
                      						<td><?php echo $row["gender"]; ?></td>
                      						<td><?php echo $oc; ?></td>
                      						<td><?php echo $row["occupation"]; ?></td>
                      					</tr>
                      					
                      					<?php
		                                   	}
		                                
		                                  }


		                                ?>  
                					</tbody>
                				</table>
              				</div>
           	 			</div>
          			</div>
        		</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		
		<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>


		<script>
			$(document).ready(function() {
    		$('#example').DataTable({ "order": [[ 0, 'desc' ]] });
			} );
		</script>

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