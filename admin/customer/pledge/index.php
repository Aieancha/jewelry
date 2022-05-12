
<?php
$sql = "SELECT tbl_social.social_name,tbl_social.social_contact,tbl_social.s_id,tbl_social.price_img,tbl_social.s_date,tbl_status.status_name,tbl_social.s_img
        FROM tbl_social
        INNER JOIN tbl_status
        ON tbl_social.s_role = tbl_status.id";
$query = mysqli_query($connection, $sql);

?>

<div class="container-fluid py-4">
    <div class="col-auto">
            <h3 class="font-weight-bolder text-dark text-gradient ">การจัดการข้อมูลการข้อมูลการจำนำ</h3>
            <hr class="mb-4 mt-4">
        </div>
    <div class="row justify-content-between">
     <div class="d-flex justify-content-end">
        <div class="d-flex justify-content-end mb-2 ">
            <form class="example " action="/action_page.php" style="margin: 7px;;max-width:200px">
                <input type="text" placeholder="ชื่อผู้ใช้งาน.." name="search2 ">
                <button type="submit"><i class="fa fa-search btn-dark"></i></button>
            
        </div>
        <a href="?#=<?= $_GET['#'] ?>&function=insert" class="btn btn-sm btn-dark text-white">สถานะ</a>
    </div>   
    </div>
    
    <div class="row">
        <div class="card">
            <!-- title -->

            <!-- end title -->
            <div class="card-body overflow-auto p-1 " style="text-align: center">
                <table class="table">
                    <thead>
            <div class="card-body overflow-auto p-1  " style="text-align: center">
                        <tr class="">
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ช่องทางการติดต่อ</th>
                            <th scope="col">ชื่อผู้ใช้งานระบบ</th>
                            <!-- <th scope="col">รูปภาพเครื่องประดับ</th> -->
                            <th scope="col">สถานะ</th>
                            <th scope="col">ดูรายละเอียด</th>
                            <th scope="col">ดำเนินการต่อ</th>


                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $i = 0;
                        foreach ($query as $data) : ?>
                            <tr>
                                <td><?= ++$i ?></td>
                                <td><?= $data['social_contact'] ?></td>
                                <td><?= $data['social_name'] ?></td>
                                <!--  <td class="align-middle">
                                    <img src="upload/social/<?= $data['s_img'] ?>" class="rounded" width="60" height="60">
                                </td> -->
                                <td class="text-danger"><?php echo $data['status_name']; ?></td>

                                <td> <a href="?page=<?= $_GET['page'] ?>&function=details&id=<?= $data['s_id'] ?>" class="btn btn-sm btn-gray-600">ดูรายละเอียด</a></td>
                                <td> <a href="?page=<?= $_GET['page'] ?>&function=updated&id=<?= $data['s_id'] ?>" class="btn btn-sm btn-blue2 text-white">ดำเนินการต่อ</a>
                                </td>
                                <!-- <td> <a href="?page=<?= $_GET['page'] ?>&function=check" class="btn btn-sm btn-dark">ทดลองรุูป</a></td> -->

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="p-3 d-flex justify-content-end">
        <a href="?page=<?= $_GET['page'] ?>&function=insert" class="btn  btn-green3 text-white">เพิ่มข้อมูลการจำนำ</a>
    </div>
    </div></form>
</div>
<?php
mysqli_close($connection);
?>

<style>
    
        
</style>