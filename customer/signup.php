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
                    $id = $_POST['s_id'];
                    $firstname = $_POST['s_name'];
                    $lastname = $_POST['s_lastname'];
                    $address = $_POST['c_address'];
                    $phone = $_POST['phone'];
                    $pass = $_POST['c_pass'];
                    $email = $_POST['c_email'];
                    $line = $_POST['c_line'];
                    $face = $_POST['c_facebook'];
					
					
                    $sql = "INSERT INTO tbl_social (s_id, s_name, s_lastname, c_address, phone, c_email,c_img, c_pass,c_line,c_facebook)
                                    VALUES ('$id', '$firstname', '$lastname','$address', '$phone', '$email','$img','$pass','$line','$face')";

                    if (mysqli_query($connection, $sql)) {
                        //echo "เพิ่มข้อมูลสำเร็จ";
                        $alert = '<script type="text/javascript">';
                        $alert .= 'alert("เพิ่มข้อมูลสำเร็จ");';
                        $alert .= 'window.location.href = "?function=check";';
                        $alert .= 'window.location.href = "login.php";';
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
	    <div class="auth-main-col text-center p-5">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/PW-logo.png" alt="logo"></a></div>
					<label class="mb-3">Jewelry Pawn</label>
                    <h2 class="auth-heading text-center mb-4">สมัครสมาชิกใหม่</h2>					
	
					<div class="auth-form-container text-start mx-auto">
						<form class="auth-form auth-signup-form">         
							<div class="email mb-3">
							<label style="display: inline;">อีเมล </label><label style="display: inline;" class ="text-danger"> *</label>
								<label class="sr-only" for="signup-email">อีเมล</label>
								<input type="email"  name="c_email" class="form-control signup-name" placeholder="example@gmail.com " required="required">
							</div>
							<div class="email mb-3">
							<label style="display: inline;">รหัสผ่าน </label><label style="display: inline;" class ="text-danger"> *</label>
								<label class="sr-only" for="signup-email">รหัสผ่าน</label>
								<input id="signup-password" name="c_pass" type="password" class="form-control signup-password" placeholder="สร้างรหัสผ่าน " required="required">
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
                                <div class="justify-content-start flex-fill " style='margin-right:5px'>
								<label class="sr-only " for="signup-password">ไลน์</label>
								<input  class="form-control signup-password" name="c_line" type="line"  placeholder="กรอกไอดีไลน์">
                            </div>
                                <div class="flex-fill d-flex justify-content-end gap-1">
								<label class="sr-only" for="signup-password">เฟสบุ้ค</label>
								<input id="" name="c_facebook" type="face" class="form-control signup-password" placeholder="ชื่อผู้ใช้เฟสบุ้ค" >
					
                            </div>
                            </div>
							<div class="d-flex flex-row ">
							<div class="justify-content-start flex-fill ml-1">
								<label style="display: inline;">ชื่อจริง </label><label style="display: inline;" class ="text-danger"> *</label>
								</div>	
								<div class="flex-fill d-flex justify-content-start gap-1">
								<label style="display: inline;">นามสกุล<lable style="display: inline;"class ="text-danger"> *</label>
							</div>
							</div>
                            <div class="d-flex flex-row mb-3">
                                <div class="justify-content-start flex-fill "style='margin-right:5px'>
								<label class="sr-only " for="signup-password">ชื่อจริง</label>
								<input type="text" class="form-control " name="s_name"  class="form-control signup-password" placeholder="กรอกชื่อจริง ">
                            </div>
                                <div class="flex-fill d-flex justify-content-end gap-1" >
								<label class="sr-only" for="signup-password">นามสกุล</label>
								<input type="text" class="form-control " name="s_lastname" class="form-control signup-password" placeholder="กรอกนามสกุล " >
					
                            </div>
                            </div>
							<div class="password mb-3">
								<label style="display: inline;" >เบอร์โทรศัพท์ </label><label style="display: inline;" class ="text-danger"> *</label>
								<label class="sr-only" for="signup-password">เบอร์โทร</label>
								<input type="number" name="phone" pattern="^[0-9\s]+$" minlength="10" class="form-control signup-password" placeholder="กรอกเบอร์โทรศัพท์" required="required">
							</div>
                            <div class="password mb-3">
								<label >ที่อยู่</label>
								<label class="sr-only" for="signup-password">ที่อยู่</label>
								<input type="text" class="form-control " name="c_address" class="form-control signup-password" placeholder="กรอกที่อยู่ปัจจุบัน" required="required">
							</div>

							<!--div class="extra mb-3">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
									
								</div>
							</div--><!--//extra-->
				
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">สมัครสมาชิก</button>
							</div>
						</form><!--//auth-form-->
						<div class="auth-option text-center pt-5">เข้าสู่ระบบ ? <a class="text-link" href="login.php" >คลิก</a>.</div>
						
					</div><!--//auth-form-container-->	
					
					
				    
			    </div><!--//auth-body-->
		    
	    </div><!--//auth-main-col-->
	    
    </div><!--//row-->
	<script>
	
	</script>

</body>
</html> 