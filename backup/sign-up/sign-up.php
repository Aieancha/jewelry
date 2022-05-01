<?php
    session_start();
    require_once '../config/connection.php';
    

    if(isset($_POST['signup'])) {
        $m_username = $_POST['m_username'];
        $m_email = $_POST['m_email'];
        $m_password = $_POST['m_password'];
        $c_password = $_POST['c_password'];
        $m_level = 'staff';

        if(empty($m_username)){
            $_SESSION['error'] = 'กรุณากรอกชื่อ-นามสกุล';
            header("location: sign-up.php");
        }else if (empty($m_email)){
            $_SESSION['error'] = 'กรุณากรอกอีเมล';
            header("location: sign-up.php");
        }else if (!filter_var($m_email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
            header("location: sign-up.php");
        }else if (empty($m_password)){
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: sign-up.php");
        }else if (strlen($_POST['m_password']) > 20 || strlen($_POST['m_password']) < 8){
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 8 ถึง 20 ตัวอักษร';
            header("location: sign-up.php");
        }else if (empty($c_password) ){
            $_SESSION['error'] = 'กรุณายืนยันรหัสผ่าน';
            header("location: sign-up.php");
        }else if($m_password != $c_password){
            $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
            header("location: sign-up.php");
        }else {
            try {
                $check_email = $conn->prepare("SELECT m_email FROM tbl_member WHERE m_email = : m_email");
                $check_email->bindParam(":m_email", $m_email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if ($row['m_email'] == $m_email) {
                    $_SESSION['warning'] = "มีอีเมลนี้อยู่ในระบบแล้ว <a href=''>คลิ๊กที่นี่</a>เพื่อเข้าสู่ระบบ";
                    header("location: sign-up.php");
                }else if(!isset($_SESSION['error'])){
                    $passwordHash = password_hash($m_password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO tbl_member(m_username, m_email, m_password, m_level)
                                            VALUES(:m_username, :m_email, :m_password, :m_level )"); 
                    $stmt->bindParam(":m_username", $m_username);
                    $stmt->bindParam(":m_email", $m_email);
                    $stmt->bindParam(":m_password", $passwordHash);
                    $stmt->bindParam(":m_level", $m_level);
                    $stmt->execute();
                    $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว! <a href='signin.php' class='alert-link'>คลิ๊กที่นี่</a>เพื่อเข้าสู่ระบบ";
                    header("location: sign-up.php");
                }else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                    header("location: sign-up.php");
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>