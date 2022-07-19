<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sqlRow = "SELECT * FROM tbl_interest INNER JOIN tbl_social ON tbl_social.s_id = tbl_interest.ref_id
    INNER JOIN tbl_orders ON tbl_social.s_id = tbl_orders.s_id
                            INNER JOIN tbl_bill ON tbl_interest.ref_id = tbl_bill.s_id 
                            WHERE tbl_bill.bill_id ='$id'";
    $row = mysqli_query($connection, $sqlRow);
    $Num_Rows = mysqli_num_rows($row);
    //echo $Num_Rows;
    //$Num_Rows = ($Num_Row + 1);
}
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sqlSum = "SELECT SUM(in_befor) AS sum_price FROM tbl_interest INNER JOIN tbl_social ON tbl_social.s_id = tbl_interest.ref_id
    INNER JOIN tbl_orders ON tbl_social.s_id = tbl_orders.s_id
                            INNER JOIN tbl_bill ON tbl_interest.ref_id = tbl_bill.s_id 
                            WHERE tbl_bill.bill_id ='$id'";
    $sum = mysqli_query($connection, $sqlSum);
    $Salary = mysqli_fetch_assoc($sum);
    $Salary_Sum = $Salary['sum_price'];
    //echo $Salary_Sum;
}
?>

<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_bill INNER JOIN tbl_orders ON tbl_bill.s_id=tbl_orders.s_id INNER JOIN tbl_social ON tbl_social.s_id = tbl_orders.s_id WHERE tbl_bill.bill_id = '$id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
    $strStartDate = $result['c_date'];
    /* $strStartDate = date('Y-m-d'); */
    $strNewDate = date("Y-m-d", strtotime("+30 day", strtotime($strStartDate)));
    $strDate = date("Y-m-d", strtotime("+27 day", strtotime($strStartDate)));
    //echo ' + 10 วัน = ' . $strNewDate;
    //$role = $result['s_role']== 3? 4:3;
    //$role = 3;
    $ref = $result['s_id'];
    $in = $result['o_inter']; //ดอกเบี้ยทั้งหมด
}
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_bill INNER JOIN tbl_orders ON tbl_bill.s_id=tbl_orders.s_id INNER JOIN tbl_social ON tbl_social.s_id = tbl_orders.s_id WHERE tbl_bill.bill_id = '$id'";
    $query = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($query);
}

