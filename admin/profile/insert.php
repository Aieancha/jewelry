<!DOCTYPE html>
<html lang="en">

<body class="g-sidenav-show bg-gray-100">
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid">
        <div class="card-header pb-0 text-left bg-transparent">
            <h3 class="font-weight-bolder text-dark text-gradient ">เพิ่มข้อมูลผู้ดูแลระบบ</h3>
        </div>
        <a href="?page=<?=$_GET['page']?>" class="btn btn-primary">ย้อนกลับ</a>
        <hr class="mb-4">
    <div class="card-body">
        <?php
          if (isset($_POST) && !empty($_POST)){
            $m_name = $_POST['m_name'];
            $m_email = $_POST['m_email'];
            $m_pass = $_POST['m_pass'];

            $sql = "INSERT INTO tbl_member (m_name, m_email, m_pass)
                      VALUES ('$m_name', '$m_email', '$m_pass')";

            if (mysqli_query($connection, $sql)) {
              //echo "เพิ่มข้อมูลสำเร็จ";
              $alert = '<script type= "text/javascript">';
              $alert .= 'alert("เพิ่มข้อมูลสำเร็จ");';
              $alert .= 'window.location.href = "?page=profile";';
              $alert .= '</script>';
              echo $alert;
              exit();
            } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            }

            mysqli_close($connection);
          }
            //print_r($_POST);
        ?>
        <script type="text/javascript"></script>
        <form action="" method="post">
            <label class="form-label">ชื่อผู้ใช้*</label>
                <div class="mb-3">
                <input type="text" class="form-control" name="m_name" placeholder="" require autocomplete="off">
                </div>
            <label class="form-label">รหัสผ่าน*</label>
                <div class="mb-3">
                <input type="password" class="form-control" name="m_pass" placeholder="กรอกรหัสผ่าน" require>
                </div>
            <label class="form-label">อีเมล*</label>
                <div class="mb-3">
                <input type="email" class="form-control" name="m_email" placeholder="examp@gmail.com" require autocomplete="off">
                </div>
            <div class="text-center">
                <button type="submit" class="btn bg-gradient-dark w-20 mt-4 mb-0">บันทึกข้อมูล</button>
            </div>
        </form>
    </div>

    </div>
  </div>
</body>

</html>