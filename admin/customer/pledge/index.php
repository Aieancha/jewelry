<?php
$sql = "SELECT * FROM tbl_member";
$query = mysqli_query($connection, $sql);
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="card">
            <!-- title -->
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h3 class="font-weight-bolder text-dark text-gradient ">การจัดการข้อมูลการข้อมูลการจำนำ</h3>
                </div>
                <div class="col-auto">
                <a href="?page=<?=$_GET['page']?>&function=insert" class="btn btn-primary">เพิ่มข้อมูล</a>
                </div>
            </div>
            <!-- end title -->
            <div class="card-body p-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">รหัส</th>
                            <th scope="col">ช่องทางการติดต่อ</th>
                            <th scope="col">ชื่อผู้ใช้งานระบบ</th>
                            <th scope="col">รูปภาพเครื่องประดับ</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">วันที่ติดต่อ</th>
                            <th scope="col">ดำเนินการต่อ</th>
                            <th scope="col">รายละเอียดเพิ่มเติม</th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
    </div>

</div>
<?php
mysqli_close($connection);
?>