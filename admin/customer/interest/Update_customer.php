<!DOCTYPE html>
<html lang="en">

<body class="g-sidenav-show bg-gray-100">
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid">
            <!-- title -->
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h3 class="font-weight-bolder text-dark text-gradient ">การจัดการการชำระดอกเบี้ย</h3>
                </div>
            </div>
            <!-- end title -->
            <hr class="mb-4">


            <?php
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM tbl_social INNER JOIN tbl_interest
                ON tbl_social.s_id = tbl_interest.ref_id 
                INNER JOIN tbl_orders
                ON tbl_social.s_id = tbl_orders.s_id
                INNER JOIN tbl_bill
                ON tbl_bill.s_id = tbl_orders.s_id WHERE tbl_bill.bill_id = '$id'";
                $query = mysqli_query($connection, $sql);
                $result = mysqli_fetch_assoc($query);
                mysqli_query($connection, "UPDATE tbl_interest SET in_role=1 WHERE ref_id = '$id'"); 
                
                /* $alert = '<script type="text/javascript">';
                $alert .= 'alert("เพิ่มข้อมูลสำเร็จ");';
                $alert .= 'window.location.href = "?page=interest&function=list";';
                $alert .= '</script>';
                echo $alert;
                exit(); */
            }

            //print_r($_POST);
            ?>

            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="mb-4">รายละเอียดการชำระดอกเบี้ยที่ถูกเพิ่มโดยลูกค้า</h4>
                    <div class="d-flex flex-row mb-6">
                        <div class="justify-content-start flex-fill ">
                            <div type="hidden">
                                <select name="ref_id" require hidden>
                                    <option value="<?= $result['ref_id'] ?>" selected hidden></option>
                                </select>
                            </div>
                            <div class=" mb-3 col-10 ">
                                <h6 style="display: inline;">เลขที่ราชการออกให้ผู้จำนำ :</h6>
                                <td width="25%" style="display: inline;"><?= $result['code_id'] ?></td>
                            </div>
                            <div class=" mb-3 ">
                                <h6 style="display: inline;">ชื่อผู้จำนำ :</h6>
                                <td width="25%" style="display: inline;"><?= $result['s_name'] ?></td>
                                <h6 style="display: inline;">นามสกุล :</h6>
                                <td width="25%" style="display: inline;"><?= $result['s_lastname'] ?></td>

                            </div>
                            <div class=" mb-3 col-10 ">
                                <h6 style="display: inline;">รายละเอียดสินค้า :</h6>
                                <td width="25%" style="display: inline;"><?= $result['o_type'] ?></td>
                            </div>
                            <div class=" mb-3 ">
                                <h6 style="display: inline;">จำนวนเงินต้น :</h6>
                                <td width="25%" style="display: inline;"><?= $result['principle'] ?> บาท</td>
                            </div>
                            <div class=" mb-3 ">
                                <h6 style="display: inline;">จำนวนดอกเบี้ย :</h6>
                                <td width="25%" style="display: inline;"><?= $result['principle'] * 0.02 * $result['r_mount'] ?> บาท</td>
                            </div>
                        </div>
                        <div class="justify-content-start flex-fill ">
                            <div class=" mb-3 ">
                                <h6 style="display: inline;">เงินที่ต้องจ่ายต่องวด :</h6>
                                <td width="25%" style="display: inline;"><?= ($result['principle'] * 0.02) ?> บาท</td>
                            </div>
                            <div class=" mb-3  ">
                                <h6 style="display: inline;">จำนวนงวดที่ต้องชำระ :</h6>
                                <td width="25%" style="display: inline;"><?= $result['r_mount'] ?> เดือน</td>
                            </div>
                            <div class="   ">
                                <h6 style="display: inline;">วันที่กำหนดชำระ :</h6>
                                <td width="25%" style="display: inline;"><?= $result['c_date'] ?> </td>
                            </div>
                            <!-- <div class=" mb-3 ">
                        <h6 style="display: inline;">จำนวนงวดที่ชำระเเล้ว :</h6><td width="25%" style="display: inline;">3 เดือน</td>
                        <h6 style="display: inline;">จำนวนงวดที่เหลือ :</h6><td width="25%" style="display: inline;">9 เดือน</td>
                    </div> -->
                        </div>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <h5 style="margin-left: 30px;">หลักฐานการชำระค่างวดถูกเพิ่มโดย ชื่อผู้ใช้ <?= $_SESSION['user'] ?></h5>
                        <div class="bg-gray1 mb-3 ">
                            <div class="d-flex flex-row m-3">
                                <div class="justify-content-start flex-fill col-5" style="margin-left:3rem">
                                <div id="myModal" class="modal">
                                    <span class="close cursor" onclick="closeModal()">&times;</span>
                                    <div class="modal-content">

                                        <div class="mySlides">
                                            <div class="numbertext"></div>
                                            <img src="../images/interest/<?= $result['in_img'] ?>" style="width:100%; height:auto">
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-12 mt-3">
                                        <h6>แนบภาพหลักฐานการชำระค่างวด</h6>
                                        
                                        <img src="../images/interest/<?= $result['in_img'] ?>" alt="jewelry" style="width:200px; height:auto;" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">

                                    </div>
                                </div>
                                <div class="justify-content-start flex-fill col-6" style="margin-left:3rem">
                                    <div class=" mb-3 mt-3 col-8">
                                        <h6 style="display: inline;">วันที่ชำระค่างวด</h6>
                                        <input class="form-control " type="date" id="myFile" name="in_date" value="<?= $result['in_date'] ?>" required>
                                    </div>
                                    <div class=" mb-3 col-8">
                                        <h6 style="display: inline;">จำนวนเงิน</h6>
                                        <input class="form-control " type="number" min="0" id="myFile" name="in_befor" value="<?= $result['in_befor'] ?>" required>
                                    </div>
                                </div>
                                <div class=" col-3 mt-6">
                                    <button type="submit" class="col-6 btn btn-green3 text-white">ยืนยัน</button>
                                </div>
                    </form>

                </div>
            </div>
            <div class="d-flex flex-row">
                <div class="justify-content-start flex-fill ">
                    <a href="?page=<?= $_GET['page'] ?>&function=wait" class="btn btn-sm btn-dark text-white">ย้อนกลับ</a>
                </div>
                <div class="flex-fill d-flex justify-content-end gap-1">
                    <!-- <a href="?page=<?= $_GET['page'] ?>&function=showDetails&id=<?= $result['o_id'] ?>" class="btn btn-sm btn-blue2 text-white">ประวัติการชำระดอกเบี้ย</a> -->
                    <!-- <a href="?page=<?= $_GET['page'] ?>&function=qty&id=<?= $result['s_id'] ?>" class="btn btn-sm btn-blue2 text-white">รายละเอียดการโอน</a> -->
                </div>
            </div>
        </div>
        <div>

        </div>

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