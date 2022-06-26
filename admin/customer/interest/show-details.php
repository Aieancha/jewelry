<meta charset="utf-8">
<?php
$sqli = "SELECT * FROM tbl_social INNER JOIN tbl_bill ON tbl_social.s_id = tbl_bill.s_id";
$query = mysqli_query($connection, $sqli);
$rs = mysqli_fetch_assoc($query);

?>


<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_social INNER JOIN tbl_orders ON tbl_orders.s_id = tbl_social.s_id INNER JOIN tbl_bill ON tbl_social.s_id = tbl_bill.s_id WHERE tbl_bill.bill_id = '$id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
    $principle = $result['principle'];
    $mount = $result['r_mount'];
}
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

            <div class="card-body">
                <?php

                $principle = $result['principle'];
                $mount = $result['r_mount'];
                $date = $rs['bill_date'];

                $int = (2 / 100); //2%
                $pmt = ($principle * $int) * $mount;

                $resultPmt =  number_format($pmt, 2, '.', '');
                ?>

                <div class="card ">
                    <div class="card-body">
                        <h4 class="mb-6">รายละเอียดการชำระค่างวด</h4>
                        <div class="d-flex flex-row m-4">
                            <div class="justify-content-start flex-fill ">
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

                                <h5>ตารางคำนวณค่างวดการชำระดอกเบี้ย</h5>

                            </div>
                            <div class="justify-content-start flex-fill ">

                                <div class=" mb-3 ">
                                    <h6 style="display: inline;">จำนวนดอกเบี้ย :</h6>
                                    <td width="25%" style="display: inline;"><?= number_format($result['principle'] * 0.02 * $result['r_mount']) ?> บาท</td>
                                </div>

                                <?php
                                if (isset($_GET['id']) && !empty($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $sqls = "SELECT * FROM tbl_bill WHERE bill_id = '$id'";
                                    $qry = mysqli_query($connection, $sqls);
                                    $result_status = mysqli_fetch_assoc($qry);
                                }

                                if (isset($_POST) && !empty($_POST)) {
                                    $role = $_POST['bill_role'];
                                    mysqli_query($connection, "UPDATE tbl_bill SET bill_role ='$role' WHERE bill_id='$id'");
                                    if (mysqli_query($connection, $sqls)) {
                                        if ($role == 4) {
                                            $alert = '<script type= "text/javascript">';
                                            $alert .= 'alert("ยืนยันสถานะครบสัญญา");';
                                            $alert .= 'window.location.href = "?page=interest&function=CreatePrin&id=' . $result['bill_id'] . '";';
                                            $alert .= '</script>';
                                            echo $alert;
                                            exit();
                                        } elseif ($role == 5) {
                                            $alert = '<script type= "text/javascript">';
                                            $alert .= 'alert("ยืนยันสถานะผิดสัญญา");';
                                            $alert .= 'window.location.href = "?";';
                                            $alert .= '</script>';
                                            echo $alert;
                                            exit();
                                        }else{
                                            $alert = '<script type= "text/javascript">';
                                            $alert .= 'alert("ยืนยันสถานะไถ่ถอนก่อนกำหนด");';
                                            $alert .= 'window.location.href = "?page=interest&function=CreatePrin&id=' . $result['bill_id'] . '";';
                                            $alert .= '</script>';
                                            echo $alert;
                                            exit();
                                        }
                                        echo "เพิ่มข้อมูลสำเร็จ";
                                    } else {
                                        echo "Error: " . $sql . "<br>"  . mysqli_error($connection);
                                    }
                                    mysqli_close($connection);
                                }
                                ?>

                                <!-- status -->
                                <form action="" method="POST">
                                    <h6 style="display: inline;" class="text-danger">สถานะสัญญา </h6>
                                    <h6 style="display: inline;">ปกติ</h6>
                                    <div>
                                        <select name="bill_role" require class="btn btn-sm ">
                                            <option value="" selected="selected" disabled require>เปลี่ยนสถานะ</option>
                                            <option value="4">ครบสัญญา</option>
                                            <option value="5">ผิดสัญญา</option>
                                            <option value="6">ไถ่ถอนก่อนกำหนด</option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-green3 text-white">ยืนยันการเปลี่ยนสถานะ</button>
                                    </div>
                                </form>
                                <!-- end status -->
                                <div class="mb-5">
                                </div>

                            </div>
                        </div>
                        <div class="card-body overflow-auto p-3" style="text-align: center">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col-active">งวดที่</th>
                                        <th scope="col">วันที่กำหนดชำระ</th>
                                        <th scope="col">จำนวนดอกเบี้ย</th>
                                        <th scope="col">ชำระดอกเบี้ยต่อเดือน</th>
                                        <th scope="col">ยอดดอกเบี้ยคงเหลือ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($i = 1; $i <= $mount; $i++) {
                                        $myDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("$date"))) . "+$i month"));
                                        //สำหรับเดือนสุดท้าย นำดอกเบี้ยมารวมใน ยอดชำระต่อเดือน	
                                        if ($mount == $i) {
                                            $resultPmt = (($principle * 0.02) * $mount);
                                            //$last_balance = $resultPmt;
                                        }

                                        $calInterest = (($principle * 0.02));

                                        $payPrincipal = $resultPmt - $calInterest;
                                        $pay = "";

                                        echo "<tr class='text-right'>";

                                        echo "<td class='text-center'>" . $i . "</td>";
                                        echo "<td class='text-center'>" . $myDate . "</td>";
                                        /* echo "<td>".number_format($principle, 2)."</td>"; */

                                        echo "<td>" . number_format($resultPmt, 2, '.', '') . "</td>";

                                        echo "<td>" . number_format($calInterest, 2, '.', '') . "</td>";

                                        /* echo "<td>".number_format($payPrincipal, 2, '.', '')."</td>"; */

                                        $resultPmt = $resultPmt - $calInterest;

                                        //สำหรับเดือนสุดท้าย (นำดอกเบี้ยมารวม + ยอดชำระเงินต้น) - ยอดชำระต่อเดือน
                                        if ($mount == $i) {
                                            $resultPmt = $resultPmt - $resultPmt;
                                        }

                                        echo "<td>" . number_format($resultPmt, 2, '.', '') . "</td>";
                                        /* echo"<td><a href='?page=$_GET[page]&function=detailsIn' class='btn btn-sm btn-blue2 text-white'>รายละเอียดการโอน</a></td>"; */

                                        echo "</tr>";
                                    }


                                    ?>
                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row">
                <div class="justify-content-start flex-fill ">
                    <?php
                    echo "<a href='javascript:window.history.back()' class='btn bg-gradient-dark'>ย้อนกลับ</a>";
                    ?>
                </div>
                <div class="flex-fill d-flex justify-content-end gap-1">
                    <a href="?page=<?= $_GET['page'] ?>&function=sum_list&id=<?= $result['bill_id'] ?>" class="btn btn-sm btn-blue2 text-white">ประวัติการชำระดอกเบี้ย</a>
                </div>

            </div>
        </div>
</body>
<?php
mysqli_close($connection);
?>

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