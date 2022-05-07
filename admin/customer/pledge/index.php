<?php
$sql = "SELECT tbl_social.social_name,tbl_social.social_contact,tbl_social.price_img,tbl_status.status_name,tbl_social.s_img
        FROM tbl_social
        INNER JOIN tbl_status
        ON tbl_social.s_role = tbl_status.id
        WHERE tbl_social.s_role=0";
$query = mysqli_query($connection, $sql);
?>

<div class="container-fluid py-4 ">
<div class="row justify-content-between">
                <div class="col-auto">
                    <h3 class="font-weight-bolder text-dark text-gradient ">การจัดการข้อมูลการข้อมูลการจำนำ</h3>
                </div>
                </div>
                <div class="d-flex justify-content-end">
                <a href="?page=<?=$_GET['page']?>&function=insert" class="btn bg-gradient-dark">สถานะ</a>
                </div>
    <div class="row">
        <div class="card">
            <!-- title -->
            
            <!-- end title -->
            <div class="card-body overflow-auto p-3" style="text-align: center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ช่องทางการติดต่อ</th>
                            <th scope="col">ชื่อผู้ใช้งานระบบ</th>
                            <th scope="col">รูปภาพเครื่องประดับ</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">วันที่ติดต่อ</th>
                            <th scope="col">ดำเนินการต่อ</th>



                            
                            
                            <!-- <th scope="col">ประเภทสินทรัพย์จำนำ</th> -->
                            <!-- <th scope="col">ลำดับ</th>
                            <th scope="col">รูปภาพเครื่องประดับ</th> -->
                            <!--th scope="col">สถานะ</th--> 
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
                                <td><?= $data['social_contact'] ?></td>
                                <td><?= $data['social_name'] ?></td>
                                <td class="align-middle">
                                     <img src="upload/social/<?= $data['s_img'] ?>" class="rounded" width="60" height="60">
                                 </td>
                                <td><?= $data['social_name'] ?></td>
                                <td><?= $data['social_contact'] ?></td>
                                <td>
                                <a href="#" class="btn btn-color1 bg-gradient-primary theme-btn mx-auto pull-right">
                                <?php echo $data['status_name']; ?></a></td>

                               
                                
                                <td><?= $data['#'] ?></td>
                                <td><?= $data['#'] ?></td>
                                <!-- <td><?= $data['s_type'] ?></td> -->
                                <td> <a href="?page=<?=$_GET['page']?>&function=update&id=<?=$data['m_id']?>" class="btn btn-sm btn-dark">ดำเนินการต่อ</a>
                                    </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="p-3 d-flex justify-content-end">
                <a href="?page=<?=$_GET['page']?>&function=insert" class="btn bg-gradient-primary">เพิ่มข้อมูลการจำนำ</a>
                </div>
</div>
<?php
mysqli_close($connection);
?>
