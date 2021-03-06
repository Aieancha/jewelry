<?php
$sql = "SELECT * FROM tbl_social
INNER JOIN tbl_bill ON tbl_social.s_id = tbl_bill.s_id
INNER JOIN tbl_orders ON tbl_orders.s_id = tbl_bill.s_id
WHERE DATEDIFF(c_date, Now())= 3 or DATEDIFF(c_date, Now())= 2 or DATEDIFF(c_date, Now())< 30
group by tbl_social.s_id ORDER BY c_date asc";
$query = mysqli_query($connection, $sql);
$result = mysqli_fetch_assoc($query);
@$strStartDate = $result['c_date'];

$strStartDate = date('Y-m-d');
$strDate = date("Y-m-d", strtotime("-3 day", strtotime($strStartDate)));
?>

<?php
//mysqli_select_db($connection,"");
/* $sqldb = "SELECT count(bill_id) as day3 FROM tbl_bill WHERE DATEDIFF(c_date, Now())= 3 or DATEDIFF(c_date, Now())= 2";
$rs = mysqli_query($connection, $sqldb);
$day3 = mysqli_fetch_assoc($rs);
if ($day3['day3'] > 0) {
  $noti_day3 = '<span class="noti-alert">' . $day3['day3'] . '</span>';
} else {
  $noti_day3 = "";
} */
?>
<?php
date_default_timezone_set('asia/bangkok');
$status = date('Y-m-d');
//echo $status;
?>
<div class="container-fluid py-4 ">
  <div class="row justify-content-between">
    <div class="col-auto">
      <h3 class="font-weight-bolder text-dark text-gradient ">การจัดการการชำระดอกเบี้ย</h3>
    </div>
  </div>
  <div class="row justify-content-between">
    <div class="d-flex justify-content-center mb-6">
      <a class="btn btn-sm1 bg-gray-600 text-white m-1">แจ้งเตือนการชำระดอกเบี้ย</a>
      <a href="?page=<?= $_GET['page'] ?>&function=list" class="btn btn-sm1 bg-gray-500 m-1">รายการสรุปการชำระดอกเบี้ย</a>
      <a href="?page=<?= $_GET['page'] ?>&function=wait" class="btn btn-sm1 bg-gray-500  m-1">ตรวจสอบการชำระดอกเบี้ยโดยลูกค้า</a>
    </div>
    <div class="row">
      <div class="card">
        <!-- title -->
        <h5 class="font-weight-bolder text-dark text-gradient m-3">ตารางแสดงข้อมูลลูกค้าที่ใกล้ครบกำหนดชำระค่างวด</h5>

        <!-- end title -->
        <div class="card-body overflow-auto p-3" style="text-align: center">
        <table class="table" id="tableall">
            <thead>
              <tr>
                <th scope="col">ลำดับ</th>
                <th scope="col">วันทีแจ้งเตือน</th>
                <th scope="col">วันที่กำหนดชำระ</th>
                <th scope="col">เลขที่สัญญา</th>
                <th scope="col">ชื่อผู้จำนำ</th>
                <th scope="col">จำนวนเงินที่ต้องชำระ</th>
                <th scope="col">เบอร์โทรศัพท์</th>
                <th scope="col">สถานะ</th>
                <th scope="col">อัพเดทสถานะ</th>


              </tr>
            </thead>
            <tbody>


              <?php
              $i = 0;
              foreach ($query as $data) : ?>
                <tr>
                  <td><?= ++$i ?></td>
                  <td><?php echo $strDate; ?></td>
                  <td><?php echo $data['c_date']; ?></td>
                  <td><?php echo $data['bill_no']; ?></td>
                  <td><?= $data['s_name'] ?></td>
                  <td><?= number_format($data['principle'] * 0.02) ?></td>
                  <td><?= $data['phone'] ?></td>
                  <td class="text-danger"><?php
                                          if (($strDate <= $status) && $status <= $data['c_date']) {
                                            echo "ถึงกำหนดชำระ";
                                          } else {
                                            echo "ค้างชำระ";
                                          } ?></td>

                  <td> <a href="?page=<?= $_GET['page'] ?>&function=update&id=<?= $data['bill_id'] ?>" class="btn btn-sm btn-green3 text-white">อัพเดทสถานะ</a></td>
                  </td>
                  <!-- <td> <a href="?page=<?= $_GET['page'] ?>&function=qty" class="btn btn-sm btn-dark">ทดลองรุูป</a></td> -->

                </tr>
              <?php endforeach; ?>
            </tbody>

          </table>

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
  <!DOCTYPE html>
  <html>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>