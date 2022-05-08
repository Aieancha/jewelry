
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
          , code_id='$code', c_age='$age', c_address='$address', phone='$phone', principle='$principle', price_item='$price_item', c_email='$email', c_img='$filename'
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
          <div class="row">
            <div class="col-xs-12 col-md-8 offset-md-2 pb-5">
              <div class="wrapper-progressBar ">
                <ul class="progressBar">
                  <li class="active">บันทึกข้อมูลผู้สนใจจำนำ</li>
                  <li class="active">ประเมินราคาเครื่องประดับ</li>
                  <li>ร่างสัญญา</li>
                </ul>
              </div>
            </div>
            <h5 class="pb-5">กรอกข้อมูลผู้สนใจจำนำเครื่องประดับ</h5>
          </div>
          <div class="d-flex flex-row">
            <div class="justify-content-start flex-fill ">
              <div class=" mb-4 col-6 ">
                <h6 style="display: inline;">ช่องทางการติดต่อ :</h6>
                <select name="social_contact"  class="form-control w-45" required >
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
                <input type="number" min="0" name="price_img" class="form-control " value="<?= $result['price_img'] ?>" placeholder="กรอกราคาประเมิน (หน่วยเป็นบาท)" autocomplete="off">
              </div>
              <div class="mb-4 col-6 ">
                <h6>ราคาประเมินจากสินค้าจริง</h6>
                <input type="number" min="0" name="price_item" value="<?= $result['price_item'] ?>" class="form-control " placeholder="กรอกราคาประเมิน (หน่วยเป็นบาท)" autocomplete="off">
              </div>
              <div class="mb-3 col-6 ">
                <h6>ราคาที่ตกลงจำนำ</h6>
                <input type="number" min="0" name="principle" value="<?= $result['principle'] ?>" class="form-control " placeholder="กรอกราคาประเมิน (หน่วยเป็นบาท)" autocomplete="off">
              </div>
              <div class="mb-3 col-6 text-end">
                <a href="?page=<?= $_GET['page'] ?>&function=calculate&id=<?= $result['s_id'] ?>" class="btn btn-color1 bg-white theme-btn  pull-right">คำนวณ</a>
              </div>
              <div class="mb-4 col-3 ">
                <h6>ภาพยืนยันตัวตน*</h6>
                <input type="file" id="myFile" name="c_img" multiple required>
              </div>
              <div type="hidden">
                <select type="hidden" name="s_role" require>
                  <option value="1" selected></option>
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
                <input type="text" class="form-control " name="c_age" value="<?= $result['c_age'] ?>" placeholder="กรอกนามสกุลลูกค้า" autocomplete="off" require>
              </div>
              <div class=" mb-4 col-6 ">
                <h6 style="display: inline;">ที่อยู่</h6>
                <h6 class="form-label text-danger" style="display: inline;">*</h6>
                <input type="text" class="form-control " name="c_address" value="<?= $result['c_address'] ?>" placeholder="กรอกที่อยู่ปัจจุบันลูกค้า" autocomplete="off" require>
              </div>
              <div class=" mb-4 col-6 ">
                <h6 style="display: inline;">เบอร์โทร</h6>
                <h6 class="form-label text-danger" style="display: inline;">*</h6>
                <input type="number" class="form-control " name="phone" value="<?= $result['phone'] ?>" pattern="^[0-9\s]+$" minlength="10" placeholder="กรอกเบอร์โทรศัพท์ลูกค้า" autocomplete="off" require>
              </div>
              <div class=" mb-4 col-6 ">
                <h6 style="display: inline;">อีเมล</h6>
                <h6 class="form-label text-danger" style="display: inline;">*</h6>
                <input type="email" class="form-control " name="c_email" value="<?=$result['c_email'] ?>" placeholder="example@gmail.com" autocomplete="off" require>
              </div>
            </div>
          </div>

          <div class="d-flex flex-row">
            <div class="justify-content-start flex-fill ">
              <a href="?page=<?= $_GET['page'] ?>" class="btn bg-gradient-dark">ย้อนกลับ</a>
            </div>
            <div class="flex-fill d-flex justify-content-end gap-1">
              <button type="submit" class="btn bg-gradient-dark pull-right ">บันทึก</button>
              <a href="?page=<?= $_GET['page'] ?>&function=contract&id=<?= $result['s_id'] ?>" class="btn btn-color1 bg-gradient-primary theme-btn  pull-right">ดำเนินการต่อ</a>

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
</style>