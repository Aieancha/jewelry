<?php $month = "8888888";
?>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title ">ออกรายงาน
        <span class="nav-icon" data-bs-toggle="tooltip" data-bs-placement="right" 
title="หน้าจอ “ออกรายงาน”
ออกรายงานตามเดือน ปี และประเภท ที่ต้องการ มีการออกรายงานได้ 2 อย่าง เป็น PDF Files และ Excell Files โดยจะมีข้อแตกต่างกันตรงความระเอียดของรายงาน PDF จะเป็นการรวมบิลและรวมค่าใช้จ่ายของแต่ละประเภท แต่ Excell จะเป็นการแยกเป็นรายการแต่ละชิ้นเพื่อตรวจดูข้อมูลอย่างละเอียด
">
         <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
</svg>
         </span>
        </h1>
    </div>
    <div class="col-auto">
    </div>
</div>
<hr class="mb-4">

<body>
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-12">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">

                    <h4 class="col-12 oo"> วันที่ต้องการออกรายงาน</h4>
                    <div class="col-12 mb-3 head1">
                        <strong class="w1">เลือกเดือน</strong>
                        <Select name="search" id="month" onchange="$_SESSION['month'] = this.value">
	<Option value="-">เดือน</option>
	<Option value="Jan">มกราคม</option> 
	<Option value="Feb">กุมภาพันธ์</option> 
	<Option value="Mar">มีนาคม</option>
	<Option value="Apr">เมษายน</option> 
	<Option value="May">พฤษภาคม</option> 
	<Option value="Jun">มิถุนายน</option> 
	<Option value="Jul">กรกฎาคม</option>
	<Option value="Aug">สิงหาคม</option>
	<Option value="Sep">กันยายน</option> 
	<Option value="Oct">ตุลาคม</option> 
	<Option value="Nov">พฤศจิกายน</option>
	<Option value="Dec">ธันวาคม</option>
</Select>
<?php
echo $_SESSION['month'];
?>

<strong class="w1">เลือกปี</strong>
<select name="select">ปี
    <?php
    for ($i = 2020+543; $i <= date('Y')+543; $i++) {
        echo "<option>$i</option>";
    }
    ?>
</select>

                    </div>
                    <div class="head1 "> <strong class="w1">เลือกประเภทรายการใช้บริการ</strong>
                        <select>
                            <option value="all">ทั้งหมด</option>}
                            <option value="stadium">สนาม</option>
                            <option value="accessories">อุปกรณ์</option>
                        </select>
                        </select>
                    </div>
                    <div class="col-12 text-end">
                        <button  type="submit" class="btn-export" value="View"onclick="window.location='ExportExcell/indexEx.php'">
                      ReportExcel</button>
                      <button  type="submit" class="btn-export" value="View"onclick="window.location='ExportExcell/indexRex.php'">
                      ReportPDF</button>
                    </div>
                

                <div>


</div> 
                </div>
            </div>
        </div>
    </div>


</body>
<style>
    .btn-export {
        width: 100px !important;
        height: 30px !important;
        color: white;
        background-color: #00008B;
        margin-top: 50px;
    }
    .head1{
        color: black;
        text-align: center;
        margin-top: 30px;
    }
    .w1{
        margin-left: 30px;
        margin-right: 30px;
        margin-bottom: 20px;

    }
    .oo{
        margin-bottom: 50px;
    }
</style>