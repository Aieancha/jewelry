<?php
$sql = "SELECT *
FROM tbl_social
INNER JOIN tbl_status
ON tbl_social.s_role = tbl_status.id
WHERE tbl_status.id='1'";
$query = mysqli_query($connection, $sql);
?>

<?php
mysqli_select_db($connection, "");
$sqldb="SELECT count(s_id) as day3 FROM tbl_social WHERE DATEDIFF(c_date,Now()) = 3";
$rs=mysqli_query($connection, $sqldb);
$day3 = mysqli_fetch_assoc($rs);
//echo $day3['day3'];
if($day3['day3']>0){
  $noti_day3 = '<span class="noti-alert">'.$day3['day3'].'</span>';
}else{
  $noti_day3="";
}

/* $dt=new DateTime($sqldb);
$alertDate = $dt->format('d/m/Y');
echo '99999(',$alertDate,')'; */
?>

<div class="container-fluid py-4 ">
  <div class="row justify-content-between">
    <div class="col-auto">
      <h3 class="font-weight-bolder text-dark text-gradient ">การจัดการการชำระดอกเบี้ย</h3>
    </div>
  </div>

  <div class="d-flex justify-content-end">
    <form class="example" action="/action_page.php" style="margin: 7px;;max-width:200px">
      <input type="text" placeholder="เลขที่ราชการออกให้.." name="search2">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    <!--a href="?page=<?= $_GET['page'] ?>&function=insert" class="btn bg-gradient-primary">เพิ่มข้อมูลการจำนำ</a-->
  </div>
  <div class="row">
    <div class="card">
      <!-- title -->

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
                <td><?php echo $noti_day3; ?></td>
                <td><?= $data['s_name'] ?></td>
                <td><?= $data['principle']*0.02*$data['r_mount'] ?></td>
                <td class="text-danger"><?php echo $data['status_name']; ?></td>
                <td> <a href="?page=<?= $_GET['page'] ?>&function=update&id=<?= $data['s_id'] ?>" class="btn btn-sm btn-dark">ดูรายละเอียด</a></td>
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
  <style>
    body {
      font-family: Arial;
      border-radius: 25px;
    }

    * {
      box-sizing: border-box;
      border-radius: 10px;
      border-top-right-radius: 0px;
      border-bottom-right-radius: 0px;


    }

    form.example input[type=text] {
      padding: 5px;
      font-size: 17px;
      border: 1px solid grey;
      float: left;
      width: 80%;
      background: #ffff;

    }

    form.example button {
      float: left;
      width: 20%;
      padding: 5px;
      background: #C71585;
      color: white;
      font-size: 17px;
      border: 1px solid grey;
      border-left: none;
      cursor: pointer;
      border-radius: 10px;
      border-top-left-radius: 0px;
      border-bottom-left-radius: 0px;
    }



    form.example::after {
      content: "";
      clear: both;
      display: table;
    }
  </style>
