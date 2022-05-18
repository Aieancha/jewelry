<?php
if(isset($_POST) && !empty($_POST)){
    $name = $_POST['m_name'];
    $pass = $_POST['m_pass'];
    $sql = "SELECT * FROM tbl_member WHERE m_name = '$name' AND m_pass = '$pass' ";
    $query = mysqli_query($connection,$sql);
    $row = mysqli_num_rows($query);
    if($row > 0){
        $result = mysqli_fetch_assoc($query);
        $_SESSION['admin_login'] = $result['m_name'];
        $alert = '<script type= "text/javascript">';
        $alert .= 'alert("เข้าสู่ระบบสำเร็จ");';
        $alert .= 'window.location.href = "";';
        $alert .= '</script>';
        echo $alert;
        exit();
    }else{
            $alert = '<script type= "text/javascript">';
            $alert .= 'alert("ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง");';
            $alert .= 'window.location.href = "";';
            $alert .= '</script>';
            echo $alert;
            exit();
    }
}
?>
<script type="text/javascript"></script>
<div class="container-fluid py-4">
    <div class="row">
        <div class="card">
        	<div class="card-body p-3">
            <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h1 class="font-weight-bolder text-dark text-gradient ">Jewelry Pawn</h1>
                  <p class="mb-0">กรุณากรอกข้อมูลชื่อผู้ใช้และรหัสผ่านเพื่อเข้าสู่ระบบ</p>
                </div>
                <div class="card-body">
                  <form action="" method="post">
                    <h5>ชื่อผู้ใช้*</h5>
                    <div class="mb-3">
                      <input type="text" class="form-control" name="m_name" placeholder="...." require autocomplete="off">
                    </div>
                    <h5>รหัสผ่าน*</h5>
                    <div class="mb-3">
                      <input type="password" class="form-control" name="m_pass" placeholder="กรอกรหัสผ่าน" require>
                    </div>
                    <div class="nav-link active text-center" href="../pages/tables.html" >
                      <button type="submit" name="btn-login" class=" btn bg-gradient-dark w-100 mt-4 mb-0" >เข้าสู่ระบบ</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('assets/image/jewelry.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
        
        	</div>
        </div>
    </div>

</div> 