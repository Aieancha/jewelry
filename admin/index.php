<?php include('../connection/connection.php') ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include('include/head.php'); ?>
<?php include('include/script.php') ?>

<?php if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) : ?>
  <?php include('include/sidebar.php') ?>

  <body class="g-sidenav-show  bg-gray-100">


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <?php include('include/navbar.php'); ?>
      <div class="container-fluid py-4">
        <?php
        if (!isset($_GET['page']) && empty($_GET['page'])) {
          if (isset($_GET['function']) && $_GET['function'] == 'ChangeStatus') {
            include('dashboard/ChangeStatus.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'detailsIn') {
            include('customer/interest/Details-In.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'details') {
            include('customer/pledge/details.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'report') {
            include('dashboard/report.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'overdue') {
            include('dashboard/overdue.php');
          }elseif (isset($_GET['function']) && $_GET['function'] == 'EndContract') {
            include('dashboard/EndContract.php');
          }elseif (isset($_GET['function']) && $_GET['function'] == 'RedemContract') {
            include('dashboard/RedemContract.php');
          }elseif (isset($_GET['function']) && $_GET['function'] == 'SuccessContract') {
            include('dashboard/SuccessContract.php');
          }elseif (isset($_GET['function']) && $_GET['function'] == 'WrongContract') {
            include('dashboard/WrongContract.php');
          } else {
            include('dashboard/index.php');
          }
        } elseif (isset($_GET['page']) && $_GET['page'] == 'interest') {
          if (isset($_GET['function']) && $_GET['function'] == 'update') {
            include('customer/interest/Update-In.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'wait') {
            include('customer/interest/insert.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'updateCustomer') {
            include('customer/interest/Update_customer.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'showDetails') {
            include('customer/interest/show-details.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'detailsIn') {
            include('customer/interest/Details-In.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'qty') {
            include('customer/interest/qty.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'list') {
            include('customer/interest/list_summary.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'sum_list') {
            include('customer/interest/sum_list.php');
          } else {
            include('customer/interest/index.php');
          }
        } elseif (isset($_GET['page']) && $_GET['page'] == 'pledge') {

          if (isset($_GET['function']) && $_GET['function'] == 'insert') {
            include('customer/pledge/insert.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'waitPledge') {
            include('customer/pledge/waitPledge.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'customr') {
            include('customer/pledge/customr.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'cal') {
            include('customer/pledge/cal.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'contract') {
            include('customer/pledge/contract.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'success') {
            include('ExportExcell/indexRE.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'updated') {
            include('customer/pledge/edit.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'check') {
            include('customer/pledge/check_bill.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'calculate') {
            include('customer/pledge/calculate.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'details') {
            include('customer/pledge/details.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'wait') {
            include('customer/pledge/wait.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'contractSuccess') {
            include('customer/pledge/contractSuccess.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'CreateContract') {
            include('customer/pledge/CreateContract.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'CustomerCreate') {
            include('customer/pledge/CustomerCreate.php');
          }elseif (isset($_GET['function']) && $_GET['function'] == 'SuccessContract') {
            include('customer/pledge/SuccessContract.php');
          }elseif (isset($_GET['function']) && $_GET['function'] == 'WaitContract') {
            include('customer/pledge/WaitContract.php');
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
        } elseif (isset($_GET['page']) && $_GET['page'] == 'logout') {
          include('logout/logout.php');
        } elseif (isset($_GET['page']) && $_GET['page'] == 'allow') {
          if (isset($_GET['function']) && $_GET['function'] == 'allowdetail') {
            include('profile/allow_details.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'deleteCus') {
            include('profile/delete_customer.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'updateStatusCus') {
            include('profile/update_status.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'updateStatusCus2') {
            include('profile/update_status2.php');
          } else {
            include('profile/allow.php');
          }
        }elseif (isset($_GET['page']) && $_GET['page'] == 'myprofile') {
          include('admin/home.php');
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