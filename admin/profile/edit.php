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
        /* echo '<pre>';
          print_r($_GET);
          echo '</pre>';
          exit(); */
        if (isset($_GET['m_id']) && !empty($_GET['m_id'])) {
          $id = $_GET['m_id'];
          $sql = "SELECT * FROM tbl_member WHERE m_id = '$id'";
          $query = mysqli_query($connection, $sql);
          $result = mysqli_fetch_assoc($query);
        }
        if (isset($_POST) && !empty($_POST)) {
          $name = $_POST['m_name'];
          $email = $_POST['m_email'];

          $sql = "UPDATE tbl_member SET m_name = '$name',m_email = '$email' WHERE m_id = '$id'";
          if (mysqli_query($connection, $sql)) {
            //echo "เพิ่มข้อมูลสำเร็จ";
            $alert = '<script type= "text/javascript">';
            $alert .= 'alert("แก้ไขข้อมูลสำเร็จ");';
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
        <form action="" method="post" enctype="multipart/form-data">
          <label class="form-label">ชื่อผู้ใช้*</label>
          <div class="mb-3">
            <input type="text" class="form-control" name="m_name" value="<?=$result['title']?>" require autocomplete="off" disabled>
          </div>
          <label class="form-label">อีเมล*</label>
          <div class="mb-3">
            <input type="email" class="form-control" name="m_email" value="<?=$result['m_email']?>" require autocomplete="off">
          </div>
          <div class="text-center">
            <button type="submit" class="btn bg-gradient-dark w-20 mt-4 mb-0">อัพเดตข้อมูล</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</body>

</html>