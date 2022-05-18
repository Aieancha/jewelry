<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_social
    WHERE s_id = '$id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
}
?>
<?php
$code = "B";
$yearMonth = substr(date("Y")+543, -2).date("m");

//query MAX ID 
$sqli = "SELECT MAX(bill_no) AS bill_no FROM tbl_bill";
$qry = mysqli_query($connection,$sqli) or die("Error Query [".$sqli."]");
$rs = mysqli_fetch_assoc($qry);
$maxId = substr($rs['bill_no'], -5);  //ข้อมูลนี้จะติดรหัสตัวอักษรด้วย ตัดเอาเฉพาะตัวเลขท้ายนะครับ
$maxId = ($maxId + 1); 

$maxId = substr("00000".$maxId, -5);
$nextId = $code.$yearMonth.$maxId;
echo $nextId;
$sqli = "INSERT INTO tbl_bill (bill_id) VALUES ( '$nextId')";
          if (mysqli_query($connection, $sqli)) {
            //echo "เพิ่มข้อมูลสำเร็จ";
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("เพิ่มข้อมูลสำเร็จ");';
            $alert .= 'window.location.href = "?page=pledge&function=success";';
            $alert .= '</script>';
            echo $alert;
            exit();
          } else {
            echo "Error: " . $sqli . "<br>" . mysqli_error($connection);
          }

          mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

<body class="g-sidenav-show bg-gray-100">
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid">
            <!-- title -->
            <div class="row justify-content-between">


            </div>
            <!-- end title -->

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

                                <h5 class="pb-5">กรอกข้อมูลผู้สนใจจำนำเครื่องประดับ</h5>
                        </div>

                        <div class="d-flex flex-row">
                            <div class="justify-content-start flex-fill ">
                                <div class=" mb-4 col-6 ">
                                    <h6 style="display: inline;">ช่องทางการติดต่อ :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['social_contact'] ?></td>
                                </div>
                                <div class=" mb-4 col-10 ">
                                    <h6 style="display: inline;">ชื่อผู้ใช้ :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['social_name'] ?></td>
                                </div>
                                <div class=" mb-4 col-10 ">
                                    <h6 style="display: inline;">ภาพถ่ายสินค้าจริง</h6>
                                    <img src="upload/social/<?= $result['s_img'] ?>" alt="jewelry" width="304" height="228">
                                </div>
                                <div class=" mb-4 col-10 ">
                                    <h6 style="display: inline;">ราคาประเมินข้างต้น :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['price_img'] ?> บาท</td>
                                </div>
                                <div class=" mb-4 col-10 ">
                                    <h6 style="display: inline;">ราคาประเมินจากสินค้าจริง:</h6>
                                    <td width="25%" style="display: inline;"><?= $result['price_item'] ?> บาท</td>
                                </div>
                                <div class=" mb-4 col-10 ">
                                    <h6 style="display: inline;">ราคาที่ตกลงจำนำ:</h6>
                                    <td width="25%" style="display: inline;"><?= $result['principle'] ?> บาท</td>
                                </div>
                                <div class=" mb-4 ">
                                    <h6 style="display: inline;">จำนวนงวด :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['r_mount'] ?> เดือน</td>
                                </div>
                                <div class=" mb-4 ">
                                    <h6 style="display: inline;">ดอกเบี้ย :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['principle'] * 0.02 * $result['r_mount'] ?> บาท</td>
                                </div>
                                <div class=" mb-4 ">
                                    <h6 style="display: inline;">เงินที่ต้องจ่ายต่องวด :</h6>
                                    <td width="25%" style="display: inline;"><?= ($result['principle'] * 0.02) ?> บาท</td>
                                </div>

                            </div>
                            <div class="justify-content-start flex-fill ">
                                <div class=" mb-4 ">
                                    <h6 style="display: inline;">เลขที่ราชการออกให้ :</h6>
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
                                    <td width="25%" style="display: inline;"><?= $result['ref_img'] ?></td>
                                </div>
                                <div class=" mb-6">
                                    <h6 style="display: inline;">รายละเอียดสินค้า:</h6>
                                    <td width="25%" style="display: inline;"><?= $result['s_type'] ?></td>
                                </div>
                                <div class=" mb-6">
                                    <h6 style="display: inline;">รูปแบบการชำระ:</h6>
                                    <td width="25%" style="display: inline;"><?= $result['rate_name'] ?></td>
                                </div>
                                <div type="hidden">
                                    <select name="s_role" require hidden>
                                        <option value="2" selected hidden></option>
                                    </select>
                                </div>
                                <input class="form-control " type="hidden" name="bill_id" value="<?php echo $nextId ?>" required>

                            </div>

                        </div>
                    </div>

                    <div class="d-flex flex-row">
                        <!-- <div class="justify-content-start flex-fill ">
                    <a href="?page=<?= $_GET['page'] ?>&function=updated" class="btn bg-gradient-dark">ย้อนกลับ</a>
                </div> -->
                        <div class="flex-fill d-flex justify-content-end gap-1">
                            <a href="?page=<?= $_GET['page'] ?>&function=success" type="submit" class="btn btn-color1 btn-green3 text-white theme-btn  pull-right">ร่างสัญญา</a>
                        </div>
                    </div>



                    </form>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
<?php
mysqli_close($connection);
?>
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