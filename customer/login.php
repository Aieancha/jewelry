<!DOCTYPE html>
<html lang="en"> 
<?php include('include/head.php') ?> 
<?php include('include/style.php') ?>       

<?php if(isset($_SESSION["type"]))
{
 header("location:index.php");
}
$message = '';
if(isset($_POST["login"]))
{
 if(empty($_POST["c_email"]) || empty($_POST["c_pass"]))
 {
  $message = "<div class='alert alert-danger'>Both Fields are required</div>";
 }
 else
 {
  $query = "
  SELECT * FROM tbl_customer 
  WHERE c_email = :c_email
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    'c_email' => $_POST["c_email"]
   )
  );
  $count = $statement->rowCount();
  if($count > 0)
  {
   $result = $statement->fetchAll();
   foreach($result as $row)
   {
    if($row["c_status"] == '1')
    {
     if(password_verify($_POST["c_pass"], $row["c_pass"]))
     {
      $_SESSION["type"] = $row["user_type"];
      header("location: index.php");
     }
     else
     {
      $message = '<div class="alert alert-danger">Wrong Password</div>';
     }
    }
    else
    {
     $message = '<div class="alert alert-danger">Your Account has been disabled, please contact admin</div>';
    }
   }
  }
  else
  {
   $message = "<div class='alert alert-danger'>Wrong Email Address</div>";
  }
 }
}
?>

<body class="app app-login p-0"> 

    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding "><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/PW-logo.png" alt="logo"></a></div>
					<label class="mb-3">Jewelry Pawn</label>
					<h2 class="auth-heading text-center mb-5">เข้าสู่ระบบ</h2>
			        <div class="auth-form-container text-start">
						<form class="auth-form login-form">         
							<div class="email mb-3">
								<label class="sr-only" for="signin-email">Email</label>
								<input id="signin-email" name="c_email" type="email" class="form-control signin-email" placeholder="อีเมล" required="required">
							</div><!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">Password</label>
								<input id="signin-password" name="c_pass" type="pass" class="form-control signin-password" placeholder="รหัสผ่าน" required="required">
								<div class="extra mt-3 row justify-content-between">
									<!--div class="col-6">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
											<label class="form-check-label" for="RememberPassword">
											Remember me
											</label>
										</div>
									</div ><//col-6>
									<div class="col-6">
										<div class="forgot-password text-end">
											<a href="reset-password.html">Forgot password?</a>
										</div>
									</div--><!--//col-6-->
								</div><!--//extra-->
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">เข้าสู่ระบบ</button>
							</div>
						</form>
						
						<div class="auth-option text-center pt-5">ต้องการสมัครสมาชิกใหม่ ? <a class="text-link" href="signup.html" >คลิก</a>.</div>
					</div><!--//auth-form-container-->	

			    </div><!--//auth-body-->
		    
			    	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
		<div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder"><img class="auth-background-holder" src="assets/images/BG-login2.png">
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				    <div class="overlay-content p-3 p-lg-4 rounded">
					    <h5 class="mb-3 overlay-title">Explore Portal Admin Template</h5>
					    <div>Portal is a free Bootstrap 5 admin dashboard template. You can download and view the template license <a href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">here</a>.</div>
				    </div>
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->


</body>
</html> 

