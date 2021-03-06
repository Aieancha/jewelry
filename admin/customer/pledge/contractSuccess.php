<?php
$sql = "SELECT * FROM tbl_social INNER JOIN tbl_orders ON tbl_social.s_id = tbl_orders.s_id INNER JOIN tbl_bill ON tbl_social.s_id = tbl_bill.s_id
INNER JOIN tbl_status ON tbl_orders.o_role = tbl_status.id WHERE tbl_orders.o_role=2 order by o_date desc";
$query = mysqli_query($connection, $sql);
$rs = mysqli_fetch_assoc($query);
$success = mysqli_num_rows($query);

$member = "SELECT * FROM tbl_member INNER JOIN tbl_orders ON tbl_member.m_id = tbl_orders.lavel ";
$qry = mysqli_query($connection, $member);
$result = mysqli_fetch_assoc($qry);
?>

<div class="container-fluid py-4">
    <div class="col-auto">
        <h3 class="font-weight-bolder text-dark text-gradient ">การข้อมูลการจำนำ</h3>
        <hr class="mb-4 mt-4">
    </div>
    <div class="row justify-content-between">
        <div class="justify-content-start flex-fill ">
            <a href="?page=<?= $_GET['page'] ?>&function=insert" class="btn  btn-green3 text-white">เพิ่มข้อมูลการจำนำ</a>
        </div>
        <div class="flex-fill d-flex justify-content-end gap-1">
            <div class="col">
            <a href="?page=<?= $_GET['page'] ?> " class="btn btn-sm1 bg-gray-500 m-1">  สรุปข้อมูลการจำนำ </a>
            <a href="?page=<?= $_GET['page'] ?>&function=CustomerCreate " class="btn btn-sm1 bg-gray-500 m-1">เพิ่มข้อมูลโดยลูกค้า </a>
                <a href="?page=<?= $_GET['page'] ?>&function=waitPledge" class="btn btn-sm1 bg-gray-500 m-1">รอประเมิน </a>
                <a href="?page=<?= $_GET['page'] ?>&function=wait" class="btn btn-sm1 bg-gray-500 m-1">รอร่างสัญญา </a>
                <a href="?page=<?= $_GET['page'] ?>&function=contractSuccess" class="btn btn-sm1 bg-gray-600 text-white m-1">(<?php echo  $success; ?>) รอลงนามสัญญา  </a>
                <a href="?page=<?= $_GET['page'] ?>&function=WaitContract" class="btn btn-sm1 bg-gray-500 m-1"> ลงนามสัญญาเรียบร้อยแล้ว  </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card">
            <h5 class="m-3">ตารางแสดงรายชื่อลูกค้าทั้งหมด</h5>
            <div class="card-body overflow-auto p-1 " style="text-align: center">
                <table class="table" id="tableall">
                    <thead>
                        <div class="card-body overflow-auto p-1  " style="text-align: center">
                            <tr class="">
                                <th scope="col">ลำดับ</th>
                                <th scope="col">วันที่บันทึกข้อมูล</th>
                                <th scope="col">สถานะผู้บันทึก</th>
                                <th scope="col">ชื่อผู้ใช้ติดต่อ</th>
                                <th scope="col">สถานะ</th>
                                <th scope="col">ดูรายละเอียด</th>
                                <th scope="col">ดำเนินการต่อ</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($query as $data) : ?>
                            <tr>
                                <td><?= ++$i ?></td>
                                <td><?= $data['o_date'] ?></td>
                                <td> <?php
                                        if ($data['lavel'] != "user") {
                                            echo $result['status'].':'.$result['m_name'];
                                        } else {
                                            echo "ลูกค้า";
                                        } ?></td>
                                <td><?= $data['c_facebook'] . '' . $data['c_line'] ?></td>
                                <td class="text-danger"><?php echo $data['status_name']; ?></td>
                                <td> <a href="?page=<?= $_GET['page'] ?>&function=details&id=<?= $data['o_id'] ?>" class=" btn-sm btn-gray-600"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon " style="display: inline-block;color: #1e48dd;height: 2em;width: 2em;" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.854 8.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707l-4.096 4.096z" />
                                        </svg></a></td>
                                <td> <a href="?page=<?= $_GET['page'] ?>&function=CreateContract&id=<?= $data['o_id'] ?>" class="btn btn-sm btn-blue2 text-white">อัปโหลดสัญญา</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    </form>
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
<?php
mysqli_close($connection);
?>
<style>
    table.dataTable thead th,
    table.dataTable thead td,
    table.dataTable tfoot th,
    table.dataTable tfoot td {
        text-align: center;

    }
</style>