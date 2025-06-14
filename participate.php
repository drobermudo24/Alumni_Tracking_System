<?php
session_start();
$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "dbats";

$conn = mysqli_connect($sname, $uname, $password, $db_name);
if (isset($_POST['participate']))
     {
           $add = $_POST['prtcpt'];
           $eid = $_POST['eventid'];
            

           $total = '1';
            
           $queryy= "UPDATE training SET total_part = '$add'+'$total' WHERE id = '$eid'";
           $query_runy = mysqli_query($conn, $queryy);

           if ($query_runy) {
           header("Location:Alumni-training.php?success=Thank you for participating!");
           }
           else{
             echo '<script type=:"text/javascript"> alert("Error occur")</script>';
            }
          } 

?>