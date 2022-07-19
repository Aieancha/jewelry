<?php include('../connection/connection.php') ?>
<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<?php include('include/head.php') ?>

<?php if (isset($_SESSION['s_id']) && !empty($_SESSION['s_id'])) : ?>
  <?php include('include/sidebar.php') ?>

  <body>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <?php include('include/nav.php') ?>
      <div class="container-fluid py-4">

        <?php
        if (!isset($_GET['page']) && empty($_GET['page'])) {
          if (isset($_GET['function']) && $_GET['function'] == 'interest2') {
            //include('interest_table.php');
            include('interest_details.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'updatebill') {
            include('update_bill.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'detailbill') {
            include('detail_bill.php');
          } else {
            include('interest_table.php');
            //include('interest_details.php');
          }
        }elseif (isset($_GET['page']) && $_GET['page'] == 'newform') {
          include('newform.php');
        } elseif (isset($_GET['page']) && $_GET['page'] == 'frompledge')
          if (isset($_GET['function']) && $_GET['function'] == 'fromdetails') {
            include('show_details.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'ContractImg') {
            include('ContractImg.php');
          } else {
            include('pledge.php');
          }
        elseif (isset($_GET['page']) && $_GET['page'] == 'logout') {
          include('logout.php');
        } elseif (isset($_GET['page']) && $_GET['page'] == 'profile') {
          include('profile.php');
        } /* elseif (isset($_GET['page']) && $_GET['page'] == 'interest') {
          if (isset($_GET['function']) && $_GET['function'] == 'interest2') {
            include('interest_details.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'updatebill') {
            include('update_bill.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'detailbill') {
            include('detail_bill.php');
          } else {
            include('interest_table.php');
          }
        } */

        ?>

      </div>
    </main>


  </body>
<?php else : ?>
  <?php include('login.php')  ?>
<?php endif; ?>

</html>