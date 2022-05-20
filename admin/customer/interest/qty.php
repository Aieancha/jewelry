
<?php
$code = "A";
$yearMonth = substr(date("Y")+543, -2).date("m");

//query MAX ID 
$sqli = "SELECT MAX(s_id) AS s_id FROM tbl_social";
$qry = mysqli_query($connection,$sqli) or die("Error Query [".$sqli."]");
$rs = mysqli_fetch_assoc($qry);
$maxId = substr($rs['s_id'], -5);  //ข้อมูลนี้จะติดรหัสตัวอักษรด้วย ตัดเอาเฉพาะตัวเลขท้ายนะครับ
//$maxId = 237;   //<--- บรรทัดนี้เป็นเลขทดสอบ ตอนใช้จริงให้ ลบ! ออกด้วยนะครับ
//$maxId = ($maxId + 1); 
if ($maxId == '') {
  $maxId = 1;
} else {
  $maxId = ($maxId + 1);
}
$maxId = substr("00000".$maxId, -5);
$nextId = $code.$yearMonth.$maxId;

if (isset($_POST) && !empty($_POST)) {
	$social_name = $_POST['social_name'];
	$social_contact = $_POST['social_contact'];
	$price_img = $_POST['price_img'];
	$s_type = $_POST['s_type'];
	$nextId = $_POST['ref_img'];
	$img_id = rand();

	if (isset($_POST['submit'])) {
		$extension = array('jpeg', 'jpg', 'png', 'gif');
		foreach ($_FILES['images']['tmp_name'] as $key => $value) {
			$filename = $_FILES['images']['name'][$key];
			$filename_tmp = $_FILES['images']['tmp_name'][$key];
			echo '<br>';
			$ext = pathinfo($filename, PATHINFO_EXTENSION);

			$finalimg = '';
			if (in_array($ext, $extension)) {
				if (!file_exists('upload/' . $filename)) {
					move_uploaded_file($filename_tmp, 'upload/' . $filename);
					$finalimg = $filename;
				} else {
					$filename = str_replace('.', '-', basename($filename, $ext));
					$newfilename = $filename . time() . "." . $ext;
					move_uploaded_file($filename_tmp, 'upload/' . $newfilename);
					$finalimg = $newfilename;
				}
				
				//insert
				$insertqry = "INSERT INTO `tbl_images`( `images`,`s_img`) VALUES ('$finalimg','$img_id')";
				mysqli_query($connection, $insertqry);
				mysqli_query($connection, "INSERT INTO tbl_social (social_name, social_contact, price_img, s_type, s_img, ref_img)
				VALUES ('$social_name', '$social_contact', '$price_img', '$s_type', '$img_id', '$nextId')");

				//echo "เพิ่มข้อมูลสำเร็จ"
				
			} else {
				//display error
			}
		}
	}
}
?>

<body>
	<section class="wrapper">
<?php 

	if(isset($_GET['social_name'])) {
		echo "'".$_GET['social_name']."'";
		}
	
	?>
	<?php 
	if(isset($_GET['s_img'])) {
		$sql = "SELECT*FROM tbl_images WHERE s_img = '".$_GET['s_img']."'";
		$query = mysqli_query($connection, $sql); 
		while ($result = mysqli_fetch_assoc($query)){
			echo '<img src="upload/'.$result['images'].'"';
		}
	}
	?>

<form action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-xs-12 col-md-8 offset-md-2 pb-5">
              <div class="wrapper-progressBar ">
                <ul class="progressBar">
                  <li class="active">บันทึกข้อมูลผู้สนใจจำนำ</li>
                  <li>ประเมินราคาเครื่องประดับ</li>
                  <li>ร่างสัญญา</li>
                </ul>
              </div>
            </div>
            <h4 class="pb-5">กรอกข้อมูลผู้สนใจจำนำเครื่องประดับ</h4>
          </div>
          <div class="mb-4 col-lg-5 t ">
            <h5 style="display: inline;">ช่องทางการติดต่อ</h5>
            <h5 class="form-label text-danger" style="display: inline;">*</h5>
            <div class="col-sm-12">
              <select name="social_contact" class="form-control w-45" required>
                <option value="" selected="selected">- เลือกช่องทางการติดต่อ -</option>
                <option value="facebook">Facebook</option>
                <option value="line">Line</option>
              </select>
            </div>
            <!-- end title -->

          </div>
          <div class="mb-4 col-3 ">
            <h5 style="display: inline;">ชื่อผู้ใช้</h5>
            <h5 class="form-label text-danger" style="display: inline;">*</h5>
            <input type="text" class="form-control " name="social_name" placeholder="กรอกชื่อผู้ใช้ที่ติดต่อ" autocomplete="off" required>
          </div>
          <div class="mb-4 col-3 ">
            <h5 style="display: inline;">ประเภทสินทรัพย์จำนำ</h5>
            <h5 class="form-label text-danger" style="display: inline;">*</h5>
            <input type="text" class="form-control " name="s_type" placeholder="สินทรัพย์ที่ใช้จำนำ" autocomplete="off" required>
          </div>
          <div class="mb-4 col-3 ">
            <h5 style="display: inline;">ภาพถ่ายสินค้าจริง</h5>
            <h5 class="form-label text-danger" style="display: inline;">*</h5>
            <input type="file" id="myFile" name="images[]" multiple required>
          </div>
          <div class="mb-3 col-3 ">
            <h5>ราคาที่ลูกค้าต้องการ</h5>
            <input type="number" min="0" name="price_img" class="form-control " placeholder="10000 บาท" autocomplete="off">
            <input class="form-control " type="hidden" name="ref_img" value="<?php echo $nextId ?>" required>
          </div>
          <div class="mb-3 col-3 ">
            <h5>ราคาประเมินจากภาพ</h5>
            <input type="number" min="0" name="price_img" class="form-control " placeholder="กรอกราคาประเมิน (หน่วยเป็นบาท)" autocomplete="off">
            <input class="form-control " type="hidden" name="ref_img" value="<?php echo $nextId ?>" required>
          </div>
      

      </div>
    </div>
    <div class="d-flex flex-row">
      <div class="justify-content-start flex-fill ">
        <a href="?page=<?= $_GET['page'] ?>" class="btn btn-dark ">ย้อนกลับ</a>
      </div>
      <div class="flex-fill d-flex justify-content-end gap-1">
        <button type="submit" name="submit" class="btn bg-gradient-dark pull-right ">บันทึก</button>
        <a href="?page=<?= $_GET['page'] ?>&function=customr" class="btn btn-color1 bg-gradient-primary theme-btn  pull-right">ดำเนินการต่อ</a>
      </div>
      </form>
</body>
</section>