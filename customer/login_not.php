<?php include('include/head.php') ?>

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
        $_SESSION['customer_login'] = $row['c_email'];
        $_SESSION["s_id"] = $row["s_id"]; //ประกาศตัวแปรUserIDไว้เพื่อส่งค่า
        $_SESSION["username"] = $row["s_name"] . " " . $row["s_lastname"]; //ประกาศตัวแปรUserไว้เพื่อส่งค่า
        $_SESSION["status"] = $row["status"]; //ประกาศตัวแปรUserlevelไว้เพื่อส่งค่า
        $_SESSION["user"] = $row["s_name"];

        if ($_SESSION["status"] == 1) { //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

            $alert = '<script type= "text/javascript">';
            $alert .= 'alert("เข้าสู่ระบบสำเร็จ");';
            $alert .= 'window.location.href = "";';
            $alert .= '</script>';
            echo $alert;
            exit();
        } else {

            $alert = '<script type= "text/javascript">';
            $alert .= 'alert("รอการยืนยันจากพนักงาน");';
            $alert .= 'window.location.href = "../customer/";';
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

                    <h6 class="text-center mb-5 ">บัญชีผู้ใช้ของท่านยังไม่ได้รับการอนุมัติให้เข้าใช้งานระบบ</h6>
                    <h4 class=" text-center mb-3 text-danger">หากท่านต้องการเข้าใช้งานระบบ </h4>
                    <h5 class=" text-center mb-5"> กรุณาติดต่อแอดมิน ตามช่องทางด้านล่าง</h5>


                    <div class="auth-form-container text-start">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="auth-form login-form">
                        
                        <div class="col-auto m-5 ">
								        <div class="app-icon-holder" style="display: inline;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
</svg></svg><h6 style="display: inline;">   : ชื่อเว็บเพจเฟชบุ๊ก</h6>

									    </div><!--//icon-holder-->
</div>
                                        <div class="col-auto m-5 ">
								        <div class="app-icon-holder" style="display: inline;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-line" viewBox="0 0 16 16">
  <path d="M8 0c4.411 0 8 2.912 8 6.492 0 1.433-.555 2.723-1.715 3.994-1.678 1.932-5.431 4.285-6.285 4.645-.83.35-.734-.197-.696-.413l.003-.018.114-.685c.027-.204.055-.521-.026-.723-.09-.223-.444-.339-.704-.395C2.846 12.39 0 9.701 0 6.492 0 2.912 3.59 0 8 0ZM5.022 7.686H3.497V4.918a.156.156 0 0 0-.155-.156H2.78a.156.156 0 0 0-.156.156v3.486c0 .041.017.08.044.107v.001l.002.002.002.002a.154.154 0 0 0 .108.043h2.242c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157Zm.791-2.924a.156.156 0 0 0-.156.156v3.486c0 .086.07.155.156.155h.562c.086 0 .155-.07.155-.155V4.918a.156.156 0 0 0-.155-.156h-.562Zm3.863 0a.156.156 0 0 0-.156.156v2.07L7.923 4.832a.17.17 0 0 0-.013-.015v-.001a.139.139 0 0 0-.01-.01l-.003-.003a.092.092 0 0 0-.011-.009h-.001L7.88 4.79l-.003-.002a.029.029 0 0 0-.005-.003l-.008-.005h-.002l-.003-.002-.01-.004-.004-.002a.093.093 0 0 0-.01-.003h-.002l-.003-.001-.009-.002h-.006l-.003-.001h-.004l-.002-.001h-.574a.156.156 0 0 0-.156.155v3.486c0 .086.07.155.156.155h.56c.087 0 .157-.07.157-.155v-2.07l1.6 2.16a.154.154 0 0 0 .039.038l.001.001.01.006.004.002a.066.066 0 0 0 .008.004l.007.003.005.002a.168.168 0 0 0 .01.003h.003a.155.155 0 0 0 .04.006h.56c.087 0 .157-.07.157-.155V4.918a.156.156 0 0 0-.156-.156h-.561Zm3.815.717v-.56a.156.156 0 0 0-.155-.157h-2.242a.155.155 0 0 0-.108.044h-.001l-.001.002-.002.003a.155.155 0 0 0-.044.107v3.486c0 .041.017.08.044.107l.002.003.002.002a.155.155 0 0 0 .108.043h2.242c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157H11.81v-.589h1.525c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157H11.81v-.589h1.525c.086 0 .155-.07.155-.156Z"/>
</svg><h6 style="display: inline;">   : ชื่อไลน์ที่ใช้ติดต่อ</h6>

									    </div><!--//icon-holder-->
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
                                <a href="../customer/login.php" class="btn app-btn-primary w-100 theme-btn mx-auto">กลับหน้าหลัก</a>
                            </div>
                        </form>

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
<style>
    .app-btn-primary {
    background: #212529;
    color: #fff;
    border-color: #9b0e21;
}
</style>