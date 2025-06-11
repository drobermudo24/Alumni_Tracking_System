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
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
              <a class="nav-link active" href="User-Event.php">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Alumni-jobs.php">Jobs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Alumni-training.php">Training</a>
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



<div class='container mt-5' style='margin: 0;'>
	<h2>Upcoming Event</h2>
   <?php 
$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "dbats";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

$today = date("Y-m-d");

$today_time = strtotime($today);

$query = "SELECT * FROM event WHERE DATE >= '$today'";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);


if ($total!=0) {
	while ($result = mysqli_fetch_assoc($data)) {
		
	

 echo" 
  	
      	<div class='card mt-4'style='width: 82rem; height: 210px ;'>
      		<div class='row'>
      			<div class='col-md-4'>
      				<img src='".$result['IMAGE']."' class='img-fluid' style='height: 210px ; width:100%;'>
      			</div>
      			<div class='col-md-8' style='background-color:;'>
      			
      				<h3 class='card-title mt-3'>".$result['TITLE']."</h3>
      				
      				<p>".$result['DATE']."</p>
      				<p>".$result['LOCATION']."</p>
      				<p>".$result['DESCRIPTION']."</p>
      				
      			</div>
      		</div>
      	</div>

      ";
      }
}
else{
        echo"<p>No upcoming event</p> ";
      }
      ?>
			
</div>
<hr>

<div class='container mt-5' style='margin: 0;'>
	<h2>Recent Events</h2>
   <?php 
$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "dbats";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

$today = date("Y-m-d");

$today_time = strtotime($today);

$query = "SELECT * FROM event WHERE DATE < '$today'";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);


if ($total!=0) {
	while ($result = mysqli_fetch_assoc($data)) {
		

echo" 
  	
      	<div class='card mt-4'style='width: 82rem; height: 210px ;'>
      		<div class='row'>
      			<div class='col-md-4'>
      				<img src='".$result['IMAGE']."' class='img-fluid' style='height: 210px ; width:100%;'>
      			</div>
      			<div class='col-md-8' style='background-color:;'>
      			
      				<h3 class='card-title mt-3'>".$result['TITLE']."</h3>
      				
      				<p>".$result['DATE']."</p>
      				<p>".$result['LOCATION']."</p>
      				<p>".$result['DESCRIPTION']."</p>
      				
      			</div>
      		</div>
      	</div>

      ";
      }
}
      ?>
			
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script  src="jquery.tabledit.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php 
}else{
	header("Location:login.php");
	exit();
}
 ?>
