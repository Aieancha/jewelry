<?php
/* ------------------ */
$code = "A";
$yearMonth = substr(date("Y") + 543, -2) . date("m");

//query MAX ID 
$sqli = "SELECT MAX(o_id) AS o_code FROM tbl_orders";
$qry = mysqli_query($connection, $sqli) or die("Error Query [" . $sqli . "]");
$rs = mysqli_fetch_assoc($qry);
$maxId = substr($rs['o_code'], -5);  //ข้อมูลนี้จะติดรหัสตัวอักษรด้วย ตัดเอาเฉพาะตัวเลขท้ายนะครับ
if ($maxId == '') {
  $maxId = 1;
} else {
  $maxId = ($maxId + 1);
}
$maxId = substr("00000" . $maxId, -5);
$nextId = $code . $yearMonth . $maxId;
/* จบ id สินค้า */

$id = $_SESSION['s_id']; 
	$sql = "SELECT * FROM tbl_social WHERE s_id = '$id'"; 
	$query = mysqli_query($connection, $sql); 
	$result = mysqli_fetch_assoc($query);  
  $s_id=$id;

if (isset($_POST) && !empty($_POST)) {
  $type = $_POST['o_type'];
  $price = $_POST['o_price'];
  $detail = $_POST['o_detail'];

  if (isset($_FILES['img3']['name']) && !empty($_FILES['img3']['name'])) {
    $extension = array("jpeg", "jpg", "png");
    $target = '../images/social/';
    $filename3 = $_FILES['img3']['name'];
    $filetmp = $_FILES['img3']['tmp_name'];
    $ext = pathinfo($filename3, PATHINFO_EXTENSION);
    if (in_array($ext, $extension)) {
      if (!file_exists($target . $filename3)) {
        if (move_uploaded_file($filetmp, $target . $filename3)) {
          $filename3 = $filename3;
        } else {
          $alert = '<script type="text/javascript">';
          $alert .= 'alert("เพิ่มไฟล์เข้าโฟลเดอร์ไม่สำเร็จ");';
          $alert .= 'window.location.href = "?page=admin&function=insert";';
          $alert .= '</script>';
          echo $alert;
          exit();
        }
      } else {
        $newfilename3 = time() . $filename3;
        if (move_uploaded_file($filetmp, $target . $newfilename3)) {
          $filename3 = $newfilename3;
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
    $filename3 = '';
  }
  /* img1 */
  if (isset($_FILES['img1']['name']) && !empty($_FILES['img1']['name'])) {
    $extension = array("jpeg", "jpg", "png");
    $target = '../images/social/';
    $filename1 = $_FILES['img1']['name'];
    $filetmp = $_FILES['img1']['tmp_name'];
    $ext = pathinfo($filename1, PATHINFO_EXTENSION);
    if (in_array($ext, $extension)) {
      if (!file_exists($target . $filename1)) {
        if (move_uploaded_file($filetmp, $target . $filename1)) {
          $filename1 = $filename1;
        } else {
          $alert = '<script type="text/javascript">';
          $alert .= 'alert("เพิ่มไฟล์เข้าโฟลเดอร์ไม่สำเร็จ");';
          $alert .= 'window.location.href = "?page=admin&function=insert";';
          $alert .= '</script>';
          echo $alert;
          exit();
        }
      } else {
        $newfilename1 = time() . $filename1;
        if (move_uploaded_file($filetmp, $target . $newfilename1)) {
          $filename1 = $newfilename1;
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
    $filename1 = '';
  }
  /* img2 */
  if (isset($_FILES['img2']['name']) && !empty($_FILES['img2']['name'])) {
    $extension = array("jpeg", "jpg", "png");
    $target = '../images/social/';
    $filename2 = $_FILES['img2']['name'];
    $filetmp = $_FILES['img2']['tmp_name'];
    $ext = pathinfo($filename2, PATHINFO_EXTENSION);
    if (in_array($ext, $extension)) {
      if (!file_exists($target . $filename2)) {
        if (move_uploaded_file($filetmp, $target . $filename2)) {
          $filename1 = $filename1;
        } else {
          $alert = '<script type="text/javascript">';
          $alert .= 'alert("เพิ่มไฟล์เข้าโฟลเดอร์ไม่สำเร็จ");';
          $alert .= 'window.location.href = "?page";';
          $alert .= '</script>';
          echo $alert;
          exit();
        }
      } else {
        $newfilename2 = time() . $filename2;
        if (move_uploaded_file($filetmp, $target . $newfilename2)) {
          $filename2 = $newfilename2;
        } else {
          $alert = '<script type="text/javascript">';
          $alert .= 'alert("เพิ่มไฟล์เข้าโฟลเดอร์ไม่สำเร็จ");';
          $alert .= 'window.location.href = "?page";';
          $alert .= '</script>';
          echo $alert;
          exit();
        }
      }
    } else {
      echo 'ประเภทไฟล์ไม่ถูกต้อง';
      $alert = '<script type="text/javascript">';
      $alert .= 'alert("ประเภทไฟล์ไม่ถูกต้อง");';
      $alert .= 'window.location.href = "?page";';
      $alert .= '</script>';
      echo $alert;
      exit();
    }
  } else {
    $filename2 = '';
  }
  //echo $filename;
  //exit();
  //$sql = "UPDATE tbl_order SET o_type ='$type',o_price='$price',img3='$filename3',img1='$filename1',img2='$filename2',0_detail='$detail',o_code='$nextId' WHERE s_id = '$id'";
  $sql = "INSERT INTO tbl_orders ( o_type, o_price, img3, img1, img2, o_detail,o_code,s_id)
  VALUES ( '$type', '$price','$filename3', '$filename1', '$filename2','$detail','$nextId','$s_id')";


  if (mysqli_query($connection, $sql)) {
    //echo "เพิ่มข้อมูลสำเร็จ";
    $alert = '<script type="text/javascript">';
    $alert .= 'alert("เพิ่มข้อมูลสำเร็จ");';
    $alert .= 'window.location.href = "?function=check";';
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


<body class="app">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="row g-0 app-wrapper app-auth-wrapper">
      <div class="app-auth-body mx-auto ">
        <div style="margin-top: 1rem">
          <div class="app-auth-branding text-center"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/PW-logo.png" alt="logo"></a></div>
          <label class="mb-3">Jewelry Pawn</label>
        </div>
      </div>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
          <div class="container-xl ">
            <h3 class="">แบบฟอร์มยื่นจำนำเครื่องประดับ</h3>
          </div>
          <input class="form-control " type="hidden" name="ref_img" value="<?php $nextId ?>" required>
          <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
            <div class="row gy-4">
              <div class="col-12 ">
                <h6 class=" m-3">กรอกข้อมูลเครื่องประดับที่ต้องการยื่นจำนำ</h6>
              </div>
              <div class="mb-3 col-12 center">
                <h6 style="display: inline;">รายละเอียดสินค้า</h6>
                <h5 class="form-label text-danger" style="display: inline;">*</h5>
                <select name="o_type" class="form-control center2" required>
                  <option value="" selected="selected">เลือกประเภทเครื่องประดับ</option>
                  <option value="ทองคำ(Gold)">ทองคำ(Gold)</option>
                  <option value="ทองคำขาว(Platinum)">ทองคำขาว(Platinum)</option>
                  <option value="ทองชมพู(Pink Gold)">ทองชมพู(Pink Gold)</option>
                  <option value="นาก(Red Gold)">นาก(Red Gold)</option>
                  <option value="ทองขาว(white Gold)">ทองขาว(white Gold)</option>
                  <option value="อื่นๆ">อื่นๆ</option>
                </select>
              </div>
              <div class="mb-3 col-12 center3">
                <h6 style="display: inline;">รายละเอียดเครื่องประดับ</h6>
                <h5 class="form-label text-danger " style="display: inline;">*</h5>
                <div class="col-7">
                  <label style="font-size: 0.5rem;">กรุณากรอกน้ำหนัก อัญมณี ตำหนิ(ถ้ามี)</label>
                  <input type="text" class="form-control center1" name="o_detail" placeholder="" autocomplete="off">
                </div>
              </div>
              <div class="mb-3 col-12 center">
                <h6 style="display: inline;">ราคาที่ต้องการจำนำ</h6>
                <div class="col-7">
                  <input type="number" class="form-control " name="o_price" placeholder="หน่วยเป็นบาท" autocomplete="off">
                </div>
              </div>
              <div class="mb-3 col-12 center">
                <div class=" col-12 " style="margin-top: 2;">
                  <h6 style="display: inline;">ภาพถ่ายสินค้าจริง</h6>
                  <h5 class="form-label text-danger " style="display: inline;">*</h5>
                  <div class="mb-3">
                    <label>ภาพถ่ายสินค้าจริงด้านหน้า / ด้านบน</label>
                    <input type="file" id="myFile" name="img3" accept="image/png, image/jpeg, image/jpg" multiple required>
                  </div>
                  <div class="mb-3">
                    <label>ภาพถ่ายสินค้าจริงด้านหลัง / ด้านล่าง</label>
                    <input type="file" id="myFile" name="img1" accept="image/png, image/jpeg, image/jpg" multiple>
                  </div>
                  <div class="mb-3">
                    <label>ภาพถ่ายสินค้าจริงด้านข้าง</label>
                    <input type="file" id="myFile" name="img2" accept="image/png, image/jpeg, image/jpg" multiple>
                  </div>
                </div>
              </div>
            </div>

            <div class="app-card-footer p-4 mt-auto" style="margin-left: 60%">
              <button type="submit" class="btn app-btn-secondary ">บันทึก</button>
            </div>

          </div>
          <!--//app-card-footer-->
        </div>

      </div>
      <!--//app-card-header-->
    </form>
    <!-- Javascript -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>

</body>

</html>
<style>
  .center {
    margin-left: 6%;
    width: 50%;
    height: 14% !important;
  }

  .center1 {
    width: 100%;
    height: 14% !important;
  }

  .center2 {
    width: 10rem;
    height: 14% !important;
  }

  .center3 {
    margin-left: 6%;
    width: 100%;
    height: 14% !important;
  }

  .app-card .app-icon-holder {
    display: inline-block;
    background: #9b0e2140;
    color: #9b0e21;
    width: 50px;
    height: 50px;
    padding-top: 10px;
    font-size: 1rem;
    text-align: center;
    border-radius: 50% !important
  }

  .app-auth-wrapper {
    background: #f5f6fd;
    height: 100px !important
  }

  .app-auth-wrapper .app-auth-body {
    width: auto !important
  }