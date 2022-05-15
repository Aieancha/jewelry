<meta charset="utf-8">
<?php
$sql = "SELECT *
FROM tbl_social
INNER JOIN tbl_status
ON tbl_social.s_role = tbl_status.id";
$query = mysqli_query($connection, $sql);
$result = mysqli_fetch_assoc($query);
$principle = $result['principle'];
$mount = $result['r_mount'];
?>

<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "SELECT * FROM tbl_social WHERE s_id = '$id'";
	$query = mysqli_query($connection, $sql);
	$result = mysqli_fetch_assoc($query);
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
                $Date= $result['c_date'];

                $int = (2 / 100); //2%
                $pmt = ($principle * $int) * $mount;

                $resultPmt =  number_format($pmt, 2, '.', '');
                ?>
                <form action="" method="POST">
                    <div class="card ">
                        <div class="card-body">
                            <h4>ตารางแสดงรายละเอียดการชำระค่างวด</h4>
                            <div class="card-body overflow-auto p-3 bg-white" style="text-align: center">
                            <div class="d-flex flex-row mb-2">
                            <div class="justify-content-start flex-fill ">
                            <div class=" mb-3 ">
                                <h6 style="display: inline;">ชื่อผู้จำนำ :</h6>
                                <td width="25%" style="display: inline;"><?= $result['s_name'] ?></td>
                                <h6 style="display: inline;">นามสกุล :</h6>
                                <td width="25%" style="display: inline;"><?= $result['s_lastname'] ?></td>

                            </div>
                            <div class=" mb-3 ">
                                <h6 style="display: inline;">จำนวนเงินต้น :</h6>
                                <td width="25%" style="display: inline;"><?= $result['principle'] ?> บาท</td>
                            </div>
                        </div>
                        <div class="justify-content-start flex-fill ">
                            <div class=" mb-3 ">
                                <h6 style="display: inline;">ช่องทางการติดต่อ :</h6>
                                <td width="25%" style="display: inline;"><?= $result['social_contact'] ?></td>
                                <h6 style="display: inline;">ชื่อผู้ใช้ :</h6>
                                <td width="25%" style="display: inline;"><?= $result['social_name'] ?></td>
                            </div>
                            <div class=" mb-3 ">
                                <h6 style="display: inline;">จำนวนดอกเบี้ย :</h6>
                                <td width="25%" style="display: inline;"><?= $result['principle']*0.02*$result['r_mount'] ?> บาท</td>
                            </div>
                        </div>
                            </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col-active">งวดที่</th>
                                            <th scope="col">วันที่กำหนดชำระ</th>
                                            <th scope="col">จำนวนดอกเบี้ย</th>
                                            <th scope="col">ชำระดอกเบี้ยต่อเดือน</th>
                                            <th scope="col">ยอดดอกเบี้ยคงเหลือ</th>
                                            <!-- <th scope="col">หลักฐานการโอน</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($i = 1; $i <= $mount; $i++) {
                                            $myDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("$Date") )) . "+$i month"));
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

                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>


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