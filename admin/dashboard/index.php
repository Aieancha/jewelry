<?php
$sql = "SELECT * FROM tbl_social
INNER JOIN tbl_status ON tbl_social.s_role = tbl_status.id
INNER JOIN tbl_bill ON tbl_social.s_id = tbl_bill.s_id
INNER JOIN tbl_orders ON tbl_social.s_id = tbl_orders.s_id
/* WHERE tbl_status.id=2 AND */
/* WHERE DATEDIFF(c_date, Now())= 3 or DATEDIFF(c_date, Now())= 2  */
group by tbl_social.s_id ORDER BY start_date";
$query = mysqli_query($connection, $sql);
$result=mysqli_fetch_assoc($query);
?>

<div class="container-fluid py-4 ">
  <div class="row justify-content-between">
    <div class="col-auto">
      <h3 class="font-weight-bolder text-dark text-gradient ">ข้อมูลการจำนำเครื่องประดับ</h3>
    </div>
  </div>
  <div class="row justify-content-between">
     <div class="d-flex justify-content-end">
        <div class="d-flex justify-content-end mb-2 ">
            <form class="example " action="/action_page.php" style="margin: 7px;;max-width:200px ">
                <input type="text" placeholder="ชื่อผู้ใช้งาน.." name="search2 ">
                <button type="submit"><i class="fa fa-search btn-dark"></i></button>
            
        </div>
    <a href="" class="btn btn-sm btn-dark text-white">สถานะ</a>
  </div>
  <div class="row">
    <div class="card">
    <h5 class="font-weight-bolder text-dark text-gradient m-3">ตารางแสดงข้อมูลลูกค้าทั้งหมด</h5>

      <!-- title -->

      <!-- end title -->
      <div class="card-body overflow-auto p-3" style="text-align: center">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ลำดับ</th>
              <th scope="col">เลขที่สัญญา</th>
              <th scope="col">ชื่อผู้จำนำ</th>
              <th scope="col">สถานะ</th>
              <th scope="col">รายละเอียดเพิ่มเติม</th>
              <th scope="col">เปลี่ยนสถานะ</th>
              


            </tr>
          </thead>
          <tbody>


            <?php
            $i = 0;
            if (isset($_GET['id']) && !empty($_GET['id'])) {
              $id = $_GET['id'];
              $sql = "SELECT * FROM tbl_social WHERE s_id = '$id'";
              $query = mysqli_query($connection, $sql);
          }
            foreach ($query as $data) : ?>
              <tr>
                <td><?= ++$i ?></td>
                <td><?php echo $data['bill_no']; ?></td>
                <td><?php echo $data['s_name'] .' '.$data['s_lastname']; ?></td>
                <td><?= $data['status_name'] ?></td>
                <td> <a href="?&function=details&id=<?= $data['s_id'] ?>" class="btn btn-sm btn-gray-600"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon " style="display: inline-block;color: #1e48dd;height: 2em;width: 2em;" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.854 8.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707l-4.096 4.096z"/>
                                </svg></a></td>
                <td> <a href="?function=ChangeStatus&id=<?= $data['s_id'] ?>" class="btn btn-sm btn-blue2 text-white">เปลี่ยนสถานะ</a></td>
                <td></td>
              
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
    font-size: 15px;
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
    font-size: 15px;
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
  form.example button {
    float: left;
    width: 20%;
    padding: 5px;
    background: #344767;
    color: white;
    font-size: 15px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
    border-radius: 10px;
    border-top-left-radius: 0px;
    border-bottom-left-radius: 0px!important
}


</style>