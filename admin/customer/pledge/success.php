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
                <div class="col-auto mb-5">
                <div class="col-auto">
                    <h3 class="font-weight-bolder text-dark text-gradient ">ขั้นตอนการบันทึกข้อมูลการจำนำเครื่องประดับ</h3>
                </div>
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
                <h5 class="pb-5">กรอกข้อมูลผู้สนใจจำนำเครื่องประดับ</h5>
                </div>
            </div>
            </div>     
                   
                    <div  class="d-flex flex-row">
            <div class="justify-content-start flex-fill ">
            </div>
            <div class="flex-fill d-flex justify-content-end gap-1" >
              <a href="#" class="btn btn-color1 btn-green3 theme-btn  pull-right">พิมพ์เอกสาร</a>
            
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