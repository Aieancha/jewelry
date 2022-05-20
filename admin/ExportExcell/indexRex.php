<?php
// $sql = "SELECT * FROM tb_order INNER JOIN tb_booked_stadium_header
// ON tb_order.tb_order_id = tb_booked_stadium_header.tb_order_id
// INNER JOIN tb_user ON tb_order.user_id = tb_user.id";
// $query = mysqli_query($connection, $sql);


require_once __DIR__ . '/vendor/autoload.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'BI' => 'THSarabunNew BoldItalic.ttf'
        ]
    ],
    'default_font' => 'sarabun'
]);

ob_start();

// $mpdf->SetHTMLHeader('
// <img src="picture/img/programmerthailand_social.jpg" width="100%" />
// ');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReportPDFSMFootballClubs</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }
    </style>
</head>

<body>
    <div style="width:100%; height:100%;border:1px solid black;padding: 10px;">
        <div style="width:100%;text-align: center;">
            <img width="130px" height="130px" src="picture/logo.jpg"></img><br />
            <span>SM Football Club</span><br>
            <span>สายไหม 9 สายไหม ซอย 6 สายไหม กรุงเทพ 10220</span>
        </div>
        <div style="font-weight:bold; padding-left:1cm;">
            วันที่ออกรายงาน เดือน xxxx ปี xxxx
        </div>
        <table class="table table-sm " id="tableall">
            <thead class="text-center">
                <tr>
                    <th scope="col">ลำดับ</th>
                    <th scope="col">เลขที่รายการ</th>
                    <th scope="col">วันที่ใช้งาน</th>
                    <th scope="col">ยอดเงินที่ได้รับ</th>
                    <th scope="col">เจ้าหน้าที่รับชำระเงิน</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <td>1</td>
                    <td>SMF0000001</td>
                    <td>20/20/2020</td>
                    <td>2,600</td>
                    <td>Officer</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>SMF0000002</td>
                    <td>20/20/2020</td>
                    <td>6,000</td>
                    <td>Officer</td>
                </tr>

            </tbody>
        </table>


        <div style="font-weight:bold;padding-left:1cm;"> ยอดรวมรายการประจำ เดือน xxxx ปี xxxx </div>
                        <table class="table  " id="tableall" style="width:50%;">
                            <thead class="text-center " style="margin: 20px;">
                                <tr>
                                    <th scope="col">รายการใช้บริการ</th>
                                    <th scope="col">ยอดเงินรวม</th>

                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td>สนาม</td>
                                    <td>5,000</td>
                                </tr>
                                <tr>
                                    <td>อุปกรณ์กีฬา</td>
                                    <td>3,600</td>
                                </tr>
                                <tr class="line">
                                    <td>รวมทั้งสิน</td>
                                    <td>8,600</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="col-auto" style="padding: 0;"> * หมายเหตุ: </div>
                        <div class="col" style="padding-right:0px;">ยอดรวมทั้งหมดเป็นการจองที่เกิดขึ้นจากภายในระบบเท่านั้น ไม่ได้รวมการจองหรือเช่าที่อยู่นอกเหนือจากตัวระบบ </div>


    </div>

    <?php
    $html = ob_get_contents();
    $mpdf->WriteHTML($html);
    $mpdf->Output("MyReport.pdf");
    ob_end_flush();
    ?>
    <a href="MyReport.pdf" class="btn btn-primary">โหลด (pdf)</a>

</body>

<style>
    body {
        background-color: white !important;
    }

    .bar-page {
        width: 90%;
        height: 1px;
        background-color: black;
        align-items: center;
    }

    td,
    th {
        text-align: center !important;
    }

    .title-color {
        color: black;
    }

    .table-sum {
        width: 50%;
        max-width: 50%;
        margin-bottom: 20px;
    }


    .line {
        border: 2px solid black;
    }

    .text-note {

        align-items: center;
    }

    .notice {
        display: flex;
        align-items: flex-end;
        margin-bottom: 20px;
    }

    .noticeTop {
        margin-top: 30px;
        display: flex;
        align-items: flex-start;
    }
</style>