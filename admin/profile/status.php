<?php include('../connection.php') 

$id=$_POST['c_id'];
$status=$_POST['status'];

$q="update doctor_info set status=$status where c_id=$id";

mysqli_query($con,$q);
?>