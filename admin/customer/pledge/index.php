<?php
$sql = "SELECT * FROM tbl_social";
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
                            <th scope="col">ชื่อผู้ใช้ติดต่อ</th>
                            <th scope="col">ช่องทางการติดต่อ</th>
                            <th scope="col">ประเภทสินทรัพย์จำนำ</th>
                            <th scope="col">วันที่ติดต่อ</th>
                            <th scope="col">สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($query as $data):?>
                            <tr>
                                <td><?= $data['social_name'] ?></td>
                                <td><?= $data['social_contact'] ?></td>
                                <td><?= $data['s_type'] ?></td>
                                <td><?= $data['s_date'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
<?php
mysqli_close($connection);
?>