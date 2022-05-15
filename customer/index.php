<?php include('../connection/connection.php') ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>How to Disable Enable User Login in PHP using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 
<?php include('include/head.php') ?> 
    <?php include('include/nav.php') ?> 
    <?php include('include/sidebar.php') ?> 

<?php if (isset($_SESSION['admin_login']) && !empty($_SESSION['admin_login'])) : ?>

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
          }elseif (isset($_GET['function']) && $_GET['function'] == 'wait') {
            include('customer/interest/insert.php');
          }elseif (isset($_GET['function']) && $_GET['function'] == 'updateCustomer') {
            include('customer/interest/Update_customer.php');
          }elseif (isset($_GET['function']) && $_GET['function'] == 'showDetails') {
            include('customer/interest/show-details.php');
          }elseif (isset($_GET['function']) && $_GET['function'] == 'detailsIn') {
            include('customer/interest/Details-In.php');
          }elseif (isset($_GET['function']) && $_GET['function'] == 'qty') {
            include('customer/interest/qty.php');
          }elseif (isset($_GET['function']) && $_GET['function'] == 'list') {
            include('customer/interest/list_summary.php');
          }
           else {
            include('customer/interest/index.php');
          }
        } elseif (isset($_GET['page']) && $_GET['page'] == 'pledge') {

          if (isset($_GET['function']) && $_GET['function'] == 'insert') {
            include('customer/pledge/insert.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'customr') {
            include('customer/pledge/customr.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'cal') {
            include('customer/pledge/cal.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'contract') {
            include('customer/pledge/contract.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'success') {
            include('customer/pledge/success.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'updated') {
            include('customer/pledge/edit.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'check') {
            include('customer/pledge/check_bill.php');
          }elseif (isset($_GET['function']) && $_GET['function'] == 'calculate') {
            include('customer/pledge/calculate.php');
          }elseif (isset($_GET['function']) && $_GET['function'] == 'details') {
            include('customer/pledge/details.php');
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
          }  else {
            include('profile/profile.php');
          }
        } 
        
        elseif (isset($_GET['page']) && $_GET['page'] == 'logout') {
          include('logout/logout.php');
        }
        
        elseif (isset($_GET['page']) && $_GET['page'] == 'allow') {
          include('profile/allow.php');
        }  if (isset($_GET['function']) && $_GET['function'] == 'allowdetail') {
            include('customer/interest/allow_details.php');
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