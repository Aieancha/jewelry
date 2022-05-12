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
                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM tbl_social WHERE s_id = '$id'";
                    $query = mysqli_query($connection, $sql);
                    $result = mysqli_fetch_assoc($query);
                }
                if (isset($_POST) && !empty($_POST)) {
                    $in_date = $_POST['in_date'];

                    if (isset($_FILES['in_img']['name']) && !empty($_FILES['in_img']['name'])) {
                        $extension = array("jpeg", "jpg", "png");
                        $target = 'upload/interest/';
                        $filename = $_FILES['in_img']['name'];
                        $filetmp = $_FILES['in_img']['tmp_name'];
                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                        if (in_array($ext, $extension)) {
                            if (!file_exists($target . $filename)) {
                                if (move_uploaded_file($filetmp, $target . $filename)) {
                                    $filename = $filename;
                                } else {
                                    echo 'เพิ่มข้อมูลลงโฟล์เดอร์ไม่สำเร็จ';
                                }
                            } else {
                                $newfilename = time() . $filename;
                                if (move_uploaded_file($filetmp, $target . $newfilename)) {
                                    $filename = $newfilename;
                                } else {
                                    echo 'เพิ่มข้อมูลลงโฟล์เดอร์ไม่สำเร็จ';
                                }
                            }
                        } else {
                            echo 'ประเภทไฟล์ไม่ถูกต้อง';
                        }
                    } else {
                        $filename = '';
                    }
                    $sql = "INSERT INTO tbl_interest (in_date, in_img) VALUES ('$in_date', '$filename')";

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
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xs-12 col-md-8 offset-md-2 pb-0">
                        </div>
                        <div class="d-flex flex-row">
                            <div class="justify-content-start flex-fill ">
                                <div class=" mb-4 col-10 ">
                                    <h6 style="display: inline;">เลขที่ราชการออกให้ :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['code_id'] ?></td>
                                </div>
                                <div class=" mb-4 ">
                                    <h6 style="display: inline;">ชื่อผู้จำนำ :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['s_name'] ?></td>
                                    <h6 style="display: inline;">นามสกุล :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['s_lastname'] ?></td>
                                </div>
                                <div class=" mb-4 col-10 ">
                                    <h6 style="display: inline;">รายละเอียดสินค้า</h6>
                                    <td width="25%" style="display: inline;"><?= $result['s_type'] ?></td>
                                </div>
                                <!-- <div class=" mb-4 col-10 ">
                                    <h6 style="display: inline;">วันที่กำหนดชำระ :</h6>
                                    <td width="25%" style="display: inline;">01/01/2565</td>
                                </div> -->
                            </div>
                            <div class="justify-content-start flex-fill ">
                                <div class=" mb-4 ">
                                    <h6 style="display: inline;">ช่องทางการติดต่อ :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['social_contact'] ?></td>
                                    <h6 style="display: inline;">ชื่อผู้ใช้ :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['social_name'] ?></td>
                                </div>
                                <div class=" mb-4 ">
                                    <h6 style="display: inline;">เงินที่ต้องจ่ายต่องวด :</h6>
                                    <td width="25%" style="display: inline;"><?= ($result['principle'] * 0.02) ?> บาท</td>
                                </div>
                                <div class=" mb-4 ">
                                    <h6 style="display: inline;">จำนวนงวดที่ต้องชำระ :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['r_mount'] ?> เดือน</td>
                                    <!-- <h6 style="display: inline;">จำนวนงวดที่เหลือ :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['r_mount'] ?> เดือน</td> -->
                                </div>
                            </div>

                        </div>
                <div class="row">
                <div class="col-xs-12 col-md-8 offset-md-2 pb-0">
                </div>
    <div class="card mb-4">
    <div class="card-body">
    <h4 class="mb-4" >ข้อมูลการจำนำ</h4>
        <div class="d-flex flex-row" >
            <div class="justify-content-start flex-fill ">
                    <div class=" mb-3 col-10 " >
                        <h6 style="display: inline;">เลขที่ราชการออกให้ผู้จำนำ :</h6>
                        <td width="25%" style="display: inline;">1349901025750</td>
                    </div>
                    <div class=" mb-3 ">
                        <h6 style="display: inline;">ชื่อผู้จำนำ :</h6><td width="25%" style="display: inline;">วรรณวษา</td>
                        <h6 style="display: inline;">นามสกุล :</h6><td width="25%" style="display: inline;">ทรัพย์อินทร์</td>
                    </div>
                    <div class=" mb-3 col-10 ">
                        <h6 style="display: inline;">รายละเอียดสินค้า :</h6>
                        <td width="25%" style="display: inline;">สร้อยคอทองคำ พร้อมจี้ 1 บาท</td>
                    </div>
                    <div class="  col-10 ">
                        <h6 style="display: inline;">วันที่กำหนดชำระ :</h6>
                        <td width="25%" style="display: inline;">01/01/2565</td>
                    </div>
            </div>
            <div class="justify-content-start flex-fill ">
            <div class=" mb-3 " >
                        <h6 style="display: inline;">ช่องทางการติดต่อ :</h6><td width="25%" style="display: inline;">Facebook</td>
                        <h6 style="display: inline;">ชื่อผู้ใช้ :</h6><td width="25%" style="display: inline;">Pam Wanwasa</td>
                    </div>    
                    <div class=" mb-3 ">
                        <h6 style="display: inline;">เงินที่ต้องจ่ายต่องวด :</h6>
                        <td width="25%" style="display: inline;">120 บาท</td>
                    </div><div class=" mb-3 ">
                        <h6 style="display: inline;">จำนวนงวดที่ชำระเเล้ว :</h6><td width="25%" style="display: inline;">3 เดือน</td>
                        <h6 style="display: inline;">จำนวนงวดที่เหลือ :</h6><td width="25%" style="display: inline;">9 เดือน</td>
                    </div>
                    <div class="bg-white mb-6">
                        <h5 class="mb-4 m-5 ">หลักฐานการชำระค่างวด</h5>
                        <div class="d-flex flex-row">
                            <div class="justify-content-start flex-fill ">
                            <div class=" mb-4 ">
                                        <h6 style="display: inline;">จำนวนเงิน</h6>
                                        <input type="number" min="0" id="myFile" name="in_date" required> บาท
                                    </div>
                                <div class=" mb-4 col-10 ">
                                    <h6>แนบภาพหลักฐานการชำระค่างวด</h6>
                                    <input type="file" id="myFile" name="in_img" multiple required>
                                </div>
                            </div>
                            <div class="justify-content-start flex-fill ">
                                <div class=" mb-4 ">
                                    <div class=" mb-4 ">
                                        <h6 style="display: inline;">วัน-เวลาโอน</h6>
                                        <input type="datetime-local" id="myFile" name="in_date" required>
                                    </div>
                                    <!-- <div class=" mb-4 ">
                                        <h6 style="display: inline;">วันที่กำหนดชำระ</h6>
                                        <input type="date" id="myFile" name="created_date" required>
                                    </div> -->
                                    <button type="submit" href="#" class="btn bg-gradient-dark text-end">บันทึก</button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div>

                    </div>
                    <h5 class="mb-4 m-5 ">ประวัติการโอน</h5>

                    <div class="card-body overflow-auto p-3 bg-white" style="text-align: center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">รอบการชำระ</th>
                                    <th scope="col">ชื่อผู้จำนำ</th>
                                    <th scope="col">จำนวนเงินที่ชำระ</th>
                                    <th scope="col">สถานะ</th>
                                    <th scope="col">รายละเอียดการโอน</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                $sql = "SELECT * FROM tbl_interest INNER JOIN tbl_social
                                ON tbl_interest.in_id = tbl_social.s_id WHERE in_id ='$id'";
                                $query = mysqli_query($connection, $sql);
                                $i = 0;
                                foreach ($query as $data) : ?>
                                    <tr>
                                        <td><?= ++$i ?></td>
                                        <td><?= $data['in_date'] ?></td>
                                        <td>#</td>
                                        <td><?= $data['s_name'] ?></td>
                                        <td>#</td>
                                        <td> <a href="?page=<?= $_GET['page'] ?>&function=updated&id=<?= $data['s_id'] ?>" class="btn btn-sm btn-dark">ดูรายละเอียด</a>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <a href="?page=<?= $_GET['page'] ?>&function=customr" class="btn btn-color1 bg-gradient-primary theme-btn  pull-right">ย้อนกลับ</a>
                  
            </div>
        </div>
        <h4 style="margin-left: 30px;" >หลักฐานการชำระค่างวด</h4>
        <div class="bg-gray1 mb-3 ">
        <div class="d-flex flex-row m-3" >
            <div class="justify-content-start flex-fill col-5" style="margin-left:3rem">
                    <div class="">
                    <h6 >แนบภาพหลักฐานการชำระค่างวด</h6>
                    <input type="file" id="myFile" name="s_img" multiple required>
          </div>
            </div>
            <div class="justify-content-start flex-fill col-6" >
                    <div class=" mb-3 col-5">
                        <h6 style="display: inline;">วันที่ชำระค่างวด</h6>
                        <input  class="form-control " placeholder="วัน/เดือน/ปี" autocomplete="off">
                    </div>
            </div>
            <div class="col-3 mt-4">
            <a href="#" class="col-6 btn btn-green3 text-white">บันทึก</a>
            </div>
        </div>
            </div>
            </div> 
    </div>               
        <div> 
        </div>
<div class="card ">
    <div class="card-body"> 
    <h4 >ประวัติการโอน</h4>
        <div class="card-body overflow-auto p-3 bg-white" style="text-align: center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">วันที่ชำระ</th>
                            <th scope="col">รหัสผู้จำนำ</th>
                            <th scope="col">รหัสสินค้า</th>
                            <th scope="col">จำนวนเงินที่ชำระ</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">รายละเอียดการโอน</th>
                        </tr>
                    </thead>
                    
        </table>
    </div>
</div>           
        </div>
        <a href="?page=<?= $_GET['page'] ?>&function=customr" class="btn btn-sm btn-dark text-white">ย้อนกลับ</a>
        <a href="?page=<?= $_GET['page'] ?>&function=detailsIn" class="btn btn-sm btn-blue2 text-white">รายละเอียดการโอน</a>  
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