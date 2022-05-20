<?php
$user = $_SESSION['customer_login']; 
$sql = "SELECT * FROM tbl_social WHERE c_email = '$user'"; 
$query = mysqli_query($connection, $sql); 
$result = mysqli_fetch_assoc($query);  
                if (isset($_POST) && !empty($_POST)) {
                    /* echo '<pre>';
          print_r($_FILES);
          echo '</pre>';
          exit(); */
                    $type =$_POST['s_type'];
                    $cus_price =$POST_['cus_price'];
                    $s_detail =$POST_['s_detail'];

                    if (isset($_FILES['c_img']['name']) && !empty($_FILES['c_img']['name'])) {
                      $extension = array("jpeg", "jpg", "png");
                      $target = 'upload/social/';
                      $filename = $_FILES['c_img']['name'];
                      $filetmp = $_FILES['c_img']['tmp_name'];
                      $ext = pathinfo($filename, PATHINFO_EXTENSION);
                      if (in_array($ext, $extension)) {
                        if (!file_exists($target . $filename)) {
                          if (move_uploaded_file($filetmp, $target . $filename)) {
                            $filename = $filename;
                          } else {
                            $alert = '<script type="text/javascript">';
                            $alert .= 'alert("เพิ่มไฟล์เข้าโฟลเดอร์ไม่สำเร็จ");';
                            $alert .= 'window.location.href = "?page=admin&function=insert";';
                            $alert .= '</script>';
                            echo $alert;
                            exit();
                          }
                        } else {
                          $newfilename = time() . $filename;
                          if (move_uploaded_file($filetmp, $target . $newfilename)) {
                            $filename = $newfilename;
                          } else {
                            $alert = '<script type="text/javascript">';
                            $alert .= 'alert("เพิ่มไฟล์เข้าโฟลเดอร์ไม่สำเร็จ");';
                            $alert .= 'window.location.href = "?page=admin&function=insert";';
                            $alert .= '</script>';
                            echo $alert;
                            exit();
                          }
                        }
                      } else {
                        echo 'ประเภทไฟล์ไม่ถูกต้อง';
                        $alert = '<script type="text/javascript">';
                        $alert .= 'alert("ประเภทไฟล์ไม่ถูกต้อง");';
                        $alert .= 'window.location.href = "?page=admin&function=insert";';
                        $alert .= '</script>';
                        echo $alert;
                        exit();
                      }
                    } else {
                      $filename = '';
                    }

					
					
                    //$sql = "UPDATE tbl_social SET s_type ='$type',cus_price='$cusprice',s_img='$s_img',s_detail='$detail' WHERE c_email = '$user'";
                    $sql = "INSERT INTO tbl_social (c_img,s_type,cus_price,s_detail)
                                            VALUES ('$img','$type','$cus_price','$s_detail')";

                    if (mysqli_query($connection, $sql)) {
                        //echo "เพิ่มข้อมูลสำเร็จ";
                        $alert = '<script type="text/javascript">';
                        $alert .= 'alert("เพิ่มข้อมูลสำเร็จ");';
                        $alert .= 'window.location.href = "?function=check";';
                        $alert .= '</script>';
                        echo $alert;
                        exit();
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                    }

                    mysqli_close($connection);
                }



                //print_r($_POST);
?>
<form  action="" method="post" >
<body class="app">  
<div class="row g-0 app-wrapper app-auth-wrapper">
		<div class="app-auth-body mx-auto ">
			<div style="margin-top: 1rem">	
		<div class="app-auth-branding text-center"><a class="app-logo" href="index.html" ><img class="logo-icon me-2" src="assets/images/PW-logo.png" alt="logo"></a></div>
		<label class="mb-3">Jewelry Pawn</label>
		</div>
		</div>
</div>

		<div class="app-wrapper">
<div class="app-content pt-3 p-md-3 p-lg-4"> 
		    <div class="container-xl ">
			    <h3 class="">แบบฟอร์มยื่นจำนำเครื่องประดับ</h3>
              </div>
              <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                <div class="row gy-4">
	                <div class="col-12 ">
                                <h6 class=" m-3">กรอกข้อมูลเครื่องประดับที่ต้องการยื่นจำนำ</h6>
                  </div>
          <div class="mb-3 col-12 center">
            <h6 style="display: inline;">รายละเอียดสินค้า</h6>
            <h5 class="form-label text-danger" style="display: inline;">*</h5>
            <select name="s_type" class="form-control center2" required>
                <option value="" selected="selected">เลือกประเภทเครื่องประดับ</option>
                <option value="ทองคำ(Gold)">ทองคำ(Gold)</option>
                <option value="ทองคำขาว(Platinum)">ทองคำขาว(Platinum)</option>
                <option value="ทองชมพู(Pink Gold)">ทองชมพู(Pink Gold)</option>
                <option value="นาก(Red Gold)">นาก(Red Gold)</option>
                <option value="ทองขาว(white Gold)">ทองขาว(white Gold)</option>
                <option value="อื่นๆ">อื่นๆ</option>
              </select>
        </div>
        <div class="mb-3 col-12 center3">
              <h6 style="display: inline;">รายละเอียดเครื่องประดับ</h6>
            <h5 class="form-label text-danger " style="display: inline;">*</h5>
            <div class="col-7">
            <label style="font-size: 0.5rem;">กรุณากรอกน้ำหนัก อัญมณี ตำหนิ(ถ้ามี)</label>
              <input type="text" class="form-control center1" name="s_detail" placeholder="" autocomplete="off" required>
          </div>
        </div>
          <div class="mb-3 col-12 center">
            <h6 style="display: inline;">ราคาที่ต้องการจำนำ</h6>
            <div class="col-7">
            <input type="number" class="form-control " name="cus_price" placeholder="หน่วยเป็นบาท" autocomplete="off" >
          </div>
        </div>
        <div class="mb-3 col-12 center">
          <div class=" col-12 " style="magin-top: 2;">
            <h6 style="display: inline;">ภาพถ่ายสินค้าจริง</h6>
            <h5 class="form-label text-danger " style="display: inline;">*</h5>
            <input type="file" id="myFile" name="c_img" multiple required>
          </div>
        </div>
      </div>

      <div class="app-card-footer p-4 mt-auto" style="margin-left: 60%">
        <button type="submit" class="btn app-btn-secondary ">บันทึก</button>
      </div>        
    </from>
						    </div><!--//app-card-footer-->
        </div>
        
                            </div><!--//app-card-header-->
                        </div><!--//app-card-->   
	                </div><!--//col-->
                </div><!--//row gy-->
    
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 

</body>
</html>
<style>
  
    .center {
    margin-left: 6%;
    width: 50%;
    height: 14% !important;
}.center1 {
    width: 100%;
    height: 14% !important;
}.center2 {
    width: 10rem;
    height: 14% !important;
}.center3 {
    margin-left: 6%;
    width: 100%;
    height: 14% !important;
}
.app-card .app-icon-holder{
    display: inline-block;
    background: #9b0e2140;
    color: #9b0e21;
    width: 50px;
    height: 50px;
    padding-top: 10px;
    font-size: 1rem;
    text-align: center;
    border-radius: 50%
	!important}
.app-auth-wrapper {
    background: #f5f6fd;
    height: 100px
	!important}
.app-auth-wrapper .app-auth-body {
    width: auto !important
}
