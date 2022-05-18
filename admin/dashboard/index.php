<?php
$sql = "SELECT * FROM tbl_social
INNER JOIN tbl_interest ON tbl_interest.ref_id = tbl_social.s_id
INNER JOIN tbl_bill ON tbl_social.s_id = tbl_bill.s_id
group by tbl_social.s_id ORDER BY in_date";
$query = mysqli_query($connection, $sql);
?>

<div class="container-fluid py-4 ">
  <div class="row justify-content-between">
    <div class="col-auto">
      <h3 class="font-weight-bolder text-dark text-gradient ">ข้อมูลการจำนำเครื่องประดับ</h3>
    </div>
  </div>
  <div class="d-flex justify-content-end">
    <div class="d-flex justify-content-end mb-2">
      <form class="example" action="/action_page.php" style="margin: 7px;;max-width:200px">
        <input type="text" placeholder="เลขที่ราชการออกให้.." name="search2">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
    <a href="" class="btn bg-gradient-primary">สถานะ</a>
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
              <th scope="col">เลขที่สัญญา</th>
              <th scope="col">ชื่อผู้จำนำ</th>
              <th scope="col">ช่องทางการติดต่อ</th>
              <th scope="col">รหัสสินค้าที่จำนำ</th>
              <th scope="col">สถานะ</th>
              <th scope="col">เปลี่ยนสถานะ</th>
              <th scope="col">รายละเอียดเพิ่มเติม</th>


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
                <td><?php echo $data['s_name']; ?></td>
                <td><?php echo $data['social_contact']; ?></td>
                <td><?= $data['ref_img'] ?></td>
                <td><?= $data['ref_img'] ?></td>
                <td></td>
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
</style>