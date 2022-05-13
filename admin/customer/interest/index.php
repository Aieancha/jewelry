<?php
$sql = "SELECT *
FROM tbl_social
INNER JOIN tbl_status
ON tbl_social.s_role = tbl_status.id
/* WHERE tbl_status.id=2 AND */
WHERE DATEDIFF(c_date, Now())= 3";
$query = mysqli_query($connection, $sql);
?>

<?php
mysqli_select_db($connection,"");
$sqldb = "SELECT count(s_id) as day3 FROM tbl_social WHERE DATEDIFF(c_date, Now())= 3";
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
     <div class="d-flex justify-content-end">
        <div class="d-flex justify-content-end mb-2 ">
            <form class="example " action="/action_page.php" style="margin: 7px;;max-width:200px">
                <input type="text" placeholder="ชื่อผู้ใช้งาน.." name="search2 ">
                <button type="submit"><i class="fa fa-search btn-dark"></i></button>
            
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
              <th scope="col">รอบการชำระ</th>
              <!-- <th scope="col">รหัสผู้จำนำ</th> -->
              <th scope="col">ชื่อผู้จำนำ</th>
              <!-- <th scope="col">รหัสสินค้าที่จำนำ</th> -->
              <th scope="col">จำนวนเงินที่ต้องชำระ</th>
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
                <td><?php echo $data['c_date']; ?></td>
                <td><?= $data['s_name'] ?></td>
                <td><?= $data['principle']*0.02*$data['r_mount'] ?></td>
                <td class="text-danger"><?php echo $data['status_name']; ?></td>
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
 