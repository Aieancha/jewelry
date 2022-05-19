<?php include('../connection/connection.php') ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<?php include('include/head.php') ?>

<?php if (isset($_SESSION['customer_login']) && !empty($_SESSION['customer_login'])) : ?>
  <?php include('include/sidebar.php') ?> 
<body>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
<?php include('include/nav.php') ?>
      <div class="container-fluid py-4">
        <?php
        if (!isset($_GET['page']) && empty($_GET['page'])) {
          include('newform.php');
        } elseif (isset($_GET['page']) && $_GET['page'] == 'frompledge') 
          if (isset($_GET['function']) && $_GET['function'] == 'fromdetails') {
            include('show_details.php');    
      }else{
          include('pledge.php');
        } elseif (isset($_GET['page']) && $_GET['page'] == 'profile') {
            include('profile.php');     
      }elseif (isset($_GET['page']) && $_GET['page'] == 'interest') {
        if (isset($_GET['function']) && $_GET['function'] == 'interest2') {
          include('interest_details.php');    
      }else{
        include('interest_table.php');    
      }
    }

        ?>

      </div>
    </main>


  </body>
<?php else : ?>
  <?php include('login.php')  ?>
<?php endif; ?>

</html>
