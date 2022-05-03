<?php
session_start();
$sql = "SELECT * FROM tbl_status";
$query = mysqli_query($connection, $sql);
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="card">
            <!-- title -->
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h3 class="font-weight-bolder text-dark text-gradient ">สถานะของข้อมูล</h3>
                </div>
                <div class="col-auto">
                <a href="?page=<?=$_GET['page']?>&function=insert" class="btn btn-primary">เพิ่มสถานะ</a>
                </div>
            </div>
            <!-- end title -->
            <div class="card-body p-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($query as $data):?>
                            <tr>
                                <td><?= $data['id'] ?></td>
                                <td><?= $data['status_name'] ?></td>
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