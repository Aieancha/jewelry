<!DOCTYPE html>
<html lang="en">
<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_social INNER JOIN tbl_orders ON tbl_social.s_id=tbl_orders.s_id 
                INNER JOIN tbl_bill ON tbl_orders.s_id =tbl_bill.s_id WHERE tbl_bill.s_id = '$id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
}
if (isset($_POST["submit"])) {
    $date=date("Y-m-d");
    if (isset($_FILES['bill_img']['name']) && !empty($_FILES['bill_img']['name'])) {
        $extension = array("jpeg", "jpg", "png");
        $target = '../images/bill/';
        $filename = $_FILES['bill_img']['name'];
        $filetmp = $_FILES['bill_img']['tmp_name'];
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
    $sqlIns = "UPDATE tbl_bill SET bill_img ='$filename',create_date ='$date' WHERE tbl_bill.s_id ='$id'";

    if (mysqli_query($connection, $sqlIns)) {
        //echo "เพิ่มข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("อัพเดตสัญญาที่มีการลงนามสำเร็จ");';
        $alert .= 'window.location.href = "";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sqlIns . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
}

//print_r($_POST);
?>

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

            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="mb-4">เลขที่สัญญา: <?= $result['bill_no'] ?></h4>
                    <div class="d-flex flex-row mb-6">
                        <div class="justify-content-start flex-fill ">
                            <div class=" mb-3 col-10 ">
                                <h6 style="display: inline;">เลขที่ราชการออกให้ผู้จำนำ :</h6>
                                <td width="25%" style="display: inline;"><?= $result['code_id'] ?></td>
                            </div>
                            <div class=" mb-3 ">
                                <h6 style="display: inline;">ชื่อผู้จำนำ :</h6>
                                <td width="25%" style="display: inline;"><?= $result['s_name'] ?></td>
                                <h6 style="display: inline;">นามสกุล :</h6>
                                <td width="25%" style="display: inline;"><?= $result['s_lastname'] ?></td>

                            </div>
                            <div class=" mb-3 ">
                                <h6 style="display: inline;">จำนวนเงินต้น :</h6>
                                <td width="25%" style="display: inline;"><?= number_format($result['principle']) ?> บาท</td>
                            </div>
                            <div class=" mb-3 ">
                                <h6 style="display: inline;">จำนวนดอกเบี้ยทั้งหมด :</h6>
                                <td width="25%" style="display: inline;"><?= number_format($result['principle'] * 0.02 * $result['r_mount']) ?> บาท</td>
                            </div>
                        </div>
                        <div class="justify-content-start flex-fill ">
                            <div class=" mb-3 ">
                                <h6 style="display: inline;">เบอร์โทร :</h6>
                                <td width="25%" style="display: inline;"><?= $result['phone'] ?></td>
                            </div>
                            <div class=" mb-3 ">
                                <h6 style="display: inline;">เงินที่ต้องจ่ายต่องวด :</h6>
                                <td width="25%" style="display: inline;"><?= number_format(($result['principle'] * 0.02)) ?> บาท</td>
                            </div>
                            <div class=" mb-3  ">
                                <h6 style="display: inline;">จำนวนงวดที่ต้องชำระ :</h6>
                                <td width="25%" style="display: inline;"><?= $result['r_mount'] ?> เดือน</td>
                            </div>
                        </div>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <h4 style="margin-left: 30px;">อัปโหลดหลักฐานสัญญาที่มีการลงนามเรียบร้อยแล้ว</h4>
                        <div class="bg-gray1 mb-3 ">
                            <div class="d-flex flex-row m-3">
                                <div class="justify-content-start flex-fill col-5" style="margin-left:3rem">
                                    <div class="col-10 mt-4">
                                        <h6>แนบภาพหลักฐานสัญญาการลงนาม</h6>
                                        <input class="form-control " type="file" id="myFile" name="bill_img" accept="image/png, image/jpeg, image/jpg" required>

                                    </div>
                                </div>
                                <div class="col-3 mt-5">
                                    <button type="submit" name="submit" class="col-6 btn btn-green3 text-white">บันทึก</button>
                                </div>
                    </form>

                </div>
            </div>
            <?php
            echo "<a href='javascript:window.history.back()' class='btn btn-sm btn-dark text-white'>ย้อนกลับ</a>";
            ?>
            <a href="?page=<?= $_GET['page'] ?>&function=SuccessContract&id=<?= $result['o_id'] ?>" class="btn btn-sm btn-blue2 text-white">รายละเอียดการอัปโหลด</a>

        </div>
    </div>
    <div>

    </div>

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