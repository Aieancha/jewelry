<?php
$sql = "SELECT *
FROM tbl_interest
INNER JOIN tbl_social
ON tbl_interest.in_id = tbl_social.s_id
WHERE tbl_interest.in_id = tbl_social.s_id";
$query = mysqli_query($connection, $sql);
//$product_id="00001";
//$id = date('dm').(date('Y')+543).$product_id;
 //echo $id;
?>


<!DOCTYPE html>
<html lang="en">
<?php
                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM tbl_social
                    INNER JOIN tbl_interest on tbl_social.s_id = tbl_interest.ref_id
                    WHERE s_id = '$id'";
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

                <form action="" method="POST">
                    <div class="card ">
                        <div class="card-body">
                            <h4>ตารางแสดงรายละเอียดการชำระค่างวด</h4>
                            <div class="card-body overflow-auto p-3 bg-white" style="text-align: center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">วันที่กำหนดชำระ</th>
                                            <th scope="col">เลขที่สัญญา</th>
                                            <th scope="col">รหัสสินค้า</th>
                                            <th scope="col">จำนวนเงินที่ชำระ</th>
                                            <th scope="col">สถานะ</th>
                                            <th scope="col">รายละเอียดการโอน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($query as $data) : ?>
                                            <tr>
                                                <td><?php echo $data['in_date']; ?></td>
                                                <td><?php echo $data['s_id']; ?></td>
                                                <td><?php echo $data['ref_img']; ?></td>
                                                <td><?php echo $data['in_befor']; ?></td>
                                                <td>#</td>
                                                <td>#</td>
                                            </tr>
                                        <?php endforeach; ?>
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