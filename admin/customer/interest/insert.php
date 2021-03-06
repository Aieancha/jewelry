<?php
$sql = "SELECT *
FROM tbl_social
INNER JOIN tbl_orders
ON tbl_social.s_id = tbl_orders.s_id
INNER JOIN tbl_interest
ON tbl_social.s_id = tbl_interest.ref_id
INNER JOIN tbl_bill
ON tbl_interest.ref_id= tbl_bill.s_id
WHERE tbl_interest.in_role=0
group by tbl_social.s_id ORDER BY start_date";
$query = mysqli_query($connection, $sql);
?>
<div class="container-fluid py-4 ">
  <div class="row justify-content-between">
    <div class="col-auto">
      <h3 class="font-weight-bolder text-dark text-gradient ">การจัดการการชำระดอกเบี้ย</h3>
    </div>
    <div class="d-flex justify-content-center mb-6">
      <a href="?page=<?= $_GET['page'] ?>&function=index" class="btn btn-sm1 bg-gray-500 m-1">แจ้งเตือนการชำระดอกเบี้ย</a>
      <a href="?page=<?= $_GET['page'] ?>&function=list" class="btn btn-sm1 bg-gray-500 m-1">รายการสรุปการชำระดอกเบี้ย</a>
      <a class="btn btn-sm1 bg-gray-600 text-white m-1">ตรวจสอบการชำระดอกเบี้ยโดยลูกค้า</a>
    </div>
  </div>
  <div class="row justify-content-between">

    <div class="row">
      <div class="card">
        <!-- title -->
        <h5 class="font-weight-bolder text-dark text-gradient m-3">ตารางแสดงข้อมูลการบันทึกใบเสร็จชำระดอกเบี้ยโดยลูกค้า</h5>

        <!-- end title -->
        <div class="card-body overflow-auto p-3" style="text-align: center">
          <table class="table" id="tableall">
            <thead>
              <tr>
                <th scope="col">ลำดับ</th>
                <!-- <th scope="col">วันที่แจ้งเตือน</th> -->
                <th scope="col">วันที่กำหนดชำระ</th>
                <th scope="col">เลขที่สัญญา</th>
                <th scope="col">ชื่อผู้จำนำ</th>
                <th scope="col">เบอร์โทรศัพท์</th>
                <th scope="col">จำนวนเงินที่ชำระ</th>
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
                  <!-- <td><?php echo $data['start_date']; ?></td> -->
                  <td><?= $data['c_date'] ?></td>
                  <td><?= $data['bill_no'] ?></td>
                  <td><?= $data['s_name'] . ' ' . $data['s_lastname'] ?></td>
                  <td><?= $data['phone'] ?></td>
                  <td><?= $data['principle'] * 0.02 ?></td>
                  <td class="text-danger">รอยืนยัน</td>
                  <td><a href="?page=<?= $_GET['page'] ?>&function=updateCustomer&id=<?= $data['in_id'] ?>" class="btn btn-sm btn-green3 text-white">ตรวจสอบข้อมูล</a></td>
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
  <style>
    table.dataTable thead th,
    table.dataTable thead td,
    table.dataTable tfoot th,
    table.dataTable tfoot td {
      text-align: center;

    }
  </style>