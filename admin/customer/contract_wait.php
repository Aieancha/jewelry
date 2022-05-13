<?php
$sql = "SELECT *,tbl_social.id,tbl_status.id as header_status 
FROM `tb_booked_stadium_header` inner join tb_user on tb_booked_stadium_header.user_id = tb_user.id 
inner join tb_stadium_type on tb_booked_stadium_header.field_id = tb_stadium_type.id ";
$query = mysqli_query($connection, $sql);
?>
<?php
$code = "C";
$yearMonth = substr(date("Y")+543, -2).date("m");

//query MAX ID 
$sqli = "SELECT MAX(s_id) AS s_id FROM tbl_social";
$qry = mysqli_query($connection,$sqli) or die("Error Query [".$sqli."]");
$rs = mysqli_fetch_assoc($qry);
$maxId = substr($rs['s_id'], -5);  //ข้อมูลนี้จะติดรหัสตัวอักษรด้วย ตัดเอาเฉพาะตัวเลขท้ายนะครับ
//$maxId = 237;   //<--- บรรทัดนี้เป็นเลขทดสอบ ตอนใช้จริงให้ ลบ! ออกด้วยนะครับ
$maxId = ($maxId + 1); 

$maxId = substr("00000".$maxId, -5);
$nextId = $code.$yearMonth.$maxId;
//echo $nextId;
?>