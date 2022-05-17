<?php
$sql = "SELECT *
FROM tbl_social
INNER JOIN tbl_bill
ON tbl_social.s_id = tbl_bill.bill_no
/* WHERE tbl_status.id=2 AND */
WHERE DATEDIFF(c_date, Now())= 3 or DATEDIFF(c_date, Now())= 2";
$query = mysqli_query($connection, $sql);
?>

<?php
mysqli_select_db($connection,"");
$sqldb = "SELECT count(s_id) as day3 FROM tbl_social WHERE DATEDIFF(c_date, Now())= 3 or DATEDIFF(c_date, Now())= 2";
$rs = mysqli_query($connection, $sqldb);
$day3=mysqli_fetch_assoc($rs);
if($day3['day3']>0){
  $noti_day3 = '<span class="noti-alert">'.$day3['day3'].'</span>';
}else{
  $noti_day3="";
}
?>

<div class="container-fluid py-4 ">
  <div class="row justify-content-between">
    <div class="col-auto">
      <h3 class="font-weight-bolder text-dark text-gradient ">การจัดการการชำระดอกเบี้ย</h3>
    </div>
  </div>
  <div class="row justify-content-between">
  <div class="d-flex justify-content-center mb-6">
      <a  class="btn btn-sm1 bg-gray-600 text-white m-1">แจ้งเตือนการชำระดอกเบี้ย</a>
      <a href="?page=<?= $_GET['page'] ?>&function=list" class="btn btn-sm1 bg-gray-500 m-1">รายการสรุปการชำระดอกเบี้ย</a>
      <a href="?page=<?= $_GET['page'] ?>&function=wait" class="btn btn-sm1 bg-gray-500  m-1">ตรวจสอบการชำระดอกเบี้ยโดยลูกค้า</a>
</div>
     <div class="d-flex justify-content-end">
        <div class="d-flex justify-content-end mb-2 ">
            <form class="example " action="" style="margin: 7px;;max-width:200px">
                <input type="text" placeholder="" name="search2 ">
                <button type="submit"><i class="fa fa-search btn-dark"></i></button>
            </form>
            
        </div>
        <a href="?#=<?= $_GET['#'] ?>&function=insert" class="btn btn-sm btn-dark text-white">สถานะ</a>
    </div>   
  <div class="row">
    <div class="card">
      <!-- title -->
      <h5 class="font-weight-bolder text-dark text-gradient m-3">ตารางแสดงข้อมูลลูกค้าที่ใกล้ครบกำหนดชำระค่างวด</h5>

      <!-- end title -->
      <div class="card-body overflow-auto p-3" style="text-align: center">
        <table class="table">
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
                <td><?php echo $data['start_date']; ?></td>
                <td><?php echo $data['c_date']; ?></td>
                <td><?= $data['bill_no'] ?></td>
                <td><?= $data['s_name'] ?></td>
                <td><?= $data['principle']*0.02 ?></td>
                <td><?= $data['phone'] ?></td>
                <td class="text-danger"><?php $status = $data['start_date'];
                                            if ($status == $data['start_date']) {
                                                echo "ค้างชำระ";
                                            } else {
                                                echo "ชำระแล้ว";
                                            } ?></td>
                <td> <a href="?page=<?= $_GET['page'] ?>&function=update&id=<?= $data['s_id'] ?>" class="btn btn-sm btn-green3 text-white">อัพเดทสถานะ</a></td>
                </td>
                <!-- <td> <a href="?page=<?= $_GET['page'] ?>&function=check" class="btn btn-sm btn-dark">ทดลองรุูป</a></td> -->

              </tr>
            <?php endforeach; ?>
          </tbody>

        </table>

      </div>
    </div>
  </div>
</div>
<?php
mysqli_close($connection);
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 