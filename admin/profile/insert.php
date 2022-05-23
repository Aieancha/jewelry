

<!DOCTYPE html>
<html lang="en">

<body class="g-sidenav-show bg-gray-100">
  <div class="body main-content position-relative bg-white max-height-vh-100 h-100">
    <div class="container-fluid">
      <div class="card-header pb-0 text-left bg-transparent">
        <h3 class="font-weight-bolder text-dark text-dark text-center m-3">เพิ่มข้อมูลผู้ใช้งานระบบ</h3>
      </div>

      <div class="card-body">
        <?php
        if (isset($_POST) && !empty($_POST)) {
          $name = $_POST['m_name'];
          $email = $_POST['m_email'];
          $firstname = $_POST['m_firstname'];
          $lastname = $_POST['m_lastname'];
          $status = $_POST['status'];
          $pass = $_POST['m_pass'];
          //echo sha1(md5($m_pass));
          if (!empty($name)) {
            $sql_check = "SELECT * FROM tbl_member WHERE m_name = '$name'";
            $query_check = mysqli_query($connection, $sql_check);
            $row_check = mysqli_num_rows($query_check);
            if ($row_check > 0) {
              //echo 'ชื่อผู้ใช้ซ้ำ กรุณากรอกใหม่อีกครั้ง';
              $alert = '<script type="text/javascript">';
              $alert .= 'alert("ชื่อผู้ใช้ซ้ำ กรุณากรอกใหม่อีกครั้ง");';
              $alert .= 'window.location.href = "?page=' . $_GET['page'] . '&function=insert";';
              $alert .= '</script>';
              echo $alert;
              exit();
            } else {
              $sql = "INSERT INTO tbl_member (m_name, m_email, m_pass, m_firstname, m_lastname, status)
                      VALUES ('$name', '$email', '$pass', '$firstname', '$lastname', '$status')";

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
          }
        }
        //print_r($_POST);
        ?>
        <div class ="box ">
        <script type="text/javascript" ></script>
        <form  action="" method="post" class="regis">
        <label class="form-label ">ชื่อ</label><labal class="form-label text-danger">*</labal>
          <div class="mb-3">
            <input type="text" class="form-control" name="m_firstname" placeholder="กรอกชื่อจริงผู้ใช้" value="<?= (isset($_POST['m_firstname']) && !empty($_POST['m_firstname']) ? $_POST['m_firstname'] : '') ?>" autocomplete="off" require>
          </div>
          <label class="form-label ">นามสกุล</label><labal class="form-label text-danger">*</labal>
          <div class="mb-3">
            <input type="text" class="form-control" name="m_lastname" placeholder="กรอกนามสกุลผู้ใช้" autocomplete="off" require>
          </div>
          <label class="form-label ">ชื่อผู้ใช้</label><labal class="form-label text-danger">*</labal>
          <label class="text-danger">กรอกเฉพาะภาษาอังกฤษเท่านั้น</label>
          <div class="mb-3">
            <input type="text" class="form-control" name="m_name" placeholder="กรอกชื่อผู้ใช้" autocomplete="off" require>
            <label class="form-label ">อีเมล</label><labal class="form-label text-danger">*</labal>
          <div class="mb-3">
            <input type="email" class="form-control" name="m_email" placeholder="examp@gmail.com" autocomplete="off" require>
          </div>
          </div>
          <label class="form-label ">รหัสผ่าน</label><labal class="form-label text-danger">*</labal>
          <div class="mb-3">
            <input type="password" class="form-control" name="m_pass" placeholder="กรอกรหัสผ่าน" require>
          </div>
          
          
          
          <label class="form-label ">สถานะ</label><labal class="form-label text-danger">*</labal>
          <div class="mb-4 ">
            <select name="status" class="form-control w-40" require>
              <option value="" selected="selected">- เลือกสถานะ -</option>
              <option value="admin">ผู้จัดการ</option>
              <option value="staff">พนักงาน</option>
            </select>
          </div>
          <div class="text-center mb-5">
            <a href="?page=<?= $_GET['page'] ?>" class="btn btn-dark   mb-0 mt-3 " >ย้อนกลับ</a>
            <button type="submit" name="save" class="btn btn-green3 text-white mb-0 mt-3">บันทึกข้อมูล</button>
      </div>   
         
        </form>
         
      </div>
      </div>
    </div>
  </div>
</body>

</html>

<style>
  .regis {
    width: 70%;
    display: block;
    margin: auto;
  }

  .body {
    width: 50%;
    display: block;
    margin: auto;
    border-radius: 20px;
  }

  .box {
    width: 100%;
    display: block;
    margin: auto;
    border-radius: 20px;
    background-color: rgb(255, 255, 255);
  }
</style>