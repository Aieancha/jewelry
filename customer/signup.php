<?php include('../connection/connection.php') ?>

<!DOCTYPE html>
<html lang="en"> 
<?php include('include/head.php') ?> 
<?php include('include/style.php') ?>       

<body class="app app-signup p-0"> 
<?php
                if (isset($_POST) && !empty($_POST)) {
                    /* echo '<pre>';
          print_r($_FILES);
          echo '</pre>';
          exit(); */
                    $id = $_POST['c_id'];
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $address = $_POST['c_address'];
                    $phone = $_POST['phone'];
                    $email = $_POST['c_email'];
					$age = $_POST['c_age'];
					
                    $sql = "INSERT INTO tbl_customer (c_id, firstname, lastname, c_address, phone, c_email,c_age ,c_img)
                                    VALUES ('$id', '$firstname', '$lastname','$address', '$phone', '$email','$age','$img')";

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
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/PW-logo.png" alt="logo"></a></div>
					<label class="mb-3">Jewelry Pawn</label>
                    <h2 class="auth-heading text-center mb-4">สมัครสมาชิกใหม่</h2>					
	
					<div class="auth-form-container text-start mx-auto">
						<form class="auth-form auth-signup-form">         
							<div class="email mb-3">
							<label >อีเมล *</label>
								<label class="sr-only" for="signup-email">อีเมล</label>
								<input type="email"  name="c_email" class="form-control signup-name" placeholder="อีเมล *" required="required">
							</div>
							<div class="email mb-3">
							<label >รหัสผ่าน *</label>
								<label class="sr-only" for="signup-email">รหัสผ่าน</label>
								<input id="signup-password" name="signup-password" type="password" class="form-control signup-password" placeholder="สร้างรหัสผ่าน *" required="required">
							</div>
							<div class="d-flex flex-row ">
							<div class="justify-content-start flex-fill ">
								<label >ไอดีไลน์</label>
								</div>	
								<div class="flex-fill d-flex justify-content-start gap-1">
								<label >เฟสบุ้ค</label>
							</div>
							</div>
                            <div class="d-flex flex-row mb-3">
                                <div class="justify-content-start flex-fill ">
								<label class="sr-only " for="signup-password">ไลน์</label>
								<input  class="form-control signup-password" name="age"  placeholder="ไอดีไลน์">
                            </div>
                                <div class="flex-fill d-flex justify-content-end gap-1">
								<label class="sr-only" for="signup-password">เฟสบุ้ค</label>
								<input id="" name="signup-facebook" type="faceboo" class="form-control signup-password" placeholder="ชื่อผู้ใช้เฟสบุ้ค" >
					
                            </div>
                            </div>
                            <div class="d-flex flex-row mb-3">
								<label >ชื่อจริง *</label>
                                <div class="justify-content-start flex-fill ">
								<label class="sr-only " for="signup-password">ชื่อจริง</label>
								<input type="text" class="form-control " name="firstname"  class="form-control signup-password" placeholder="ชื่อจริง *">
                            </div>
                                <div class="flex-fill d-flex justify-content-end gap-1">
								<label >นามสกุล *</label>
								<label class="sr-only" for="signup-password">นามสกุล</label>
								<input type="text" class="form-control " name="lastname" class="form-control signup-password" placeholder="นามสกุล *" >
					
                            </div>
                            </div>
							<div class="password mb-3">
								<label >เบอร์โทรศัพท์ *</label>
								<label class="sr-only" for="signup-password">เบอร์โทร</label>
								<input type="number" name="phone" pattern="^[0-9\s]+$" minlength="10" class="form-control signup-password" placeholder="เบอร์โทรศัพท์ *" required="required">
							</div>
                            <div class="password mb-3">
								<label >ที่อยู่</label>
								<label class="sr-only" for="signup-password">ที่อยู่</label>
								<input type="text" class="form-control " name="c_address" class="form-control signup-password" placeholder="ที่อยู่ปัจจุบัน" required="required">
							</div>

							<!--div class="extra mb-3">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
									
								</div>
							</div--><!--//extra-->
				
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">สมัครสมาชิก</button>
							</div>
						</form><!--//auth-form-->
						
					</div><!--//auth-form-container-->	
					
					
				    
			    </div><!--//auth-body-->
		    
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">			    
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->
	<script>
	
	</script>

</body>
</html> 

