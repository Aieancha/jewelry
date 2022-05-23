<!DOCTYPE html>
<html lang="en">
<?php
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
//echo $nextId;
?>



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
            if (isset($_POST) && !empty($_POST)) {
              $facebook = $_POST['c_facebook'];
              $line = $_POST['c_line'];
              $img_price = $_POST['price_img'];
              $type = $_POST['o_type'];
              //$nextId = $_POST['ref_img'];
              $detail = $_POST['o_detail'];
              $price = $_POST['o_price'];
              $status = $_SESSION["userlevel"];

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
                      $alert .= 'window.location.href = "?page=admin&function=insert";';
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
                $filename2 = '';
              }

              $sql = "INSERT INTO tbl_social (c_facebook, c_line, price_img)
                      VALUES ('$facebook', '$line','$img_price')";
              $result = $connection->query($sql);
              if ($result) {
                //insert id of users table
                $s_id = $connection->insert_id;
                $sqli = "INSERT INTO tbl_orders ( o_type, o_price, img3, img1, img2, o_detail,o_code,s_id,lavel)
VALUES ( '$type', '$price','$filename3', '$filename1', '$filename2','$detail','$nextId','$s_id','$status')";
              }
              if ( mysqli_query($connection, $sqli)) {
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
            <form action="" method="post" enctype="multipart/form-data">
              <ul class="step-wizard-list">
                <li class="step-wizard-item current-item">
                  <span class="progress-count">1</span>
                  <span class="progress-label">รอประเมิน</span>
                </li>
                <li class="step-wizard-item ">
                  <span class="progress-count">2</span>
                  <span class="progress-label">รอร่างสัญญา</span>
                </li>
                <li class="step-wizard-item">
                  <span class="progress-count">3</span>
                  <span class="progress-label">ทำรายการเสร็จ</span>
                </li>

              </ul>
              </section>
              <div class=" mb-3 ">
                <h4 class="pb-5">กรอกข้อมูลผู้สนใจจำนำเครื่องประดับ</h4>
              </div>
              <div class="d-flex flex-row">
                <div class="justify-content-start col-6 ">

                  <div class="mb-3">
                    <div class="mb-3">
                      <h5 style="display: inline;">ช่องทางการติดต่อ</h5>
                      <h5 class="form-label text-danger" style="display: inline;">*</h5>
                    </div>
                    <div class="mb-3 col-6 ">
                      <h6 style="display: inline;">ไอดีไลน์ลูกค้า </h6>
                      <!-- <h6 class="form-label text-danger" style="display: inline;">*</h6> -->
                      <input type="text" class="form-control " name="c_facebook" placeholder="กรอกไอดีไลน์ลูกค้า" autocomplete="off">
                    </div>
                  </div>
                  <div class="mb-5 col-6 ">
                    <h6 style="display: inline;">ชื่อผู้ใช้เฟซบุ๊ก</h6>
                    <!-- <h6 class="form-label text-danger" style="display: inline;">*</h6> -->
                    <input type="text" class="form-control " name="c_line" placeholder="กรอกชื่อผู้ใช้เฟสบุ้ค" autocomplete="off">
                  </div>
                  <div class="mb-12">
                    <div class="mb-3">
                      <h5 style="display: inline;">ประเภทสินทรัพย์จำนำ</h5>
                      <!-- <h5 class="form-label text-danger" style="display: inline;">*</h5> -->
                    </div>
                    <div class="mb-4 col-10 ">
                      <h6 style="display: inline;">ประเภทเครื่องประดับ </h6>
                      <h6 class="form-label text-danger" style="display: inline;">*</h6>
                      <input type="text" class="form-control " name="o_type" placeholder="กรอกประเภทเครื่องประดับ" autocomplete="off" required>
                    </div>
                    <div class="mb-4 col-10 ">
                      <h6 style="display: inline;">รายละเอียดเครื่องประดับ</h6>
                      <h6 class="form-label text-danger" style="display: inline;">*</h6>
                      <input type="text" class="form-control " name="o_detail" placeholder="กรอกรายละเอียดเครื่องประดับ" autocomplete="off" required>
                    </div>
                  </div>

                </div>
                <div class="justify-content-start col-6 ">
                  <div class="mb-5 col-12 " style="margin-left: 3 rem;">
                    <div class="mb-4">
                      <h5 style="display: inline;">ภาพถ่ายสินค้าจริง</h5>
                      <h5 class="form-label text-danger" style="display: inline;">*</h5>
                      <label class="form-label text-danger" >เพิ่มรูปภาพอย่างน้อย 1 ภาพ</label>
                    </div>
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
                  <div class="mb-3">
                      <h5 style="display: inline;">การประเมินราคา</h5>
                    </div>
                  <div class="mb-3 col-12 ">
                    <h6 style="display: inline;">ราคาที่ลูกค้าต้องการจำนำ</h6><label style="display: inline;">(ถ้ามี)</label>
                    <div class="col-4">
                      <input type="number" min="0" name="o_price" class="form-control " placeholder="10000 บาท" autocomplete="off">
                      <!-- <input class="form-control " type="hidden" name="ref_img" value="<?php echo $nextId ?>" required> -->
                    </div>
                  </div>
                  <div class="mb-3 col-12 ">
                    <h6>ราคาประเมินจากภาพ</h6>
                    <div class="col-3">
                      <input type="number" min="0" name="price_img" class="form-control " placeholder="กรอกราคาประเมิน (หน่วยเป็นบาท)" autocomplete="off">
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex flex-row">
                <div class="justify-content-start flex-fill " style="margin-left:3rem;">
                  <a href="?page=<?= $_GET['page'] ?>" class="btn btn-dark ">ย้อนกลับ</a>
                </div>
                <div class="flex-fill d-flex justify-content-end gap-1" style="margin-right:3rem;">
                  <button type="submit" class="btn btn-blue2 text-white pull-right">บันทึก</button>
                  <a href="?page=<?= $_GET['page'] ?>&function=customr" class="btn btn-color1 btn-green3 text-white theme-btn  pull-right">ดำเนินการต่อ</a>
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