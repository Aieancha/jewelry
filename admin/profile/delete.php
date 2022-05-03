<?php 
if (isset($_GET['m_id']) && !empty($_GET['m_id'])) {
    $id = $_GET['m_id'];
    $sql = "DELETE FROM tbl_member WHERE m_id = '$id'";

    if (mysqli_query($connection, $sql)) {
        // echo "เพิ่มข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("ลบข้อมูลสำเร็จ");';
        $alert .= 'window.location.href = "?page=profile";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>