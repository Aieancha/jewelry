<div class="row justify-content-between">
    <div class="d-flex justify-content-center mb-6">
      <a class="btn btn-sm1 bg-gray-600 text-white m-1">แจ้งเตือนการชำระดอกเบี้ย</a>
      <a href="?page=<?= $_GET['page'] ?>&function=list" class="btn btn-sm1 bg-gray-500 m-1">ตรวจสอบการชำระดอกเบี้ยโดยลูกค้า</a>
      <a href="?page=<?= $_GET['page'] ?>&function=wait" class="btn btn-sm1 bg-gray-500  m-1">รายการสรุปการชำระดอกเบี้ย</a>
    </div>
    <div class="d-flex justify-content-end">
      <div class="d-flex justify-content-end mb-2 ">
        <form class="example " action="" style="margin: 7px;;max-width:200px">
          <input type="text" placeholder="" name="search2 ">
          <button type="submit"><i class="fa fa-search btn-dark"></i></button>
        </form>

      </div>
      <a href="" class="btn btn-sm btn-dark text-white">สถานะ</a>
    </div>
    <div class="row">
      <div class="card">
        <!-- title -->
        <h5 class="font-weight-bolder text-dark text-gradient m-3">ตารางแสดงข้อมูลลูกค้าที่ใกล้ครบกำหนดชำระค่างวด</h5>

        <div class="row">
        <div class="card">
        <h5 class="m-3">ตารางแสดงรายชื่อลูกค้าทั้งหมด</h5>
            <div class="card-body overflow-auto p-1 " style="text-align: center">
                <table class="table" id="pledge">
                    <thead>
                        <div class="card-body overflow-auto p-1  " style="text-align: center">
                            <tr class="">
                                <th scope="col">ลำดับ</th>
                                <th scope="col">วันที่บันทึกข้อมูล</th>
                                <th scope="col">สถานะผู้บันทึก</th>
                                <!-- <th scope="col">ผู้บันทึกข้อมูล</th> -->
                                <th scope="col">ชื่อผู้ใช้ติดต่อ</th>
                                <th scope="col">สถานะ</th>
                                <th scope="col">ดูรายละเอียด</th>
                                <th scope="col">ดำเนินการต่อ</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($query as $data) : ?>
                            <tr>
                                <td><?= ++$i ?></td>
                                <td><?= $data['o_date'] ?></td>
                                <td> <?php 
                                            if ($data['lavel'] == 'admin' ) {
                                                echo "ผู้จัดการ";
                                            } else if ($data['lavel'] == 'staff' ) {
                                                echo "พนักงาน";
                                            }else {
                                                echo "ลูกค้า";
                                            } ?></td>
                                <!-- <td></td> -->
                                <td><?= $data['c_facebook'] . '' . $data['c_line'] ?></td>
                                <td class="text-danger"><?php echo $data['status_name']; ?></td>
                                <td> <a href="?page=<?= $_GET['page'] ?>&function=details&id=<?= $data['s_id'] ?>" class=" btn-sm btn-gray-600"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon " style="display: inline-block;color: #1e48dd;height: 2em;width: 2em;" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.854 8.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707l-4.096 4.096z" />
                                        </svg></a></td>
                                <td> <a href="?page=<?= $_GET['page'] ?>&function=updated&id=<?= $data['s_id'] ?>" class="btn btn-sm btn-blue2 text-white">ดำเนินการต่อ</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>

      </div>
    </div>
  </div>