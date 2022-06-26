<?php
unset($_SESSION['customer_login']);
unset($_SESSION['s_id']);
unset($_SESSION['username']);
unset($_SESSION['status']);
unset($_SESSION['user']);
$result = mysqli_fetch_assoc($query);
        $alert = '<script type= "text/javascript">';
        $alert .= 'alert("คุณต้องการออกจากระบบ");';
        $alert .= 'window.location.href = "../customer/";';
        $alert .= '</script>';
        echo $alert;
        exit();
?>