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
                    $code = $_POST['code_id'];
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
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
                                    $alert .= 'window.location.href = "?page=admin&function=customr";';
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
                                    $alert .= 'window.location.href = "?page=admin&function=customr";';
                                    $alert .= '</script>';
                                    echo $alert;
                                    exit();
                                }
                            }
                        } else {
                            echo 'ประเภทไฟล์ไม่ถูกต้อง';
                            $alert = '<script type="text/javascript">';
                            $alert .= 'alert("ประเภทไฟล์ไม่ถูกต้อง");';
                            $alert .= 'window.location.href = "?page=admin&function=customr";';
                            $alert .= '</script>';
                            echo $alert;
                            exit();
                        }
                    } else {
                        $filename = '';
                    }

                    $sql = "INSERT INTO tbl_customer (code_id, firstname, lastname, c_age, c_address, phone, c_email, c_img, principle,price_item)
                                    VALUES ('$code', '$firstname', '$lastname', '$age','$address', '$phone', '$email', '$filename','$principle','$price_item')";

                    if (mysqli_query($connection, $sql)) {
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
                <h4 class="pb-5">กรอกข้อมูลผู้สนใจจำนำเครื่องประดับ</h4>
                </div>
        <div class="d-flex flex-row" >
            <div class="justify-content-start flex-fill ">
                    <div class=" mb-4 col-6 " >
                        <h5 style="display: inline;">ช่องทางการติดต่อ :</h5>
                        <td width="25%" style="display: inline;">Facebook</td>
                    </div>
                    <div class=" mb-4 col-6 ">
                        <h5 style="display: inline;">ชื่อผู้ใช้ :</h5>
                        <td width="25%" style="display: inline;">Pam Wanwasa</td>
                    </div>
                    <div class=" mb-4 col-6 ">
                        <h5 style="display: inline;">ภาพถ่ายสินค้าจริง</h5>
                        <img  src=""alt="jewelry" width="304" height="228"></div>
                    <div class=" mb-4 col-6 ">
                    <h5 style="display: inline;">ราคาประเมินข้างต้น :</h5>
                    <td width="25%" style="display: inline;">10000 บาท</td>
                </div>
                    <div class="mb-4 col-6 ">
                        <h5>ราคาประเมินจากสินค้าจริง</h5>
                        <input type="number" min="0" name="price_img" class="form-control " placeholder="กรอกราคาประเมิน (หน่วยเป็นบาท)" autocomplete="off" required>
                    </div>
                    <div class="mb-3 col-6 ">
                        <h5>ราคาที่ตกลงจำนำ</h5>
                        <input type="number" min="0" name="price_img" class="form-control " placeholder="กรอกราคาประเมิน (หน่วยเป็นบาท)" autocomplete="off" required>
                    </div>
                    <div class="mb-3 col-6 text-center">
                        <a href="#" class="btn bg-gradient-white">คำนวณดอกเบี้ย</a>
                    </div>
                    
                    
               
            </div>
            <div class="justify-content-start flex-fill ">
                    <div class="mb-4 col-6 ">
                        <h5>ภาพยืนยันตัวตน*</h5>
                        <input type="file" id="myFile" name="c_img" multiple required>
                    </div>
                    <div class=" mb-4 col-6 ">
                        <h5 style="display: inline;">เลขสำคัญที่ราชการออกให้</h5><h5 class="form-label text-danger" style="display: inline;">*</h5>
                        <input type="text" class="form-control " name="firstname" placeholder="กรอกเลขสำคัญที่ราชการออกให้ลูกค้า" autocomplete="off" require>
                    </div>
                    <div class=" mb-4 col-6 ">
                        <h5 style="display: inline;">ชื่อ</h5><h5 class="form-label text-danger" style="display: inline;">*</h5>
                        <input type="text" class="form-control " name="firstname" placeholder="กรอกชื่อจริงลูกค้า" autocomplete="off" require>
                    </div>
                    <div class=" mb-4 col-6 ">
                        <h5 style="display: inline;">นามสกุล</h5><h5 class="form-label text-danger" style="display: inline;">*</h5>
                        <input type="text" class="form-control " name="lastname" placeholder="กรอกนามสกุลลูกค้า" autocomplete="off" require>
                    </div>
                    <div class=" mb-4 col-6 ">
                        <h5 style="display: inline;">ที่อยู่</h5><h5 class="form-label text-danger" style="display: inline;">*</h5>
                        <input type="text" class="form-control " name="c_address" placeholder="กรอกที่อยู่ปัจจุบันลูกค้า" autocomplete="off" require>
                    </div>
                    <div class=" mb-4 col-6 ">
                        <h5 style="display: inline;">เบอร์โทร</h5><h5 class="form-label text-danger" style="display: inline;">*</h5>
                        <input type="number" class="form-control " name="phone" pattern="^[0-9\s]+$" minlength="10" placeholder="กรอกเบอร์โทรศัพท์ลูกค้า" autocomplete="off" require>
                    </div>
                    <div class=" mb-4 col-6 ">
                        <h5 style="display: inline;">อีเมล</h5><h5 class="form-label text-danger" style="display: inline;">*</h5>
                        <input type="email" class="form-control " name="c_email" placeholder="example@gmail.com" autocomplete="off" require>
                    </div>
            </div>
        </div>     
                   
                    <div  class="d-flex flex-row">
            <div class="justify-content-start flex-fill ">
              <a href="?page=<?=$_GET['page']?>&function=insert" class="btn bg-gradient-dark">ย้อนกลับ</a>
            </div>
            <div class="flex-fill d-flex justify-content-end gap-1" >
              <button type="submit" class="btn bg-gradient-dark pull-right ">บันทึก</button>
              <a href="?page=<?= $_GET['page'] ?>&function=contract" class="btn btn-color1 bg-gradient-primary theme-btn  pull-right">ดำเนินการต่อ</a>
            
          </div>
                </form>
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
  font-size : 1em;
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
    border: 1px solid ;
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