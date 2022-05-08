<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_social WHERE s_id = '$id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
  }

?>
<body class="g-sidenav-show bg-gray-100">
  <div class="body main-content position-relative bg-white max-height-vh-100 h-100">
    <div class="container-fluid">
      <div class="card-header pb-0 text-left bg-transparent">
        <h3 class="font-weight-bolder text-dark text-dark text-center m-3">คำนวณดอกเบี้ย</h3>
      </div>
      <div class="card-header pb-0 text-left bg-transparent mb-6">
        <h8 class="font-weight-bolder text-dark text-dark text-left m-6 ">กรุณากรอกข้อมูลลูกค้าให้ถูกต้อง เพื่อคำนวณดอกเบี้ยการจำนำเครื่องประดับ</h8>
      </div>

      <div class="card-body">
      <?php
        if (isset($_POST) && !empty($_POST)) {
         
          $mount = $_POST['r_mount'];
          $interest = $_POST['interest'];
          $name = $_POST['rate_name'];
          $principle = $_POST['principle'];
          if( !empty( $principle ) && !empty( $mount ) ) {
            echo "<hr/>";
            $interest = $principle*0.02 *$mount;
        }

          $sql = "INSERT INTO tbl_rate (r_mount, interest, rate_name)
                      VALUES ('$mount', '$interest', '$name')";

          if (mysqli_query($connection, $sql)) {

            echo "จำนวนดอกเบี้ย = ".number_format( $interest, 2 );

          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
          }

          mysqli_close($connection);
        }
        //print_r($_POST);
        ?>

        <div class="box">
          <script type="text/javascript"></script>
          <form action="" method="post" class="regis">
            <div class="mb-6">
              <h5 class="" style="display: inline;">ราคาที่ตกลงจำนำ</h5>
              <h5 style="display: inline;"><?= $result['principle'] ?></h5>
            </div>

            <div class="mb-6">
              <h5 class="" style="display: inline;">จำนวนงวดที่จำนำ</h5>
              <h5 class="form-label text-danger" style="display: inline;">*</h5>
              <input type="number" class="form-control " name="r_mount" min="2" max="24" placeholder="สูงสุด 24 งวด" autocomplete="off" require>
            </div>

            <h5 class="" style="display: inline;">รูปแบบการชำระดอกเบี้ย</h5>
            <h5 class="form-label text-danger" style="display: inline;">*</h5>
            <div class="mb-6 col-12 ">
              <select name="rate_name" class="form-control w-60" require>
                <option value="" selected="selected">เลือกรูปแบบการชำระ</option>
                <option value="Advance">คิดดอกเบี้ยแบบจ่ายก่อน</option>
                <option value="Arrears">คิดดอกเบี้ยแบบจ่ายทีหลัง</option>
                <option value="Pawn">คิดดอกเบี้ยแบบโรงรับจำนำ</option>
              </select>
            </div>
            <div class="d-flex flex-row">
              <div class="justify-content-start flex-fill ">
                <a href="?page=<?= $_GET['page'] ?>&function=customr" class="btn bg-gradient-dark">ย้อนกลับ</a>
              </div>
              <div class="flex-fill d-flex justify-content-end gap-1">
              <button type="submit" class="btn bg-gradient-dark pull-right ">บันทึก</button>
              </div>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</body>

<style>
  .regis {
    width: 70%;
    display: block;
    margin: auto;
  }

  .body {
    width: 50%;
    display: block;
    margin: auto;
    border-radius: 20px;
  }

  .box {
    width: 100%;
    display: block;
    margin: auto;
    border-radius: 20px;
    background-color: rgb(255, 255, 255);
  }
</style>