<!DOCTYPE html>
<html lang="en">
<?php
$user = $_SESSION['user'];
$sql = "SELECT * FROM tbl_member WHERE m_name = '$user'";
$query = mysqli_query($connection, $sql);
$result = mysqli_fetch_assoc($query);

if (isset($_POST) && !empty($_POST)) {
    if (isset($_POST['profile'])) {
        $email = $_POST['m_email'];
        $firstname = $_POST['m_firstname'];
        $lastname = $_POST['m_lastname'];
        $sql = "UPDATE tbl_member
						SET m_email='$email', m_firstname='$firstname', m_lastname='$lastname'
						WHERE m_name = '$user'";

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
    if (isset($_POST['changepassword'])) {
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];
        $confirmpass = $_POST['confirmpass'];
        if (isset($oldpass) && !empty($oldpass)) {
            $sql_check = "SELECT * FROM tbl_member WHERE m_name = '$user' AND m_pass = '$oldpass'";
            $query_check = mysqli_query($connection, $sql_check);
            $row_check = mysqli_num_rows($query_check);
            if ($row_check == 0) {
                $alert = '<script type= "text/javascript">';
                $alert .= 'alert("รหัสผ่านไม่ถูกต้อง กรุณากรอกใหม่อีกครั้ง");';
                $alert .= 'window.location.href = "?page=myprofile";';
                $alert .= '</script>';
                echo $alert;
                exit();
            } else {
                if ($newpass != $confirmpass) {
                    $alert = '<script type= "text/javascript">';
                    $alert .= 'alert("ยืนยันรหัสผ่านใหม่ไม่ถูกต้อง กรุณากรอกใหม่อีกครั้ง");';
                    $alert .= 'window.location.href = "?page=myprofile";';
                    $alert .= '</script>';
                    echo $alert;
                    exit();
                } else {
                    $sql = "UPDATE tbl_member SET m_pass = '$newpass' WHERE m_name = '$user'";
                    $query = mysqli_query($connection, $sql);
                    if (mysqli_query($connection, $sql)) {
                        //echo "เพิ่มข้อมูลสำเร็จ";
                        $alert = '<script type= "text/javascript">';
                        $alert .= 'alert("เปลี่ยนแปลงรหัสผ่านสำเร็จ");';
                        $alert .= 'window.location.href = "?page=profile";';
                        $alert .= '</script>';
                        echo $alert;
                        exit();
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                    }

                    mysqli_close($connection);
                }
            }
        }
    }
}




?>

<body class="g-sidenav-show bg-gray-100">
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <script type="text/javascript"></script>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="container-fluid">
                <div class="card-body">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="col-auto mb-3">
                                <div class="col-auto">
                                    <h3 class="font-weight-bolder text-dark text-gradient ">ข้อมูลส่วนตัวของคุณ</h3>
                                </div>
                            </div>
                            <div class="d-flex flex-row">
                                <div class="justify-content-start flex-fill ">
                                    <h4 class="font-weight-bolder text-dark text-gradient ">ข้อมูลส่วนตัวของคุณ</h4>
                                    <div class=" mb-4 col-10 ">
                                        <h6 style="display: inline;">ชื่อผู้ใช้ </h6>
                                        <input type="text" class="form-control" name="m_name" value="<?= $result['m_name'] ?>" autocomplete="off" disabled>
                                    </div>
                                    <div class=" mb-4 col-10 ">
                                        <h6 style="display: inline;">ชื่อ </h6>
                                        <input type="text" class="form-control" name="m_firstname" placeholder="" value="<?= $result['m_firstname'] ?>" autocomplete="off" required>
                                    </div>
                                    <div class=" mb-4 col-10 ">
                                        <h6 style="display: inline;">นามสกุล</h6>
                                        <input type="text" class="form-control" name="m_lastname" value="<?= $result['m_lastname'] ?>" autocomplete="off" required>
                                    </div>
                                    <div class=" mb-4 col-10 ">
                                        <h6 style="display: inline;">อีเมล</h6>
                                        <input type="email" class="form-control" name="m_email" value="<?= $result['m_email'] ?>" autocomplete="off" required>
                                    </div>

                                </div>
                                <div class="justify-content-start flex-fill ">
                                    <h4 class="font-weight-bolder text-dark text-gradient ">เปลี่ยนรหัสผ่าน</h4>
                                    <div class=" mb-4 col-10 ">
                                        <h6 style="display: inline;">กรุณากรอกรหัสผ่านเดิม</h6>
                                        <input type="text" name="oldpass" class="form-control " placeholder="" autocomplete="off" required>
                                    </div>
                                    <div class=" mb-4 col-10">
                                        <h6 style="display: inline;">กรุณากรอกรหัสผ่านใหม่</h6>
                                        <input type="text" name="newpass" class="form-control " placeholder="" autocomplete="off" required>
                                    </div>
                                    <div class=" mb-4 col-10 ">
                                        <h6 style="display: inline;">ยืนยันรหัสผ่านใหม่</h6>
                                        <input type="text" name="confirmpass" class="form-control " placeholder="" autocomplete="off" required>
                                    </div>

                                </div>

                            </div>


                            <div class="d-flex flex-row">
                                <div class="justify-content-start flex-fill ">
                                    <?php
                                    echo "<a href='javascript:window.history.back()' class='btn bg-gradient-dark'>ย้อนกลับ</a>";
                                    ?>

                                </div>
                                <div class="flex-fill d-flex justify-content-end gap-1">
                                    <input type="hidden" name="changepassword">
                                    <input type="submit" class="btn btn-color1 btn-green3 text-white theme-btn  pull-right" value="บันทึกข้อมูล">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</body>

</html>

<style>
    .wrapper-progressBar {
        width: 100%
    }

    .progressBar {
        font-size: 1em;
    }

    .progressBar li {
        list-style-type: none;
        float: left;
        width: 30%;
        position: relative;
        text-align: center;


    }

    .progressBar li:before {
        content: " ";
        line-height: 30px;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        border: 1px solid;
        display: block;
        text-align: center;
        margin: 0 auto 10px;
        background-color: white
    }

    .progressBar li:after {
        content: "";
        position: absolute;
        width: 100%;
        height: 4px;
        background-color: #ddd;
        top: 15px;
        left: -50%;
        z-index: -1;
    }

    .progressBar li:first-child:after {
        content: none;
    }

    .progressBar li.active {
        color: hsl(0, 100%, 16%);
    }

    .progressBar li.active:before {
        border-color: hsl(0, 100%, 16%);
        background-color: hsl(0, 100%, 16%);

    }

    .progressBar .active:after {
        background-color: dodgerblue;
    }

    </style=>