<?php
if(isset($_POST) && !empty($_POST)){

    /* echo '<pre>';
    print_r($_POST);
    echo '</pre>'; */
    $name = $_POST['c_email'];
    $pass = $_POST['c_pass'];
    $sql = "SELECT * FROM tbl_social WHERE c_email = '$name' AND c_pass = '$pass' ";
    $query = mysqli_query($connection,$sql);
    $row = mysqli_num_rows($query);
    

    if($row > 0){
        $result = mysqli_fetch_assoc($query);
        $_SESSION['customer_login'] = $result['c_email'];
        $alert = '<script type= "text/javascript">';
        $alert .= 'alert("เข้าสู่ระบบสำเร็จ");';
        $alert .= 'window.location.href = "";';
        $alert .= '</script>';
        echo $alert;
        exit();
    }else{
            $alert = '<script type= "text/javascript">';
            $alert .= 'alert("ชื่อผู้ใช้ หรือ รหัสผ่านไม่ถูกต้อง");';
            $alert .= 'window.location.href = "";';
            $alert .= '</script>';
            echo $alert;
            exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="UTF-8">
        <title>php session</title>
    </head>
<?php include('include/head.php') ?> 
<?php include('include/style.php') ?>       

<?php if(isset($_SESSION[1]))
{
 header("location:newform.php");
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
      header("location: .php");
     }
     else
     {
      $message = '<div class="alert alert-danger"></div>';
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
   $message = "<div class='alert alert-danger'>กรุณากรอกชื่อผู้ใช้</div>";
  }
 }
}
?>
<script type= "text/javascript"></script>
<body class="app app-login p-0"> 

    <div class="row g-0 app-auth-wrapper">
	    <div class=" auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding "><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/PW-logo.png" alt="logo"></a></div>
					<label class="mb-3">Jewelry Pawn</label>
					<h2 class="auth-heading text-center mb-5">เข้าสู่ระบบ</h2>
			        <div class="auth-form-container text-start">
						<form action="<?php $_SERVER['PHP_SELF']?>" method="post" class="auth-form login-form">         
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
								<button type="submit" name="submit" value="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">เข้าสู่ระบบ</button>
							</div>
						</form>
						
						<div class="auth-option text-center pt-5">ต้องการสมัครสมาชิกใหม่ ? <a class="text-link" href="signup.html" >คลิก</a>.</div>
					</div><!--//auth-form-container-->	

			    </div><!--//auth-body-->
		    
			    	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
		
    
    </div><!--//row-->


</body>
</html> 
