<?php include('../connection/connection.php') ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include('include/head.php'); ?>
<?php include('include/script.php') ?>

<?php if (isset($_SESSION['admin_login']) && !empty($_SESSION['admin_login'])) : ?>
  <?php include('include/sidebar.php') ?>

  <body class="g-sidenav-show  bg-gray-100">


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <?php include('include/navbar.php'); ?>
      <div class="container-fluid py-4">
        <?php
        if (!isset($_GET['page']) && empty($_GET['page'])) {
            include('dashboard/index.php');
        } elseif (isset($_GET['page']) && $_GET['page'] == 'interest') {
          if (isset($_GET['function']) && $_GET['function'] == 'update') {
            include('customer/interest/Update-In.php');
           }else{
            include('customer/interest/index.php');
           }  
        } elseif (isset($_GET['page']) && $_GET['page'] == 'pledge') {
          
          if (isset($_GET['function']) && $_GET['function'] == 'insert') {
            include('customer/pledge/insert.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'customr') {
              include('customer/pledge/customr.php');
          }elseif (isset($_GET['function']) && $_GET['function'] == 'cal') {
            include('customer/pledge/cal.php');
          }elseif (isset($_GET['function']) && $_GET['function'] == 'contract') {
            include('customer/pledge/contract.php');
          }elseif (isset($_GET['function']) && $_GET['function'] == 'success') {
            include('customer/pledge/success.php');
          }elseif (isset($_GET['function']) && $_GET['function'] == 'calculate') {
            include('customer/pledge/calculate.php');
          }elseif (isset($_GET['function']) && $_GET['function'] == 'details') {
            include('customer/pledge/details.php');
        }elseif (isset($_GET['function']) && $_GET['function'] == 'updated') {
          include('customer/pledge/edit.php');
      } else {
              include('customer/pledge/index.php');
          }
        } elseif (isset($_GET['page']) && $_GET['page'] == 'profile') {
          
          if (isset($_GET['function']) && $_GET['function'] == 'insert') {
              include('profile/insert.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'update') {
              include('profile/edit.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'delete') {
              include('profile/delete.php');
          } else {
              include('profile/profile.php');
          }
        }elseif (isset($_GET['page']) && $_GET['page'] == 'logout'){
          include('logout/logout.php');
        }



        ?>

      </div>
    </main>
    <?php include('include/script.php') ?>
  </body>
<?php else : ?>
  <?php include('login/signin.php')  ?>
<?php endif; ?>

</html>