<?php
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "UPDATE tbl_customer SET status=0 WHERE c_id = '$id'";
        if (mysqli_query($connection, $sql)) {
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("เปลี่ยนสถานะสำเร็จ");';
            $alert .= 'window.location.href = "?page=allow";';
            $alert .= '</script>';
            echo $alert;
            exit();
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
        mysqli_close($connection);
  
}
?>
