<!DOCTYPE html>
<html lang="en">

<body class="g-sidenav-show bg-gray-100">
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid">
            <!-- title -->
            <div class="row justify-content-between">
            </div>
            <!-- end title -->
            <div class="card mb-3">
                <div class="card-body">
                    <div class="justify-content-start flex-fill">
                        <div class="justify-content-start flex-fill m-1">
                            <h6 class="font-weight-bolder text-dark text-gradient text-end">เลขที่สัญญาจำนำ</h6>
                            <div class="justify-content-end flex-fill m-3">
                                <h3 class="font-weight-bolder text-dark text-gradient ">รายละเอียดการโอน</h3>
                            </div>
                        </div>
                        <?php
                        if (isset($_GET['id']) && !empty($_GET['id'])) {
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM tbl_interest INNER JOIN tbl_social ON tbl_social.s_id = tbl_interest.ref_id
                            INNER JOIN tbl_bill ON tbl_interest.ref_id = tbl_bill.s_id 
                            WHERE in_id ='$id'";
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
                    <div class="col-12">
                        <div class=" mb-3">
                            <h4 style="display: inline;">ข้อมูลการจำนำ</h4>
                        </div>

                        <div class="d-flex flex-row bg-gray1">
                            <div class="justify-content-start flex-fill m-3">
                                <div class=" mb-3 col-10 ">
                                    <h6 style="display: inline;">เลขที่สัญญา :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['bill_no'] ?> </td>
                                </div>
                                <div class=" mb-3 col-10">
                                    <h6 style="display: inline;">ชื่อผู้จำนำ :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['s_name'] ?> </td>
                                </div>
                                <div class=" mb-3 col-10 ">
                                    <h6 style="display: inline;">วันที่ชำระค่างวด :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['in_date'] ?> </td>
                                </div>
                                <div class=" mb-3 col-10 ">
                                    <h6 style="display: inline;">หลักฐานการชำระค่างวด :</h6>
                                    <img src="upload/interest/<?= $result['in_img'] ?>" alt="IDcard" width="304" height="228">

                                </div>
                            </div>
                            <div class="justify-content-end flex-fill m-3">
                                <div class=" mb-3 col-10 ">
                                    <h6 style="display: inline;">รหัสสินค้าที่จำนำ :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['ref_img'] ?> </td>
                                </div>
                                <div class=" col-10 mb-4">
                                    <h6 style="display: inline;">รายละเอียดสินค้า :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['s_type'] ?> </td>
                                </div>
                                <div class=" col-10 ">
                                    <h6 style="display: inline;">ค่างวดที่ต้องจ่าย :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['in_befor'] ?> </td>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="d-flex flex-row">
                <div class="justify-content-start flex-fill ">
                    <?php
                    echo "<a href='javascript:window.history.back()' class='btn bg-gradient-dark'>ย้อนกลับ</a>";
                    ?>
                </div>
            </div>
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