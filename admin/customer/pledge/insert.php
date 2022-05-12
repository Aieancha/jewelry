<!DOCTYPE html>
<html lang="en">

<body class="g-sidenav-show bg-gray-100">
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid">
      <!-- title -->
      <div class="row justify-content-between">
        

      </div>
      <!-- end title -->
      <div class="card mb-3">
            <div class="card-body">
                <div class="col-auto mb-3">
                <div class="col-auto">
          <h3 class="font-weight-bolder text-dark text-gradient ">ขั้นตอนการบันทึกข้อมูลการจำนำเครื่องประดับ</h3>
        </div>
        <?php
         
        if (isset($_POST['submit']) && !empty($_POST)) {
          /* echo '<pre>';
          print_r($_FILES);
          echo '</pre>';
          exit(); */
          /* $social_name = $_POST['social_name'];
          $social_contact = $_POST['social_contact'];
          $price_img = $_POST['price_img'];
          $s_type = $_POST['s_type']; */

          /* *********************************************** */
          /* if (isset($_FILES['s_img']['name']) && !empty($_FILES['s_img']['name'])) {
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
          } */
          /* *********************************************** */
          //echo $filename;
          //exit();
          
            $extension = array("jpeg", "jpg", "png");
            $location = "upload/social/";
            $social_name = $_POST['social_name'];
            $social_contact = $_POST['social_contact'];
            $price_img = $_POST['price_img'];
            $s_type = $_POST['s_type'];
            $file1 = $_FILES['img1']['name'];
            $file_tmp1 = $_FILES['img1']['tmp_name'];
            $file2 = $_FILES['img2']['name'];
            $file_tmp2 = $_FILES['img2']['tmp_name'];
            $file3 = $_FILES['img3']['name'];
            $file_tmp3 = $_FILES['img3']['tmp_name'];
            $data = [];
            $data = [$file1, $file2, $file3];
            $images = implode(' ', $data);
            $query = "INSERT INTO tbl_social (social_name, social_contact, price_img, s_type, s_img) VALUES ('$social_name', '$social_contact', '$price_img', '$s_type', '$images')";
            $fire = mysqli_query($connection, $query);
            if ($fire) {
              move_uploaded_file($file_tmp1, $location . $file1);
              move_uploaded_file($file_tmp2, $location . $file2);
              move_uploaded_file($file_tmp3, $location . $file3);
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
        <form action="" method="post" enctype="multipart/form-data">
          <ul class="step-wizard-list">
            <li class="step-wizard-item current-item">
                <span class="progress-count">1</span>
                <span class="progress-label">รอประเมิน</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">2</span>
                <span class="progress-label">รอร่างสัญญา</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">3</span>
                <span class="progress-label">ทำรายการเสร็จ</span>
            </li>
            
        </ul>
            
            <h4 class="pb-3">กรอกข้อมูลผู้สนใจจำนำเครื่องประดับ</h4>
          </div>
          <div class="mb-3 col-lg-5 t ">
            <h5 style="display: inline;">ช่องทางการติดต่อ</h5><h5 class="form-label text-danger" style="display: inline;">*</h5>
            <div class="col-sm-12">
              <select name="social_contact" class="form-control w-40" required>
                <option value="" selected="selected">เลือกช่องทางการติดต่อ</option>
                <option value="facebook">Facebook</option>
                <option value="line">Line</option>
              </select>
              
            </div>
            <!-- end title -->

          </div>
          <div class="mb-4 col-3 ">
            <h5 style="display: inline;">ชื่อผู้ใช้</h5>
            <h5 class="form-label text-danger" style="display: inline;">*</h5>
            <input type="text" class="form-control " name="social_name" placeholder="กรอกชื่อผู้ใช้ที่ติดต่อ" autocomplete="off" required>
          </div>
          <div class="mb-3 col-3 ">
            <h5 style="display: inline;">ประเภทสินทรัพย์จำนำ</h5>
            <h5 class="form-label text-danger" style="display: inline;">*</h5>
            <input type="text" class="form-control " name="s_type" placeholder="สินทรัพย์ที่ใช้จำนำ" autocomplete="off" required>
          </div>
          <div class="mb-3 col-3 ">
            <h5 style="display: inline;">ภาพถ่ายสินค้าจริง</h5>
            <h5  class="form-label text-danger" style="display: inline;">*</h5>
            <input type="file"  id="myFile" name="img1" multiple required>
            &nbsp;
            <input type="file" id="myFile" name="img2" multiple>
            &nbsp;
            <input type="file" id="myFile" name="img3" multiple>
          </div>
          <div class="mb-3 col-3 ">
            <h5>ราคาประเมินจากภาพ</h5>
            <input type="number" min="0" name="price_img" class="form-control1 " placeholder="กรอกราคาประเมิน (หน่วยเป็นบาท)" autocomplete="off">
          </div>

      
      <div class="d-flex flex-row ">
      <div class="justify-content-start flex-fill ">
      <div class="flex-fill d-flex justify-content-end gap-1">
        <button type="submit" class="btn btn-blue2 pull-right text-white ">บันทึก</button>
        <a href="?page=<?= $_GET['page'] ?>&function=customr" class="btn btn-color1 btn-green3 text-white theme-btn  pull-right">ดำเนินการต่อ</a>
      </div> 
      </div>
      </div>
      </form>
    </div>
    </div>
   
  </div>
      </div>

  </div>
  </div>
</body>

</html>
<style>
  .wrapper-progressBar {
    width: 100%
  }

  .progressBar {
    font-size: 1em;
  }

  .progressBar li {
    list-style-type: none;
    float: left;
    width: 30%;
    position: relative;
    text-align: center;
  }

  .progressBar li:before {
    content: " ";
    line-height: 30px;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    border: 1px solid;
    display: block;
    text-align: center;
    margin: 0 auto 10px;
    background-color: white
  }

  .progressBar li:after {
    content: "";
    position: absolute;
    width: 100%;
    height: 4px;
    background-color: #ddd;
    top: 15px;
    left: -50%;
    z-index: -1;
  }

  .progressBar li:first-child:after {
    content: none;
  }

  .progressBar li.active {
    color: hsl(0, 100%, 16%);
  }

  .progressBar li.active:before {
    border-color: hsl(0, 100%, 16%);
    background-color: hsl(0, 100%, 16%);

  }

  .progressBar .active:after {
    background-color: dodgerblue;
  }
</style>