<!DOCTYPE html>
<html lang="en">

<body class="g-sidenav-show bg-gray-100">
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid">
            <!-- title -->
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h3 class="font-weight-bolder text-dark text-gradient ">ขั้นตอนการบันทึกข้อมูลการจำนำเครื่องประดับ</h3>
                </div>
                <div class="col-auto">
                    <a href="?page=<?= $_GET['page'] ?>" class="btn btn-primary">ย้อนกลับ</a>
                </div>
            </div>
            <!-- end title -->
            <hr class="add mb-4">
             
              <div class="card-body">
                <form role="form text-left">
                  <h5 class="pb-5">กรอกข้อมูลผู้สนใจจำนำเครื่องประดับ</h5>
                  <div class="mb-4 col-lg-5 ">
                    <h6 >ช่องทางการติดต่อ</h6>
                    <div class="dropdown">
                      <button class="form-control">เลือกช่องทางการติดต่อ</button>
                      <div class="dropdown-content bg-white">
                      <a>Facebook</a>
                      <a>Line</a>
                      
                      </div>
                    </div>
                 </div>
                  <div class="mb-4 col-3 ">
                    <h6>ชื่อผู้ใช้*</h6>
                    <input type="name" class="form-control " placeholder="กรอกชื่อผู้ใช้ที่ติดต่อ" require>
                  </div>
                  <div class="mb-4 col-3 ">
                  <h6>ภาพถ่ายสินค้าจริง*</h6>
                      <form  action="/action_page.php">
                          <input type="file" id="myFile" name="filename">
                      </form>
                  </div>
                  <div class="mb-3 col-3 ">
                    <h6>ราคาประเมินจากภาพ</h6>
                      <input type="name" class="form-control " placeholder="กรอกราคาประเมิน (หน่วยเป็นบาท)" require>
                    </div>
                    <div class="ms-auto text-end ">
                      <button type="button" class="btn bg-gradient-dark">บันทึก</button> 
                      <a href="../data-page/data-pawn3.php" class="btn btn-color1 bg-gradient-dark theme-btn mx-auto ">ดำเนินการต่อ</a> 
                      </div>   
                      <div class="mb-4 col-3 ">
                    <h6>ราคาประเมินจากสินค้าจริง*</h6>
                    <input type="name" class="form-control " placeholder="กรอกราคาประเมินจากสินค้าจริง" aria-label="Email" aria-describedby="email-addon">
                  </div>
                  <div class="mb-3 col-3 ">
                    <h6>ราคาที่ตกลงจำนำ</h6>
                      <input type="name" class="form-control " placeholder="กรอกราคาที่ตกลงจำนำ " aria-label="Email" aria-describedby="email-addon">
                    </div>          
              </div>
            
    

        </div>
    </div>
</body>

</html>
<style>
    .add {
    width: 70%;
    display: block;
    margin: auto;
  }

</style>