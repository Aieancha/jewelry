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

	$status= ($result['s_role']== $start)? $date: $start;
	echo $status;
	
}
?>