if (isset($_POST) && !empty($_POST)) {
    $in_date = $_POST['in_date'];
    $in_befor = $_POST['in_befor'];
    @$inst = $result['in_balance'];
    $inter = $result['o_inter']; //จำนวนเงินต้น+ดอกเบี้ย

    /* งวดที่ชำระ */
    if ($Num_Rows == '') {
        $Num_Rows = 1;
    } else {
        $Num_Rows = ($Num_Rows + 1);
    }

    /* ยอดดอกเบี้ยคงเหลือ */
    if ($Salary_Sum == '') {
        $Salary_Sum = $in_befor;
    } else {
        $Salary_Sum = ($Salary_Sum + $in_befor);
    }
    $ins = $inter - $Salary_Sum;

    //echo $sum;


    $balance =  $ins;

    if (isset($_FILES['in_img']['name']) && !empty($_FILES['in_img']['name'])) {
        $extension = array("jpeg", "jpg", "png");
        $target = '../images/interest/';
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
    $sql = "INSERT INTO tbl_interest (in_date, in_img, in_befor, in_role,ref_id,in_balance,in_after) VALUES ('$in_date', '$filename', '$in_befor', 0, '$ref','$balance','$Num_Rows')";
    //$sql = "UPDATE tbl_social SET c_date ='$strNewDate', start_date = '$strDate' where s_id ='$id'";
    mysqli_query($connection, "UPDATE tbl_bill SET c_date ='$strNewDate' WHERE bill_id='$id'");

    if (mysqli_query($connection, $sql)) {
        echo "เพิ่มข้อมูลสำเร็จ";
    } else {
        echo "Error: " . $sql . "<br>"  . mysqli_error($connection);
    }

    mysqli_close($connection);
}

//print_r($_POST);
?>

<body class="app">
    <div class="row g-0 app-wrapper app-auth-wrapper">
        <div class="app-auth-body mx-auto ">
            <div style="margin-top: 1rem">
                <div class="app-auth-branding text-center"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/PW-logo.png" alt="logo"></a></div>
                <label class="mb-3">Jewelry Pawn</label>
            </div>
        </div>
    </div>

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <h1 class="app-page-title">ชำระดอกเบี้ย</h1>
                <div class="d-flex flex-row">
                    <div class="flex-fill d-flex justify-content-end gap-1 ">
                    </div>
                    <div class="flex-fill d-flex justify-content-start gap-1">
                        <div>
                        </div>

                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
                <div class="col-11 m-3">
                    <div class="app-card  shadow-sm  align-items-start">
                        <div class="app-card-header p-3  mb-6">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto ">
                                    <div class="app-icon-holder">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                        </svg>
                                    </div>
                                    <!--//icon-holder-->

                                </div>
                                <!--//col-->
                                <div class="col-auto mb-6 ">
                                    <h4 class=" app-card-title">ข้อมูลการชำระดอกเบี้ย</h4>
                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <!--//app-card-header-->
                        <div class="col-11 " style="margin-left: 5% ">
                            <div class="mb-3" style="margin-top: 2rem">
                                <div class="item-label "><strong>เลขที่สัญญา : </strong><?= $result['code_id'] ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="item-label"><strong>ชื่อ-นามสกุล : </strong><?= $result['s_name'] . ' ' . $result['s_lastname'] ?></div>
                            </div>
                            <div class="mb-3">
                                <div class="item-label"><strong>ชื่อผู้ใช้เฟสบุ้ค : </strong><?= $result['c_facebook'] ?></div>
                            </div>
                            <div class="mb-3">
                                <div class="item-label"><strong>ไอดีไลน์ลูกค้า : </strong><?= $result['c_line'] ?></div>
                            </div>
                            <div class="mb-3">
                                <div class="item-label"><strong>รายละเอียดเครื่องประดับ : </strong><?= $result['o_type'] ?></div>
                            </div>
                            <div class="mb-3">
                                <div class="item-label"><strong>วันที่กำหนดชำระ : </strong><?= $result['c_date'] ?> </div>
                            </div>
                            <div class="mb-3">
                                <div class="item-label"><strong>งวดที่ : </strong><?php echo $Num_Rows . ' จาก ' . $result['r_mount']  ?> งวด </div>
                            </div>
                            <div class="mb-3">
                                <div class="item-label"><strong>จำนวนเงินที่ต้องชำระ : </strong><?= number_format($result['principle'] * 0.02) ?> บาท</div>
                            </div>
                            <div class="app-card-footer p-4 mt-auto">
                            </div>
                        </div>




                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
                <div class="col-11 m-3">
                    <div class="app-card  shadow-sm  align-items-start">
                        <div class="app-card-header p-3  mb-6">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto ">
                                    <div class="app-icon-holder">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                        </svg>
                                    </div>
                                    <!--//icon-holder-->

                                </div>
                                <!--//col-->
                                <div class="col-auto mb-6 ">
                                    <h4 class=" app-card-title">เพิ่มหลักฐานการชำระดอกเบี้ย :</h4>
                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <!--//app-card-header-->
                            <div class="col-11 " style="margin-left: 5% ">
                                <div class="" style="margin-top: 2rem">
                                    <div class="item-label mb-2"><strong>แนบหลักฐานการชำระดอกเบี้ย * </strong></div>
                                    <div>
                                        <input type="file" id="myFile" name="in_img" multiple required>
                                    </div>
                                </div>
                                <div class="mb-4" style="margin-top: 2rem">


                                </div>
                                <div class="col-6 mb-3">
                                    <div class="item-label"><strong>จำนวนเงินที่ชำระ *</strong< /div>
                                            <div class="col-10">
                                                <input type="number" class=" form-control " name="in_befor" placeholder="หน่วยเป็นบาท" autocomplete="off" required>
                                            </div>
                                    </div>
                                </div>
                                <div class="mb-3 ">
                                    <div class="item-label"><strong>เลือกวันที่ชำระตามหลักฐานการโอน *</strong></div>
                                    <div class="col-5">
                                        <input type="date" class=" form-control " name="in_date" placeholder="หน่วยเป็นบาท" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="app-card-footer p-4 mt-auto">
                                    <button type="submit" class="btn app-btn-secondary">บันทึก</button>
                                </div>
                            </div>
                        </form>


                    </div>
                    <!--//app-card-body-->
                </div>
                <!--//app-card-->
            </div>
            <!--//col-->

            <!-- Javascript -->
            <script src="assets/plugins/popper.min.js"></script>
            <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

            <!-- Page Specific JS -->
            <script src="assets/js/app.js"></script>

</body>

</html>
<style>
    .app-card .app-icon-holder {
        display: inline-block;
        background: #9b0e2140;
        color: #9b0e21;
        width: 50px;
        height: 50px;
        padding-top: 10px;
        font-size: 1rem;
        text-align: center;
        border-radius: 50% !important
    }

    .app-auth-wrapper {
        background: #f5f6fd;
        height: 100px !important
    }

    .app-auth-wrapper .app-auth-body {
        width: auto !important
    }

    .thead-dark {
        background-color: #fff;
        color: #9b0e21;
        border-color: #9b0e21;
    }

    .btn1 {
        font-weight: 600;
        padding: 1rem 2rem;
        font-size: 0.5rem;
        background-color: #0000002b;
        border: #9b0e21;
    }


    .btn2 {
        display: inline-block;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: center;
        text-decoration: none;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-color: #0000004a;
        border: 1px solid #00000033;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        border-radius: 0.25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out !important
    }
</style>