<!DOCTYPE html>
<html lang="en">
<style>
    body {

        margin: 0;
    }

    * {
        box-sizing: border-box;
    }

    .row>.column {
        padding: 0 8px;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    .column {
        float: left;
        width: 100%;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        /* height: 100%; */
        overflow: auto;
        background-color: black;
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        width: 50%;
        max-width: 1200px;
        display: block;
    }

    /* The Close Button */
    .close {
        color: white;
        position: absolute;
        top: 10px;
        right: 25px;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #999;
        text-decoration: none;
        cursor: pointer;
    }

    .mySlides {
        display: none;
    }

    .cursor {
        cursor: pointer;
    }


    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    img {
        margin-bottom: -4px;
    }

    .caption-container {
        text-align: center;
        background-color: black;
        padding: 2px 16px;
        color: white;
    }

    .demo {
        opacity: 0.6;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }

    img.hover-shadow {
        transition: 0.3s;
    }

    .hover-shadow:hover {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>
<?php
//print_r($_POST);
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_orders INNER JOIN tbl_social ON tbl_social.s_id=tbl_orders.s_id  WHERE o_id = '$id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);


    $member = "SELECT * FROM tbl_member INNER JOIN tbl_orders ON tbl_member.m_id=tbl_orders.lavel WHERE tbl_orders.o_id = '$id'";
    $qry = mysqli_query($connection, $member);
    $rs = mysqli_fetch_assoc($qry);


    //$name=$rs['status'];
    //$m_id = $rs["m_id"];
    $status = $_SESSION["userlevel"];
    /* if ($status == $rs["m_id"]) {

        $status = $rs['status'] . ': ' . $rs['m_name'];
    } else {
        $status = "ลูกค้า";
    } */

    if ($status == '') {

        $status = '';
    } else {

        $status = $_SESSION["userlevel"];
    }
}
?>

<body class="g-sidenav-show bg-gray-100">
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid">
            <!-- title -->
            <div class="row justify-content-between">
            </div>
            <!-- end title -->
            <div class="card mb-3">
                <div class="card-body">
                    <div class="flex-fill d-flex justify-content-end gap-1">
                        <h6 class="font-weight-bolder text-dark text-gradient ">บันทึกข้อมูลโดย : <?php echo $status; ?></h6>
                    </div>
                    <div class="col-5">
                        <div class="col-auto mb-3">
                            <h3 class="font-weight-bolder text-dark text-gradient ">รายละเอียดข้อมูลลูกค้า</h3>
                        </div>
                    </div>
                    <script type="text/javascript"></script>
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="d-flex flex-row">
                            <div class="justify-content-start flex-fill ">
                                <div class=" mb-3 ">
                                    <h4 style="display: inline;">ข้อมูลลูกค้า</h4>
                                </div>
                                <div class=" mb-3 ">
                                    <h6 style="display: inline;">บัตรประจำตัวประชาชน/หนังสือเดินทาง :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['code_id'] ?></td>
                                </div>
                                <div class=" mb-3 ">
                                    <h6 style="display: inline;">ไอดีไลน์ :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['c_line'] ?></td>
                                </div>
                                <div class=" mb-3 ">
                                    <h6 style="display: inline;">เฟสบุ๊ก :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['c_facebook'] ?></td>
                                </div>
                                <div class=" mb-3 ">
                                    <h6 style="display: inline;">ชื่อผู้จำนำ :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['s_name'] ?></td>
                                    <h6 style="display: inline;">นามสกุล :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['s_lastname'] ?></td>
                                </div>
                                <div class=" mb-3 ">
                                    <h6 style="display: inline;">ที่อยู่ปัจจุบัน :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['c_address'] ?></td>
                                </div>
                                <div class=" mb-3 col-10 ">
                                    <h6 style="display: inline;">หลักฐานการยืนยันตัวตน</h6>
                                </div>
                                <div class=" mb-4 col-10 ">
                                    <?php
                                    if ($result['c_img'] != '') {
                                        echo '<img src="../images/customer/' . $result['c_img'] . '" alt="IDcard" style="width:200px; height:auto;"  />';
                                    }
                                    ?>

                                </div>
                                <div class=" mb-3 ">
                                    <h4 style="display: inline;">ข้อมูลเครื่องประดับ</h4>
                                </div>
                                <div class=" mb-3 ">
                                    <h6 style="display: inline;">รหัสสินค้า:</h6>
                                    <td width="25%" style="display: inline;"><?= $result['o_code'] ?></td>
                                </div>
                                <div class=" mb-3">
                                    <h6 style="display: inline;">รายละเอียดสินค้า:</h6>
                                    <td width="25%" style="display: inline;"><?= $result['o_type'] ?></td>
                                </div>


                            </div>
                            <div class="justify-content-start flex-fill ">
                                <div class=" mb-4 ">
                                    <h4 style="display: inline;">ข้อมูลการจำนำ</h4>
                                </div>
                                <div class=" mb-4 col-12 ">
                                    <h6 style="display: inline;">ราคาลูกค้าต้องการจำนำ :</h6>
                                    <td width="25%" style="display: inline;"><?= number_format($result['o_price']) ?> บาท</td>
                                </div>

                                <div class=" mb-4 col-12 ">
                                    <h6 style="display: inline;">เลขที่สัญญา :</h6>
                                    <td width="25%" style="display: inline;"><?= number_format($result['price_img']) ?> บาท</td>
                                </div>
                                <div class=" mb-4 col-12 ">
                                    <h6 style="display: inline;">ราคาประเมินข้างต้น :</h6>
                                    <td width="25%" style="display: inline;"><?= number_format($result['price_img']) ?> บาท</td>
                                </div>
                                <div class=" mb-3 col-12 ">
                                    <h6 style="display: inline;">ราคาประเมินจากสินค้าจริง :</h6>
                                    <td width="25%" style="display: inline;"><?= number_format($result['price_item']) ?> บาท</td>
                                </div>
                                <div class=" mb-3 col-12 ">
                                    <h6 style="display: inline;">ราคาที่ตกลงจำนำ :</h6>
                                    <td width="25%" style="display: inline;"><?= number_format($result['principle']) ?> บาท</td>
                                </div>
                                <div class=" mb-3 ">
                                    <h6 style="display: inline;">จำนวนงวด :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['r_mount'] ?> เดือน</td>
                                </div>
                                <div class=" mb-3 ">
                                    <h6 style="display: inline;">ดอกเบี้ย :</h6>
                                    <td width="25%" style="display: inline;"><?= number_format($result['principle'] * 0.02 * $result['r_mount']) ?> บาท</td>
                                </div>
                                <div class=" mb-3 ">
                                    <h6 style="display: inline;">เงินที่ต้องจ่ายต่องวด :</h6>
                                    <td width="25%" style="display: inline;"><?= number_format($result['principle'] * 0.02) ?> บาท</td>
                                </div>

                            </div>
                        </div>
                        <div id="myModal" class="modal">
                            <span class="close cursor" onclick="closeModal()">&times;</span>
                            <div class="modal-content">

                                <div class="mySlides">
                                    <div class="numbertext">1</div>
                                    <img src="../images/social/<?= $result['img1'] ?>" style="width:100%; height:auto">
                                </div>

                                <div class="mySlides">
                                    <div class="numbertext">2</div>
                                    <img src="../images/social/<?= $result['img2'] ?>" style="width:100%; height:auto">
                                </div>

                                <div class="mySlides">
                                    <div class="numbertext">3</div>
                                    <img src="../images/social/<?= $result['img3'] ?>" style="width:100%; height:auto">
                                </div>

                            </div>
                        </div>
                        <div class=" mb-4 col-10 ">
                            <h6>ภาพถ่ายสินค้าจริง</h6>
                            <?php
                            if ($result['img1'] != '') {
                                echo '<img src="../images/social/' . $result['img1'] . '" alt="jewelry1" style="width:20%; height:auto;" onclick="openModal();currentSlide(1)" class="hover-shadow cursor" />';
                            }
                            if ($result['img2'] != '') {
                                echo '<img src="../images/social/' . $result['img2'] . '" alt="jewelry2" style="width:20%; height:auto;" onclick="openModal();currentSlide(2)" class="hover-shadow cursor" />';
                            }
                            if ($result['img3'] != '') {
                                echo '<img src="../images/social/' . $result['img3'] . '" alt="jewelry3" style="width:20%; height:auto;" onclick="openModal();currentSlide(3)" class="hover-shadow cursor" />';
                            } ?>

                        </div>
                </div>
            </div>

            <div class="d-flex flex-row">
                <div class="justify-content-start flex-fill ">
                    <?php
                    echo "<a href='javascript:window.history.back()' class='btn bg-gradient-dark'>ย้อนกลับ</a>";
                    ?>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function openModal() {
            document.getElementById("myModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }

        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            captionText.innerHTML = dots[slideIndex - 1].alt;
        }
    </script>
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