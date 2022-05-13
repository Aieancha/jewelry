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

            <div class="card-body">
                
               

<div class="card ">
    <div class="card-body"> 
    <h4 >ตารางแสดงรายละเอียดการชำระค่างวด</h4>
        <div class="card-body overflow-auto p-3 bg-white" style="text-align: center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">วันที่กำหนดชำระ</th>
                            <th scope="col">รหัสผู้จำนำ</th>
                            <th scope="col">รหัสสินค้า</th>
                            <th scope="col">จำนวนเงินที่ชำระ</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">รายละเอียดการโอน</th>
                        </tr>
                    </thead>
                    
                    
        </table>
    </div>
</div>           
        </div>
        <a href="?page=<?= $_GET['page'] ?>&function=customr" class="btn btn-sm btn-dark text-white">ย้อนกลับ</a>
        <a href="?page=<?= $_GET['page'] ?>&function=detailsIn" class="btn btn-sm btn-blue2 text-white">รายละเอียดการโอน</a>  
                </form>
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