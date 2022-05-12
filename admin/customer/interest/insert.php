<?php
$sql = "SELECT tbl_social.social_name,tbl_social.social_contact,tbl_social.s_id,tbl_social.price_img,tbl_social.s_date,tbl_status.status_name,tbl_social.s_img
        FROM tbl_social
        INNER JOIN tbl_status
        ON tbl_social.s_role = tbl_status.id
        WHERE tbl_status.id='1'";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_social WHERE s_id = '$id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
}

?>

<!DOCTYPE html>
<html lang="en">

<body class="g-sidenav-show bg-gray-100">
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid">
            <!-- title -->
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h3 class="font-weight-bolder text-dark text-gradient ">การจัดการการชำระดอกเบี้ย</h3>
                </div>
            </div>
            <!-- end title -->
            <hr class="mb-4">
            <div class="card-body overflow-auto p-3" style="text-align: center">
                <div class="d-flex flex-row">
                    

                </div>

            </div>
        </div>


        <!-- ด้านล่าง -->
        <div class="d-flex flex-row">
            <div class="flex-fill d-flex justify-content-end gap-1">
                <a href="?page=<?= $_GET['page'] ?>&function=index" class="btn bg-gradient-dark">ย้อนกลับ</a>
            </div>
        </div>
    </div>
</body>

</html>