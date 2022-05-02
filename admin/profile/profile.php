<?php
$sql = "SELECT * FROM tbl_member";
$query = mysqli_query($connection, $sql);
?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="card">
            <div class="card-body p-3">
                <a href="?page=<?=$_GET['page']?>&function=insert" class="btn btn-primary">เพิ่มข้อมูลผู้ดูแลระบบ</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ชื่อผุ้ดูแลระบบ</th>
                            <th scope="col">อีเมล</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">เมนู</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($query as $data):?>
                            <tr>
                                <td><?= $data['m_name'] ?></td>
                                <td><?= $data['m_email'] ?></td>
                                <td><?= ($data['status'] == 0 ? '<span class=" btn btn--sm btn-success">เปิดใช้งาน</span>' : '<span class=" btn btn--sm btn-danger">ปิดใช้งาน</span>') ?></td>
                                <td>
                                    <a href="" class="btn btn-sm btn-warning">แก้ไข</a>
                                    <a href="" class="btn btn-sm btn-danger">ลบ</a>
                                </td>
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