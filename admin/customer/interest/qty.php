<meta charset="utf-8">
<?php
$sql = "SELECT *
FROM tbl_social
INNER JOIN tbl_status
ON tbl_social.s_role = tbl_status.id";
$query = mysqli_query($connection, $sql);
$result = mysqli_fetch_assoc($query);
$principle = $result['principle'];
$mount = $result['r_mount'];
?>

<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "SELECT * FROM tbl_social WHERE s_id = '$id'";
	$query = mysqli_query($connection, $sql);
	$result = mysqli_fetch_assoc($query);
}
?>

<?php

$principle = $result['principle'];
$mount = $result['r_mount'];
		
		$int = (2/100); //2%
		
		/* $result1 = (1/pow((1+$int),$mount));

		$result2 = (1-$result1)/$int; */

		$pmt = ($principle*$int)*$mount;
		
		$resultPmt =  number_format($pmt, 2, '.', '');
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PMT</title>
  </head>
  <body>

	<div class="container">
		<table class="table table-bordered">
			<tr class="text-center">
				<th>งวดที่</th>
				<th>วันที่กำหนดชำระ</th>
				<th>จำนวนดอกเบี้ย</th>
				<th>ชำระดอกเบี้ยต่อเดือน</th>
				<th>ยอดดอกเบี้ยคงเหลือ</th>
			</tr>
			<?php
				for($i = 1;$i<=$mount;$i++){
					$myDate = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "+$i month" ) );
					//สำหรับเดือนสุดท้าย นำดอกเบี้ยมารวมใน ยอดชำระต่อเดือน	
					if($mount == $i){
						$resultPmt = (($principle * 0.02)*$mount);
						//$last_balance = $resultPmt;
					}
					
					$calInterest = (($principle * 0.02));
					
					$payPrincipal = $resultPmt - $calInterest;
					$pay = "";
						
					echo "<tr class='text-right'>";
					
						echo "<td class='text-center'>".$i."</td>";
						echo "<td class='text-center'>".$myDate."</td>";
						/* echo "<td>".number_format($principle, 2)."</td>"; */
						
						echo "<td>".number_format($resultPmt, 2, '.', '')."</td>";
						
						echo "<td>".number_format($calInterest, 2, '.', '')."</td>";
						
						/* echo "<td>".number_format($payPrincipal, 2, '.', '')."</td>"; */
						
						$resultPmt = $resultPmt - $calInterest;
						
						//สำหรับเดือนสุดท้าย (นำดอกเบี้ยมารวม + ยอดชำระเงินต้น) - ยอดชำระต่อเดือน
						if($mount == $i){
							$resultPmt = $resultPmt - $resultPmt;
						}
						
						echo "<td>".number_format($resultPmt, 2, '.', '')."</td>";	
						
					echo "</tr>";
				}
			?>
		</table>  
	</div>


 </body>
</html>