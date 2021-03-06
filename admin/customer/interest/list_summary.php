<?php
$sql = "SELECT * FROM tbl_social
INNER JOIN tbl_orders ON tbl_orders.s_id = tbl_social.s_id
INNER JOIN tbl_interest ON tbl_interest.ref_id = tbl_social.s_id
INNER JOIN tbl_bill ON tbl_social.s_id = tbl_bill.s_id
group by tbl_social.s_id ORDER BY in_date desc";
$query = mysqli_query($connection, $sql);
?>
<?php
//mysqli_select_db($connection, "");
$sqldb = "SELECT count(bill_id) as day3 FROM tbl_bill WHERE DATEDIFF(c_date, Now())= 3 or DATEDIFF(c_date, Now())= 2";
$rs = mysqli_query($connection, $sqldb);
$day3 = mysqli_fetch_assoc($rs);
if ($day3['day3'] > 0) {
    $noti_day3 = '<span class="noti-alert">' . $day3['day3'] . '</span>';
} else {
    $noti_day3 = "";
}

?>
<div class="container-fluid py-4 ">
    <div class="row justify-content-between">
        <div class="col-auto">
            <h3 class="font-weight-bolder text-dark text-gradient ">การจัดการการชำระดอกเบี้ย</h3>
        </div>
        <div class="d-flex justify-content-center mb-6">
      <a href="?page=<?= $_GET['page'] ?>&function=index"class="btn btn-sm1 bg-gray-500 m-1">แจ้งเตือนการชำระดอกเบี้ย</a>
      <a  class="btn btn-sm1 bg-gray-600 text-white m-1">รายการสรุปการชำระดอกเบี้ย</a>
      <a href="?page=<?= $_GET['page'] ?>&function=wait" class="btn btn-sm1 bg-gray-500 m-1">ตรวจสอบการชำระดอกเบี้ยโดยลูกค้า</a>
</div>
    </div>
    <div class="row justify-content-between">
        <div class="row">
            <div class="card">
                <!-- title -->
                <h5 class="font-weight-bolder text-dark text-gradient m-3">ตารางแสดงข้อมูลลูกค้าที่ชำระแล้ว</h5>

                <!-- end title -->
                <div class="card-body overflow-auto p-3" style="text-align: center">
                    <form action="">
                    <table class="table" id="tableall">
                            <thead>
                                <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">วันที่ชำระดอกเบี้ย</th>
                                    <th scope="col">เลขที่สัญญา</th>
                                    <th scope="col">ชื่อผู้จำนำ</th>
                                    <th scope="col">เบอร์โทรศัพท์</th>
                                    <th scope="col">จำนวนเงินที่ต้องชำระ</th>
                                    <th scope="col">สถานะ</th>
                                    <th scope="col">ตารางชำระดอกเบี้ย</th>
                                    <th scope="col">แก้ไขสถานะ</th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                if (isset($_GET['id']) && !empty($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $sql = "SELECT * FROM tbl_social WHERE s_id = '$id'";
                                    $query = mysqli_query($connection, $sql);
                                }
                                foreach ($query as $data) : ?>
                                    <tr>
                                        <td><?= ++$i ?></td>
                                        <td><?= $data['in_date'] ?></td>
                                        <td><?= $data['bill_no'] ?></td>
                                        <td><?= $data['s_name'] ?></td>
                                        <td><?= $data['phone']; ?></td>
                                        <td><?= $data['in_befor']; ?></td>
                                        <td><?php $status = $data['in_date'];
                                            if ($status == $data['in_date']) {
                                                echo "ชำระแล้ว";
                                            } else {
                                                echo "ค้างชำระ";
                                            } ?></td>
                                        <td> <a href="?page=<?= $_GET['page'] ?>&function=showDetails&id=<?= $data['bill_id'] ?>" class="btn btn-sm btn-blue2 text-white">ดูตาราง</a></td>
                                        <td> <a href="?page=<?= $_GET['page'] ?>&function=sum_list&id=<?= $data['bill_id'] ?>" class="btn btn-sm btn-green3 text-white">แก้ไขสถานะ</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#tableall').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "ยังไม่มีข้อมูล",
                "info": "เเสดง _START_ - _END_ จาก _TOTAL_ รายการ",
                "infoEmpty": "เเสดง 0 - 0 จาก 0 รายการ",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "เเสดง _MENU_ รายการ",
                "loadingRecords": "Loading...",
                "processing": "Processing...",
                "search": "ค้นหา:",
                "zeroRecords": "No matching records found",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "ถัดไป",
                    "previous": "ก่อนหน้า"
                },
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                }
            }
        });
    });
</script>
<style>
    table.dataTable thead th,
    table.dataTable thead td,
    table.dataTable tfoot th,
    table.dataTable tfoot td {
        text-align: center;

    }
</style>