<?php
$sql = "SELECT * FROM tbl_social";
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
                            <th scope="col">ลบคำขอเข้าใช้งาน</th>
                        </tr>
                    </thead>          
                    <tbody>
                        <?php foreach ($query as $data):?>
                            <tr>
                                <td><?= $data['s_id'] ?></td>
                                <td><?= $data['c_email'] ?></td>
                                <td><?= $data['s_name'] ?></td>
                                <td><?= $data['s_lastname'] ?></td>
                                <td><?= $data['phone'] ?></td>
                           
                                <td><a href="?page=<?=$_GET['page']?>&function=allowdetail&id=<?=$data['s_id']?>" class="btn btn-sm btn-green3 text-white">ดูรายละเอียด</a></td>
                                <td>
                                <?php if($data['status']==0){
                                        echo '<p><a href="updateStatusCus.php?s_id='.$data['s_id'].'&status=1" class="btn btn-sm btn-dark text-white">ปิดใช้งาน</a></p>';
                                   }else{
                                        echo '<p><a href="updateStatusCus.php?s_id='.$data['s_id'].'&status=0" class="btn btn-sm btn-green3 text-white" >เข้าใช้งาน</a></p>';
                                   }               
                                   ?>
                                </td>
                                <td>
                                <a href="?page=<?=$_GET['page']?>&function=deleteCus&id=<?=$data['s_id']?>" onclick="return confirm('คุณต้องการลบชื่อผู้ดูแลระบบ : <?= $data['s_name'] ?> หรือไม่')" class="btn btn-sm btn-danger">ลบ</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody> 
                </table>

                <script>
function toggleStatus(id){
    var id = id;
    $.ajex({
        url:"status.php",
        type:"post",
        data:(s_id:id),
        success :function(result){
            if(result == '1'){
                swal("ปิดการใช้งานสำเร็จ","success");
            }
            else{
                swal("เปิดการใช้งานสำเร็จ","success");
            }
        }
        
    });
}
</script>

            </div>
        </div>
    </div>
</div>
</div>
<?php
mysqli_close($connection);
?>

    
