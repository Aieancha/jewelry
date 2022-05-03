<!DOCTYPE html>
<html lang="en">

<body class="g-sidenav-show bg-gray-100">
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid">
      <!-- title -->
      <div class="row justify-content-between">
        <div class="col-auto">
          <h3 class="font-weight-bolder text-dark text-gradient ">ขั้นตอนการแก้ไขข้อมูลการจำนำเครื่องประดับ</h3>
        </div>
        <div class="col-auto">
          <a href="?page=<?= $_GET['page'] ?>" class="btn btn-primary">ย้อนกลับ</a>
        </div>
      </div>
      <!-- end title -->
      <hr class="mb-4">

      <div class="card-body">
      <?php
          if (isset($_POST) && !empty($_POST)){
          /* echo '<pre>';
          print_r($_FILES);
          echo '</pre>';
          exit(); */
            $social_name = $_POST['social_name'];
            $social_contact = $_POST['social_contact'];
            $price_img = $_POST['price_img'];

            /* if(isset($_FILES['s_img']['name'] ) && !empty($_FILES['s_img']['name'] )) {
              $extension = array("jpeg","jpg", "png");
              $target = 'admin/upload/social/';
              $filename = $_FILES['s_img']['name'];
              $filetmp = $_FILES['s_img']['name'];
              $ext = pathinfo($filename,PATHINFO_EXTENSION);
              if(in_array($ext,$extension)) {
                if(!file_exists($target.$filename)) {
                  if(move_uploaded_file($filetmp,$target.$filename)) {
                    $filename = $filename;
                  }else{
                    echo 'เพิ่มไฟล์ลงโฟลเดอร์ไม่สำเร็จ';
                  }
                }else{
                  $newfilename = time().$filename;
                  if(move_uploaded_file($filetmp,$target.$newfilename)) {
                    $filename = $newfilename;
                  }else {
                    echo 'เพิ่มไฟล์ลงโฟลเดอร์ไม่สำเร็จ';
                  }
                }
              }else{
                echo 'ประเภทไฟล์ไม่ถูกต้อง';
              }
            }else {
              $filename = '';
            }
            echo $filename;
            exit(); */

            $sql = "INSERT INTO tbl_social (social_name, social_contact, price_img)
                      VALUES ('$social_name', '$social_contact', '$price_img')";

            if (mysqli_query($connection, $sql)) {
              echo "เพิ่มข้อมูลสำเร็จ";
              
            } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            }

            mysqli_close($connection);
          }
            //print_r($_POST);
        ?>
        <script type="text/javascript"></script>
        <form action="" method="post" enctype= multipart/form-data >
          <h5 class="pb-5">กรอกข้อมูลผู้สนใจจำนำเครื่องประดับ</h5>
          <div class="mb-4 col-lg-5 ">
            <h6>ช่องทางการติดกต่อ*</h6>

            <div class="col-sm-12">
              <select name="social_contact" class="form-control">
                <option value="" selected="selected">- เลือกช่องทางการติดต่อ -</option>
                <option value="facebook">Facebook</option>
                <option value="line">Line</option>
              </select>
            </div>

          </div>
          <div class="mb-4 col-3 ">
            <h6>ชื่อผู้ใช้*</h6>
            <input type="text" class="form-control " name="social_name" placeholder="กรอกชื่อผู้ใช้ที่ติดต่อ" require autocomplete="off">
          </div>
          <div class="mb-4 col-3 ">
            <h6>ภาพถ่ายสินค้าจริง*</h6>
            <input type="file" id="myFile" name="s_img" multiple>
          </div>
          <div class="mb-3 col-3 ">
            <h6>ราคาประเมินจากภาพ</h6>
            <input type="number" min="0" name="price_img" class="form-control " placeholder="กรอกราคาประเมิน (หน่วยเป็นบาท)" require autocomplete="off">
          </div>
          <div class="ms-auto text-end ">
            <button type="submit" class="btn bg-gradient-dark">บันทึก</button>
            <a href="?page=<?=$_GET['page']?>&function=customr" class="btn btn-color1 bg-gradient-dark theme-btn mx-auto ">ดำเนินการต่อ</a>
          </div>
        </form>
      </div>



    </div>
  </div>
</body>

</html>