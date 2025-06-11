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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
</head>
<body>

	<header>
		<div class="container-fluid " style="background-color: #1b274f">
        <div class="row">       
          <div class="col">       
            <a class="nav-link text-light text-right">Welcome <?php echo $_SESSION['NAME']; ?></a>
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
			        <a class="nav-link active" href="Admin-verify.php">Verify</a>
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
	


   </div>
			
   		
			<div class="container mt-5" style="width:98.9%;">
				<div class="row">
					<div class="col ">
						
						<!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              	<h3 class="text-center font-weight-bold">Verify Section</h3>
                
            </div>

        
            <div class="card-body">
              <div class="table-responsive table-hover">
                
              	<table id="example" class="display table-bordered" id="dataTable" width="100%">
        <thead style="background:#1b274f; color: #fff;">
            <tr>
                <th>ID</th>
                <th>Fullname</th>
                <th>Profile</th>
                <th>Email</th> 
                <th>Status</th>
                <th>Access</th>
                <th>Verify/Deny</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
         <?php
           $table = mysqli_query($conn,'SELECT * FROM alumnireg ');

               if(mysqli_num_rows($table) > 0)
               { 
                            
                   while ($row = mysqli_fetch_assoc($table)) 
                				  {  
                                    
                                  ?>	


            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["fullname"];?></td>
                <td><img style="width: 100px;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["status"]; ?></td>
                <td><?php echo $row["access"]; ?></td>
                <td>
                	<button class="btn-light btn-outline-dark btn verifybtn font-weight-bold">Verify</button>
                    <button class="btn-dark btn font-weight-bold denybtn">Deny</button>
                </td>
                <td>
                	<button type="button" class="btn btn-secondary font-weight-bold deletebtn">Delete</button>
                </td>
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
		
		</div>


		

	<!--	<div class="container">
	<div class="box">
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

	</div>

</div> -->
<!--MODAL DELETE-->

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledy="exampleModallabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        </div>
<form action="Admin-verify.php" method="POST">
  <div class="modal-body">
    <input type="hidden" name="delete_user" id="delete_user">
    <p>Do you want to delete?</p>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary"data-dismiss="modal">Cancel</button>
    <button type="submit" name="deleteuser" id="deleteuser" class="btn btn-danger">Delete</button>
  </div>
</form>
</div>
</div>
</div>
<!--END OF MODAL DELETE-->

<!-- Verify Modal-->
  <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  " role="document">
      <div class="modal-content back">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Verify Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><h5 id="x">×</h5></span>
          </button>
        </div>
               

        <form method="POST" action="Admin-verify.php">

          <div class="modal-body">

            <input type="hidden" name="update_id" id="update_id">
            <input type="hidden" name="verifyY" id="verifyY" value="verified">   
            <p> Are you sure?</p>
                         
           
     

          </div>


        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          <button class="btn btn-success" type="submit" name="verifyData" style="background-color: #1b274f">Verify</button>
        </div>
       </form>

      </div>
    </div>
  </div>
    <!-- End Verify Modal-->

    <!-- Deny Modal-->
  <div class="modal fade" id="DenyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  " role="document">
      <div class="modal-content back">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deny Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><h5 id="x">×</h5></span>
          </button>
        </div>
               

        <form method="POST" action="Admin-verify.php">

          <div class="modal-body">

            <input type="hidden" name="deny_id" id="deny_id">
            <input type="hidden" name="denyY" id="denyY" value="denied">   
            <p> Are you sure?</p>
                         
           
     

          </div>


        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          <button class="btn btn-danger" type="submit" name="denyData">Deny</button>
        </div>
       </form>

      </div>
    </div>
  </div>
    <!-- Deny Modal-->
		
		
					 
	</header>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		
		<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
		
	<script>
		$(document).ready(function() {
    	$('#example').DataTable({ "order": [[ 0, 'desc' ]] });
		} );
	</script>

	<script>
       
        $('.verifybtn').on('click', function(){

          $('#EditModal').modal('show');


          $tr = $(this).closest('tr');

            var data = $tr.children("td").map( function(){
              return $(this).text();
            }).get();

            console.log(data);
            $('#update_id').val(data[0]);
            
        });
      
    </script>

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

      $('#delete_user').val(data[0]);
    });

  });
</script>

    <script>
       
        $('.denybtn').on('click', function(){

          $('#DenyModal').modal('show');


          $tr = $(this).closest('tr');

            var data = $tr.children("td").map( function(){
              return $(this).text();
            }).get();

            console.log(data);
            $('#deny_id').val(data[0]);
            
        });
      
     </script>



</body>
</html>