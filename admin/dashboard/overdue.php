<!-- ค้างชำระ -->
<?php
$sql = "SELECT * FROM tbl_social
INNER JOIN tbl_orders ON tbl_social.s_id = tbl_orders.s_id
INNER JOIN tbl_bill ON tbl_social.s_id = tbl_bill.s_id
INNER JOIN tbl_interest ON tbl_interest.ref_id = tbl_bill.s_id
WHERE MONTH(c_date) > 3 group by tbl_bill.s_id";
$query = mysqli_query($connection, $sql);
$result=mysqli_fetch_assoc($query);
@$m=$result['r_mount'];
@$p=$result['principle'];
?>
<!-- เดือน -->
<div class="row justify-content-between">
  <div class="d-flex justify-content-center mb-6">
    <a href="?function=report" class="btn btn-sm1 bg-gray-500  m-1">รายงานสรุปยอดการชำระดอกเบี้ย</a>
    <a href="?&function=overdue" class="btn btn-sm1 bg-gray-600 text-white m-1">รายงานสรุปยอดค้างชำระชำระดอกเบี้ย</a>
    <a href="?&function=EndContract" class="btn btn-sm1 bg-gray-500  m-1">รายการสรุปการปิดบัญชี</a>
  </div>
  <div class="row">
    <div class="card">
      <!-- title -->
      <h5 class="font-weight-bolder text-dark text-gradient m-3">รายงานสรุปยอดการค้างชำระดอกเบี้ย</h5>

      <div class="row">
        <div class="card">
          <div class="card-body overflow-auto p-1 " style="text-align: center">
            <table class="table" id="tableall">
              <thead>
                <div class="card-body overflow-auto p-1  " style="text-align: center">
                  <tr class="">
                    <th scope="col">ลำดับ</th>
                    <th scope="col">เลขที่สัญญา</th>
                    <th scope="col">ชื่อ-นามสกุล</th>
                    <th scope="col">จำนวนเงินต้น</th>
                    <th scope="col">จำนวนงวดที่ค้างชำระ(งวด)</th>
                    <th scope="col">จำนวนดอกเบี้ยที่ค้างชำระ</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $bill = " SELECT count(bill_no) AS bill, SUM(in_befor) AS sum_price FROM tbl_bill INNER JOIN tbl_interest ON tbl_interest.ref_id=tbl_bill.s_id";
                $q = mysqli_query($connection, $bill);
                $f = mysqli_fetch_assoc($q);
                $select = " SELECT count(bill_no) AS bill FROM tbl_bill";
                $q = mysqli_query($connection, $select);
                $r = mysqli_fetch_assoc($q);
                while ($data = mysqli_fetch_array($query)) {
                  $qty=$result['in_after'];
                  $month=$m-$qty;
                  $balance=$p*$month;
                ?>
                  <tr>
                    <td><?= ++$i ?></td>
                    <td><?php echo $data['bill_no']; ?></td>
                    <td><?= $data['s_name'] . ' ' . $data['s_lastname'] ?></td>
                    <td><?php echo number_format($data['principle']); ?></td>
                    <td><?php echo $month; ?></td>
                    <td><?php echo number_format($data['o_inter']); ?></td>
                  </tr>

                <?php } ?>
                <table class="table">
                  <tr>
                    <td>    </td>
                    <!-- <td>เลขที่สัญญาจำนวน : <?php echo $f['bill']; ?> ฉบับ </td> -->
                    <!-- <td>รวมยอดชำระดอกเบี้ย : <?php echo $f['sum_price']; ?> บาท </td> -->
                  </tr>
                </table>
              </tbody>
            </table>
          </div>
        </div>

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