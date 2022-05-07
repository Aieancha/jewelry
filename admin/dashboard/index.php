<div class="container-fluid py-4 ">
<div class="row justify-content-between">
                <div class="col-auto">
                    <h3 class="font-weight-bolder text-dark text-gradient ">ข้อมูลการจำนำเครื่องประดับ</h3>
                </div>
                </div>
                <div class="d-flex justify-content-end">
                <div class="d-flex justify-content-end mb-2">
                    <form class="example" action="/action_page.php" style="margin: 7px;;max-width:200px">
                        <input type="text" placeholder="เลขที่ราชการออกให้.." name="search2">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <a href="?#=<?=$_GET['#']?>&function=insert" class="btn bg-gradient-primary">สถานะ</a>
                </div>
    <div class="row">
        <div class="card">
            <!-- title -->
            
            <!-- end title -->
            <div class="card-body overflow-auto p-3" style="text-align: center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">รหัสผู้จำนำ</th>
                            <th scope="col">ชื่อผู้จำนำ</th>
                            <th scope="col">ช่องทางการติดต่อ</th>
                            <th scope="col">รหัสสินค้าที่จำนำ</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">เปลี่ยนสถานะ</th>
                            <th scope="col">รายละเอียดเพิ่มเติม</th>

<<<<<<< HEAD
                            <!-- <th scope="col">ประเภทสินทรัพย์จำนำ</th> -->
                            <!-- <th scope="col">ลำดับ</th>
                            <th scope="col">รูปภาพเครื่องประดับ</th> -->
                            <!--th scope="col">สถานะ</th--> 
                            <!-- <th scope="col">วันที่ติดต่อ</th>
                            <th scope="col">ดำเนินการต่อ</th>
                            <th scope="col">รายละเอียดเพิ่มเติม</th> -->
                        </tr>
                    </thead>
                    
                        <?php 
                        $i = 0;
                        foreach ($query as $data):?>
                            <tr>
                                <td><?= ++$i ?></td>
                                <td><?= $data['social_contact'] ?></td>
                                <td><?= $data['social_name'] ?></td>
                                <td class="align-middle">
                                     <img src="upload/social/<?= $data['s_img'] ?>" class="rounded" width="60" height="60">
                                 </td>
                                <td><?= $data['#'] ?></td>
                                <td><?= $data['#'] ?></td>
                                <!-- <td><?= $data['s_type'] ?></td> -->
                                <td> 
                                    <a href="#" class="btn btn-sm btn-dark">เปลี่ยนสถานะ</a>
                                </td>
                                <td> 
                                    <a href="?page=<?=$_GET['page']?>&function=update&id=<?=$data['m_id']?>" class="btn btn-sm btn-dark">ดูรายละเอียด</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
=======

                        </tr>
                    </thead>
                    
>>>>>>> 4f457879dc256e2c9a0892852eb5ab71b57930bd
                </table>

            </div>
        </div>
    </div>

</div>
<?php
mysqli_close($connection);
?>
<style>
body {
  font-family: Arial;
  border-radius: 25px;
}

* {
  box-sizing: border-box;
  border-radius: 10px;
  border-top-right-radius: 0px;
  border-bottom-right-radius: 0px;
  
  
}

form.example input[type=text] {
  padding: 5px;
  font-size: 15px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #ffff;
  
}

form.example button {
  float: left;
  width: 20%;
  padding: 5px;
  background: #C71585;
  color: white;
  font-size: 15px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
  border-radius: 10px;
  border-top-left-radius: 0px;
  border-bottom-left-radius: 0px;
}


form.example::after {
  content: "";
  clear: both;
  display: table;
}

</style>
