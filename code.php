<?php 
session_start();
$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "dbats";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

#adminlogin
if (isset($_POST['username']) && isset($_POST['password'])) {
	
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$uname = validate($_POST['username']);
	$pass = validate($_POST['password']);
	if (empty($uname)) {
		header("location: Admin-login.php?error=Username is required");
		exit();
	}elseif (empty($pass)) {
		header("location: Admin-login.php?error=Password is required");
		exit();
	}else{

		$pass = md5($pass);
		$sql = "SELECT * FROM ats_admin WHERE USERNAME = '$uname' AND PASSWORD = '$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) ==1) {
			$row = mysqli_fetch_assoc($result);

			if ($row['USERNAME']== $uname && $row['PASSWORD'] == $pass) {
				$_SESSION['USERNAME'] = $row['USERNAME'];
				$_SESSION['NAME'] = $row['NAME'];
				$_SESSION['ID'] = $row['ID'];
				header("Location:Admin-home.php");
				exit();
			}else{
				header("Location:Admin-login.php?error=Incorrect username or password");
				exit();
			}
		}else{
			header("Location:Admin-login.php?error=Incorrect username or password");
			exit();
		}
	}
}




#ADd new Admin
if (isset($_POST['name']) && isset($_POST['uname'])
    && isset($_POST['contact']) && isset($_POST['email'])  && isset($_POST['password'])  && isset($_POST['cpassword'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$name = validate($_POST['name']);
	$uname = validate($_POST['uname']);
	$contact = validate($_POST['contact']);
	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['cpassword']);
	

	$user_data = 'contact='. $contact.'&uname='. $uname. '&name='. $name. '&email='. $email;


	if(empty($name)){
        header("Location: Newadmin.php?error=Name is required&$user_data");
	    exit();
	}
	else if (empty($uname)) {
		header("Location: Newadmin.php?error=User Name is required&$user_data");
	    exit();
	}
	else if(empty($contact)){
        header("Location: Newadmin.php?error=Contact is required&$user_data");
	    exit();
	}
	else if(empty($email)){
        header("Location: Newadmin.php?error=Email is required&$user_data");
	    exit();
	}
	else if(empty($pass)){
        header("Location: Newadmin.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: Newadmin.php?error=Re-Enter Password is required&$user_data");
	    exit();
	}
	
	
	

	else if($pass !== $re_pass){
        header("Location: Newadmin.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM ats_admin WHERE USERNAME='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: Newadmin.php?error=The username is taken&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO ats_admin(NAME, USERNAME, CONTACT, EMAIL, PASSWORD) VALUES('$name', '$uname', '$contact', '$email' , '$pass')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: Newadmin.php?success=Account has been added successfully");
	         exit();
           }else {
	           	header("Location: Newadmin.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}


#Deleting Admin

if (isset($_POST['deletedata'])) 
{
	$id = $_POST['delete_id'];

	$q = "DELETE FROM ats_admin WHERE ID='$id'";
	$q_run = mysqli_query($conn, $q);

	if ($q_run) 
	{
		echo '<script> alert("Deleted"); </script>';
		header("Location:Newadmin.php?success=Successfully Deleted");
	}
	else
	{
		echo '<script> alert("Failed to delete"); </script>';
	}
}

#Update admin
if (isset($_POST['updatedata']))
{
	$id = $_POST['edit_id'];

	$name = $_POST['name'];
	$uname = $_POST['username'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];

	$query= "UPDATE ats_admin SET NAME ='$name', USERNAME ='$uname',CONTACT='$contact',EMAIL ='$email' WHERE ID='$id'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:Newadmin.php?success=Updated Successfully");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}

##ADDING COURSE

if (isset($_POST['course'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$course = validate($_POST['course']);
	
	

	$user_data = 'course='. $course;


	if(empty($course)){
        header("Location: manage-course.php?error=Please enter course name&$user_data");
	    exit();
	}
	
		else{

	    $sql = "SELECT * FROM course WHERE COURSE='$course' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: manage-course.php?error=The course is already exist&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO course(COURSE) VALUES('$course')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: manage-course.php?success=Course has been added successfully");
	         exit();
           }else {
	           	header("Location: manage-course.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	
	}
}
#Deleting course

if (isset($_POST['deletecourse'])) 
{
	$id = $_POST['delete_id'];

	$q = "DELETE FROM course WHERE ID='$id'";
	$q_run = mysqli_query($conn, $q);

	if ($q_run) 
	{
		echo '<script> alert("Deleted"); </script>';
		header("Location:manage-course.php?success=Successfully Deleted");
	}
	else
	{
		echo '<script> alert("Failed to delete"); </script>';
	}
}

#UPDATE COURSE
if (isset($_POST['updatecourse']))
{
	$id = $_POST['courseid'];

	$course = $_POST['mcourse'];
	

	$query= "UPDATE course SET COURSE ='$course' WHERE ID='$id'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:manage-course.php?success=Updated Successfully");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}

#Add EVENT

if (isset($_POST['title']) && isset($_POST['location'])
    && isset($_POST['date']) && isset($_POST['description'])  && isset($_POST['status'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$title = validate($_POST['title']);
	$location = validate($_POST['location']);
	$date = validate($_POST['date']);
	$desc = validate($_POST['description']);
	$status = validate($_POST['status']);
	
	    
	
		

	$user_data = 'date='. $date.'&location='. $location. '&title='. $title. '&time='. $time;


	if(empty($title)){
        header("Location: Admin-create-event.php?error=Title is required&$user_data");
	    exit();
	}
	else if (empty($location)) {
		header("Location:  Admin-create-event.php?error=Location is required&$user_data");
	    exit();
	}
	else if(empty($date)){
        header("Location:  Admin-create-event.php?error=Date is required&$user_data");
	    exit();
	}
	
	else if(empty($desc)){
        header("Location: Admin-create-event.php?error=Description is required&$user_data");
	    exit();
	}
	else if(empty($status)){
        header("Location:  Admin-create-event.php?error=Status is required&$user_data");
	    exit();
	}
	
else {
		$file = $_FILES['image']['name'];
           $sql2 = "INSERT INTO event(TITLE, LOCATION, DATE, DESCRIPTION, STATUS, IMAGE) VALUES('$title', '$location', '$date', '$desc', '$status', '$file')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	move_uploaded_file($_FILES['image']['tmp_name'], "$file");
           	 header("Location: Admin-create-event.php?success=Event has been created successfully");
	         exit();
           }else {
	           	header("Location: Admin-create-event.php?error=unknown error occurred&$user_data");
		        exit();
           }
	}
	
}
#Update Event
if (isset($_POST['updateEvent']))
{
	$id = $_POST['event_id'];

	$title = $_POST['title'];
	$location = $_POST['location'];
	$date = $_POST['dateControl'];
	$desc = $_POST['desc'];
	$status= $_POST['status'];


	$query= "UPDATE event SET TITLE ='$title', LOCATION ='$location',DATE='$date',DESCRIPTION ='$desc',STATUS ='$status' WHERE ID='$id'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:Admin-view-event.php?success=Updated Successfully");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}
	  
	#Deleting Event

if (isset($_POST['deleteEvent'])) 
{
	$id = $_POST['delete_event'];

	$q = "DELETE FROM event WHERE ID='$id'";
	$q_run = mysqli_query($conn, $q);

	if ($q_run) 
	{
		echo '<script> alert("Deleted"); </script>';
		header("Location:Admin-view-event.php?success=Successfully Deleted");
	}
	else
	{
		echo '<script> alert("Failed to delete"); </script>';
	}
}

#pOST job

if (isset($_POST['postevent'])){

// && isset($_POST['joblocation']) && isset($_POST['jobtitle']) && isset($_POST['qualification']) && isset($_POST['jobdescription']) && isset($_POST['keyskills']) && isset($_POST['jobreq']) && isset($_POST['vacancy']) && isset($_POST['refemail']) && isset($_POST['lastdate'])) {


	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$company = validate($_POST['company']);
	$jobloc = validate($_POST['joblocation']);
	$jobtitle = validate($_POST['jobtitle']);
	$quali = validate($_POST['qualification']);
	$jobdesc = validate($_POST['jobdescription']);
	$key = validate($_POST['keyskills']);
	$jobreq = validate($_POST['jobreq']);
	$vacancy = validate($_POST['vacancy']);
	$ref = validate($_POST['refemail']);
	$last = validate($_POST['lastdate']);
	
	    
	
		

	$user_data = 'company='. $company.'&joblocation='. $jobloc. '&jobtitle='. $jobtitle. '&qualification='. $quali.'&jobdescription='. $jobdesc. '&keyskills='. $key. '&jobreq='. $jobreq. '&vacancy='. $vacancy. '&refemail='. $ref. '&lastdate='. $last;


	if(empty($company)){
        header("Location: Admin-jobposting.php?error=Company is required&$user_data");
	    exit();
	}
	else if (empty($jobloc)) {
		header("Location: Admin-jobposting.php?error=location is required&$user_data");
	    exit();
	}
	else if(empty($jobtitle)){
        header("Location: Admin-jobposting.php?error=Job title is required&$user_data");
	    exit();
	}
	
	else if(empty($quali)){
        header("Location: Admin-jobposting.php?error=Qualification is required&$user_data");
	    exit();
	}
	else if(empty($jobdesc)){
        header("Location: Admin-jobposting.php?error=Job description is required&$user_data");
	    exit();
	}
	else if(empty($key)){
        header("Location: Admin-jobposting.php?error=Key skills is required&$user_data");
	    exit();
	}
	else if(empty($jobreq)){
        header("Location: Admin-jobposting.php?error=Job requirements is required&$user_data");
	    exit();
	}
	else if(empty($vacancy)){
        header("Location: Admin-jobposting.php?error=No. of vacancy is required&$user_data");
	    exit();
	}
	
	else if(empty($ref)){
        header("Location: Admin-jobposting.php?error=Reference email is required&$user_data");
	    exit();
	}
	
	else if(empty($last)){
        header("Location: Admin-jobposting.php?error=Last date is required&$user_data");
	    exit();
	}
	
	
	
else {
		
           $sql3 = "INSERT INTO job(company, location, title, qualification, description, skill, requirement, vacancy, reference, lastdate) VALUES('$company', '$jobloc', '$jobtitle', '$quali', '$jobdesc', '$key', '$jobreq', '$vacancy', '$ref', '$last')";

           $result3 = mysqli_query($conn, $sql3);

           if ($result3) {
           	 header("Location: Admin-jobposting.php?success=Job has been posted");
	         exit();

           }else {
	           	header("Location: Admin-jobposting.php?error=unknown error occurred&$user_data");
		        exit();
           }
	}
	
}

#Update Training
if (isset($_POST['updateTraining']))
{
	$id = $_POST['train_id'];

	$topic = $_POST['topic'];
	$description = $_POST['desc'];
	$course = $_POST['courses'];
	$date = $_POST['training'];
	$duration= $_POST['duration'];
	$venue =  $_POST['venue'];
	$status =  $_POST['status'];


	$query= "UPDATE training SET topic ='$topic',course='$course',training ='$date',duration ='$duration', venue ='$venue', status ='$status' WHERE Id='$id'";
	$query_run = mysqli_query($conn, $query);

	if ($query_run) {
		header("Location:Admin-training-man.php?success=Updated Successfully");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}

#Deleting trainminig

if (isset($_POST['deleteTraining'])) 
{
	$id = $_POST['delete_training'];

	$q = "DELETE FROM training WHERE Id='$id'";
	$q_run = mysqli_query($conn, $q);

	if ($q_run) 
	{
		echo '<script> alert("Deleted"); </script>';
		header("Location:Admin-training-man.php?success=Successfully Deleted");
	}
	else
	{
		echo '<script> alert("Failed to delete"); </script>';
	}
}

#update profile
if (isset($_POST['Uprofile']))
{
	$pid = $_POST['alid'];

	$pname = $_POST['pname'];
	$pgender = $_POST['pgender'];
	$pbday = $_POST['pbirthday'];
	$pemail = $_POST['pemail'];
	$pcontact = $_POST['pcontact'];
	$pyr = $_POST['pyrgrad'];
	$pcourse = $_POST['pcourse'];
	$poccupation = $_POST['poccupation'];
	$paddress = $_POST['paddress'];

	$query3= "UPDATE alumnireg SET fullname ='$pname', gender ='$pgender',birth='$pbday',email ='$pemail',contact ='$pcontact',passout ='$pyr',course ='$pcourse',occupation ='$poccupation',address ='$paddress' WHERE id ='$pid'";
	$query_run3 = mysqli_query($conn, $query3);

	if ($query_run3) {
		header("Location:Alumni-profile.php?success=Updated Successfully");
	}
	else{
		echo '<script type=:"text/javascript"> alert("Not UPDATED")</script>';
	}
}


?>