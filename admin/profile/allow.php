<?php
$sql = "SELECT * FROM tbl_member";
$query = mysqli_query($connection, $sql);
?>
<div class="container-fluid py-4">
    <h3>รายชื่อผู้ขอเข้าใช้งานระบบ</h3>
    <div class="d-flex justify-content-end"> 
</div>         
<div class="">    
    <div class="row">
        <div class="card ">
            <div class="card-body p-3 overflow-auto">
                <table class="table" style="text-align: center ">
                    <thead >
                        <tr >
                            <th scope="col">ชื่อผู้ขอเข้าใช้</th>
                            <th scope="col">อีเมล</th>
                            <th scope="col">ชื่อ-นามสกุล</th>
                            <th scope="col">เบอร์โทรศัพท์</th>
                            <th scope="col">รายละเอียดเพิ่มเติม</th>
                            <th scope="col">เมนู</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($query as $data):?>
                            <tr>
                                <td>#</td>
                                <td>#</td>
                                <td>#</td>
                                <td>#</td>
                                
                                <td><a href="?page=<?= $_GET['page'] ?>&function=success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon " style="display: inline-block;color: #1e48dd;height: 2em;width: 2em;" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.854 8.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707l-4.096 4.096z"/>
                                </svg></a></td>
                                <td>
                                    <a href="?page=<?=$_GET['page']?>&function=update&id=<?=$data['m_id']?>" class="btn btn-sm btn-green3 text-white">อนุมัติ</a>
                                    <a href="?page=<?=$_GET['page']?>&function=delete&id=<?=$data['m_id']?>" onclick="return confirm('คุณต้องการลบชื่อผู้ดูแลระบบ : <?= $data['m_name'] ?> หรือไม่')" class="btn btn-sm btn-danger">ไม่อนุมัติ</a>
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

    
