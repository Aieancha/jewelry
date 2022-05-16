<?php
$sql = "SELECT *
FROM tbl_social
INNER JOIN tbl_interest
ON tbl_social.s_id = tbl_interest.in_id
ORDER BY in_date";
$query = mysqli_query($connection, $sql);
$result = mysqli_fetch_assoc($query);
?>
<?php
mysqli_select_db($connection, "");
$sqldb = "SELECT count(s_id) as day3 FROM tbl_social WHERE DATEDIFF(c_date, Now())= 3 or DATEDIFF(c_date, Now())= 2";
$rs = mysqli_query($connection, $sqldb);
$day3 = mysqli_fetch_assoc($rs);
if ($day3['day3'] > 0) {
    $noti_day3 = '<span class="noti-alert">' . $day3['day3'] . '</span>';
} else {
    $noti_day3 = "";
}
$mount = $result['c_date'];
$mount = date('Y-m-d');
$mountNew = date("Y-m-d", strtotime("-3 day", strtotime($mount)));
?>
<div class="container-fluid py-4 ">
    <div class="row justify-content-between">
        <div class="col-auto">
            <h3 class="font-weight-bolder text-dark text-gradient ">การจัดการการชำระดอกเบี้ย</h3>
        </div>
        <div class="d-flex justify-content-center mb-6">
      <a href="?page=<?= $_GET['page'] ?>&function=index"class="btn btn-sm1 bg-gray-500 m-1">แจ้งเตือนการชำระดอกเบี้ย</a>
      <a  class="btn btn-sm1 bg-gray-600 text-white m-1">ตรวจสอบการชำระดอกเบี้ย</a>
      <a href="?page=<?= $_GET['page'] ?>&function=wait" class="btn btn-sm1 bg-gray-500 m-1">รายการสรุปการชำระดอกเบี้ยโดยลูกค้า</a>
</div>
    </div>
    <div class="row justify-content-between">
        <div class="d-flex justify-content-end">

            <div class="d-flex justify-content-end mb-2 ">
                <form class="example " action="/action_page.php" style="margin: 7px;;max-width:200px">
                    <input type="text" placeholder="ชื่อผู้ใช้งาน.." name="search2 ">
                    <button type="submit"><i class="fa fa-search btn-dark"></i></button>
                </form>

            </div>
            <a href="?#=<?= $_GET['#'] ?>&function=insert" class="btn btn-sm btn-dark text-white">สถานะ</a>
        </div>
        <div class="row">
            <div class="card">
                <!-- title -->
                <h5 class="font-weight-bolder text-dark text-gradient m-3">ตารางแสดงข้อมูลลูกค้าทั้งหมด</h5>

                <!-- end title -->
                <div class="card-body overflow-auto p-3" style="text-align: center">
                    <form action="">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">เลขที่สัญญา</th>
                                    <th scope="col">ชื่อผู้จำนำ</th>
                                    <th scope="col">เบอร์โทรศัพท์</th>
                                    <th scope="col">จำนวนเงินที่ต้องชำระ</th>
                                    <th scope="col">สถานะ</th>
                                    <th scope="col">ดูประวัติการโอน</th>
                                    <th scope="col">แก้ไขสถานะ</th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if (isset($_POST) && !empty($_POST)) {
                                    $role = $_POST['s_role'];
                                    $sql = "UPDATE tbl_social SET s_role='$role' WHERE s_id ='$id'";
                                    $query = mysqli_query($connection, $sql);
                                    $result = mysqli_fetch_assoc($query);
                                    $date = $result['c_date'];
                                    $start = $result['start_date'];
                                    $status = ($result['start_date'] == $start) ? $date : $start;

                                    if (mysqli_query($connection, $sql)) {
                                        echo "เพิ่มข้อมูลสำเร็จ";
                                    } else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                                    }

                                    mysqli_close($connection);
                                }

                                //print_r($_POST);
                                ?>


                                <?php
                                $i = 0;
                                foreach ($query as $data) : ?>
                                    <tr>
                                        <td><?= ++$i ?></td>
                                        <td><?php echo $data['in_date']; ?></td>
                                        <td><?= $data['s_name'] ?></td>
                                        <td><?= $data['in_befor']; ?></td>
                                        <td><?= $data['ref_img'] ?></td>
                                        <td><?php $status = $data['in_date'];
                                            if ($status == $data['in_date']) {
                                                echo "ชำระแล้ว";
                                            } else {
                                                echo "ค้างชำระ";
                                            } ?></td>
                                        <td> <a href="?page=<?= $_GET['page'] ?>&function=showDetails&id=<?= $data['s_id'] ?>" class="btn btn-sm btn-blue2 text-white">ดูประวัติ</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </form>
                </div>

            </div>
        </div>
    </div>