<meta charset="utf-8">
<?php
$sql = "SELECT *
FROM tbl_social
INNER JOIN tbl_status
ON tbl_social.s_role = tbl_status.id";
$query = mysqli_query($connection, $sql);
$result = mysqli_fetch_assoc($query);
$date = $result['c_date'];
$start = $result['start_date'];
?>

<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "SELECT * FROM tbl_social WHERE s_id = '$id'";
	$query = mysqli_query($connection, $sql);
	$result = mysqli_fetch_assoc($query);
	
	$status = ($result['s_role'] == 3) ? 4 : 3;
	//echo $status;

	if ($status = ($result['s_role'] == $start) ? $date : $start) {
		//echo $date;
	} else {
		echo "Buy a book.";
	}
	if($status==$start){
		echo $status;
  }else{
	echo $status;
  }
}
?>
<form action="">
	<table class="table">
		<thead>
			<tr>
				<th scope="col">ลำดับ</th>
				<th scope="col">รอบการชำระ</th>
				<th scope="col">สถานะ</th>

			</tr>
		</thead>
		<tbody>

			<?php
			$i = 0;
			foreach ($query as $data) : ?>
				<tr>
					<td><?= ++$i ?></td>
					<td><?= $status; ?></td>
					<td><?php $status = $data['start_date']; if($status == $start ){echo "ค้างชำระ"; }else{ echo "ชำระแล้ว";} ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</form>
