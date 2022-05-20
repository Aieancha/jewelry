<!DOCTYPE html>
<html lang="en">
<?php
$sql = "SELECT * FROM tbl_social";
$query = mysqli_query($connection, $sql);
?>
<body class="g-sidenav-show bg-gray-100">
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid">
            <!-- title -->
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h3 class="font-weight-bolder text-dark text-gradient ">รายชื่อผู้ขอเข้าใช้งานระบบ</h3>
                </div>
            </div>
            <?php
                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM tbl_social WHERE s_id = '$id'";
                    $query = mysqli_query($connection, $sql);
                    $result = mysqli_fetch_assoc($query);
                    
                }
                //print_r($_POST);
                
                ?>
            <!-- end title -->
            <hr class="mb-4">

            <div class="card-body">

                <form action="" method="POST">
                    <div class="card ">
                        <div class="card-body">
                            <h4 class="mb-4" >ตารางแสดงข้อมูลผู้ขอเข้าใช้งานระบบ</h4>
                            <div class="d-flex flex-row mb-6">
                <div class="justify-content-start flex-fill ">

                            <div class=" mb-3 ">
                                <h6 style="display: inline;">ชื่อผู้ใช้งานระบบ :</h6>
                                <td width="25%" style="display: inline;"><?= $result['c_email'] ?></td>
                                <div class=" mb-3 ">
                                <h6 style="display: inline;">ชื่อผู้จำนำ :</h6>
                                <td width="25%" style="display: inline;"><?= $result['s_name'] ?></td>
                                <h6 style="display: inline;">นามสกุล :</h6>
                                <td width="25%" style="display: inline;"><?= $result['s_lastname'] ?></td>
                            </div>
                            </div> 
                            </div>
                <div class="justify-content-start flex-fill "> 
                            <div class=" mb-3 ">
                                <h6 class="text-end" style="display: inline;">ไอดีไลน์ :</h6>
                                <td style="display: inline;"><?= $result['c_line'] ?></td> 
                            </div>
                            <div class=" mb-3 ">
                            <h6 class="text-end" style="display: inline;">ชื่อผู้ใช้เฟสบุ้ค :</h6>
                                <td style="display: inline;"><?= $result['c_facebook'] ?></td>
                            </div>
                            <div class=" mb-3 ">
                            <h6 class="text-end" style="display: inline;">เบอร์โทรศัพท์ :</h6>
                                <td style="display: inline;"><?= $result['phone'] ?></td>
                            </div>
                            <div class=" mb-3 ">
                            <h6 class="text-end" style="display: inline;">ที่อยู่ปัจจุบัน :</h6>
                                <td style="display: inline;"><?= $result['c_address'] ?></td>
                            </div>
                            </div>
                    </div>
                    <div class="d-flex flex-row">
                <div class="justify-content-start flex-fill ">
                    <a href="?page=<?= $_GET['page'] ?>" class="btn btn-sm btn-dark text-white">ย้อนกลับ</a>
                </div>
                <div class="flex-fill d-flex justify-content-end gap-1"> 
                <a href="?page=<?= $_GET['page'] ?>&function=updateStatusCus2&id=<?=$result['s_id']?>"onclick="return confirm('คุณต้องการปิดการใช้งาน: <?= $result['c_email'] ?> หรือไม่')"  class="btn btn-sm btn-dark text-white">ปิดการใช้งาน</a>
                <a href="?page=<?= $_GET['page'] ?>&function=updateStatusCus&id=<?=$result['s_id']?>"onclick="return confirm('คุณต้องการอนุญาติให้ : <?= $result['c_email'] ?> เข้าใช้งานระบบหรือไม่')"  class="btn btn-sm btn-green3 text-white">เปิดการใช้งาน</a>
                <a href="?page=<?=$_GET['page']?>&function=deleteCus&id=<?=$result['s_id']?>" onclick="return confirm('คุณต้องการลบผู้ขอเข้าใช้งานระบบ : <?= $result['s_id'] ?> หรือไม่')" class="btn btn-sm btn-danger">ลบคำขอ</a>

                </div>
                </div>
                </form>

            </div>
        </div>
    </div>
</body>
<?php
mysqli_close($connection);
?>

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
        color: rgb(111, 0, 96);
    }

    .progressBar li.active:before {
        border-color: rgb(111, 0, 96);
        background-color: rgb(111, 0, 96);

    }

    .progressBar .active:after {
        background-color: dodgerblue;
    }
    
</style>