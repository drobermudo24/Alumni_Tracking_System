<?php

include 'include/connection.php'; 


# ==== Alumni Register -SCJ

if (isset($_POST['AlReg'])) {
 	

 	$fullname = $_POST['FnameReg'];
 	$image = $_FILES['image']['tmp_name']; 
    $imgContent = addslashes(file_get_contents($image));
 	$pass = $_POST['passReg'];
 	$conpass = $_POST['CpassReg'];
 	$gender = $_POST['genderReg'];
 	$birth = $_POST['birthReg'];
 	$email = $_POST['emailReg'];
 	$contact = $_POST['CnumReg'];
 	$passout = $_POST['PoutReg'];
 	$course = $_POST['courseReg'];
 	$occupation = $_POST['occuReg'];
 	$address = $_POST['addReg'];

$user_data = 'FnameReg='. $fullname.'&passReg='. $pass. '&CpassReg='. $conpass. '&genderReg='. $gender. '&birthReg='. $birth. '&emailReg='. $email. '&CnumReg='. $contact. '&PoutReg='. $passout. '&courseReg='. $course. '&occuReg='. $occupation. '&addReg='. $address. '&image='. $image;

if(preg_match('/\s/', $pass) || preg_match('/\s/', $email) ||  preg_match('/\s/', $contact)){
	header("location:Alumni-register.php?error=Whitespaces are not allowed!&$user_data");
		exit();	
}
elseif (strlen($pass) <= '8') {
	header("location:Alumni-register.php?error=Password must contain atleast 8 characters!&$user_data");
		exit();
}
elseif (!preg_match("#[0-9]+#", $contact)) {
	header("location:Alumni-register.php?error=Invalid contact number!&$user_data");
		exit();
}

elseif($pass == $conpass){

$check="SELECT EMAIL FROM alumnireg WHERE Email='".$email."' ";
$checkdb = $conn->query($check);

if ($checkdb->num_rows >0) {
	
 	echo '<script> alert("Email already exists"); </script>';
 }
 else{



 $sql = "INSERT INTO alumnireg(fullname,image,uploaded,pass,gender,birth,email,contact,passout,course,occupation,address,status,access)VALUES ('$fullname','$imgContent', NOW(),'$pass','$gender','$birth','$email','$contact','$passout','$course','$occupation','$address','pending','alumni')";



 $run_sql = mysqli_query($conn, $sql);


 if($run_sql == 1) {

 		

 		echo '<script> alert("Successfully added temporary account!"); </script>';
		header("Location:Alumni-register.php?success=Please wait for the admin to verify your account");
 }
 
 else{
 	echo "Error!";
 }
}

}
 //first we leave this input field blank
                    $recipient = "";
                  
                    //if user click the send button
                    
                        //access user entered data
                       $recipient = $_POST['emailReg'];
                       $subject = 'Confirmation Message';
                       $message = 'Thank you for registering to our Alumni Tracking System. Please wait for the admin to verify your account.';
                      
                      
                      // $a = 'Koala.jpg';
                   
                       $sender = "From: alejbermudo190@gmail.com";
                       //if user leave empty field among one of them
                       if(empty($recipient)){
                           ?>
                           <!-- display an alert message if one of them field is empty -->
                           <div class="alert alert-danger text-center">
                                <?php echo "All inputs are required!" ?>
                            </div>
                           <?php
                        }else{
                            // PHP function to send mail
                           if(mail($recipient, $subject, $message, $sender)){
                            ?>
                            <!-- display a success message if once mail sent sucessfully -->
                           
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

#Staff-register.php
if (isset($_POST['staffReg'])) {
	$fullname = $_POST['fullnameStaffReg'];
	$quali = $_POST['qualStaffReg'];
	$birth = $_POST['birthStaffReg'];
	$desig = $_POST['desigStaffReg'];
	$address = $_POST['addStaffReg'];
	$contact = $_POST['contactStaffReg'];
	$image = $_FILES['image']['tmp_name']; 
    $imgContent = addslashes(file_get_contents($image));
	$email = $_POST['emailStaffReg'];
	$pass = $_POST['passStaffReg'];
	$conpass = $_POST['conPassStaffReg'];



if($pass == $conpass){

$check="SELECT EMAIL FROM alumnireg WHERE Email='".$email."' ";
$checkdb = $conn->query($check);
if ($checkdb->num_rows >0) {
	
 	echo '<script> alert("Email already exists"); </script>';
 }
 else{


 	$sql = "INSERT INTO alumnireg(fullname,qualification,birth,designation,address,contact,image,uploaded,email,pass,status,access) VALUES ('$fullname','$quali','$birth','$desig','$address','$contact','$imgContent',NOW(),'$email','$pass','pending','staff')";
 	$run_sql = mysqli_query($conn, $sql);


 if($run_sql == 1) {

 		

 		echo '<script> alert("Successfully added temporary account!"); </script>';
		header("Location:Staff-register.php?success=Please wait for the admin to verify your account");
 }
 
 else{
 	echo "Error!";
 }
}

}else{
		echo '<script> alert("The Password does not match!"); </script>'; 
	}
	
//first we leave this input field blank
                    $recipient = "";
                  
                    //if user click the send button
                    
                        //access user entered data
                       $recipient = $_POST['emailStaffReg'];
                       $subject = 'Confirmation Message';
                       $message = 'Thank you for registering to our Alumni Tracking System. Please wait for the admin to verify your account.';
                      
                      
                      // $a = 'Koala.jpg';
                   
                       $sender = "From: alejbermudo190@gmail.com";
                       //if user leave empty field among one of them
                       if(empty($recipient)){
                           ?>
                           <!-- display an alert message if one of them field is empty -->
                           <div class="alert alert-danger text-center">
                                <?php echo "All inputs are required!" ?>
                            </div>
                           <?php
                        }else{
                            // PHP function to send mail
                           if(mail($recipient, $subject, $message, $sender)){
                            ?>
                            <!-- display a success message if once mail sent sucessfully -->
                           
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




#verify.php
if (isset($_POST['verifyData'])) {
	include 'include/connection.php'; 
	
	$id = $_POST['update_id'];
	$verify = $_POST['verifyY'];
	


	
	$running = mysqli_query($conn,'UPDATE alumnireg SET status="'.$verify.'" WHERE ID="'.$id.'" ');

	if($running == 1) {
		
		echo '<script> alert("Data Update"); </script>';
		header("Location:Admin-verify.php");
	}
	else{
		echo '<script> alert("Data Not Update"); </script>'; 
	}

	//first we leave this input field blank
 
           $s = mysqli_query($conn,'SELECT email FROM alumnireg WHERE ID="'.$id.'"');

               if(mysqli_num_rows($s) > 0)
               { 
                            
                   while ($row = mysqli_fetch_assoc($s)) 
                				  {  

                    $recipient = "";
                  
                    //if user click the send button
                    
                        //access user entered data
                       $recipient = $row['email'];
                       $subject = 'Confirmation Message';
                       $message = 'Your account has been verified you can now login to the system.';
                      
                      
                      // $a = 'Koala.jpg';
                   
                       $sender = "From: alejbermudo190@gmail.com";
                       //if user leave empty field among one of them
                       if(empty($recipient)){
                           ?>
                           <!-- display an alert message if one of them field is empty -->
                           <div class="alert alert-danger text-center">
                                <?php echo "All inputs are required!" ?>
                            </div>
                           <?php
                        }else{
                            // PHP function to send mail
                           if(mail($recipient, $subject, $message, $sender)){
                            ?>
                            <!-- display a success message if once mail sent sucessfully -->
                           
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
               }
}

                    

#deny.php
if (isset($_POST['denyData'])) {
	include 'include/connection.php'; 
	
	$id = $_POST['deny_id'];
	$verify = $_POST['denyY'];
	


	
	$running = mysqli_query($conn,'UPDATE alumnireg SET status="'.$verify.'" WHERE ID="'.$id.'" ');

	if($running == 1) {
		
		echo '<script> alert("Data Update"); </script>';
		header("Location:Admin-verify.php");
	}
	else{
		echo '<script> alert("Data Not Update"); </script>'; 
	}
}



#login.php 


 if (isset($_POST['login_btn'])) {
    require 'include/connection.php';
    $error = "";
    $success = "";
    
    $email_log = $_POST['email_log'];
    $pass_log = $_POST['pass_log'];
    
    $result = mysqli_query($conn,'SELECT * FROM alumnireg WHERE EMAIL="'.$email_log.'" AND PASS="'.$pass_log.'"');

    $alumni = mysqli_query($conn,'SELECT * FROM alumnireg WHERE EMAIL="'.$email_log.'" AND access="alumni" AND status="verified"');

    $staff = mysqli_query($conn,'SELECT * FROM alumnireg WHERE EMAIL="'.$email_log.'" AND access="staff" and status="verified" ');


    if(mysqli_num_rows($result) == 1) {
      	if(mysqli_num_rows($alumni) == 1) {
      		
      		$row = mysqli_fetch_assoc($alumni);
        		$success = "Success!";
      			$_SESSION['email'] = $row['email'];
				$_SESSION['fullname'] = $row['fullname'];
				$_SESSION['id'] = $row['id'];
      			header('Location:Alumni-home.php');

        }
      elseif (mysqli_num_rows($staff) == 1) {
        $row = mysqli_fetch_assoc($staff);
        		$success = "Success!";
      			$_SESSION['email'] = $row['email'];
				$_SESSION['fullname'] = $row['fullname'];
				$_SESSION['id'] = $row['id'];
  
      header('Location:Staff-home.php');

      }
     


    
    }else{
        $error = 'Invalid Username or password!';
        $success = "";
        
        }
 }

if (isset($_POST['deleteuser'])) 

{
	require 'include/connection.php';
	$id = $_POST['delete_user'];

	$q = "DELETE FROM alumnireg WHERE ID='$id'";
	$q_run = mysqli_query($conn, $q);

	if ($q_run) 
	{
		echo '<script> alert("Deleted"); </script>';
		header("Location:Admin-verify.php?success=Successfully Deleted");
	}
	else
	{
		echo '<script> alert("Failed to delete"); </script>';
	}
}
#TRaining.php
if (isset($_POST['Train'])) {
	$topic = $_POST['Atopic'];
	$desc = $_POST['Adesc'];
	$course = $_POST['Acourse'];
	$training = $_POST['Atraining'];
	$duration = $_POST['Aduration'];
	$venue = $_POST['Avenue'];
	$status = $_POST['Astatus'];
	





 	$sql = "INSERT INTO training(topic,description,course,training,duration,venue,status) VALUES ('$topic','$desc','$course','$training','$duration','$venue','$status')";
 	$run_sql = mysqli_query($conn, $sql);


 if($run_sql == 1) {

 		

 		echo '<script> alert("Successfully added temporary account!"); </script>';
		header("Location:Admin-training.php?success=added Successfully");
 }
 
 else{
 	echo "Error!";
 }

	}


?>