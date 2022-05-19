

<!DOCTYPE html>
<html lang="en"> 

<body class="app">  
<?php  
	$user = $_SESSION['customer_login']; 
	$sql = "SELECT * FROM tbl_social WHERE c_email = '$user'"; 
	$query = mysqli_query($connection, $sql); 
	$result = mysqli_fetch_assoc($query);   
	
	if (isset($_POST) && !empty($_POST)) {
		$email = $_POST['c_email'];
		$firstname = $_POST['s_name'];
		$lastname = $_POST['s_lastname'];
		//echo sha1(md5($m_pass));
			$sql = "UPDATE tbl_social
					SET c_email='$email', s_name='$firstname', s_lastname='$lastname'
					WHERE c_email = '$user'";

			if (mysqli_query($connection, $sql)) {
			  //echo "เพิ่มข้อมูลสำเร็จ";
			  $alert = '<script type= "text/javascript">';
			  $alert .= 'alert("อัพเดตข้อมูลสำเร็จ");';
			  $alert .= 'window.location.href = "?page=profile";';
			  $alert .= '</script>';
			  echo $alert;
			  exit();
			} else {
			  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
			}

			mysqli_close($connection);
		}
		?>
		
<div class="row g-0 app-wrapper app-auth-wrapper">
	<form action="" method="post" >	
		<div class="app-auth-body mx-auto ">
			<div style="margin-top: 1rem">	
		<div class="app-auth-branding text-center"><a class="app-logo" href="index.html" ><img class="logo-icon me-2" src="assets/images/PW-logo.png" alt="logo"></a></div>
		<label class="mb-3">Jewelry Pawn</label>
		</div>
		</div>
</div>
		<div class="app-wrapper">
<div class="app-content pt-3 p-md-3 p-lg-4"> 
		    <div class="container-xl">
			    <h1 class="app-page-title">ข้อมูลส่วนตัวของคุณ</h1>
                <div class="row gy-4">
	                <div class="col-12 col-lg-6">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						    <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
  <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">ข้อมูลการเข้าใช้งานระบบ และ ช่องทางการติดต่อ</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
						    <div class="app-card-body px-4 w-100">
							<label >ข้อมูลการเข้าใช้งานระบบ</label>
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>ชื่อผู้ใช้</strong></div>
											<input type="text"  name="c_email" value="<?= $result['c_email'] ?>" class="form-control1 " placeholder="" autocomplete="off">
									    </div><!--//col-->
									   
								    </div><!--//row-->   
							    </div><!--//item-->
								<label >ช่องทางการติดต่อ</label>
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>ชื่อผู้ใช้เฟสบุ้ค</strong></div>
											<input type="text"  name="c_facebook" value="<?= $result['c_facebook'] ?>" class="form-control1 " placeholder="" autocomplete="off">
									
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>ไอดีไลน์</strong></div>
									        <div class="item-data">
											<input type="text"  name="c_line" value="<?= $result['c_line'] ?>" class="form-control1 " placeholder="" autocomplete="off">
									    </div><!--//col-->
	</div>
								    </div><!--//row-->
							    </div><!--//item-->
							    
						    </div><!--//app-card-body-->
						    <div class="app-card-footer p-4 mt-auto">
							   <a class="btn app-btn-secondary" href="#">บันทึก</a>
						    </div><!--//app-card-footer-->
						   
						</div><!--//app-card-->
	                </div><!--//col-->
	                <div class="col-12 col-lg-6">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						    <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">ข้อมูลผู้ใช้งานระบบ</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->


						    <div class="app-card-body px-4 w-100">
							<div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>ชื่อจริง</strong></div>
											<input type="text"  name="s_name" value="<?= $result['s_name'] ?>" class="form-control1 " placeholder="" autocomplete="off">
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
								<div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>นามสกุล</strong></div>
											<input type="text"  name="s_lastname" value="<?= $result['s_lastname'] ?>" class="form-control1 " placeholder="" autocomplete="off">
										</div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
								<div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>เบอร์โทรศัพท์</strong></div>
											<input type="text"  name="phone" value="<?= $result['phone'] ?>" class="form-control1 " placeholder="" autocomplete="off">
										</div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
								<div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>ที่อยู่ปัจจุบัน</strong></div>
											<input type="text"  name="c_address" value="<?= $result['c_address'] ?>" class="form-control1 " placeholder="" autocomplete="off">
									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->
						    </div><!--//app-card-body-->
						    <div class="app-card-footer p-4 mt-auto">
							<button type="submit" name="save" class="btn app-btn-secondary">บันทึกข้อมูล</button>
								  
						    </div><!--//app-card-footer-->
						   
						</div><!--//app-card-->
	                </div><!--//col-->
	</form>
 
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 

</body>
</html> 
<style>
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
</style>
