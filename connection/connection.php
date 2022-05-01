<?php
$connection = mysqli_connect("localhost","root","","db_jewelrypawn-notification");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}else{
    //echo 'success';
}
?>

<?php 

    $db_host = "localhost"; // localhost server
    $db_user = "root"; // database username
    $db_password = ""; // database password
    $db_name = "db_jewelrypawn-notification"; // database name

    try {

        $db = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        $e->getMessage();
    }


?>