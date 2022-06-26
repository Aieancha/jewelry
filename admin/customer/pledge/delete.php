<?php 
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    //$sql = "DELETE FROM tbl_orders, tbl_social WHERE o_id = '$id'";

    $sql = "DELETE tbl_orders, tbl_social FROM tbl_orders INNER JOIN tbl_social ON tbl_orders.s_id = tbl_social.s_id
    INNER JOIN tbl_bill ON tbl_orders.s_id = tbl_bill.s_id WHERE o_id = '$id'";

    if (mysqli_query($connection, $sql)) {
        // echo "เพิ่มข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("ลบข้อมูลสำเร็จ");';
        $alert .= 'window.location.href = "?page=pledge";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}
