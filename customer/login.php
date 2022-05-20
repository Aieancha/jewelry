<?php
if (isset($_REQUEST['c_email'])) {
    //รับค่า user & password
    $email = $_REQUEST['c_email'];
    $Password = $_REQUEST['c_pass'];
    //query 
    $sql = "SELECT * FROM tbl_social Where c_email='" . $email . "' and c_pass='" . $Password . "' ";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result);

        $_SESSION["s_id"] = $row["s_id"]; //ประกาศตัวแปรUserIDไว้เพื่อส่งค่า
        $_SESSION["user"] = $row["s_name"] . " " . $row["s_lastname"]; //ประกาศตัวแปรUserไว้เพื่อส่งค่า
        $_SESSION["status"] = $row["status"]; //ประกาศตัวแปรUserlevelไว้เพื่อส่งค่า

        if ($_SESSION["status"] == 1) { //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

            $alert = '<script type= "text/javascript">';
            $alert .= 'alert("เข้าสู่ระบบสำเร็จ");';
            $alert .= 'window.location.href = "";';
            $alert .= '</script>';
            echo $alert;
            exit();
        }
        if ($_SESSION["status"] == 0) {  

            $alert = '<script type= "text/javascript">';
            $alert .= 'alert("รอการยืนยันจากพนักงาน");';
            $alert .= 'window.location = "login.php";';
            $alert .= '</script>';
            echo $alert;
            exit();
        }
    } else {
        echo "<script>";
        echo "alert(\" อีเมล หรือ  รหัสผ่าน ไม่ถูกต้อง\");";
        echo "window.history.back()";
        echo "</script>";
    }
} else {


     //user & password incorrect back to login again

}
?>
<!DOCTYPE html>
<html lang="en">

<script type="text/javascript"></script>

<body class="app app-login p-0">

    <div class="row g-0 app-auth-wrapper">
        <div class=" auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding "><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/PW-logo.png" alt="logo"></a></div>
                    <label class="mb-3">Jewelry Pawn</label>
                    <label class="mb-3">หากคุณเคยจำ</label>

                    <h2 class="auth-heading text-center mb-5">เข้าสู่ระบบ</h2>
                    <div class="auth-form-container text-start">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="auth-form login-form">
                            <div class="email mb-3">
                                <label class="sr-only" for="signin-email">Email</label>
                                <input id="signin-email" name="c_email" type="email" class="form-control signin-email" placeholder="อีเมล" required="required">
                            </div>
                            <!--//form-group-->
                            <div class="password mb-3">
                                <label class="sr-only" for="signin-password">Password</label>
                                <input id="signin-password" name="c_pass" type="password" class="form-control signin-password" placeholder="รหัสผ่าน" required="required">
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
									</div-->
                                    <!--//col-6-->
                                </div>
                                <!--//extra-->
                            </div>
                            <!--//form-group-->
                            <div class="text-center">
                                <button type="submit" name="submit" value="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">เข้าสู่ระบบ</button>
                            </div>
                        </form>

                        <div class="auth-option text-center pt-5">ต้องการสมัครสมาชิกใหม่ ? <a class="text-link" href="signup.php">คลิก</a>.</div>
                    </div>
                    <!--//auth-form-container-->

                </div>
                <!--//auth-body-->


            </div>
            <!--//flex-column-->
        </div>
        <!--//auth-main-col-->


    </div>
    <!--//row-->


</body>

</html>