<?php
$status = $_SESSION["userlevel"];
if ($status != 'admin') {
  $alert = '<script type="text/javascript">';
  $alert .= 'alert("คุณไม่มีสิทธิ์การเข้าถึงหน้านี้");';
  $alert .= 'window.location.href = "?";';
  $alert .= '</script>';
  echo $alert;
  exit();
}
?>

<?php
$sql = "SELECT * FROM tbl_member";
$query = mysqli_query($connection, $sql);
?>
<div class="container-fluid py-4">
    <h3>จัดการผู้ใช้งานระบบ</h3>
    <div class="d-flex justify-content-end"> 
    <a href="?page=<?=$_GET['page']?>&function=insert" class="btn  btn-green3 text-white " > เพิ่มข้อมูลผู้ดูแลระบบ</a>   
</div>         
<div class="">    
    <div class="row">
        <div class="card ">
        <h5 class="m-3">ตารางแสดงรายชื่อผู้มีสิทธิ์เข้าใช้งานระบบทั้งหมด</h5>
            <div class="card-body p-3 overflow-auto text-center">
            <table class="table" id="tableall">
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
                                <td><?= ($data['status'] == 'admin' ? '<span class=" ">ผู้จัดการ</span>' : '<span class=" ">พนักงาน</span>') ?></td>
                                <td>
                                    <a href="?page=<?=$_GET['page']?>&function=update&id=<?=$data['m_id']?>" class="btn btn-sm btn-dark">แก้ไข</a>
                                    <a href="?page=<?=$_GET['page']?>&function=delete&id=<?=$data['m_id']?>" onclick="return confirm('คุณต้องการลบชื่อผู้ดูแลระบบ : <?= $data['m_name'] ?> หรือไม่')" class="btn btn-sm btn-danger">ลบ</a>
                                    <a href="?page=<?=$_GET['page']?>&function=resetpassword&id=<?=$data['m_id']?>" onclick="return confirm('คุณต้องการรีเซตรหัสผ่านหรือไม่ : <?= $data['m_name'] ?> หรือไม่')" class="btn btn-sm btn-blue2 text-white">รีเซตรหัสผ่าน</a>
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


    
