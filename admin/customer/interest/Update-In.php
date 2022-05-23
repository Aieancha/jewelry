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
                $sql = "SELECT * FROM tbl_social INNER JOIN tbl_orders ON tbl_social.s_id=tbl_orders.s_id WHERE tbl_social.s_id = '$id'";
                $query = mysqli_query($connection, $sql);
                $result = mysqli_fetch_assoc($query);
                $strStartDate = $result['c_date'];
                $strStartDate = date('Y-m-d');
                $strNewDate = date("Y-m-d", strtotime("+30 day", strtotime($strStartDate)));
                $strDate = date("Y-m-d", strtotime("+27 day", strtotime($strStartDate)));
                //echo ' + 10 วัน = ' . $strNewDate;
                //$role = $result['s_role']== 3? 4:3;
                //$role = 3;
                $ref = $result['s_id'];
            }
            if (isset($_POST) && !empty($_POST)) {
                $in_date = $_POST['in_date'];
                $in_befor = $_POST['in_befor'];
                


                if (isset($_FILES['in_img']['name']) && !empty($_FILES['in_img']['name'])) {
                    $extension = array("jpeg", "jpg", "png");
                    $target = '../images/interest/';
                    $filename = $_FILES['in_img']['name'];
                    $filetmp = $_FILES['in_img']['tmp_name'];
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if (in_array($ext, $extension)) {
                        if (!file_exists($target . $filename)) {
                            if (move_uploaded_file($filetmp, $target . $filename)) {
                                $filename = $filename;
                            } else {
                                echo 'เพิ่มข้อมูลลงโฟล์เดอร์ไม่สำเร็จ';
                            }
                        } else {
                            $newfilename = time() . $filename;
                            if (move_uploaded_file($filetmp, $target . $newfilename)) {
                                $filename = $newfilename;
                            } else {
                                echo 'เพิ่มข้อมูลลงโฟล์เดอร์ไม่สำเร็จ';
                            }
                        }
                    } else {
                        echo 'ประเภทไฟล์ไม่ถูกต้อง';
                    }
                } else {
                    $filename = '';
                }
                $sql = "INSERT INTO tbl_interest (in_date, in_img, in_befor, in_role,ref_id) VALUES ('$in_date', '$filename', '$in_befor', 1, '$ref')";
                mysqli_query($connection, "UPDATE tbl_social SET c_date ='$strNewDate', start_date = '$strDate' WHERE s_id='$id'");

                if (mysqli_query($connection, $sql)) {
                    echo "เพิ่มข้อมูลสำเร็จ";
                } else {
                    echo "Error: " . $sql . "<br>"  . mysqli_error($connection);
                }

                mysqli_close($connection);
            }

            //print_r($_POST);
            ?>

            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="mb-4">ข้อมูลการจำนำ</h4>
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
                                <td width="25%" style="display: inline;"><?= $result['principle']*0.02*$result['r_mount'] ?> บาท</td>
                            </div>
                        </div>
                        <div class="justify-content-start flex-fill ">
                            <!-- <div class=" mb-3 ">
                                <h6 style="display: inline;">ช่องทางการติดต่อ :</h6>
                                <td width="25%" style="display: inline;"><?= $result['social_contact'] ?></td>
                                <h6 style="display: inline;">ชื่อผู้ใช้ :</h6>
                                <td width="25%" style="display: inline;"><?= $result['social_name'] ?></td>
                            </div> -->
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
                        </div>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <h4 style="margin-left: 30px;">เพิ่มหลักฐานการชำระค่างวด</h4>
                        <div class="bg-gray1 mb-3 ">
                            <div class="d-flex flex-row m-3">
                                <div class="justify-content-start flex-fill col-5" style="margin-left:3rem">
                                    <div class="col-12 mt-3">
                                        <h6>แนบภาพหลักฐานการชำระค่างวด</h6>
                                        <input class="form-control " type="file" id="myFile" name="in_img" accept="image/png, image/jpeg, image/jpg" required>

                                    </div>
                                </div>
                                <div class="justify-content-start flex-fill col-6" style="margin-left:3rem">
                                    <div class=" mb-3 mt-3 col-8">
                                        <h6 style="display: inline;">วันที่ชำระค่างวด</h6>
                                        <label class="form-label text-danger" style="display: inline;">*</label>
                                        <input class="form-control " type="datetime-local" id="myFile" name="in_date" required>
                                    </div>
                                    <div class=" mb-3 col-8">
                                        <h6 style="display: inline;">จำนวนเงิน</h6>
                                        <label class="form-label text-danger" style="display: inline;">*</label>
                                        <input class="form-control " type="number" min="0" id="myFile" name="in_befor" required>บาท
                                    </div>
                                </div>
                                <div class="col-3 mt-6">
                                    <button type="submit" class="col-6 btn btn-green3 text-white">บันทึก</button>
                                </div>
                    </form>

                </div>
            </div>
            <a href="?page=<?= $_GET['page'] ?>&function=customr" class="btn btn-sm btn-dark text-white">ย้อนกลับ</a>
            <a href="?page=<?= $_GET['page'] ?>&function=showDetails&id=<?= $result['o_id'] ?>" class="btn btn-sm btn-blue2 text-white">รายละเอียดการโอน</a>
            <!-- <a href="?page=<?= $_GET['page'] ?>&function=qty&id=<?= $result['s_id'] ?>" class="btn btn-sm btn-blue2 text-white">รายละเอียดการโอน</a> -->

        </div>
    </div>
    <div>

    </div>

    </div>

    </form>
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
        color: rgb(111, 0, 96);
    }

    .progressBar li.active:before {
        border-color: rgb(111, 0, 96);
        background-color: rgb(111, 0, 96);

    }

    .progressBar .active:after {
        background-color: dodgerblue;
    }
</style>