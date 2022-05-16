<?php
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "UPDATE FROM tbl_customer WHERE c_id = '$id'";
      
       
    $query = mysqli_query($connection, "SELECT status FROM tbl_customer WHERE c_id=$id") or die(mysqli_error());
    $row = mysqli_fetch_array($query);

    if ($row['status'] == 0)
    {
        mysqli_query($connection, "UPDATE tbl_customer SET status=1 WHERE c_id=$id") or die(mysqli_error());
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("เปลี่ยนสถานะสำเร็จ");';
        $alert .= 'window.location.href =  "?page=allow";';
        $alert .= '</script>';
        echo $alert;
        exit();
    }
    else
    {
        mysqli_query($connection, "UPDATE tbl_customer SET status=0 WHERE c_id=$id") or die(mysqli_error());
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("เปลี่ยนไม่สถานะสำเร็จ");';
        $alert .= 'window.location.href =  "?page=allow";';
        $alert .= '</script>';
        echo $alert;
        exit();
    }
}
?>