<?php

require_once __DIR__ . '/vendor/autoload.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
  'mode' => 'utf-8', 'format' => 'A4',
  'default_font_size' => 16,
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


if (isset($_GET['id']) && !empty($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM tbl_orders INNER JOIN tbl_social ON tbl_orders.s_id=tbl_social.s_id
  INNER JOIN tbl_bill ON tbl_social.s_id = tbl_bill.s_id WHERE o_id = '$id'";
  $query = mysqli_query($connection, $sql);
  $result = mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>สัญญาฝากขาย</title>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Sarabun', sans-serif;
    }
  </style>
</head>


<body class="g-sidenav-show bg-gray-100">
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid">

      <div class="card mb-3">
        <div class="card-body">
          <div class="col-auto mb-5">
            <div class="col-auto">
              <h3 class="head ">สัญญาขายฝาก</h3>
            </div>
            <div class="a">
              <h5 class="hd">สัญญาเลขที่ <?= $result['bill_no'] ?> </h5>
              <p>สัญญาฉบับนี้ ทำขึ้น ณ บริษัท มีทรัพย์สิน โฮลดิ้ง จำกัด สำนักงานตั้งอยู่ที่ 555 ซอยโชคชัยจงจำเริญ แขวงบางโพงพาง เขตยานนาวา กรุงเทพมหานคร
                เมื่อวันที่ <?= $result['bill_date'] ?> ระหว่างคุณ <?= $result['s_name'] . '  ' . $result['s_lastname'] ?> อายุ <?= $result['c_age'] ?> ปี
                บัตรประจำตัวประชาชน/หนังสือเดินทาง เลขที่ <?= $result['code_id'] ?> อยู่ที่ <?= $result['c_address'] ?> เบอร์ติดต่อ <?= $result['phone'] ?>
                ซึ่งต่อไปนี้ตามสัญญาฉบับนี้เรียกว่า “ ผู้ขายฝาก” ฝ่ายหนึ่ง กับ
              </p>
              <p>บริษัท มีทรัพย์สิน โฮลดิ้ง จำกัด ทะเบียนนิติบุคคลเลขที่ 0105564033875 สำนักงานตั้งอยู่ที่ 555 ซอยโชคชัยจงจำเริญ แขวงบางโพงพาง เขตยานนาวา กรุงเทพมหานคร
                ซึ่งต่อไปนี้ตามสัญญาฉบับนี้เรียกว่า “ผู้ซื้อฝาก” อีกฝ่ายหนึ่ง ทั้งสองฝ่ายได้ตกลงทำสัญญากันดังใจความต่อไปนี้
              </p>
              <p>ข้อ 1. ผู้ขายฝากตกลงขายฝาก และผู้ซื้อฝากตกลงรับซื้อฝาก <?= $result['s_type'] ?> ซึ่งเป็นกรรมสิทธิ์ของผู้ขายฝาก เป็นเงินจำนวน <?= $result['principle'] ?> บาท รายละเอียดตามเอกสารแนบท้ายสัญญา หมายเลข 1</p>
              <p>ข้อ 2. ผู้ขายฝากตกลงชำระดอกเบี้ยในอัตราร้อยละ 2% ต่อปีของจำนวนเงินตามข้อ 1. จนกว่าผู้ขายฝากจะทำการไถ่ทรัพย์สิน หรือครบกำหนดระยะเวลาการไถ่ทรัพย์สิน โดยมีรายละเอียดการชำระดอกเบี้ยตามเอกสารแนบท้ายสัญญา หมายเลข 2
                ข้อ 3. ผู้ซื้อฝากตกลงให้ผู้ขายฝากทำการไถ่ทรัพย์สินที่ขายฝากได้ภายในกำหนดระยะเวลา <?= $result['r_mount'] ?> เดือน ผู้ขายฝากจะต้องชำระค่าสินไถ่ให้แก่ผู้ซื้อเป็นเงินจำนวน <?= $result['principle'] ?> และในวันขายฝากนี้ผู้ขายได้รับเงินจากการขายฝากไปครบถ้วนแล้ว
              </p>
              <p>ข้อ 4. การขอขยายระยะเวลาการไถ่ ผู้ขายฝากต้องดำเนินการขอขยายระยะเวลาการไถ่ กับผู้ซื้อฝากก่อนครบกำหนดการไถ่ และการขอขยายระยะเวลาการไถ่ผู้ขายฝากต้องได้รับความยินยอมจากผู้ซื้อฝากโดยมีหลักฐานเป็นหนังสือลงลายมือชื่อผู้ซื้อฝากเป็นสำคัญ
                อนึ่ง หากผู้ขายฝากไม่ไถ่ทรัพย์สินคืน หรือขอขยายระยะเวลาการไถ่ จนพ้นกำหนดระยะเวลาการไถ่ให้ถือว่า ผู้ขายฝากสิ้นสิทธิการไถ่ทรัพย์สินคืนจากผู้ซื้อฝาก โดยไม่จำต้องบอกกล่าวกับผู้ขายฝากอีก
              </p>
              <p>ข้อ 5. ในระหว่างกำหนดเวลาของการขายฝากนี้ ผู้ซื้อฝากจะไม่ทำการจำหน่ายทรัพย์สินซึ่งขายฝาก เว้นแต่จะได้บอกกล่าวแก่ผู้ขายฝาก และได้รับความยินยอมเป็นหนังสือจากผู้ขายฝากก่อนทำการจำหน่าย</p>
              <p>ข้อ 6. ค่าฤชาธรรมเนียมในการขายฝากนั้น และค่าฤชาธรรมเนียมในการในการไถ่ทรัพย์สินที่ขายฝาก ผู้ขายฝากตกลงเป็นผู้รับภาระทั้งสิ้น</p>
              <p>ข้อ 7. ทรัพย์สินซึ่งไถ่นั้นจะต้องคืนตามสภาพที่เป็นอยู่ ณ เวลาที่ทำการไถ่ และถ้าหากทรัพย์สินนั้นถูกทำลาย ทำให้เสียหายเสียหาย หรือทำให้เสื่อมเสียโดยความผิดของผู้ซื้อฝาก ผู้ซื้อฝากยินดีใช้ค่าสินไหมทดแทนให้แก่ ผู้ขายฝาก และ/หรือผู้ไถ่ทรัพย์สิน</p>
              <p>สัญญาฉบับนี้ทำขึ้นเป็นสองฉบับมีข้อความถูกต้องตรงกัน คู่สัญญาทั้งสองฝ่ายได้อ่านและเข้าใจข้อความโดยตลอดแล้ว จึงลงลายมือชื่อไว้เป็นสำคัญต่อหน้าพยานและเก็บสัญญาไว้ฝ่ายละฉบับ</p>
            </div>
            <div class="d-flex flex-row">
              <div class="justify-content-start flex-fill ">
                ผู้ขายฝาก:
                <p>ลงชื่อ ...................................................................</p>
                <p>(<?= $result['s_name'] . '  ' . $result['s_lastname'] ?>)</p>
              </div>
              <div class="flex-fill justify-content-end gap-1">
                พยาน:
                <p>ลงชื่อ ...................................................................</p>
                <p>(.......................................)</p>
              </div>
            </div>
            <div class="d-flex flex-row">
              <div class="justify-content-start flex-fill ">
                ผู้ซื้อฝาก
                <p>บริษัท มีทรัพย์สิน โฮลดิ้ง จำกัด</p>
                <p>ลงชื่อ ...................................................................</p>
                <p>(...........................)</p>
              </div>
              <div class="justify-content-end flex-fill ">
                พยาน:
                <p>ลงชื่อ ...................................................................</p>
                <p>(.......................................)</p>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="d-flex flex-row">
        <div class="justify-content-start flex-fill ">
        </div>
        <div class="flex-fill d-flex justify-content-end gap-1">
          <?php
          $html = ob_get_contents();
          $mpdf->WriteHTML($html);
          $mpdf->Output("contract.pdf");
          ob_end_flush();
          ?>
          <a href="contract.pdf" class="btn btn-color1 bg-gradient-primary theme-btn  pull-right">พิมพ์เอกสาร (pdf)</a>


        </div>
        </form>
      </div>
    </div>

    <div class="d-flex flex-row">
      <div class="justify-content-start flex-fill ">
        <a href="?page=<?= $_GET['page'] ?>" class="btn bg-gradient-dark">ย้อนกลับ</a>
      </div>
      </form>
    </div>
  </div>

</body>

<style>
  body {
    background-color: white !important;
  }

  div.a {
    font-size: 18px;
  }
  h3.head {
    font-size: 20px;
    text-align: center;
  }
  h5.hd {
    font-size: 20px;
  }

  .bar-page {
    width: 90%;
    height: 1px;
    background-color: black;
    align-items: center;
  }

  .title-color {
    color: black;
  }

  th {
    border: 1px solid black;
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
    display: flex;
    align-items: flex-start;
  }
</style>

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

  .title-color {
    color: black;
  }

  th {
    border: 1px solid black;
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
    display: flex;
    align-items: flex-start;
  }
</style>