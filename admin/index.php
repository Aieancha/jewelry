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
            if (!isset($_GET['page']) && empty($_GET['page'])){
              include('dashboard/index.php');
            }elseif (isset($_GET['page']) && $_GET['page'] == 'interest'){
              include('customer/interest/index.php');
            }elseif (isset($_GET['page']) && $_GET['page'] == 'pledge'){
              include('customer/pledge/index.php');
            }elseif (isset($_GET['page']) && $_GET['page'] == 'sign-in'){
              include('member/index.php');
            }elseif (isset($_GET['page']) && $_GET['page'] == 'sign-out'){
                include('member/sign-up/signup.php');
              }
            
            
            
      ?>

        </div>
    </main>
  <?php include('include/script.php') ?>  
</body>
</html>