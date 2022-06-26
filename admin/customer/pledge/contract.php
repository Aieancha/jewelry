<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_orders INNER JOIN tbl_social ON tbl_orders.s_id=tbl_social.s_id WHERE o_id = '$id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
}

if (isset($_POST) && !empty($_POST)) {
    $numId = $_POST['bill_no'];
    $code = "B";
    $yearMonth = substr(date("Y") + 543, -2) . date("m");
    //query MAX ID 
    $sqli = "SELECT MAX(bill_id) AS bill_no FROM tbl_bill";
    $qry = mysqli_query($connection, $sqli) or die("Error Query [" . $sqli . "]");
    $rs = mysqli_fetch_assoc($qry);
    $maxId = substr($rs['bill_no'], -5);  //ข้อมูลนี้จะติดรหัสตัวอักษรด้วย ตัดเอาเฉพาะตัวเลขท้ายนะครับ
    //$maxId = 237;   //<--- บรรทัดนี้เป็นเลขทดสอบ ตอนใช้จริงให้ ลบ! ออกด้วยนะครับ
    //$maxId = ($maxId + 1); 
    if ($maxId == '') {
        $maxId = 1;
    } else {
        $maxId = ($maxId + 1);
    }
    $maxId = substr("00000" . $maxId, -5);
    $numId = $code . $yearMonth . $maxId;
    $num=$result['s_id'];
    $sqlinsert = "INSERT INTO tbl_bill (bill_no,s_id) VALUES ('$numId','$num') ";
    mysqli_query($connection, "UPDATE tbl_orders SET o_role = 2 WHERE o_id='$id'");

    if (mysqli_query($connection, $sqlinsert)) {
        //echo "เพิ่มข้อมูลสำเร็จ";
        $alert = '<script type= "text/javascript">';
        $alert .= 'alert("ร่างสัญญาสำเร็จ");';
        $alert .= 'window.location.href = "?page=pledge&function=success&id=' . $result['o_id'] . '";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}
mysqli_close($connection);
?>


<!DOCTYPE html>
<html lang="en">

<body class="g-sidenav-show bg-gray-100">
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid">

            <div class="card-body">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="col-auto mb-3">
                            <div class="col-auto">
                                <h3 class="font-weight-bolder text-dark text-gradient ">ขั้นตอนการบันทึกข้อมูลการจำนำเครื่องประดับ</h3>
                            </div>


                            <script type="text/javascript"></script>
                            <form action="" method="post" enctype="multipart/form-data">
                                <ul class="step-wizard-list">
                                    <li class="step-wizard-item">
                                        <span class="progress-count">1</span>
                                        <span class="progress-label">รอประเมิน</span>
                                    </li>
                                    <li class="step-wizard-item">
                                        <span class="progress-count">2</span>
                                        <span class="progress-label">รอร่างสัญญา</span>
                                    </li>
                                    <li class="step-wizard-item">
                                        <span class="progress-count">3</span>
                                        <span class="progress-label">ทำรายการเสร็จ</span>
                                    </li>

                                </ul>

                                <h5 class="pb-5">ตรวจสอบความถูกต้องของข้อมูล</h5>
                        </div>

                        <div class="d-flex flex-row">
                            <div class="justify-content-start flex-fill ">
                            <div class=" mb-4 col-10 ">
                                    <h6 style="display: inline;">ราคาที่ลูกค้าต้องการจำนำ :</h6>
                                    <td width="25%" style="display: inline;"><?= number_format($result['o_price']) ?> บาท</td>
                                </div>
                                <div class=" mb-4 col-10 ">
                                    <h6 style="display: inline;">ราคาประเมินข้างต้น :</h6>
                                    <td width="25%" style="display: inline;"><?= number_format($result['price_img']) ?> บาท</td>
                                </div>
                                <div class=" mb-4 col-10 ">
                                    <h6 style="display: inline;">ราคาประเมินจากสินค้าจริง:</h6>
                                    <td width="25%" style="display: inline;"><?= number_format($result['price_item']) ?> บาท</td>
                                </div>
                                <div class=" mb-4 col-10 ">
                                    <h6 style="display: inline;">ราคาที่ตกลงจำนำ:</h6>
                                    <td width="25%" style="display: inline;"><?= number_format($result['principle']) ?> บาท</td>
                                </div>
                                <div class=" mb-4 ">
                                    <h6 style="display: inline;">จำนวนงวด :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['r_mount'] ?> เดือน</td>
                                </div>
                                <div class=" mb-4 ">
                                    <h6 style="display: inline;">ดอกเบี้ย :</h6>
                                    <td width="25%" style="display: inline;"><?= number_format($result['principle'] * 0.02 * $result['r_mount']) ?> บาท</td>
                                </div>
                                <div class=" mb-4 ">
                                    <h6 style="display: inline;">เงินที่ต้องจ่ายต่องวด :</h6>
                                    <td width="25%" style="display: inline;"><?= number_format($result['principle'] * 0.02) ?> บาท</td>
                                </div>

                            </div>
                            <div class="justify-content-start flex-fill ">
                                <div class=" mb-4 ">
                                    <h6 style="display: inline;">บัตรประจำตัวประชาชน/หนังสือเดินทาง :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['code_id'] ?></td>
                                </div>
                                <div class=" mb-4 ">
                                    <h6 style="display: inline;">ชื่อผู้จำนำ :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['s_name'] ?></td>
                                    <h6 style="display: inline;">นามสกุล :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['s_lastname'] ?></td>
                                </div>
                                <div class=" mb-4 ">
                                    <h6 style="display: inline;">ที่อยู่ปัจจุบัน :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['c_address'] ?></td>
                                </div>
                                <div class=" mb-4 ">
                                    <h6 style="display: inline;">รหัสสินค้า:</h6>
                                    <td width="25%" style="display: inline;"><?= $result['o_code'] ?></td>
                                </div>
                                <div class=" mb-4">
                                    <h6 style="display: inline;">รายละเอียดสินค้า:</h6>
                                    <td width="25%" style="display: inline;"><?= $result['o_type'] ?></td>
                                </div>
                                <div class=" mb-6">
                                    <h6 style="display: inline;">รูปแบบการชำระ:</h6>
                                    <td width="25%" style="display: inline;"><?= $result['rate_name'] ?></td>
                                </div>

                            </div>

                        </div>

                        <form action="" method="POST">
                            <div class="d-flex flex-row">
                                <!-- <div class="justify-content-start flex-fill ">
                    <a href="?page=<?= $_GET['page'] ?>&function=updated" class="btn bg-gradient-dark">ย้อนกลับ</a>
                </div> -->
                                <div class="flex-fill d-flex justify-content-end gap-1">
                                    <input class="form-control " type="hidden" name="bill_no" value="<?php echo $numtId ?>" required>
                                    <button type="submit" class="btn btn-color1 btn-green3 text-white theme-btn  pull-right">ร่างสัญญา</button>
                                </div>
                            </div>

                        </form>
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