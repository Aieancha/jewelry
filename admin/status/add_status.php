<meta charset="UTF-8">
<?php

$status = 1; // ลองเปลี่ยนตัวเลขตรงนี้นะครับ เพื่อทดสอบ if else ที่เราได้เขียนไว้

if ($status == 1) {
  echo "<font color='red'> รอประเมิน </font>";
} elseif ($status == 2) {
  echo "<font color='green'> รอร่างสัญญา </font>";
} elseif ($status == 3) {
  echo "<font color='blue'> ชำระเงินถูกต้อง </font>";
} elseif ($status == 4) {
  echo "<font color='blue'> ชำระเงินถูกต้อง </font>";
} elseif ($status == 5) {
  echo "<font color='blue'> ชำระเงินถูกต้อง </font>";
} elseif ($status == 6) {
  echo "<font color='blue'> ชำระเงินถูกต้อง </font>";
} else {
  echo "<font color='orange'> ตรวจสอบการจัดส่งสินค้า </font>";
}
?>