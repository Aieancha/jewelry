<!DOCTYPE html>
<html lang="en">

<body class="g-sidenav-show bg-gray-100">
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid">
            <!-- title -->
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h3 class="font-weight-bolder text-dark text-gradient ">รายละเอียดข้อมูลลูกค้า</h3>
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
                </div>
                </div>
        <div class="d-flex flex-row" >
            <div class="justify-content-start flex-fill ">
                    <div class=" mb-4 " >
                        <h4 style="display: inline;">ข้อมูลลูกค้า</h4>
                    </div>
                    <div class=" mb-4 " >
                        <h6 style="display: inline;">เลขที่ราชการออกให้ :</h6>
                        <td width="25%" style="display: inline;">1349901025750</td>
                    </div>
                    <div class=" mb-4 ">
                        <h6 style="display: inline;">ชื่อผู้จำนำ :</h6><td width="25%" style="display: inline;">วรรณวษา</td>
                        <h6 style="display: inline;">นามสกุล :</h6><td width="25%" style="display: inline;">ทรัพย์อินทร์</td>
                    </div>
                    <div class=" mb-4 ">
                        <h6 style="display: inline;">ที่อยู่ปัจจุบัน :</h6>
                        <td width="25%" style="display: inline;">79/154 ต บางเลน อ บางใหญ่ จ นนทบุรี 11140</td>
                    </div>
                    <div class=" mb-4 col-6 " >
                        <h6 style="display: inline;">ช่องทางการติดต่อ :</h6>
                        <td width="25%" style="display: inline;">Facebook</td>
                    </div>
                    <div class=" mb-4 col-10 ">
                        <h6 style="display: inline;">ชื่อผู้ใช้ :</h6>
                        <td width="25%" style="display: inline;">Pam Wanwasa</td>
                    </div>
                    <div class=" mb-5 col-10 ">
                        <h6 style="display: inline;">หลักฐานการยืนยันตัวตน</h6>
                        <img  src=""alt="IDcard" width="304" height="228">
                    </div> 
                    <div class=" mb-4 " >
                        <h4 style="display: inline;">ข้อมูลเครื่องประดับ</h4>
                    </div>
                    <div class=" mb-4 ">
                        <h6 style="display: inline;">รหัสสินค้า:</h6>
                        <td width="25%" style="display: inline;">A12345</td>
                    </div>
                    <div class=" mb-4">
                        <h6 style="display: inline;">รายละเอียดสินค้า:</h6>
                        <td width="25%" style="display: inline;">สร้อยคอทองคำ พร้อมจี้ 1 บาท</td>
                    </div>
                    <div class=" mb-4 col-10 ">
                        <h6 style="display: inline;">ภาพถ่ายสินค้าจริง</h6>
                        <img  src=""alt="jewelry" width="304" height="228"></div>      
            </div>
            <div class="justify-content-start flex-fill ">
            <div class=" mb-4 " >
                        <h4 style="display: inline;">ข้อมูลการจำนำ</h4>
                    </div>      
                    <div class=" mb-4 col-10 ">
                        <h6 style="display: inline;">ราคาประเมินข้างต้น :</h6>
                        <td width="25%" style="display: inline;">10000 บาท</td>
                    </div>
                    <div class=" mb-4 col-10 ">
                        <h6 style="display: inline;">ราคาประเมินจากสินค้าจริง:</h6>
                        <td width="25%" style="display: inline;">15000 บาท</td>
                    </div>
                    <div class=" mb-4 col-10 ">
                        <h6 style="display: inline;">ราคาที่ตกลงจำนำ:</h6>
                        <td width="25%" style="display: inline;">13000 บาท</td>
                    </div>
                    <div class=" mb-4 ">
                        <h6 style="display: inline;">จำนวนงวด     :</h6>
                        <td width="25%" style="display: inline;">12 เดือน</td>
                    </div>
                    <div class=" mb-4 ">
                        <h6 style="display: inline;">ดอกเบี้ย     :</h6>
                        <td width="25%" style="display: inline;">1200 บาท</td>
                    </div>
                    <div class=" mb-4 ">
                        <h6 style="display: inline;">เงินที่ต้องจ่ายต่องวด :</h6>
                        <td width="25%" style="display: inline;">120 บาท</td>
                    </div>
                    
                    </div>
                   
            </div>
        </div>     
                   
                    <div  class="d-flex flex-row">
            <div class="justify-content-start flex-fill ">
            </div>
            <div class="flex-fill d-flex justify-content-end gap-1" >
                <a href="?page=<?=$_GET['page']?>&function=index" class="btn bg-gradient-dark">ย้อนกลับ</a>
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