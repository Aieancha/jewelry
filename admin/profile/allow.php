<!-- ?php
$sql = "SELECT * FROM tbl_social";
if($_GET['action']=='login'){

} 
$query = mysqli_query($connection, $sql);
? -->
<?php
$sql = "SELECT * FROM tbl_social WHERE user_login=1";
$query = mysqli_query($connection, $sql);
?>
<div class="container-fluid py-4">
    <h3>รายชื่อผู้ขอเข้าใช้งานระบบ</h3>
      
<div class="">  
      
    <div class="row">
        <div class="card ">
    <h5 class="m-4">ตารางเเสดงข้อมูลรายชื่อผู้ขอเข้าใช้งานระบบ</h5>
            <div class="card-body p-3 overflow-auto">
            <table class="table" id="tableall">
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
                        <?php
                        $i = 0;
                         foreach ($query as $data):?>
                            <tr>
                                <td><?= ++$i ?></td>
                                <td><?= $data['c_email'] ?></td>
                                <td><?= $data['s_name'] ?></td>
                                <td><?= $data['s_lastname'] ?></td>
                                <td><?= $data['phone'] ?></td>
                           
                                <td><a href="?page=<?=$_GET['page']?>&function=allowdetail&id=<?=$data['s_id']?>" class="btn btn-sm btn-green3 text-white">ดูรายละเอียด</a></td>
                                <td>
                                <?php if($data['status']==0){
                                        echo '<p><a  class="btn btn-sm btn-dark text-white">ปิดใช้งาน</a></p>';
                                   }else{
                                        echo '<p><a  class="btn btn-sm btn-green3 text-white" >เข้าใช้งาน</a></p>';
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
/* function toggleStatus(id){
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
} */
</script>

            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableall').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "ยังไม่มีข้อมูล",
                "info": "เเสดง _START_ - _END_ จาก _TOTAL_ รายการ",
                "infoEmpty": "เเสดง 0 - 0 จาก 0 รายการ",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "เเสดง _MENU_ รายการ",
                "loadingRecords": "Loading...",
                "processing": "Processing...",
                "search": "ค้นหา:",
                "zeroRecords": "No matching records found",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "ถัดไป",
                    "previous": "ก่อนหน้า"
                },
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                }
            }
        });
    });
</script>
<?php
mysqli_close($connection);
?>
<style>
    table.dataTable thead th,
    table.dataTable thead td,
    table.dataTable tfoot th,
    table.dataTable tfoot td {
        text-align: center;

    }
</style>

    
