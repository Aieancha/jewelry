<?php
unset($_SESSION['admin_login']);
$result = mysqli_fetch_assoc($query);
        $alert = '<script type= "text/javascript">';
        $alert .= 'alert("คุณต้องการออกจากระบบ");';
        $alert .= 'window.location.href = "../admin/";';
        $alert .= '</script>';
        echo $alert;
        exit();
?>