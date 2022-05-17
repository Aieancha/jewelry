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
        if (isset($_GET['id']) && !empty($_GET['id'])) {
          $id = $_GET['id'];
          $sql = "SELECT * FROM tbl_social WHERE s_id = '$id'";
          $query = mysqli_query($connection, $sql);
          $result = mysqli_fetch_assoc($query);
        }
        if (isset($_POST) && !empty($_POST)) {
          $social_name = $_POST['social_name'];
          $social_contact = $_POST['social_contact'];
          $price_img = $_POST['price_img'];
          $s_type = $_POST['s_type'];
          $s_name = $_POST['s_name'];
          $s_role = $_POST['s_role'];
          $s_lastname = $_POST['s_lastname'];
          $code = $_POST['code_id'];
          $age = $_POST['c_age'];
          $address = $_POST['c_address'];
          $phone = $_POST['phone'];
          $email = $_POST['c_email'];
          $principle = $_POST['principle'];
          $price_item = $_POST['price_item'];
          $mount = $_POST['r_mount'];
          $rate_name = $_POST['rate_name'];
          $c_date = $_POST['c_date'];

          if (isset($_FILES['c_img']['name']) && !empty($_FILES['c_img']['name'])) {
            $extension = array("jpeg", "jpg", "png");
            $target = 'upload/customer/';
            $filename = $_FILES['c_img']['name'];
            $filetmp = $_FILES['c_img']['tmp_name'];
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
          $sql = "UPDATE tbl_social 
          SET social_name='$social_name', social_contact='$social_contact', price_img='$price_img', s_name='$s_name', s_lastname='$s_lastname', s_role='$s_role'
          , code_id='$code', c_age='$age', c_address='$address', phone='$phone', principle='$principle', price_item='$price_item', c_email='$email', c_img='$filename', c_date='$c_date'
          , r_mount='$mount', rate_name='$rate_name'
          WHERE s_id ='$id'";


          if (mysqli_query($connection, $sql)) {
            //echo "เพิ่มข้อมูลสำเร็จ";
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("อัพเดตข้อมูลสำเร็จ");';
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
            <li class="step-wizard-item">
                <span class="progress-count">1</span>
                <span class="progress-label">รอประเมิน</span>
            </li>
            <li class="step-wizard-item current-item">
                <span class="progress-count">2</span>
                <span class="progress-label">รอร่างสัญญา</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count">3</span>
                <span class="progress-label">ทำรายการเสร็จ</span>
            </li>
            
        </ul>
          
            <h5 class="pb-4">กรอกข้อมูลผู้สนใจจำนำเครื่องประดับ</h5>
          </div>
          <div class="d-flex flex-row">
            <div class="justify-content-start flex-fill ">
              <div class=" mb-4 col-6 ">
                <h6 style="display: inline;">ช่องทางการติดต่อ :</h6>
                <select name="social_contact" class="form-control w-45" required>
                  <option value="" selected="selected">- เลือกช่องทางการติดต่อ -</option>
                  <option value="facebook">Facebook</option>
                  <option value="line">Line</option>
                </select>

              </div>
              <div class=" mb-4 col-6 ">
                <h6 style="display: inline;">ชื่อผู้ใช้ :</h6>
                <input type="text" class="form-control " name="social_name" value="<?= $result['social_name'] ?>" placeholder="กรอกชื่อผู้ใช้ที่ติดต่อ" autocomplete="off" required>
              </div>
              <div class=" mb-4 col-6 ">
                <h6 style="display: inline;">ภาพถ่ายสินค้าจริง</h6>
                <img src="upload/social/<?= $result['s_img'] ?>" alt="jewelry" width="300" height="200">
              </div>
              <div class=" mb-4 col-6 ">
                <h6 style="display: inline;">ราคาประเมินข้างต้น :</h6>
                <input type="number" min="0" name="price_img" class="form-control1 " value="<?= $result['price_img'] ?>" placeholder="กรอกราคาประเมิน (หน่วยเป็นบาท)" autocomplete="off">
              </div>
              <div class="mb-4 col-6 ">
                <h6>ราคาประเมินจากสินค้าจริง</h6>
                <input type="number" min="0" name="price_item" value="<?= $result['price_item'] ?>" class="form-control1 " placeholder="กรอกราคาประเมิน (หน่วยเป็นบาท)" autocomplete="off">
              </div>
              <div class="mb-4 col-6 ">
                <h6>ราคาที่ตกลงจำนำ</h6>
                <input type="number" min="0" name="principle" value="<?= $result['principle'] ?>" class="form-control1 " placeholder="กรอกราคาประเมิน (หน่วยเป็นบาท)" autocomplete="off">
              </div>
              <div class="mb-4 col-6" >
              <h5 class="" style="display: inline;">จำนวนงวดที่จำนำ</h5>
              <h5 class="form-label text-danger" style="display: inline;">*</h5>
              <input type="number" class="form-control " name="r_mount" value="<?= $result['r_mount'] ?> min="2" max="24" placeholder="สูงสุด 24 งวด" autocomplete="off" require>
            </div>
              <h5 class="" style="display: inline;">รูปแบบการชำระดอกเบี้ย</h5>
              <h5 class="form-label text-danger" style="display: inline;">*</h5>
              <div class="mb-4 col-12 ">
                <select name="rate_name" class="form-control w-60" require>
                  <option value="" selected="selected">เลือกรูปแบบการชำระ</option>
                  <option value="คิดดอกเบี้ยแบบจ่ายก่อน">คิดดอกเบี้ยแบบจ่ายก่อน</option>
                  <option value="คิดดอกเบี้ยแบบจ่ายทีหลัง">คิดดอกเบี้ยแบบจ่ายทีหลัง</option>
                  <option value="คิดดอกเบี้ยแบบโรงรับจำนำ">คิดดอกเบี้ยแบบโรงรับจำนำ</option>
                </select>
              </div>
              <div class="mb-4 col-3 ">
                <h6>ภาพยืนยันตัวตน*</h6>
                <img src="upload/customer/<?= $result['c_img'] ?>" alt="jewelry" width="300" height="200">
              </div>
              <div type="">
                <select name="s_role" require>
                  <option value="" selected="selected">- เลือกสถานะ -</option>
                  <option value="1">รอร่างสัญญา</option>
                  <option value="2">ผู้จำนำ</option>
                </select>
              </div>

            </div>
            <div class="justify-content-start flex-fill ">
              <div class=" mb-4 col-6 ">
                <h6 style="display: inline;">เลขสำคัญที่ราชการออกให้</h6>
                <h6 class="form-label text-danger" style="display: inline;">*</h6>
                <input type="text" class="form-control " name="code_id" value="<?= $result['code_id'] ?>" placeholder="กรอกเลขสำคัญที่ราชการออกให้ลูกค้า" autocomplete="off" require>
              </div>
              <div class=" mb-4 col-6 ">
                <h6 style="display: inline;">ชื่อ</h6>
                <h6 class="form-label text-danger" style="display: inline;">*</h6>
                <input type="text" class="form-control " name="s_name" value="<?= $result['s_name'] ?>" placeholder="กรอกชื่อจริงลูกค้า" autocomplete="off" require>
              </div>
              <div class=" mb-4 col-6 ">
                <h6 style="display: inline;">นามสกุล</h6>
                <h6 class="form-label text-danger" style="display: inline;">*</h6>
                <input type="text" class="form-control " name="s_lastname" value="<?= $result['s_lastname'] ?>" placeholder="กรอกนามสกุลลูกค้า" autocomplete="off" require>
              </div>
              <div class=" mb-4 col-6 ">
                <h6 style="display: inline;">อายุ</h6>
                <h6 class="form-label text-danger" style="display: inline;">*</h6>
                <input type="text" class="form-control1 " name="c_age" value="<?= $result['c_age'] ?>" placeholder="กรอกอายุ (ปี)" autocomplete="off" require>
              </div>
              <div class=" mb-4 col-10 ">
                <h6 style="display: inline;">ที่อยู่</h6>
                <h6 class="form-label text-danger" style="display: inline;">*</h6>
                <input type="text" class="form-control3 " name="c_address" value="<?= $result['c_address'] ?>" placeholder="กรอกที่อยู่ปัจจุบันลูกค้า" autocomplete="off" require>
              </div>
              <div class=" mb-4 col-6 ">
                <h6 style="display: inline;">เบอร์โทร</h6>
                <h6 class="form-label text-danger" style="display: inline;">*</h6>
                <input type="number" class="form-control2 " name="phone" value="<?= $result['phone'] ?>" pattern="^[0-9\s]+$" minlength="10" placeholder="กรอกเบอร์โทรศัพท์" autocomplete="off" require>
              </div>
              <div class=" mb-4 col-6 ">
                <h6 style="display: inline;">อีเมล</h6>
                <h6 class="form-label text-danger" style="display: inline;">*</h6>
                <input type="email" class="form-control " name="c_email" value="<?= $result['c_email'] ?>" placeholder="example@gmail.com" autocomplete="off" require>
              </div>
              <div class=" mb-4 col-6 ">
                <h6 style="display: inline;">วันที่ชำระงวดแรก</h6>
                <h6 class="form-label text-danger" style="display: inline;">*</h6>
                <input type="date" class="form-control " name="c_date" value="<?= $result['c_date'] ?>" placeholder="example@gmail.com" autocomplete="off" require>
              </div>
            </div>
          </div>

          <div class="d-flex flex-row">
            <div class="justify-content-start flex-fill ">
              
            </div>
            <div class="flex-fill d-flex justify-content-end gap-1">
              <button type="submit" class="btn btn-blue2 text-white pull-right ">บันทึก</button>
              <a href="?page=<?= $_GET['page'] ?>&function=contract&id=<?= $result['s_id'] ?>" class="btn btn-color1 btn-green3 text-white theme-btn  pull-right">ดำเนินการต่อ</a>

            </div>
        </form>
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
    color: rgb(111, 0, 96);
  }

  .progressBar li.active:before {
    border-color: rgb(111, 0, 96);
    background-color: rgb(111, 0, 96);

  }

    .progressBar .active:after {
        background-color: dodgerblue;
    }
     .form-control1 {
    display: block;
    width: 50%;
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.4rem;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d2d6da;
    appearance: none;
    border-radius: 0.5rem;
    transition: box-shadow 0.15s ease, border-color 0.15s ease;
}
.form-control2 {
    display: block;
    width: 75%;
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.4rem;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d2d6da;
    appearance: none;
    border-radius: 0.5rem;
    transition: box-shadow 0.15s ease, border-color 0.15s ease;
}
.form-control3 {
    display: block;
    width: 100%;
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.4rem;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d2d6da;
    appearance: none;
    border-radius: 0.5rem;
    transition: box-shadow 0.15s ease, border-color 0.15s ease;
}
.form-control1 {
    display: block;
    width: 50%;
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.4rem;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d2d6da;
    appearance: none;
    border-radius: 0.5rem;
    transition: box-shadow 0.15s ease, border-color 0.15s ease;
}
</style>