<?php
$sql = "SELECT tbl_customer.c_id,tbl_customer.firstname,tbl_customer.lastname,tbl_customer.c_age,tbl_customer.c_address,tbl_customer.phone,tbl_customer.c_email
                ,tbl_social.social_contact,tbl_social.social_name,tbl_social.price_img
        FROM tbl_customer
        INNER JOIN tbl_social
        ON tbl_customer.c_id = tbl_social.id";
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
                            <th scope="col">ชื่อ-นามสกุล</th>
                            <th scope="col">อายุ</th>
                            <th scope="col">ที่อยู่</th>
                            <th scope="col">เบอร์โทร</th>
                            <th scope="col">อีเมล</th> -->
                            <th scope="col">ราคาจากภาพ</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                        <td><?php echo $row['social_name']; ?></td>
                        <td><?php echo $row['social_contact']; ?></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['c_age']; ?></td>
                        <td><?php echo $row['c_address']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['c_email']; ?></td>
                        <td><?php echo $row['price_img']; ?></td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>

            </div>

            </div>
                

        </div>
    </div>
</body>

</html>