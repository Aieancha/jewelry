<!DOCTYPE html>
<html lang="en">

<body class="g-sidenav-show bg-gray-100">
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid">
            <!-- title -->
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h3 class="font-weight-bolder text-dark text-gradient ">รายละเอียดข้อมูลลูกค้า</h3>
                </div>

            </div>
            <!-- end title -->
            <hr class="mb-4">

            <div class="card-body">
                <?php
                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM tbl_social WHERE s_id = '$id'";
                    $query = mysqli_query($connection, $sql);
                    $result = mysqli_fetch_assoc($query);
                }
                //print_r($_POST);
                ?>


                <script type="text/javascript"></script>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                    </div>
            </div>
            <div class="d-flex flex-row">
                <div class="justify-content-start flex-fill ">
                    <div class=" mb-4 ">
                        <h4 style="display: inline;">ข้อมูลลูกค้า</h4>
                    </div>
                    <div class=" mb-4 ">
                        <h6 style="display: inline;">เลขที่ราชการออกให้ :</h6>
                        <td width="25%" style="display: inline;"><?= $result['code_id'] ?></td>
                    </div>
                    <div class=" mb-4 ">
                        <h6 style="display: inline;">ชื่อผู้จำนำ :</h6>
                        <td width="25%" style="display: inline;"><?= $result['s_name'] ?></td>
                        <h6 style="display: inline;">นามสกุล :</h6>
                        <td width="25%" style="display: inline;"><?= $result['s_lastname'] ?></td>
                    </div>
                    <div class=" mb-4 ">
                        <h6 style="display: inline;">ที่อยู่ปัจจุบัน :</h6>
                        <td width="25%" style="display: inline;"><?= $result['c_address'] ?></td>
                    </div>
                    <div class=" mb-4 col-6 ">
                        <h6 style="display: inline;">ช่องทางการติดต่อ :</h6>
                        <td width="25%" style="display: inline;"><?= $result['social_contact'] ?></td>
                    </div>
                    <div class=" mb-4 col-10 ">
                        <h6 style="display: inline;">ชื่อผู้ใช้ :</h6>
                        <td width="25%" style="display: inline;"><?= $result['social_name'] ?></td>
                    </div>
                    <div class=" mb-5 col-10 ">
                        <h6 style="display: inline;">หลักฐานการยืนยันตัวตน</h6>
                        <img src="upload/customer/<?= $result['c_img'] ?>" alt="IDcard" width="304" height="228">
                    </div>
                    <div class=" mb-4 ">
                        <h4 style="display: inline;">ข้อมูลเครื่องประดับ</h4>
                    </div>
                    <div class=" mb-4 ">
                        <h6 style="display: inline;">รหัสสินค้า:</h6>
                        <td width="25%" style="display: inline;"></td>
                    </div>
                    <div class=" mb-4">
                        <h6 style="display: inline;">รายละเอียดสินค้า:</h6>
                        <td width="25%" style="display: inline;"><?= $result['s_type'] ?></td>
                    </div>
                    <div class=" mb-4 col-10 ">
                        <h6 style="display: inline;">ภาพถ่ายสินค้าจริง</h6>
                        <img src="upload/social/<?= $result['s_img'] ?>" alt="jewelry" width="304" height="228">
                    </div>
                </div>
                <div class="justify-content-start flex-fill ">
                    <div class=" mb-4 ">
                        <h4 style="display: inline;">ข้อมูลการจำนำ</h4>
                    </div>
                    <div class=" mb-4 col-10 ">
                        <h6 style="display: inline;">ราคาประเมินข้างต้น :</h6>
                        <td width="25%" style="display: inline;"><?= $result['price_img'] ?> บาท</td>
                    </div>
                    <div class=" mb-4 col-10 ">
                        <h6 style="display: inline;">ราคาประเมินจากสินค้าจริง:</h6>
                        <td width="25%" style="display: inline;"><?= $result['price_item'] ?> บาท</td>
                    </div>
                    <div class=" mb-4 col-10 ">
                        <h6 style="display: inline;">ราคาที่ตกลงจำนำ:</h6>
                        <td width="25%" style="display: inline;"><?= $result['principle'] ?> บาท</td>
                    </div>
                    <div class=" mb-4 ">
                        <h6 style="display: inline;">จำนวนงวด :</h6>
                        <td width="25%" style="display: inline;"> เดือน</td>
                    </div>
                    <div class=" mb-4 ">
                        <h6 style="display: inline;">ดอกเบี้ย :</h6>
                        <td width="25%" style="display: inline;"> บาท</td>
                    </div>
                    <div class=" mb-4 ">
                        <h6 style="display: inline;">เงินที่ต้องจ่ายต่องวด :</h6>
                        <td width="25%" style="display: inline;"> บาท</td>
                    </div>

                </div>

            </div>
        </div>

        <div class="d-flex flex-row">
            <div class="justify-content-start flex-fill ">
            </div>
            <div class="flex-fill d-flex justify-content-end gap-1">
                <a href="?page=<?= $_GET['page'] ?>&function=index" class="btn bg-gradient-dark">ย้อนกลับ</a>
            </div>
            </form>
        </div>
    </div>

    </div>
    </div>
</body>

</html>
<style>
    .wrapper-progressBar {
        width: 100%
    }

    .progressBar {
        font-size: 1em;
    }

    .progressBar li {
        list-style-type: none;
        float: left;
        width: 30%;
        position: relative;
        text-align: center;


    }

    .progressBar li:before {
        content: " ";
        line-height: 30px;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        border: 1px solid;
        display: block;
        text-align: center;
        margin: 0 auto 10px;
        background-color: white
    }

    .progressBar li:after {
        content: "";
        position: absolute;
        width: 100%;
        height: 4px;
        background-color: #ddd;
        top: 15px;
        left: -50%;
        z-index: -1;
    }

    .progressBar li:first-child:after {
        content: none;
    }

    .progressBar li.active {
        color: hsl(0, 100%, 16%);
    }

    .progressBar li.active:before {
        border-color: hsl(0, 100%, 16%);
        background-color: hsl(0, 100%, 16%);

    }

    .progressBar .active:after {
        background-color: dodgerblue;
    }
</style>