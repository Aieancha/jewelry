<?php
$sql = "SELECT * FROM tbl_customer";
if($_GET['action']=='login'){

}
$query = mysqli_query($connection, $sql);
?>
<div class="container-fluid py-4">
    <h3>รายชื่อผู้ขอเข้าใช้งานระบบ</h3>
    <div class="d-flex justify-content-end"> 
    <div class="row justify-content-between">
     <div class="d-flex justify-content-end">
        <div class="d-flex justify-content-end mb-2 ">
            <form class="example " action="/action_page.php" style="margin: 7px;;max-width:200px">
                <input type="text" placeholder="ชื่อผู้ใช้งาน.." name="search2 ">
                <button type="submit"><i class="fa fa-search btn-dark"></i></button>
            
        </div></div></div>
</div>         
<div class="">  
      
    <div class="row">
        <div class="card ">
            <div class="card-body p-3 overflow-auto">
                <table class="table" style="text-align: center ">
                    <thead >
                        <tr >
                            <th scope="col">ลำดับที่</th>
                            <th scope="col">ชื่อผู้ขอเข้าใช้</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">นามสกุล</th>
                            <th scope="col">เบอร์โทรศัพท์</th>
                            <th scope="col">รายละเอียดเพิ่มเติม</th>
                            <th scope="col">คำขอเข้าใช้ระบบ</th>
                        </tr>
                    </thead>          
                    <tbody>
                        <?php foreach ($query as $data):?>
                            <tr>
                                <td><?= $data['c_id'] ?></td>
                                <td><?= $data['c_email'] ?></td>
                                <td><?= $data['firstname'] ?></td>
                                <td><?= $data['lastname'] ?></td>
                                <td><?= $data['phone'] ?></td>
                           
                                <td><a href="?page=<?=$_GET['page']?>&function=cudetail&id=<?=$data['c_id']?>" class="btn btn-sm btn-green3 text-white">ดูรายละเอียด</a></td>
                                <td>
                                <?php if($data['status']==0){
                                        echo '<p><a href="../customer/status.php?c_id='.$data['c_id'].'&status=0">enable</a></p>';
                                   }else{
                                        echo '<p><a href="../customer/status.php?c_id='.$data['c_id'].'&status=1">disable</a></p>';
                                   }
                                   ?>
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

    
