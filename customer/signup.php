<!DOCTYPE html>
<html lang="en"> 
<?php include('include/head.php') ?> 
<?php include('include/style.php') ?>       

<body class="app app-signup p-0">    	
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
								<label class="sr-only" for="signup-email">อีเมล</label>
								<input id="signup-name" name="signup-name" type="text" class="form-control signup-name" placeholder="อีเมล *" required="required">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Your Email</label>
								<input id="signup-email" name="signup-email" type="email" class="form-control signup-email" placeholder="สร้างรหัสผ่าน *" required="required">
							</div>
                            <div class="d-flex flex-row mb-3">
                                <div class="justify-content-start flex-fill ">
                        
								<label class="sr-only " for="signup-password">ไลน์</label>
								<input id="signup-password" name="signup-password" type="password" class="form-control signup-password" placeholder="ไอดีไลน์">
                            </div>
                                <div class="flex-fill d-flex justify-content-end gap-1">
                        
								<label class="sr-only" for="signup-password">เฟสบุ้ค</label>
								<input id="signup-password" name="signup-password" type="password" class="form-control signup-password" placeholder="ชื่อผู้ใช้เฟสบุ้ค" >
					
                            </div>
                            </div>
                            <div class="d-flex flex-row mb-3">
                                <div class="justify-content-start flex-fill ">
                        
								<label class="sr-only " for="signup-password">ชื่อจริง</label>
								<input id="signup-password" name="signup-password" type="password" class="form-control signup-password" placeholder="ชื่อจริง *">
                            </div>
                                <div class="flex-fill d-flex justify-content-end gap-1">
                        
								<label class="sr-only" for="signup-password">นามสกุล</label>
								<input id="signup-password" name="signup-password" type="password" class="form-control signup-password" placeholder="นามสกุล *" >
					
                            </div>
                            </div>
							<div class="password mb-3">
								<label class="sr-only" for="signup-password">เบอร์โทร</label>
								<input id="signup-password" name="signup-password" type="password" class="form-control signup-password" placeholder="เบอร์โทรศัพท์ *" required="required">
							</div>
                            <div class="password mb-3">
								<label class="sr-only" for="signup-password">ที่อยู่</label>
								<input id="signup-password" name="signup-password" type="password" class="form-control signup-password" placeholder="ที่อยู่ปัจจุบัน" required="required">
							</div>
							<!--div class="extra mb-3">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
									
								</div>
							</div--><!--//extra-->
							
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">สมัครสมาชิก</button>
							</div>
						</form><!--//auth-form-->
						
						<div class="auth-option text-center pt-5">Already have an account? <a class="text-link" href="login.html" >Log in</a></div>
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


</body>
</html> 

