<?php
if (isset($_REQUEST['m_name'])) {
  $name = $_REQUEST['m_name'];
  $pass = $_REQUEST['m_pass'];
  $sql = "SELECT * FROM tbl_member Where m_name='" . $name . "' and m_pass='" . $pass . "' ";
  $query = mysqli_query($connection, $sql);
  if (mysqli_num_rows($query) == 1) {

    $row = mysqli_fetch_array($query);

    $_SESSION["userID"] = $row["m_id"]; //ประกาศตัวแปรUserIDไว้เพื่อส่งค่า
    $_SESSION["user"] = $row["m_name"]; //ประกาศตัวแปรUserไว้เพื่อส่งค่า
    $_SESSION["userlevel"] = $row["status"]; //ประกาศตัวแปรUserlevelไว้เพื่อส่งค่า

    if ($_SESSION["userlevel"] == "admin") { //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
      $alert = '<script type= "text/javascript">';
      $alert .= 'alert("เข้าสู่ระบบสำเร็จ");';
      $alert .= 'window.location.href = "";';
      $alert .= '</script>';
      echo $alert;
      exit();
    }

    if ($_SESSION["userlevel"] == "staff") {  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
      $alert = '<script type= "text/javascript">';
      $alert .= 'alert("เข้าสู่ระบบสำเร็จ");';
      $alert .= 'window.location.href = "";';
      $alert .= '</script>';
      echo $alert;
      exit();
    }
  } else {
    echo "<script>";
    echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";
    echo "window.history.back()";
    echo "</script>";
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
                        <input type="text" class="form-control" name="m_name" placeholder="กรุณากรอกชื่อผู้ใช้" require autocomplete="off">
                      </div>
                      <h5>รหัสผ่าน*</h5>
                      <div class="mb-3">
                        <input style="width: 80%; "  type="password" class="form-control pass-swap" name="m_pass" placeholder="กรอกรหัสผ่าน" require>
                        <button style="width: 25%; margin-top:0.5cm;" type="button" class=" form-control btn-toggle-pass">Show</button>
                      </div>
                      <div class="nav-link active text-center" href="../pages/tables.html">
                        <button type="submit" name="btn-login" class=" btn bg-gradient-dark w-100 mt-4 mb-0">เข้าสู่ระบบ</button>
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
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
    // ใช้วิธีการ สลับ type 
     $(document.body).on("click",".btn-toggle-pass",function(){
        let ele = $(this).prev(".pass-swap");
        let condCheck = $(this).text();
        $(this).text((condCheck=='Show')?'Hide':'Show');
        let swap_attr = (ele.attr("type")=="password")?"text":"password";
        console.log(ele.attr("type")); 
        ele.attr("type",swap_attr);
     });
  
});
</script>