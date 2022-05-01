<?php
session_start();
require_once 'connection/connection.php';
?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="card">
        	<div class="card-body p-3">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('assets/image/Jewelry.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <h1 class="text-white mb-2 mt-5">Pawn Jewelry</h1>
              <p class="text-lead text-white">สำหรับพนักงาน บริษัท NGG เพื่อบันทึกข้อมูลการจำนำเครื่องประดับ</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-header text-center pt-4">
                <h5>สร้างบัญชีใหม่</h5>
              <div class="card-body">
                <form role="form text-left" action="member/sign-up/sign-up.php" method="post">
                  <?php if(isset($_SESSION['error'])) { ?>
                    <div class="alert-danger" role="alert">
                      <?php
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                      ?>
                    </div>
                  <?php } ?>
                  <?php if(isset($_SESSION['success'])) { ?>
                    <div class="alert-success" role="success">
                      <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                      ?>
                    </div>
                  <?php } ?>
                  <?php if(isset($_SESSION['warning'])) { ?>
                    <div class="alert-warning" role="warning">
                      <?php
                        echo $_SESSION['warning'];
                        unset($_SESSION['warning']);
                      ?>
                    </div>
                  <?php } ?>
                  <div class="mb-3">
                    <input type="text" class="form-control" name="m_username" placeholder="ชื่อ-นามสกุล*" require autocomplete="off">
                  </div>
                  <div class="mb-3">
                    <input type="email" class="form-control" name="m_email" placeholder="ที่อยู่อีเมล*" require autocomplete="off">
                  </div>
          
                  <div class="mb-3">
                    <input type="password" class="form-control" name="m_password" placeholder="รหัสผ่าน*">
                  </div>
                  <div class="mb-3">
                    <input type="password" class="form-control" name="c_password" placeholder="ยืนยันรหัสผ่าน*">
                  </div>
                  <!-- <div class="form-check form-check-info text-left">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                      ยืนยันการกรอกข้อมูลทั้งหมดถูกต้อง 
                    </label>
                  </div> -->
                  <div class="text-center">
                    <button type="submit" name="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">สมัครสมาชิก</button>
                  </div>
                  <p class="text-sm mt-3 mb-0">มีบัญชีอยู่เเล้ว? <a href="../pages/sign-in.html" class="nav-link  text-danger font-weight-bolder">เข้าสู่ระบบ</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

        
        	</div>
        </div>
    </div>

</div> 