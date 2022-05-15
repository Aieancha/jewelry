<?php
include('../connection/connection.php');

$id=$_GET['c_id'];
$status = $_GET['status'];

$q="update doctor_info set status=$status where id=$id";

mysqli_query($connection,$q);

?>
