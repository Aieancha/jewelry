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
                            INNER JOIN tbl_orders ON tbl_orders.s_id = tbl_social.s_id
                            INNER JOIN tbl_bill ON tbl_interest.ref_id = tbl_bill.s_id 
                            WHERE tbl_bill.bill_id ='$id'";
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
                            <div class="justify-content-start flex-fill m-3 col-6">
                                <div class=" mb-3 col-6 ">
                                    <h6 style="display: inline;">เลขที่สัญญา :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['bill_no'] ?> </td>
                                </div>
                                <div class=" mb-3 col-6">
                                    <h6 style="display: inline;">ชื่อผู้จำนำ :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['s_name'] .' '. $result['s_lastname']?> </td>
                                </div>
                                <div class=" mb-3 col-10 ">
                                    <h6 style="display: inline;">วันที่ชำระเงินต้น :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['in_date'] ?> </td>
                                </div>
                                <div class=" mb-3 col-6 ">
                                    <h6 style="display: inline;">หลักฐานการชำระเงินต้น :</h6>
                                    
                                </div>
                                <div id="myModal" class="modal">
                                    <span class="close cursor" onclick="closeModal()">&times;</span>
                                    <div class="modal-content">

                                        <div class="mySlides">
                                            <div class="numbertext"></div>
                                            <img src="../images/interest/<?= $result['in_img'] ?>" style="width:100%; height:auto">
                                        </div>
                                    </div>
                                </div>
                                <div class=" mb-3 col-6 ">

                                            <img src="../images/interest/<?= $result['in_img'] ?>" alt="contract" style="width:200px; height:auto;" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
                                </div>
                            </div>

                            <div class="justify-content-end flex-fill m-3 col-6">
                                <div class=" mb-3 col-6 ">
                                    <h6 style="display: inline;">รหัสสินค้าที่จำนำ :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['o_code'] ?> </td>
                                </div>
                                <div class=" col-10 mb-4">
                                    <h6 style="display: inline;">รายละเอียดสินค้า :</h6>
                                    <td width="25%" style="display: inline;"><?= $result['o_type'] ?> </td>
                                </div>
                                <div class=" col-10 ">
                                    <h6 style="display: inline;">จำนวนเงินต้น :</h6>
                                    <td width="25%" style="display: inline;"><?= number_format($result['principle']) ?> บาท </td>
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