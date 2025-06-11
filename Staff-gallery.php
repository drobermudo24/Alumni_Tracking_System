<?php


include 'include/connection.php'; 

session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
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
              <a class="nav-link" href="Staff-jobs.php">Jobs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="Staff-gallery.php">Gallery</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
    
        <div class="container mt-4">
            <div class="row">
              <div class="col text-left">
                <form action="searchart.php" method="POST">

                    <div class="row">
                      <div class="col">

                        <h2 class="text-center">EVENT GALLERY</h2>

                      </div>
                      
                    </div>
                </form>
              </div>
            </div>
        </div>

  

        <?php
           $result_category1 = mysqli_query($conn,'SELECT * FROM event ORDER BY ID DESC ');

               if(mysqli_num_rows($result_category1) <=0)
        {
            echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h1 align="Center">No Artworks Available </h1>';
        }
        else{
            while($row1 = mysqli_fetch_array($result_category1))
              {
              ?>
              <div class="container-fluid text-center pl-4 p-0 mt-5">
                <div class="pl-5"> 

              <?php
                  echo ' <div class="">
                          <table  class="pic-table">
                                <tr>
                                    <td>

                                       

                                          <img class="photo" src="'.$row1['IMAGE'].'" > <br>'. 

                                          '
                                        <div class="container p-0">  
                                          <div class="row">
                                            <div class="col"
                                              <h2>'.$row1['TITLE'].'</h2>
                                            </div>
                                          </div>
                                        </div>  
                                        
                                         

                                         

                                         
                                    </td>
                                </tr>
                            </table>
                        </div>';
              ?>
                </div>
              </div> 

              <?php

              }
            }
        echo "<br><br>";
                  
                                    
        ?>

        <style type="text/css">
          
          .photo {
            position: relative;
            width: 370px;
           height : 250px;
        }

    .desc-title{
        color:#2d70d5;
        font-variant: small-caps;
        font-family: "Yu Gothic UI Light";
        font-size: 20px;
        position: relative;
        top: 0px;
        left: 3px;
        text-decoration: none;
    }
    
     .pic-table{
            border: 8px solid white;
            box-shadow: 0px 6px 20px 0px rgba(0, 0, 0, 0.2);
            background-color: #fafafa;
            border-collapse: collapse;
            float: left;
            overflow: auto;
            margin: 0px 25px 25px 0px;
        }
        


        </style>
  


	</header>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

<?php 
}else{
  header("Location:login.php");
  exit();
}
 ?>