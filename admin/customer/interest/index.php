<?php
$sql = "SELECT *
        FROM tbl_social";
$query = mysqli_query($connection, $sql);
?>

<div class="container-fluid py-4 ">

                <div class="col-auto">
                    <h3 class="font-weight-bolder text-dark text-gradient ">การจัดการการชำระดอกเบี้ย</h3>
                </div>
                <div class="row justify-content-between">
                <div class="d-flex justify-content-end mb-2 ">
            <form class="example " action="/action_page.php" style="margin: 7px;;max-width:200px">
                <input type="text" placeholder="ชื่อผู้ใช้งาน.." name="search2 ">
                <button type="submit"><i class="fa fa-search btn-dark"></i></button>
            
        </div>
    <div class="row">
        <div class="card">
            <!-- title -->
            
            <!-- end title -->
            <div class="card-body  p-3" style="text-align: center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">รอบชำระ</th>
                            <th scope="col">รหัสผู้จำนำ</th>
                            <th scope="col">ชื่อผู้จำนำ</th>
                            <th scope="col">รหัสสินค้า</th>
                            <th scope="col">จำนวนเงินที่ต้องชำระ</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">เปลี่ยนสถานะ</th>

                        </tr>
                    </thead>
                    <tbody>

                <?php
                    $i = 0;
                    foreach ($query as $data) : ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td> <a href="?page=<?= $_GET['page'] ?>&function=update" class="btn btn-sm btn-green3 text-white">เปลี่ยนสถานะ</a></td>
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
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
