<?php
require("connection.php");

if(isset($_POST['save']))
{
  $name = $_POST['m_name'];
  $email = $_POST['m_email'];
  $pass = $_POST['m_pass'];

  $query = "INSERT INTO tbl_member (m_name, m_email, m_pass)
                      VALUES ('$name', '$email', '$pass')";

  $query_run = mysqli_query($connection, $query);
  if($query_run)
  {
    $_SESSION['message'] = "Success";
    header("location: profile/insert.php");
    exit();
  }
}

?>