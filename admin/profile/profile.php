<?php
$sql = "SELECT * FROM tbl_member";
$query = mysqli_query($connection, $sql);
?>
<div class="container-fluid py-4">
    <h3>รายชื่อผู้ใช้งานระบบ</h3>
    <div class="d-flex justify-content-end"> 
    <a href="?page=<?=$_GET['page']?>&function=allow" class="btn-add btn btn-success text-white " > เพิ่มข้อมูลผู้ดูแลระบบ</a>   
</div>         
<div class="">    
    <div class="row">
        <div class="card ">
            <div class="card-body p-3 overflow-auto">
                <table class="table" style="text-align: center ">
                    <thead >
                        <tr >
                            <th scope="col">ชื่อผู้ดูแลระบบ</th>
                            <th scope="col">อีเมล</th>
                            <th scope="col">ชื่อ-นามสกุล</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">เมนู</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($query as $data):?>
                            <tr>
                                <td><?= $data['m_name'] ?></td>
                                <td><?= $data['m_email'] ?></td>
                                <td><?= $data['m_firstname'] .' '. $data['m_lastname'] ?></td>
                                <td><?= ($data['status'] == 1 ? '<span class=" ">ผู้จัดการ</span>' : '<span class=" ">พนักงาน</span>') ?></td>
                                <td>
                                    <a href="?page=<?=$_GET['page']?>&function=update&id=<?=$data['m_id']?>" class="btn btn-sm btn-dark">แก้ไข</a>
                                    <a href="?page=<?=$_GET['page']?>&function=delete&id=<?=$data['m_id']?>" onclick="return confirm('คุณต้องการลบชื่อผู้ดูแลระบบ : <?= $data['m_name'] ?> หรือไม่')" class="btn btn-sm btn-danger">ลบ</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</div>
<?php
mysqli_close($connection);
?>
<style>

    
