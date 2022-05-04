<!DOCTYPE html>
<html lang="en">

<body class="g-sidenav-show bg-gray-100">
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid">
      <div class="card-header pb-0 text-left bg-transparent">
        <h3 class="font-weight-bolder text-dark text-gradient ">แก้ไขข้อมูลผู้ดูแลระบบ</h3>
      </div>
      <a href="?page=<?= $_GET['page'] ?>" class="btn btn-primary">ย้อนกลับ</a>
      <hr class="mb-4">
      <div class="card-body">
        <?php
        if(isset($_GET['id']) && !empty($_GET['id'])){
          $id = $_GET['id'];
          $sql = "SELECT * FROM tbl_member WHERE m_id = '$id'";
          $query = mysqli_query($connection,$sql);
          $result = mysqli_fetch_assoc($query);
        }
        if (isset($_POST) && !empty($_POST)) {
          $email = $_POST['m_email'];
          $firstname = $_POST['m_firstname'];
          $lastname = $_POST['m_lastname'];
          $status = $_POST['status'];
          //echo sha1(md5($m_pass));
              $sql = "UPDATE tbl_member 
                      SET m_email='$email', m_firstname='$firstname', m_lastname='$lastname', status='$status'
                      WHERE m_id ='$id'";

              if (mysqli_query($connection, $sql)) {
                //echo "เพิ่มข้อมูลสำเร็จ";
                $alert = '<script type= "text/javascript">';
                $alert .= 'alert("อัพเดตข้อมูลสำเร็จ");';
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
            <input type="text" class="form-control" name="m_name" value="<?=$result['m_name'] ?>" autocomplete="off" require disabled>
          </div>
          <hr class="mb-4 mt-4">
          <label class="form-label">ชื่อ*</label>
          <div class="mb-3">
            <input type="text" class="form-control" name="m_firstname" placeholder="" value="<?=$result['m_firstname'] ?>" autocomplete="off" require>
          </div>
          <label class="form-label">นามสกุล*</label>
          <div class="mb-3">
            <input type="text" class="form-control" name="m_lastname" value="<?=$result['m_lastname'] ?>"  autocomplete="off" require>
          </div>
          <label class="form-label">อีเมล*</label>
          <div class="mb-3">
            <input type="email" class="form-control" name="m_email" value="<?=$result['m_email'] ?>" autocomplete="off" require>
          </div>
          <label class="form-label">สถานะ*</label>
          <div class="mb-3">
            <select name="status" class="form-control" value="<?=$result['status'] ?>" require>
              <option value="" selected="selected">- เลือกสถานะ -</option>
              <option value="1">ผู้จัดการ</option>
              <option value="2">พนักงาน</option>
            </select>
          </div>
          <div class="text-center">
            <button type="submit" name="save" class="btn bg-gradient-dark w-20 mt-4 mb-0">บันทึกข้อมูล</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</body>

</html>