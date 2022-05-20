<?php
$month = $_SESSION['month'];
echo $month ;
$connection = mysqli_connect("localhost","root","","lastproject");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}else{
    // echo 'success';
}
$sql = "SELECT * FROM tb_order INNER JOIN tb_booked_stadium_header
ON tb_order.tb_order_id = tb_booked_stadium_header.tb_order_id
INNER JOIN tb_user ON tb_order.user_id = tb_user.id 
INNER JOIN tb_stadium_type ON tb_stadium_type.id = tb_booked_stadium_header.field_id 
INNER JOIN tb_booked_accessory ON tb_order.tb_order_id = tb_booked_accessory.tb_order_id 
INNER JOIN tb_accessory ON tb_booked_accessory.accessory_id =tb_accessory.id ";
// -- GROUP BY 
// -- tb_order.tb_order_id 
$query = mysqli_query($connection, $sql);


header("Content-Type: application/vnd.ms-excel"); // ประเภทของไฟล์
header('Content-Disposition: attachment; filename="ReportExcel.xls"'); //กำหนดชื่อไฟล์
header("Content-Type: application/force-download"); // กำหนดให้ถ้าเปิดหน้านี้ให้ดาวน์โหลดไฟล์
header("Content-Type: application/octet-stream"); 
header("Content-Type: application/download"); // กำหนดให้ถ้าเปิดหน้านี้ให้ดาวน์โหลดไฟล์
header("Content-Transfer-Encoding: binary"); 

?>	
		<table id="dataTable" style="border: 1px solid black;">
			<thead >
				<tr >
					<th style="border: 1px solid black;">ลำดับ</th>
					<th style="border: 1px solid black;">เลขที่รายการ</th>
					<th style="border: 1px solid black;">ประเภทรายการ</th>
					<th style="border: 1px solid black;">ชื่อผู้ใช้งาน</th>						
					<th style="border: 1px solid black;">หมายเลขติดต่อ</th>
					<th style="border: 1px solid black;">วันที่ทำรายการ</th>
					<th style="border: 1px solid black;">ยอดรวมรายการ</th>
					<th style="border: 1px solid black;">เจ้าหน้าที่รับชำระเงิน</th>
				</tr>
			</thead>
			<tbody style="border: 1px solid black;">
			<?php
                        $i = 1;
                        foreach ($query as $data) : ?>

				   <tr  >
				   <td style="border: 1px solid black;" style="border: 1px solid black;"><?= $i++ ?></td>
				   <td style="border: 1px solid black;"><?= $data['order_id'] ?></td>
				   <td style="border: 1px solid black;"><?= $data['title'] ?></td> 
				   <td style="border: 1px solid black;"><?= $data['firstname'] ?></td>   				   
				   <td style="border: 1px solid black;"><?= $data['phone'] ?></td>
				   <td style="border: 1px solid black;"><?= $data['booked_date'] ?></td>   
				   <td style="border: 1px solid black;"><?= $data['price'] ?></td>
				   <td style="border: 1px solid black;"><?= $data['name_admin'] ?></td>   
				   </tr>
				   <?php endforeach; ?>
			</tbody>
		</table>	
		<?php
mysqli_close($connection);
?>