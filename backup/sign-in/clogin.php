<?php
session_start();
    if(isset($_POST['m_email'])){
        include("connection.php");
        $m_email = mysqli_real_escape_string($connection,$_POST['m_email']);
        $m_password = mysqli_real_escape_string($connection,sha1($_POST['m_password']));

        $sql = "SELECT * FROM tbl_member WHERE m_email = '".$m_email."'
        AND m_password = '".$m_password."' ";

        $result = mysqli_query($connection,$sql);

        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);

            $_SESSION["m_id"] = $row["m_id"];
            $_SESSION["m_level"] = $row["m_level"];

            if($_SESSION["m_level"]=="Admin"){
                Header("Location: admin/");
            }elseif($_SESSION["m_level"]=="Staff"){
                Header("Location: pos/");
            }else{
            echo "<script>";
            echo "alert(\" อีเมล หรือ รหัสผ่าน ไม่ถูกต้อง\");";
            echo "window.history.back()";
            echo "</script>";
        }
        }else{
            echo "<script>";
            echo "alert(\" อีเมล หรือ รหัสผ่าน ไม่ถูกต้อง\");";
            echo "window.history.back()";
            echo "</script>";
        }
    }else{
        Header("Location: index.php");
    }
?>