<?php
$sql = "SELECT *
        FROM tbl_social";
$query = mysqli_query($connection, $sql);
?>

<div class="container-fluid py-4 ">
<div class="row justify-content-between">
                <div class="col-auto">
                    <h3 class="font-weight-bolder text-dark text-gradient ">การจัดการข้อมูลการข้อมูลการจำนำ</h3>
                </div>
                </div>
                <div class="col-auto" style="float:right">
                <a href="?page=<?=$_GET['page']?>&function=insert" class="btn btn-success">เพิ่มข้อมูลการจำนำ</a>
                </div>
    <div class="row">
        <div class="card">
            <!-- title -->
            
            <!-- end title -->
            <div class="card-body p-3" style="text-align: center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">รูปภาพเครื่องประดับ</th>
                            <th scope="col">ชื่อผู้ใช้งานระบบ</th>
                            <th scope="col">ช่องทางการติดต่อ</th>
                            <!-- <th scope="col">ประเภทสินทรัพย์จำนำ</th> -->
                            <!-- <th scope="col">ลำดับ</th>
                            <th scope="col">รูปภาพเครื่องประดับ</th> -->
                            <th scope="col">สถานะ</th>
                            <!-- <th scope="col">วันที่ติดต่อ</th>
                            <th scope="col">ดำเนินการต่อ</th>
                            <th scope="col">รายละเอียดเพิ่มเติม</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php 
                        $i = 0;
                        foreach ($query as $data):?>
                            <tr>
                                <td><?= ++$i ?></td>
                                <td class="align-middle">
                                     <img src="upload/social/<?= $data['s_img'] ?>" class="rounded" width="60" height="60">
                                 </td>
                                <td><?= $data['social_name'] ?></td>
                                <td><?= $data['social_contact'] ?></td>
                                <!-- <td><?= $data['s_type'] ?></td> -->
                                <td>#</td>

                               
                                
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
