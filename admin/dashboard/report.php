<?php
$sql = "SELECT * FROM tbl_social
INNER JOIN tbl_orders ON tbl_social.s_id = tbl_orders.s_id
INNER JOIN tbl_bill ON tbl_social.s_id = tbl_bill.s_id
INNER JOIN tbl_interest ON tbl_interest.ref_id = tbl_social.s_id ORDER BY start_date";
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
  echo "<button type='button' class='btn btn-default' onClick='window.location.href =\"./?function=report=$month\"'>".$thai[(int)($data['month']-1)]."($row)</button>";
}
? -->
<div class="row justify-content-between">
  <div class="d-flex justify-content-center mb-6">
    <a href="?function=report" class="btn btn-sm1 bg-gray-600 text-white m-1">รายงานสรุปยอดการชำระดอกเบี้ย</a>
    <a href="?&function=overdue" class="btn btn-sm1 bg-gray-500 m-1">รายงานสรุปยอดค้างชำระชำระดอกเบี้ย</a>
    <a href="?&function=EndContract" class="btn btn-sm1 bg-gray-500  m-1">รายการสรุปการปิดบัญชี</a>
  </div>
  <!-- <div class="d-flex justify-content-end">
    <div class="d-flex justify-content-end mb-2 ">
      <form class="example " action="" style="margin: 7px;;max-width:200px">
        <input type="text" placeholder="" name="search2 ">
        <button type="submit"><i class="fa fa-search btn-dark"></i></button>
      </form>

    </div>
    <a href="" class="btn btn-sm btn-dark text-white">สถานะ</a>
  </div> -->
  <div class="row">
    <div class="card">
      <!-- title -->
      <h5 class="font-weight-bolder text-dark text-gradient m-3">รายงานสรุปยอดการชำระดอกเบี้ย</h5>

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
                    <th scope="col">งวดที่ชำระ</th>
                    <th scope="col">จำนวนดอกเบี้ยที่ชำระ</th>
                    <th scope="col">จำนวนดอกเบี้ยคงเหลือ</th>
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
                  $principle = $data['principle'];
                  $balance = $data['in_balance'];
                  $total=$balance-$principle;

                ?>
                  <tr>
                    <td><?= ++$i ?></td>
                    <td><?= $data['in_date'] ?></td>
                    <td><?php echo $data['bill_no']; ?></td>
                    <td><?= $data['s_name'] . ' ' . $data['s_lastname'] ?></td>
                    <td><?= $data['in_after'] .'/'.$data['r_mount'] ?></td>
                    <td><?= number_format($data['in_befor']) ?></td>
                    <td><?php echo number_format($total) ?></td>
                  </tr>

                <?php } ?>
                <table class="table">
                  <tr>
                    <td>เลขที่สัญญาจำนวน : <?php echo $r['bill']; ?> ฉบับ </td>
                    <td>รวมยอดชำระดอกเบี้ย : <?php echo number_format($f['sum_price']); ?> บาท </td>
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