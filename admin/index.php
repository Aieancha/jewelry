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
      if (!isset($_GET['page']) && empty($_GET['page'])) {
        include('dashboard/index.php');
      } elseif (isset($_GET['page']) && $_GET['page'] == 'interest') {
        include('customer/interest/index.php');
      } elseif (isset($_GET['page']) && $_GET['page'] == 'pledge') {
        if (isset($_GET['function']) && $_GET['function'] == 'insert') {
          include('customer/pledge/insert.php');
        } else {
          include('customer/pledge/index.php');
        }
      } elseif (isset($_GET['page']) && $_GET['page'] == 'profile') {
        if (isset($_GET['function']) && $_GET['function'] == 'insert') {
          include('profile/insert.php');
        } else {
          include('profile/profile.php');
        }
      } elseif (isset($_GET['page']) && $_GET['page'] == 'sign-in') {
        include('member/index.php');
      } elseif (isset($_GET['page']) && $_GET['page'] == 'sign-out') {
        include('member/sign-up/signup.php');
      }



      ?>

    </div>
  </main>
  <?php include('include/script.php') ?>
</body>

</html>