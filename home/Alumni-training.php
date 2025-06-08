<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>Our Lady of Fatima University</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/skin.css">
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
			        <a class="nav-link text-light text-right">Welcome <?php echo $_SESSION['fullname'];?></a>
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
              <a class="nav-link" href="Alumni-home.php">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="User-Event.php">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Alumni-jobs.php">Jobs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="Alumni-training.php">Training</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Alumni-gallery.php">Gallery</a>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  My Account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="Alumni-profile.php">Profile</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
              </li>

			    </ul>
			  </div>
			</nav>

<!--start -->
			
<div class="jobs mt-4 ml-4">
<h2>Training Portal</h2>
<?php if (isset($_GET['error'])) { ?>
           <p class="error" style="background:#F2DEDE; color: #A94442; padding: 10px;
           border-radius: 5px;"><?php echo $_GET['error']; ?></p>
                
                <?php } ?>

                <?php if (isset($_GET['success'])) { ?>
                    <p class="success" style="background:#D4EDDA; color: #A94442; padding: 10px;
            border-radius: 5px;"><?php echo $_GET['success']; ?></p>
                <?php } ?>
<?php 
$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "dbats";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

$today = date("Y-m-d");

$today_time = strtotime($today);

$query = "SELECT * FROM training";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);


if ($total!=0) {
	while ($result = mysqli_fetch_assoc($data)) {
		
	
		 $eventid = $result['id'];

	
		echo"
<div class='card mt-5'>
  <div class='card-header'>

 
   

   <h5>".$result['topic']."</h5>
  </div>
  <div class='card-body'>
    <p class='card-title'>".$result['course']."</p>
    <p class='card-text'>".$result['training']."</p>
    <table>
 <tr>
  <td style='color:white; font-size:0px;'>".$result['id']."</td>
   <td style='color:white; font-size:0px;'>".$result['topic']."</td>
    <td style='color:white; font-size:0px;'>".$result['description']."</td>
     <td style='color:white; font-size:0px;'>".$result['course']."</td>
   <td style='color:white; font-size:0px;'>".$result['training']."</td>
    <td style='color:white; font-size:0px;'>".$result['duration']."</td>
     <td style='color:white; font-size:0px;'>".$result['venue']."</td>
      <td style='color:white; font-size:0px;'>".$result['contact']."</td>
      <td style='color:white; font-size:0px;'>".$result['total_part']."</td>

   <td scope='col'><button type='button' class='btn btn-primary apply' style='background-color: #1b274f;'>Participate</button></td>
   </tr>
 </table>
   </div>
  </div>
 ";
}
}
?>

</div>



<!-- MODAL APPLY-->
			<div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Training details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<!-- starting php code -->
              
      <div class="modal-body">
          

        <form action="participate.php" method="POST" enctype="multipart/form-data">
         	<input type="hidden" name="eventid" id="eventid">
           <input type="hidden" name="prtcpt" id="prtcpt">
                  <label>Topic:</label>
                    <div class="form-group">
                      <input class="form-control" name="topic" id="topic" type="text" placeholder="" readonly="" value="">
                    </div>
                      <label>Description:</label>
                   <div class="form-group">
                      <input class="form-control" name="description" id="description" type="text" placeholder="" readonly="" value="">
                    </div>
                      <label>Course:</label>
                    <div class="form-group">
                      <input class="form-control" name="course" id="course" type="text" placeholder="" readonly="" value="">
                    </div>
                      <label>Date:</label>
                    <div class="form-group">
                      <input class="form-control" name="training" id="training" type="text" placeholder="" readonly="" value="">
                    </div>
                      <label>Duration:</label>
                    <div class="form-group">
                      <input class="form-control" name="duration" id="duration" type="text" placeholder="" readonly="" value="">
                    </div>
                      <label>Venue:</label>
                    <div class="form-group">
                      <input class="form-control" name="venue" id="venue" type="text" placeholder="" readonly="" value="">
                    </div>

                     
                   
                    <div class="form-group">
                        <input class="form-control button btn-primary" type="submit" name="participate" value="Participate" placeholder="Subject">
                    </div>
                </form>
            
      </div>
     
    </div>
  </div>
</div>


<!---->

<!--footer -->
<div>
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
</div>
			</header>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<script>
	$(document).ready(function()
	{
		$('.apply').on('click', function(){
			$('#applyModal').modal('show');

			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();
			console.log(data);

			$('#eventid').val(data[0]);
      $('#topic').val(data[1]);
       $('#description').val(data[2]);
        $('#course').val(data[3]);
         $('#training').val(data[4]);
          $('#duration').val(data[5]);
           $('#venue').val(data[6]);
            $('#contact').val(data[7]);
            $('#prtcpt').val(data[8]);


		});

	});
</script>

<?php 
}else{
	header("Location:login.php");
	exit();
}
 ?>