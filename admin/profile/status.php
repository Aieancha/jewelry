<?php
    include('../connection/connection.php');
$c_id = $_POST['c_id'];
$sql = "select * from tbl_customer WHERE id = $c_id";
$result = mysqli_query($conn,$sql);
$data =mysqli_fetch_assoc($result);
$status = $data['status'];

if($status == '1'){
    $status = '0';

}
else{
    $status = '1';
}
 $update = "update tbl_customer set status = '$status' where id =$s_id";
 $result = mysqli_query($conn,$update);
 if($result){
     echo $status;
 }

?>