<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_member where m_id = '$id' ";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
    $chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
    $password = substr(str_shuffle($chars), 0, 8);
    // Encrypt password
    $pass = sha1(md5($password));
    $sql = "UPDATE tbl_member SET m_pass = '$pass' where m_id = '$id'";
    if (mysqli_query($connection, $sql)) {
      $alert = '<script type= "text/javascript">';
                $alert .= 'alert("ชื่อผู้ใช้ : '.$result['m_name'].' รหัสผ่าน : '.$password.'");';
                $alert .= 'window.location.href = "?page=profile";';
                $alert .= '</script>';
                echo $alert;
                exit();
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  }
}
