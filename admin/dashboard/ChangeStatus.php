<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_interest INNER JOIN tbl_social ON tbl_social.s_id = tbl_interest.ref_id
    INNER JOIN tbl_orders ON tbl_social.s_id = tbl_orders.s_id
                            INNER JOIN tbl_bill ON tbl_interest.ref_id = tbl_bill.s_id 
                            WHERE tbl_bill.bill_id ='$id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
    $Num_Rows = mysqli_num_rows($query);
    //echo $Num_Rows;
}
?>

<div class="row justify-content-between">
    <div class="row">
        <div class="card">
            <!-- title -->
            <h5 class="font-weight-bolder text-dark text-gradient m-3">ข้อมูลการชำระดอกเบี้ย</h5>

            <!-- end title -->
            <div class="card-body overflow-auto p-3" style="text-align: center">
                <div class="d-flex flex-row">
                    <div class="justify-content-start flex-fill ">
                        <div class=" mb-3 ">
                            <h6 style="display: inline;">เลขที่สัญญา :</h6>
                            <td width="25%" style="display: inline;"><?php echo @$result['bill_no']; ?></td>
                        </div>
                        <div class=" mb-6 ">
                            <h6 style="display: inline;">ชำระไปแล้ว:</h6>
                            <td>จำนวนงวดที่ชำระ <?php echo @$Num_Rows; ?> งวด จาก <?php echo @$result['r_mount'] ?> งวด</td>
                        </div>
                        <h5>ตารางแสดงข้อมูลการชำระดอกเบี้ย</h5>

                    </div>
                    <div class="d-flex flex-row m-4">
                        <div class="justify-content-start flex-fill ">
                            <label class="text-danger">สถานะสัญญา </label><label>ปกติ</label>
                        </div>
                        <?php
                                if (isset($_GET['id']) && !empty($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $sqls = "SELECT * FROM tbl_bill WHERE bill_id = '$id'";
                                    $qry = mysqli_query($connection, $sqls);
                                    $result_status = mysqli_fetch_assoc($qry);
                                }

                                if (isset($_POST) && !empty($_POST)) {
                                    $role = $_POST['bill_role'];
                                    mysqli_query($connection, "UPDATE tbl_bill SET bill_role ='$role' WHERE bill_id='$id'");
                                    if (mysqli_query($connection, $sqls)) {
                                        if ($role == 4) {
                                            $alert = '<script type= "text/javascript">';
                                            $alert .= 'alert("ยืนยันสถานะครบสัญญา");';
                                            $alert .= 'window.location.href = "?page=interest&function=CreatePrin&id=' . $result['bill_id'] . '";';
                                            $alert .= '</script>';
                                            echo $alert;
                                            exit();
                                        } elseif ($role == 5) {
                                            $alert = '<script type= "text/javascript">';
                                            $alert .= 'alert("ยืนยันสถานะผิดสัญญา");';
                                            $alert .= 'window.location.href = "?";';
                                            $alert .= '</script>';
                                            echo $alert;
                                            exit();
                                        }else{
                                            $alert = '<script type= "text/javascript">';
                                            $alert .= 'alert("ยืนยันสถานะไถ่ถอนก่อนกำหนด");';
                                            $alert .= 'window.location.href = "?page=interest&function=CreatePrin&id=' . $result['bill_id'] . '";';
                                            $alert .= '</script>';
                                            echo $alert;
                                            exit();
                                        }
                                        echo "เพิ่มข้อมูลสำเร็จ";
                                    } else {
                                        echo "Error: " . $sql . "<br>"  . mysqli_error($connection);
                                    }
                                    mysqli_close($connection);
                                }
                                ?>

                                <!-- status -->
                                <form action="" method="POST">
                                    <div>
                                        <select name="bill_role" require class="btn btn-sm ">
                                            <option value="" selected="selected" disabled require>เปลี่ยนสถานะ</option>
                                            <option value="4">ครบสัญญา</option>
                                            <option value="5">ผิดสัญญา</option>
                                            <option value="6">ไถ่ถอนก่อนกำหนด</option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-green3 text-white">ยืนยันการเปลี่ยนสถานะ</button>
                                    </div>
                                </form>
                    </div>
                </div>
                
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
                                    <td> <a href="?&function=detailsIn&id=<?= $data['in_id'] ?>" class="btn btn-sm btn-blue2 text-white">ดูประวัติ</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
               
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