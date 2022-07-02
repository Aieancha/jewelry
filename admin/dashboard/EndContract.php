<!-- ค้างชำระ -->
<?php
$sql = "SELECT * FROM tbl_social
INNER JOIN tbl_orders ON tbl_social.s_id = tbl_orders.s_id
INNER JOIN tbl_bill ON tbl_orders.s_id = tbl_bill.s_id
INNER JOIN tbl_interest ON tbl_interest.ref_id = tbl_bill.s_id WHERE tbl_bill.bill_role=4 group by tbl_bill.bill_id ";
$query = mysqli_query($connection, $sql);
//$result=mysqli_fetch_assoc($query);

if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = $_GET['id'];
  $sqlRow = "SELECT * FROM tbl_bill INNER JOIN tbl_orders ON tbl_bill.s_id=tbl_orders.s_id INNER JOIN tbl_social ON tbl_social.s_id = tbl_orders.s_id WHERE tbl_bill.bill_id = '$id'";
  $qry = mysqli_query($connection, $sqlRow);
  $result = mysqli_fetch_assoc($qry);
}

?>
<!-- เดือน -->
<!-- ?php
$sqli="SELECT DISTINCT month(in_date) as month FROM tbl_interest ORDER by month ASC";
$query_month = mysqli_query($connection, $sqli);
$thai=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
while ($data=mysqli_fetch_array($query_month)){
  $month = sprintf("%02d",$data['month']);

  $sqli="SELECT * FROM tbl_interest WHERE month(in_date)='$month'";
  $qry = mysqli_query($connection, $sqli);
  $row=mysqli_num_rows($qry);
  echo "<button type='button' class='btn btn-default' onClick='window.location.href =\"./?m=$month\"'>".$thai[(int)($data['month']-1)]."($row)</button>";
}
? -->
<div class="row justify-content-between">
  <div class="d-flex justify-content-center mb-6">
    <a href="?function=report" class="btn btn-sm1 bg-gray-500  m-1">รายงานสรุปยอดการชำระดอกเบี้ย</a>
    <a href="?&function=overdue" class="btn btn-sm1 bg-gray-500  m-1">รายงานสรุปยอดค้างชำระชำระดอกเบี้ย</a>
    <a href="?&function=EndContract" class="btn btn-sm1 bg-gray-600 text-white m-1">รายการสรุปการปิดบัญชี</a>
  </div>
  <div class="d-flex justify-content-end">
  <div class="d-flex justify-content-end mb-3">
        <a href="?function=EndContract" class="btn btn-sm1 btn-green text-white m-1">ครบสัญญา</a>
        <a href="?&function=RedemContract" class="btn btn-sm1 bg-gray-500  m-1">ไถ่ถอนก่อนกำหนด</a>
        <a href="?&function=WrongContract" class="btn btn-sm1 bg-gray-500  m-1">ผิดสัญญา</a>
        
      </div>
  </div>
  
  <div class="row">
    <div class="card">
      <!-- title -->
      <h5 class="font-weight-bolder text-dark text-gradient m-3">รายงานสรุปยอดการปิดบัญชีเมื่อครบสัญญาชำระดอกเบี้ย</h5>

      <div class="row">
        <div class="card">
          <div class="card-body overflow-auto p-1 " style="text-align: center">
            <table class="table" id="tableall">
              <thead>
                <div class="card-body overflow-auto p-1  " style="text-align: center">
                  <tr class="">
                    <th scope="col">ลำดับ</th>
                    <th scope="col">วันที่ปิดสัญญา</th>
                    <th scope="col">เลขที่สัญญา</th>
                    <th scope="col">ชื่อ-นามสกุล</th>
                    <th scope="col">จำนวนเงินต้น(บาท)</th>
                    <th scope="col">จำนวนดอกเบี้ย</th>
                    <th scope="col">หลักฐานการชำระเงินต้น</th>
                    <!-- <th scope="col">ยอดดอกเบี้ยคงเหลือ</th> -->
                  </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $bill = " SELECT SUM(in_befor) AS inter FROM tbl_orders
                INNER JOIN tbl_bill ON tbl_orders.s_id = tbl_bill.s_id
                INNER JOIN tbl_interest ON tbl_interest.ref_id = tbl_bill.s_id WHERE tbl_bill.bill_role=4";
                $q = mysqli_query($connection, $bill);
                $f = mysqli_fetch_assoc($q);
                while ($data = mysqli_fetch_array($query)) {
                  $principle = $data['principle'];
                  $month = $data['r_mount'];
                  $rate = 2 / 100;
                  $total_price = ($principle*$rate)*$month;

                ?>
                  <tr>
                    <td><?= ++$i ?></td>
                    <td><?= $data['prin_date'] ?></td>
                    <td><?php echo $data['bill_no']; ?></td>
                    <td><?= $data['s_name'] . ' ' . $data['s_lastname'] ?></td>
                    <td><?= number_format($data['prin_total']) ?></td>
                    <td><?php echo number_format($total_price) ?></td>
                    <td><a href="?&function=ViewPrin&id=<?= $data['bill_id'] ?>" class="btn btn-sm btn-blue2 text-white">หลักฐานการชำระเงินต้น</a></td>
                  
                  </tr>

                  <?php } ?>
                <table class="table">
                  <tr>
                    <!-- <td>เงินต้นทั้งหมด : <?php echo number_format($f['prin']); ?> บาท </td> -->
                    <!-- <td>รวมยอดดอกเบี้ยทั้งหมด : <?php echo number_format($f['inter']); ?> บาท </td> -->
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
  .btn-green{
        background-color: #228B22;
    }
    table.dataTable thead th,
    table.dataTable thead td,
    table.dataTable tfoot th,
    table.dataTable tfoot td {
        text-align: center;

    }
</style>