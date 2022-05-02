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
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $age = $_POST['c_age'];
            $address = $_POST['c_address'];
            $phone = $_POST['phone'];
            $email = $_POST['c_email'];
            $img = $_POST['c_img'];

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
                <form action="" method="post" enctype=multipart/form-data>
                    <h5 class="pb-5">กรอกข้อมูลผู้สนใจจำนำเครื่องประดับ</h5>
                    <div class=" mb-4 col-3 ">
                        <h6>ชื่อ</h6>
                        <input type="text" class="form-control " placeholder="Pam Wanwasa" require autocomplete="off" >
                    </div>
                    <div class=" mb-4 col-3 ">
                        <h6>นามสกุล</h6>
                        <input type="text" class="form-control " placeholder="Pam Wanwasa" require autocomplete="off">
                    </div>
                    <div class=" mb-4 col-3 ">
                        <h6>อายุ</h6>
                        <input type="text" class="form-control " placeholder="Pam Wanwasa" require autocomplete="off">
                    </div>
                    <div class=" mb-4 col-3 ">
                        <h6>ที่อยู่</h6>
                        <input type="text" class="form-control " placeholder="Pam Wanwasa" require autocomplete="off">
                    </div>
                    <div class=" mb-4 col-3 ">
                        <h6>เบอร์โทร</h6>
                        <input type="tel" class="form-control " placeholder="Pam Wanwasa" require autocomplete="off">
                    </div>
                    <div class=" mb-4 col-3 ">
                        <h6>อีเมล</h6>
                        <input type="email" class="form-control " placeholder="Pam Wanwasa" require autocomplete="off">
                    </div>
                    <div class="mb-4 col-3 ">
                        <h6>ราคาประเมินจากสินค้าจริง*</h6>
                        <input type="number" min="0" class="form-control " placeholder="กรอกราคาประเมินจากสินค้าจริง" require autocomplete="off">
                    </div>
                    <div class="mb-3 col-3 ">
                        <h6>ราคาที่ตกลงจำนำ</h6>
                        <input type="number" min="0" class="mb-3 form-control " placeholder="กรอกราคาที่ตกลงจำนำ " require autocomplete="off">
                    </div>
                    <div class="ms-auto text-end ">
                        <button type="button" class="btn bg-gradient-dark">บันทึก</button>
                        <a href="../data-page/data-pawn3.php" class="btn btn-color1 bg-gradient-dark theme-btn mx-auto ">ดำเนินการต่อ</a>
                    </div>
                </form>
            </div>



        </div>
    </div>
</body>

</html>