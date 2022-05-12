<?php 
include('connection/connection.php');


require ('pdf/fpdf.php');


$pdf=new FPDF('P' , 'mm' , 'A4' );
$pdf->SetMargins( 25,30,10 );

$pdf->AddPage();
$pdf->AddFont('sarabu','','THSarabun.php');
$pdf->AddFont('sarabu','B','THSarabunB.php');


/* $pdf->image('admin/assets/image/admin-logo.png',92,10,20); */
$pdf->SetY(20);
$pdf->SetFont('sarabu','B',20);
$pdf->Cell(0,0,iconv('utf-8','cp874','สัญญาขายฝาก'),0,1,'C');


                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM tbl_social WHERE s_id = '$id'";
                    $query = mysqli_query($connection, $sql);
                    $result = mysqli_fetch_assoc($query);
                }
                //print_r($_POST);
                

$sql="SELECT*FROM tbl_social";
$query=mysqli_query($connection, $sql);
$result=mysqli_fetch_assoc($query);


$pdf->SetFont('sarabu','',16);
$pdf->Cell(0,20,iconv('utf-8','cp874','สัญญาเลขที่ '),0,1);

/* $pdf->Cell(0,5,iconv('utf-8','cp874',$result['s_id']),0,1); */

$pdf->Cell(0,20,iconv('utf-8','cp874','สัญญาฉบับนี้ ทำขึ้น ณ บริษัท มีทรัพย์สิน โฮลดิ้ง จำกัด สำนักงานตั้งอยู่ที่  555 ซอยโชคชัยจงจำเริญ  แขวงบางโพงพาง '),0,1,'C');
$pdf->Cell(0,0,iconv('utf-8','cp874',' เขตยานนาวา  กรุงเทพมหานคร เมื่อวันที่ '.$result['s_date'].' ระหว่าง '.$result['s_name'].' '.$result['s_lastname'].' อายุ '.$result['c_age'].' ปี บัตรประจำตัวประชาชน/'),0,0,'C');
/* $pdf->Cell(-200,20,iconv('utf-8','cp874',' หนังสือเดินทาง เลขที่  '.$result['code_id'].' อยู่ที่  '.$result['c_address'].' เบอร์ติดต่อ  '.$result['phone'].''),10,10,'C');
$pdf->Cell(0,0,iconv('utf-8','cp874','ซึ่งต่อไปนี้ตามสัญญาฉบับนี้เรียกว่า “ ผู้ขายฝาก” ฝ่ายหนึ่ง กับ  '),10,10,'L'); */


$pdf->Output();


?>