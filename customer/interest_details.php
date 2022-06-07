<?php
$id = $_SESSION['customer_login'];
$sql = "SELECT * FROM tbl_social INNER JOIN tbl_orders ON tbl_social.s_id=tbl_orders.s_id INNER JOIN tbl_bill ON tbl_social.s_id=tbl_bill.s_id WHERE c_email = '$id'";
$query = mysqli_query($connection, $sql);
$result = mysqli_fetch_assoc($query);
$status = $result['bill_role'];
if($status==0){
	 $status = "ค้างชำระ";
}elseif($status==1){
	 $status = "ครบสัญญา";
}elseif($status==2){
	 $status = "ผิดสัญญาสัญญา";
}else{
	 $status = "ไถ่ถอนก่อนกำหนด";
}
$id=$_SESSION["s_id"];
$sqldb = "SELECT count(s_id) as day3 FROM tbl_social WHERE DATEDIFF(c_date, Now())= 3 or DATEDIFF(c_date, Now())= 2 && s_id='$id'";
$rs = mysqli_query($connection, $sqldb);
$day3=mysqli_fetch_assoc($rs);
if($day3['day3']>0){
  $noti_day3 = '<span class="noti-alert">'.$day3['day3'].'</span>';
}else{
  $noti_day3="";
}
?>


<body class="app">
  <div class="row g-0 app-wrapper app-auth-wrapper">
    <div class="app-auth-body mx-auto ">
      <div style="margin-top: 1rem">
        <div class="app-auth-branding text-center"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/PW-logo.png" alt="logo"></a></div>
        <label class="mb-3">Jewelry Pawn</label>
      </div>
    </div>
  </div>

  <div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
      <div class="container-xl">
        <h1 class="app-page-title">ข้อมูลรายการชำระดอกเบี้ย</h1>
        <div class="d-flex flex-row">
          <div class="flex-fill d-flex justify-content-end gap-1 ">
            <a class="btn app-btn-secondary " href="?page=<?= $_GET['page'] ?>">รายการที่ชำระเเล้ว</a>
          </div>
          <div class="flex-fill d-flex justify-content-start gap-1">
            <div class="btn app-btn-secondary bg-NGG" href="#">
              <a>รายการที่<a style="text-decoration: underline">ครบกำหนด<a>ชำระ</a>
              <!-- <span class="text-danger">&nbsp;<?php  echo  $noti_day3; ?></span> -->
            </div>
          </div>

        </div>
        <!--//app-card-->
      </div>
      <!--//col-->
      <div class="col-11 m-3">
        <div class="app-card  shadow-sm  align-items-start">
          <div class="app-card-header p-3 border-bottom-0">
            <div class="row align-items-center gx-3">
              <div class="col-auto">
                <div class="app-icon-holder">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                  </svg>
                </div>
                <!--//icon-holder-->

              </div>
              <!--//col-->
              <div class="col-auto">
                <h4 class="app-card-title">รายละเอียดการชำระดอกเบี้ย</h4>
              </div>
              <!--//col-->
            </div>
            <!--//row-->
          </div>
          <!--//app-card-header-->
          <div class="col-11 m-5 overflow-auto">

            <body class="body2">
              <table>
                <thead>
                  <tr>
                    <th scope="col">งวดที่</th>
                    <th scope="col">เลขที่สัญญา</th>
                    <th scope="col">จำนวนดอกเบี้ยที่ต้องชำระ</th>
                    <th scope="col">สถานะ</th>
                    <th scope="col">แนบหลักฐานการชำระดอกเบี้ย</th>


                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i = 0;
                  foreach ($query as $result) : ?>
                    <tr>
                      <td>3</td>
                      <td><?= $result['bill_no'] ?></td>
                      <td><?= ($result['principle'] * 0.02) ?>฿</td>
                      <td><?php echo $status; ?></td>
                      <td><a class="btn1 app-btn-secondary" href="?page=<?= $_GET['page'] ?>&function=updatebill&id=<?= $result['s_id'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z" />
                          </svg></a></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>

              </table>
            </body>
          </div>
        </div>


      </div>
      <!--//app-card-body-->


    </div>
    <!--//app-card-->
  </div>
  <!--//col-->

  <!-- Javascript -->
  <script src="assets/plugins/popper.min.js"></script>
  <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

  <!-- Page Specific JS -->
  <script src="assets/js/app.js"></script>

</body>

</html>
<style>
  .app-card .app-icon-holder {
    display: inline-block;
    background: #9b0e2140;
    color: #9b0e21;
    width: 50px;
    height: 50px;
    padding-top: 10px;
    font-size: 1rem;
    text-align: center;
    border-radius: 50% !important
  }

  .app-auth-wrapper {
    background: #f5f6fd;
    height: 100px !important
  }

  .app-auth-wrapper .app-auth-body {
    width: auto !important
  }

  .m-5 {
    margin: 0rem !important;
  }

  .body2 {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  table {
    margin: auto;
  }

  th {
    color: #9b0e21
  }

  th,
  td {
    padding: .8rem;
    text-align: center
  }

  .btn1 {
    color: #9b0e21;
    width: 50px;
    line-height: 35px;
    display: inline-block;
    /* border: #9b0e21; */
    border-color: #9b0e21;
    text-align: center
  }

  thead {
    background-color: #fff;
    color: #9b0e21;
  }

  @media screen and (max-width: 600px) {
    thead {
      display: none;
    }

    td {
      display: block;
    }

    td:first-child {
      background-color: #9b0e21;
      color: #fff;
      border-color: #9b0e21;
    }

    td:nth-child(2)::before {
      content: "เลขที่สัญญา";
    }

    td:nth-child(3)::before {
      content: "จำนวนดอกเบี้ยที่ต้องชำระ";
    }

    td:nth-child(4)::before {
      content: "สถานะ";
    }

    td:nth-child(5)::before {
      content: "แนบหลักฐานการโอน";
    }

    td {
      text-align: right;
    }

    td::before {
      float: left;
      margin-right: 3rem
    }
  }

  .m-5 {
    margin: 1rem !important;
  }
</style>