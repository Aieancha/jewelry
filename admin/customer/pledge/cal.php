<?php
$sql = "SELECT tbl_social.social_name,tbl_social.social_contact,tbl_social.price_img,tbl_status.status_name
        FROM tbl_social
        INNER JOIN tbl_status
        ON tbl_social.s_id = tbl_status.id
        WHERE tbl_status.id=1";
$query = mysqli_query($connection, $sql);
?>

<body class="g-sidenav-show bg-gray-100">
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid">
            <!-- title -->
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h3 class="font-weight-bolder text-dark text-gradient ">ข้อมูลการจำนำเครื่องประดับ</h3>
                </div>
                <div class="col-auto">
                    <a href="?page=<?= $_GET['page'] ?>" class="btn btn-primary">ย้อนกลับ</a>
                </div>
            </div>
            <!-- end title -->
            <hr class="mb-4">

            <div class="card-body">
            <div class="card-body p-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ชื่อติดต่อ</th>
                            <th scope="col">ช่องทางติดต่อ</th>
                            <th scope="col">ราคาการประเมิน</th>
                            <th scope="col">สถานะ</th>
                            <!-- <th scope="col">ที่อยู่</th>
                            <th scope="col">เบอร์โทร</th>
                            <th scope="col">อีเมล</th>
                            <th scope="col">ราคาจากภาพ</th> -->
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($query as $row) : ?>
                        <tr>
                        <td><?php echo $row['social_name']; ?></td>
                        <td><?php echo $row['social_contact']; ?></td>
                        <td><?php echo $row['price_img']; ?></td>
                        <td class="btn btn-primary"><?php echo $row['status_name']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

            </div>
                

        </div>
    </div>
</body>

</html>