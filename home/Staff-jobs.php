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
              <a class="nav-link" href="Staff-home.php">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Staff-Event.php">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="Staff-jobs.php">Jobs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Staff-gallery.php">Gallery</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
			    </ul>
			  </div>
			</nav>
<!--start -->
			
<div class="jobs mt-4 ml-4">
	<!-- starting php code -->
<?php

                    //first we leave this input field blank
                    $recipient = "";
                  
                    //if user click the send button
                    if(isset($_POST['send'])){
                        //access user entered data
                       $recipient = $_POST['email'];
                       $subject = $_POST['subject'];
                       $message = $_POST['message'];
                       $file_name = $_FILES["file"]["name"];
                       move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);
                    //   addAttachment($file_name);
                       $sender = "From: alejbermudo190@gmail.com";
                       //if user leave empty field among one of them
                       if(empty($recipient) || empty($subject) || empty($message) || empty($file_name)){
                           ?>
                           <!-- display an alert message if one of them field is empty -->
                           <div class="alert alert-danger text-center">
                                <?php echo "All inputs are required!" ?>
                            </div>
                           <?php
                        }else{
                            // PHP function to send mail
                           if(mail($recipient, $subject, $message, $sender, $file_name)){
                            ?>
                            <!-- display a success message if once mail sent sucessfully -->
                            <div class="alert alert-success text-center">
                                <?php echo "Your application is sent to $recipient"?>                               
                            </div>
                           
                           <?php
                           $recipient = "";
                           }else{
                            ?>
                            <!-- display an alert message if somehow mail can't be sent -->
                            <div class="alert alert-danger text-center">
                                <?php echo "Failed while sending your mail!" ?>
                            </div>
                             
                           <?php
                           }
                       }
                    }
                ?>


                 <!-- end of php code -->
<h2>Jobs Portal</h2>

<?php 
$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "dbats";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

$today = date("Y-m-d");

$today_time = strtotime($today);

$query = "SELECT * FROM job";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);


if ($total!=0) {
	while ($result = mysqli_fetch_assoc($data)) {
		
	
		 $jobid = $result['id'];

	
		echo"
<div class='card mt-5'>
  <div class='card-header'>

 
   

   <h5>".$result['title']."</h5>
  </div>
  <div class='card-body'>
    <p class='card-title'>Vacancy:  ".$result['vacancy']."</p>
    <p class='card-text'>".$result['description']."</p>
    <table>
 <tr>
  <td style='color:white; font-size:0px;'>".$result['id']."</td>
   <td style='color:white; font-size:0px; line-height:10px;'>".$result['reference']."</td>

   <td scope='col'><button type='button' class='btn btn-primary apply' style='background-color: #1b274f;'>Apply for this job</button></td>
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
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<!-- starting php code -->
              
      <div class="modal-body">

      	
         <form action="Staff-jobs.php" method="POST" enctype="multipart/form-data">
         	<input type="hidden" name="jid" id="jid">

                    <div class="form-group">
                        <input class="form-control" name="email" id="email" type="email" placeholder="Recipients" value="<?php echo $recipient ?>" readonly="">
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="subject" type="text" placeholder="Subject" readonly="" value="Job Application">
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="5" class="form-control textarea" name="message" placeholder="Compose your message.." readonly="">Application from: <?php echo $_SESSION['email'];?> </textarea>
                    </div>
                     <div class="form-group">
                     	<label>Upload your resume</label>
                        <input type="file" class="form-control" name="file" placeholder="file">
                    </div>
                    <div class="form-group">
                        <input class="form-control button btn-primary" type="submit" name="send" value="Send" placeholder="Subject">
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script  src="jquery.tabledit.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
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

			$('#jid').val(data[0]);
			$('#email').val(data[1]);
		});

	});
</script>

<?php 
}else{
	header("Location:login.php");
	exit();
}
 ?>

