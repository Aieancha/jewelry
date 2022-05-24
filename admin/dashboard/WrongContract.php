<!-- ค้างชำระ -->
<?php
$sql = "SELECT * FROM tbl_social
INNER JOIN tbl_bill ON tbl_social.s_id = tbl_bill.s_id
INNER JOIN tbl_interest ON tbl_interest.ref_id = tbl_social.s_id
group by tbl_social.s_id ORDER BY start_date";
$query = mysqli_query($connection, $sql);
//$result=mysqli_fetch_assoc($query);
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
        <a href="?function=EndContract" class="btn btn-sm1 bg-gray-500  m-1">ครบสัญญา</a>
        <a href="?&function=WrongContract" class="btn btn-sm1 btn-red text-white m-1">ผิดสัญญา</a>
        <a href="?&function=RedemContract" class="btn btn-sm1 bg-gray-500  m-1">ไถ่ถอนก่อนกำหนด</a>
      </div>
  </div>
  
  <div class="row">
    <div class="card">
      <!-- title -->
      <h5 class="font-weight-bolder text-dark text-gradient m-3">รายงานสรุปยอดการปิดบัญชีเมื่อผิดสัญญาชำระดอกเบี้ย</h5>

      <div class="row">
        <div class="card">
          <div class="card-body overflow-auto p-1 " style="text-align: center">
            <table class="table" id="pledge">
              <thead>
                <div class="card-body overflow-auto p-1  " style="text-align: center">
                  <tr class="">
                    <th scope="col">ลำดับ</th>
                    <th scope="col">วันที่ชำระดอกเบี้ย</th>
                    <th scope="col">เลขที่สัญญา</th>
                    <th scope="col">ชื่อ-นามสกุล</th>
                    <th scope="col">จำนวนงวดที่ค้างชำระ</th>
                    <th scope="col">จำนวนดอกเบี้ยที่ค้างชำระ</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $bill = " SELECT count(bill_no) AS bill, SUM(in_befor) AS sum_price FROM tbl_bill INNER JOIN tbl_interest ON tbl_interest.ref_id=tbl_bill.s_id";
                $q = mysqli_query($connection, $bill);
                $f = mysqli_fetch_assoc($q);
                /* $count = "SELECT COUNT(*) AS total FROM ( SELECT tbl_bill.s_id FROM tbl_bill UNION ALL SELECT tbl_interest.ref_id FROM tbl_interest ) AS a ";
                $l = mysqli_query($connection, $count);
                $t = mysqli_fetch_assoc($l);  */
                while ($data = mysqli_fetch_array($query)) {
                  $SumTotal = 0;
                  $total_price = 0;
                  $principle = $data['principle'];
                  $month = $data['r_mount'];
                  $rate = 2 / 100;

                ?>
                  <tr>
                    <td><?= ++$i ?></td>
                    <td><?= $data['in_date'] ?></td>
                    <td><?php echo $data['bill_no']; ?></td>
                    <td><?= $data['s_name'] . ' ' . $data['s_lastname'] ?></td>
                    <td>2</td>
                  </tr>

                <?php } ?>
                <table class="table">
                  <tr>
                    <td>เลขที่สัญญาจำนวน : <?php echo $f['bill']; ?> ฉบับ </td>
                    <td>รวมยอดชำระดอกเบี้ย : <?php echo $f['sum_price']; ?> บาท </td>
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
<style>
    .btn-red{
        background-color: #B22222;
    }
</style>