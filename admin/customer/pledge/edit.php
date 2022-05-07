<!DOCTYPE html>
<html lang="en">

<body class="g-sidenav-show bg-gray-100">
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid">
      <!-- title -->
      <div class="row justify-content-between">
        <div class="col-auto">
          <h3 class="font-weight-bolder text-dark text-gradient ">ขั้นตอนการบันทึกข้อมูลการจำนำเครื่องประดับ</h3>
        </div>
        
      </div>
      <!-- end title -->
      <hr class="mb-4">

      <div class="card-body">
        <?php
        if (isset($_POST) && !empty($_POST)) {
          /* echo '<pre>';
          print_r($_FILES);
          echo '</pre>';
          exit(); */
          $social_name = $_POST['social_name'];
          $social_contact = $_POST['social_contact'];
          $price_img = $_POST['price_img'];
          $s_type = $_POST['s_type'];

          if (isset($_FILES['s_img']['name']) && !empty($_FILES['s_img']['name'])) {
            $extension = array("jpeg", "jpg", "png");
            $target = 'upload/social/';
            $filename = $_FILES['s_img']['name'];
            $filetmp = $_FILES['s_img']['tmp_name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (in_array($ext, $extension)) {
              if (!file_exists($target . $filename)) {
                if (move_uploaded_file($filetmp, $target . $filename)) {
                  $filename = $filename;
                } else {
                  $alert = '<script type="text/javascript">';
                  $alert .= 'alert("เพิ่มไฟล์เข้าโฟลเดอร์ไม่สำเร็จ");';
                  $alert .= 'window.location.href = "?page=admin&function=insert";';
                  $alert .= '</script>';
                  echo $alert;
                  exit();
                }
              } else {
                $newfilename = time() . $filename;
                if (move_uploaded_file($filetmp, $target . $newfilename)) {
                  $filename = $newfilename;
                } else {
                  $alert = '<script type="text/javascript">';
                  $alert .= 'alert("เพิ่มไฟล์เข้าโฟลเดอร์ไม่สำเร็จ");';
                  $alert .= 'window.location.href = "?page=admin&function=insert";';
                  $alert .= '</script>';
                  echo $alert;
                  exit();
                }
              }
            } else {
              echo 'ประเภทไฟล์ไม่ถูกต้อง';
              $alert = '<script type="text/javascript">';
              $alert .= 'alert("ประเภทไฟล์ไม่ถูกต้อง");';
              $alert .= 'window.location.href = "?page=admin&function=insert";';
              $alert .= '</script>';
              echo $alert;
              exit();
            }
          } else {
            $filename = '';
          }
          //echo $filename;
          //exit();
          $sqli = "UPDATE tbl_social 
          SET social_name='$social_name', social_contact='$social_contact', price_img='$price_img'
          WHERE s_id ='$id'";
          $sql = "INSERT INTO tbl_customer (code_id, firstname, lastname, c_age, c_address, phone, c_email, c_img, principle,price_item)
          VALUES ('$code', '$firstname', '$lastname', '$age','$address', '$phone', '$email', '$filename','$principle','$price_item')";


          if (mysqli_query($connection, $sqli, $sql)) {
            //echo "เพิ่มข้อมูลสำเร็จ";
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("เพิ่มข้อมูลสำเร็จ");';
            $alert .= 'window.location.href = "?page=pledge";';
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
        <form action="" method="post" enctype=multipart/form-data>
          <h5 class="pb-5">กรอกข้อมูลผู้สนใจจำนำเครื่องประดับ</h5>
          <div class="mb-4 col-lg-5 t ">
            <h6 style="display: inline;">ช่องทางการติดต่อ</h6><h6 class="form-label text-danger" style="display: inline;">*</h6>

            <div class="col-sm-12">
              <select name="social_contact" class="form-control w-45" required>
                <option value="" selected="selected">- เลือกช่องทางการติดต่อ -</option>
                <option value="facebook">Facebook</option>
                <option value="line">Line</option>
              </select>
            </div>
            <!-- end title -->

          </div>
          <div class="mb-4 col-3 ">
            <h6 style="display: inline;">ชื่อผู้ใช้</h6><h6 class="form-label text-danger" style="display: inline;">*</h6>
            <input type="text" class="form-control " name="social_name" placeholder="กรอกชื่อผู้ใช้ที่ติดต่อ" autocomplete="off" required>
          </div>
          <div class="mb-4 col-3 ">
            <h6 style="display: inline;">ประเภทสินทรัพย์จำนำ</h6><h6 class="form-label text-danger" style="display: inline;">*</h6>
            <input type="text" class="form-control " name="s_type" placeholder="สินทรัพย์ที่ใช้จำนำ"  autocomplete="off" required>
          </div>
          <div class="mb-4 col-3 ">
            <h6 style="display: inline;">ภาพถ่ายสินค้าจริง</h6><h6 class="form-label text-danger" style="display: inline;">*</h6>
            <input type="file" id="myFile" name="s_img" multiple required>
          </div>
          <div class="mb-3 col-3 ">
            <h6 >ราคาประเมินจากภาพ</h6>
            <input type="number" min="0" name="price_img" class="form-control " placeholder="กรอกราคาประเมิน (หน่วยเป็นบาท)" autocomplete="off" required>
          </div>
          <div class="mb-3 col-3 ">
            <h6 >ราคาประเมินจากภาพ</h6>
            <input type="number" min="0" name="price_item" class="form-control " placeholder="กรอกราคาประเมิน (หน่วยเป็นบาท)" autocomplete="off" required>
          </div>
          <div class="ms-auto text-end">
            <a href="?page=<?= $_GET['page'] ?>" class="btn btn-dark pull-left" style="text-align:left;">ย้อนกลับ</a>
            <button type="submit" class="btn bg-gradient-dark pull-right">บันทึก</button>
            <a href="?page=<?= $_GET['page'] ?>&function=customr" type="submit" class="btn btn-color1 bg-gradient-primary theme-btn mx-auto pull-right">ดำเนินการต่อ</a>
          </div>
        </form>
      </div>



    </div>
  </div>
</body>

</html>