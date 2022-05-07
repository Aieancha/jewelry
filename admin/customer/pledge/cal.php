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
            <?php
    isset( $_POST['a'] ) ? $a = $_POST['a'] : $a = "";
    isset( $_POST['b'] ) ? $b = $_POST['b'] : $b = "";

    if( !empty( $a ) && !empty( $b ) ) {
        echo "<hr/>";
        $total = $a*0.02 *$b;
        echo "จำนวนดอกเบี้ย = ".number_format( $total, 2 );
    }
?>

            <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                    <h5 class="pb-5">การคำนวณดอกเบี้ย</h5>
                    <div class=" mb-4 col-3 ">
                        <h6>จำนวณเงินต้น</h6>
                        <input type="text" class="form-control " name="a" placeholder="" autocomplete="off" require>
                    </div>
                    <div class=" mb-4 col-3 ">
                        <h6>จำนวณงวด</h6>
                        <input type="text" class="form-control " name="b" placeholder="" autocomplete="off" require>
                    </div>
                    <div class="ms-auto text-end ">
                        <button type="submit" class="btn bg-gradient-dark">คำนวณ</button>
                        <a href="?page=<?= $_GET['page'] ?>&function=check" type="submit" class="btn btn-color1 bg-gradient-dark theme-btn mx-auto ">ดำเนินการต่อ</a>
                    </div>
                </form>

            </div>
                

        </div>
    </div>
</body>

</html>