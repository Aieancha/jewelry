<?php
$sql = "SELECT *
FROM tbl_social
INNER JOIN tbl_status
ON tbl_social.s_role = tbl_status.id
WHERE tbl_social.s_role=3";
$query = mysqli_query($connection, $sql);


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
            </form>
            
        </div>
        <a href="?#=<?= $_GET['#'] ?>&function=insert" class="btn btn-sm btn-dark text-white">สถานะ</a>
    </div>   
  <div class="row">
    <div class="card">
      <!-- title -->
      <h5 class="font-weight-bolder text-dark text-gradient m-3">ตารางแสดงรายการยืนยันข้อมูลการชำระดอกเบี้ย</h5>

      <!-- end title -->
      <div class="card-body overflow-auto p-3" style="text-align: center">
      <table class="table">
      <thead>
            <tr>
              <th scope="col">ลำดับ</th>
              <th scope="col">รอบการชำระ</th>
              <th scope="col">ชื่อผู้จำนำ</th>
              <th scope="col">จำนวนเงินที่ชำระ</th>
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
                <td><?php echo $data['c_date']; ?></td>
                <td><?= $data['s_name'] ?></td>
                <td><?= $data['principle']*0.02*$data['r_mount'] ?></td>
                <td><?= $data['phone'] ?></td>
                <td class="text-danger"><?php echo $data['status_name']; ?></td>
                <td><a class="btn btn-sm btn-green3 text-white">ยืนยันข้อมูล</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          
      </table>
      </div>
    </div>
  </div>
</div>
