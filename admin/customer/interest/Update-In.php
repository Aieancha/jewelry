<!DOCTYPE html>
<html lang="en">

<body class="g-sidenav-show bg-gray-100">
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid">
            <!-- title -->
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h3 class="font-weight-bolder text-dark text-gradient ">การจัดการการชำระดอกเบี้ย</h3>
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
                <div class="col-xs-12 col-md-8 offset-md-2 pb-0">
                </div>
        <div class="d-flex flex-row" >
            <div class="justify-content-start flex-fill ">
                    <div class=" mb-4 col-10 " >
                        <h6 style="display: inline;">เลขที่ราชการออกให้ :</h6>
                        <td width="25%" style="display: inline;">1349901025750</td>
                    </div>
                    <div class=" mb-4 ">
                        <h6 style="display: inline;">ชื่อผู้จำนำ :</h6><td width="25%" style="display: inline;">วรรณวษา</td>
                        <h6 style="display: inline;">นามสกุล :</h6><td width="25%" style="display: inline;">ทรัพย์อินทร์</td>
                    </div>
                    <div class=" mb-4 col-10 ">
                        <h6 style="display: inline;">รายละเอียดสินค้า</h6>
                        <td width="25%" style="display: inline;">สร้อยคอทองคำ พร้อมจี้ 1 บาท</td>
                    </div>
                    <div class=" mb-4 col-10 ">
                        <h6 style="display: inline;">วันที่กำหนดชำระ :</h6>
                        <td width="25%" style="display: inline;">01/01/2565</td>
                    </div>
            </div>
            <div class="justify-content-start flex-fill ">
            <div class=" mb-4 " >
                        <h6 style="display: inline;">ช่องทางการติดต่อ :</h6><td width="25%" style="display: inline;">Facebook</td>
                        <h6 style="display: inline;">ชื่อผู้ใช้ :</h6><td width="25%" style="display: inline;">Pam Wanwasa</td>
                    </div>    
                    <div class=" mb-4 ">
                        <h6 style="display: inline;">เงินที่ต้องจ่ายต่องวด :</h6>
                        <td width="25%" style="display: inline;">120 บาท</td>
                    </div><div class=" mb-4 ">
                        <h6 style="display: inline;">จำนวนงวดที่ชำระเเล้ว :</h6><td width="25%" style="display: inline;">3 เดือน</td>
                        <h6 style="display: inline;">จำนวนงวดที่เหลือ :</h6><td width="25%" style="display: inline;">9 เดือน</td>
                    </div>
                    </div>
                   
            </div>
        </div>
        <div class="bg-white mb-6">
            <h5 class="mb-4 m-5 " >หลักฐานการชำระค่างวด</h5>
        <div class="d-flex flex-row" >
            <div class="justify-content-start flex-fill ">
                    <div class=" mb-4 col-10 ">
                    <h6 >แนบภาพหลักฐานการชำระค่างวด</h6>
                    <input type="file" id="myFile" name="s_img" multiple required>
          </div>
            </div>
            <div class="justify-content-start flex-fill ">
            <div class=" mb-4 " >
                    <div class=" mb-4 ">
                        <h6 style="display: inline;">วันที่ชำระค่างวด</h6>
                        <td width="25%" style="display: inline;">120 บาท</td>
                    </div>
                        <a href="#" class="btn bg-gradient-dark text-end">บันทึก</a>
            </div>       
            </div>
        </div>
            </div>
               
            
            
        <div> 

        </div>
        <h5 class="mb-4 m-5 " >ประวัติการโอน</h5>
            
        <div class="card-body overflow-auto p-3 bg-white" style="text-align: center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">รอบการชำระ</th>
                            <th scope="col">รหัสผู้จำนำ</th>
                            <th scope="col">ชื่อผู้จำนำ</th>
                            <th scope="col">รหัสสินค้าที่จำนำ</th>
                            <th scope="col">จำนวนเงินที่ชำระ</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">รายละเอียดการโอน</th>
                        </tr>
                    </thead>
                </table>
        </div>  
        <a href="?page=<?= $_GET['page'] ?>&function=customr" class="btn btn-color1 bg-gradient-primary theme-btn  pull-right">ย้อนกลับ</a>
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