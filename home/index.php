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
		<div class="container-fluid" style="background-color: #1b274f">
    		<div class="row"> 			
    			<div class="col">				
    				<a class="nav-link text-light text-right" href="Admin-login.php">Admin login</a>
    			</div>  			
    		</div>
    	</div>
			<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
			  <a class="navbar-brand" href="#">
			  	<img src="https://upload.wikimedia.org/wikipedia/en/7/77/OLFU_official_logo.png" width="35" height="35" class="d-inline-block align-top" alt="">Our Lady Of Fatima University</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNav">
			    <ul class="navbar-nav ml-auto">
			      <li class="nav-item">
			        <a class="nav-link active" href="index.php">Home </a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#About">About</a>
			      </li>
			      
			      <li class="nav-item">
			        <a class="nav-link" href="gallery.php">Gallery</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="Alumni-register.php">New Alumni</a>
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

		<div class="home" style="background-color: blue;">			
			<div class="overlay"> </div>
			<div class="content">
			
			<br>
			<h1>Alumni <br>Tracking Website</h1>			
			<button type="button">Explore</button>
			</div>
      </div>

<!--ABOUT US SECTION-->
<style type="text/css">

.about{
	
    background-color: #f1f1f1;

    background: url(img/bg.jpg) no-repeat left;
    background-size: 55%;
    background-color: #fdfdfd;
    overflow: hidden;
    padding: 100px 0;
}
.inner-section{
    width: 55%;
    float: right;
    background-color: #fdfdfd;
    padding: 100px;
    box-shadow: 10px 10px 8px rgba(0,0,0,0.3);
    height: 70vh;
}
.inner-section h1{
    margin-top: 0;
    font-size: 30px;
    font-weight: 900;
    
}
.text{
    font-size: 13px;
    color: #545454;
    line-height: 30px;
    text-align: justify;
    
}
.skills button{
    font-size: 22px;
    text-align: center;
    letter-spacing: 2px;
    border: none;
    border-radius: 20px;
    padding: 8px;
    width: 200px;
    background-color: #1b274f;
    color: white;
    cursor: pointer;
}
.skills button:hover{
    transition: 1s;
    background-color: #ecf5f5;
    color: #1b274f;
}
@media screen and (max-width:1200px){
    .inner-section{
        padding: 80px;
    }
}
@media screen and (max-width:1000px){
    .about{
        background-size: 100%;
        padding: 100px 40px;
    }
    .inner-section{
        width: 100%;
    }
}

@media screen and (max-width:600px){
    .about{
        padding: 0;
    }
    .inner-section{
        padding: 60px;
    }
    .skills button{
        font-size: 19px;
        padding: 5px;
        width: 160px;
    }
}
</style>
<div class="about" id="About">
        <div class="inner-section">
            <h1 class="">About Us</h1>
            <p class="text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Doloribus velit ducimus, enim inventore earum, eligendi 
                nostrum pariatur necessitatibus eius dicta a voluptates sit 
                deleniti autem error eos totam
                 nisi neque voluptates sit deleniti autem error eos totam nisi neque.
            </p>
            <div class="skills">
                <button>Contact Us</button>
            </div>
        </div>
    </div>
<!--END OF ABOUT US SECTION-->

<!-- EVENT SECTION-->
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
 <!--END OF EVENT SECTION -->
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
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>