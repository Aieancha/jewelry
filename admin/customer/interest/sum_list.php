<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_interest INNER JOIN tbl_social ON tbl_social.s_id = tbl_interest.ref_id
            INNER JOIN tbl_bill ON tbl_social.s_id = tbl_bill.s_id 
            WHERE tbl_interest.in_id ='$id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
    $Num_Rows = mysqli_num_rows($query);
    //echo $Num_Rows;
}
?>

<div class="row justify-content-between">
    <div class="d-flex justify-content-end">
        <div class="d-flex justify-content-end mb-2 ">
            <form class="example " action="/action_page.php" style="margin: 7px;;max-width:200px">
                <input type="text" placeholder="ชื่อผู้ใช้งาน.." name="search2 ">
                <button type="submit"><i class="fa fa-search btn-dark"></i></button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <!-- title -->
            <h5 class="font-weight-bolder text-dark text-gradient m-3">ข้อมูลการชำระดอกเบี้ย</h5>

            <!-- end title -->
            <div class="card-body overflow-auto p-3 m-4" >
                <div class="d-flex flex-row">
                    <div class="justify-content-start flex-fill ">
                        <div class=" mb-3 ">
                            <h6 style="display: inline;">เลขที่สัญญา :</h6>
                            <td width="25%" style="display: inline;"><?php echo $result['bill_no']; ?></td>
                        </div>
                        <div class=" mb-6 ">
                            <h6 style="display: inline;">ท่านชำระไปแล้ว:</h6>
                            <td>จำนวนงวดที่ชำระ <?php echo $Num_Rows; ?> งวด จาก <?php echo $result['r_mount'] ?> งวด</td>
                        </div>
                        <h5>ตารางแสดงข้อมูลการชำระดอกเบี้ย</h5>

                    </div>
                    <div class="d-flex flex-row m-4">
                        <div class="justify-content-start flex-fill ">
                        </div>
                        <h6 style="display: inline;" class="text-danger">สถานะสัญญา </h6><h6 style="display: inline;">ปกติ</h6>
                            <div >
                                <select name="s_role" require class="btn btn-sm ">
                                <option value="" selected="selected">เปลี่ยนสถานะ</option>
                                <option value="4">ปิดสัญญา</option>
                                <option value="4">ผิดสัญญา</option>
                                <option value="5">ไถ่ถอนก่อนกำหนด</option>
                            </select>
              <a class="btn btn-sm btn-green3 text-white">ยืนยันการเปลี่ยนสถานะ</a>

                        </div>
                    </div>
                </div>
                <form action="">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col">วันที่ชำระดอกเบี้ย</th>
                                <th scope="col">จำนวนดอกเบี้ยที่ชำระ</th>
                                <th scope="col">สถานะ</th>
                                <th scope="col">ดูประวัติการโอน</th>



                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($query as $data) : ?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td><?= $data['in_date'] ?></td>
                                    <td><?= $data['in_befor']; ?></td>
                                    <td><?= ($data['in_role'] == 1 ? '<span class="  ">ชำระแล้ว</span>' : '<span class=" ">ค้างชำระ</span>')  ?></td>
                                    <td> <a href="?page=<?= $_GET['page'] ?>&function=detailsIn&id=<?= $data['in_id'] ?>" class="btn btn-sm btn-blue2 text-white">ดูประวัติ</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </form>
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