<?php include('../connection/connection.php') ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include('include/head.php'); ?>
<?php include('include/script.php') ?>
<?php include('include/sidebar.php') ?>

<body class="g-sidenav-show  bg-gray-100">

  <?php include('include/navbar.php'); ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <div class="container-fluid py-4">
      <?php
      $act = $_GET['wait'];
      if($act == 'wait'){
          include('customer/assess_wait.php');
      }elseif ($act == 'success') {
          include('customer/contract_wait.php');
      }



      ?>

    </div>
  </main>
  <?php include('include/script.php') ?>
</body>

</html>