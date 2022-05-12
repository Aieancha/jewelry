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


                        </tr>
                    </thead>
                    
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
