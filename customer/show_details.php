<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_orders INNER JOIN tbl_social ON tbl_social.s_id=tbl_orders.s_id WHERE o_id = '$id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
}
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM tbl_interest INNER JOIN tbl_social ON tbl_social.s_id = tbl_interest.ref_id WHERE tbl_social.s_id ='$id'";
    $qry = mysqli_query($connection, $sql1);
    $Num_Rows = mysqli_num_rows($qry);
	if ($Num_Rows == 0) {
		$Num_Rows = 0;
	} else {
		$Num_Rows = ($Num_Rows + 1);
	}
	$wait=$result['r_mount']-$Num_Rows; //งวดที่รอชำระ
}
?>

<body class="app">
	<div class="row g-0 app-wrapper app-auth-wrapper">
		<div class="app-auth-body mx-auto ">
			<div style="margin-top: 1rem">
				<div class="app-auth-branding text-center"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/PW-logo.png" alt="logo"></a></div>
				<label class="mb-3">Jewelry Pawn</label>
			</div>
		</div>
	</div>

	<div class="app-wrapper">
		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">
				<label class="mb-3">ข้อมูลการจำนำเครื่องประดับของ คุณ <?= $_SESSION['user'] ?></label>
				<div class="row gy-4">
					<div class="col-12 col-lg-6">
						<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start mb-2">
							<div class="app-card-header p-3 border-bottom">
								<div class="row align-items-center gx-3">
									<div class="col-auto">
										<div class="app-icon-holder">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
												<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
												<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
											</svg>
										</div>
										<!--//icon-holder-->

									</div>
									<!--//col-->
									<div class="col-auto">
										<h4 class="app-card-title">ข้อมูลผู้จำนำ</h4>
									</div>
									<!--//col-->
								</div>
								<!--//row-->
							</div>
							<!--//app-card-header-->
							<div class="app-card-body px-4 w-100">
								<div class="item py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>เลขที่สำคัญที่ราชกาลออกให้ : </strong>
												<td width="25%" style="display: inline;"><?= $result['code_id'] ?></td>
											</div>
										</div>
										<!--//col-->
									</div>
									<!--//row-->
								</div>
								<!--//item-->
								<div class="item py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>ชื่อผู้จำนำ : </strong>
												<td width="25%" style="display: inline;"><?= $result['s_name'] .' '. $result['s_lastname'] ?></td>
											</div>
										</div>
										<!--//col-->
									</div>
									<!--//row-->
								</div>
								<!--//item-->
								<div class="item py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>เบอร์โทรศัพท์ : </strong>
												<td width="25%" style="display: inline;"><?= $result['phone'] ?></td>
											</div>
										</div>
										<!--//col-->
									</div>
									<!--//item-->
								</div>
								<!--//row-->
								<div class="item py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>บัญชีเฟสบุ้ค : </strong>
												<td width="25%" style="display: inline;"><?= $result['c_facebook'] ?></td>
											</div>
										</div>
										<!--//col-->
									</div>
									<!--//row-->
								</div>
								<!--//item-->
								<div class="item py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>ไอดีไลน์ : </strong>
												<td width="25%" style="display: inline;"><?= $result['c_line'] ?></td>
											</div>
										</div>
										<!--//col-->
									</div>
									<!--//row-->
								</div>
								<!--//item-->
								<div class="item py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>ที่อยู่ปัจจุบัน : </strong>
												<td width="25%" style="display: inline;"><?= $result['c_address'] ?></td>
											</div>
										</div>
									</div>
									<!--//col-->
								</div>
								<!--//row-->
							</div>
							<!--//item-->


						</div>
						<!--//app-card-body-->
						<div class="app-card-footer p-4 mt-auto">
						</div>
						<!--//app-card-footer-->

					</div>
					<!--//app-card-->
				</div>
				<!--//col-->
				<div class="col-12 col-lg-6">
					<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						<div class="app-card-header p-3 border-bottom">
							<div class="row align-items-center gx-3">
								<div class="col-auto">
									<div class="app-icon-holder">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data-fill" viewBox="0 0 16 16">
											<path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z" />
											<path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1ZM10 8a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V8Zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1Zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1Z" />
										</svg>
									</div>
									<!--//icon-holder-->

								</div>
								<!--//col-->
								<div class="col-auto">
									<h4 class="app-card-title">ข้อมูลเครื่องประดับ</h4>
								</div>
								<!--//col-->
							</div>
							<!--//row-->
						</div>
						<!--//app-card-header-->


						<div class="app-card-body px-4 w-100">
							<div class="item py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-auto">
										<div class="item-label"><strong>รหัสสินค้า : </strong>
											<td width="25%" style="display: inline;"><?= $result['o_code'] ?></td>
										</div>
									</div>
									<!--//col-->
								</div>
								<!--//row-->
							</div>
							<!--//item-->
							<div class="item py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-auto">
										<div class="item-label"><strong>รายละเอียดเครื่องประดับ : </strong>
											<td width="25%" style="display: inline;"><?= $result['o_type'] ?></td>
										</div>
									</div>
									<!--//col-->
								</div>
								<!--//row-->
							</div>
							<!--//item-->
							<div class="item py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-auto">
										<div class="item-label"><strong>ราคาที่ต้องการจำนำ</strong>
											<td width="25%" style="display: inline;"><?= $result['o_price'] ?></td>
										</div>
									</div>
									<!--//col-->
								</div>
								<!--//row-->
							</div>
							<!--//item-->
							<div class="item py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-auto">
										<div class="item-label"><strong>ราคาที่ประเมินจากภาพ : </strong>
											<td width="25%" style="display: inline;"><?= $result['price_img'] ?> บาท</td>
										</div>
									</div>
									<!--//col-->
								</div>
								<!--//row-->
							</div>
							<!--//item-->
							<div class="item py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-auto">
										<div class="item-label"><strong>ราคาประเมินจากสินค้าจริง : </strong>
											<td width="25%" style="display: inline;"><?= $result['price_item'] ?> บาท</td>
										</div>
									</div>
									<!--//col-->
								</div>
								<!--//row-->
							</div>
							<!--//item-->
							<div class="item py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-auto">
										<div class="item-label"><strong>ราคาที่ตกลงจำนำ : </strong>
											<td width="25%" style="display: inline;"><?= $result['principle'] ?> บาท</td>
										</div>
									</div>
									<!--//col-->
								</div>
								<!--//row-->
							</div>
							<!--//item-->

						</div>
						<!--//app-card-body-->
						<div class="app-card-footer p-4 mt-auto">
						</div>
						<!--//app-card-footer-->

					</div>
					<!--//app-card-->
				</div>
				<!--//col-->
				<div class="col-12 col-lg-6">
					<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						<div class="app-card-header p-3 border-bottom">
							<div class="row align-items-center gx-3">
								<div class="col-auto">
									<div class="app-icon-holder">
										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
										</svg>
									</div>
									<!--//icon-holder-->

								</div>
								<!--//col-->
								<div class="col-auto">
									<h4 class="app-card-title">รายละเอียดการจำนำ</h4>
								</div>
								<!--//col-->
							</div>
							<!--//row-->
						</div>
						<!--//app-card-header-->


						<div class="app-card-body px-4 w-100">
							<div class="item py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-auto">
										<div class="item-label"><strong>เลขสัญญาการจำนำ : </strong>
											<td width="25%" style="display: inline;"></td>
										</div>
									</div>
									<!--//col-->
								</div>
								<!--//row-->
							</div>
							<!--//item-->
							<div class="item py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-auto">
										<div class="item-label"><strong>ราคาที่ตกลงจำนำ : </strong>
											<td width="25%" style="display: inline;"><?= $result['principle'] ?> บาท</td>
										</div>
									</div>
									<!--//col-->
								</div>
								<!--//row-->
							</div>
							<!--//item-->
							<div class="item py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-auto">
										<div class="item-label"><strong>ดอกเบี้ยรวมทั้งหมด : </strong>
											<td width="25%" style="display: inline;"><?= $result['principle'] * 0.02 * $result['r_mount'] ?> บาท</td>
										</div>
									</div>
									<!--//col-->
								</div>
								<!--//row-->
							</div>
							<!--//item-->
							<div class="item py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-auto">
										<div class="item-label"><strong>ดอกเบี้ยที่ต้องชำระต่อเดือน : </strong>
											<td width="25%" style="display: inline;"><?= ($result['principle'] * 0.02) ?> บาท</td>
										</div>
									</div>
									<!--//col-->
								</div>
								<!--//row-->
							</div>
							<!--//item-->
							<div class="item py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-auto">
										<div class="item-label"><strong>จำนวนงวดรวมทั้งหมด : </strong>
											<td width="25%" style="display: inline;"><?= $result['r_mount'] ?> งวด</td>
										</div>
									</div>
									<!--//col-->
								</div>
								<!--//row-->
							</div>
							<!--//item-->
							<div class="item py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-auto">
										<div class="item-label"><strong>จำนวนงวดที่ชำระเเล้ว : </strong>
											<td width="25%" style="display: inline;"><?php echo $Num_Rows; ?> งวด</td>
										</div>
									</div>
									<!--//col-->
								</div>
								<!--//row-->
							</div>
							<!--//item-->
							<div class="item py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-auto">
										<div class="item-label"><strong>จำนวนงวดที่เหลือ(รอชำระ) : </strong>
											<td width="25%" style="display: inline;"><?php echo $wait; ?> งวด</td>
										</div>
									</div>
									<!--//col-->
								</div>
								<!--//row-->
							</div>
							<!--//item-->
							<div class="item py-3">
								<div class="row justify-content-between align-items-center">
									<div class="col-auto">
										<div class="item-label"><strong>รอบกำหนดชำระ ทุกวันที่ : </strong>
											<td width="25%" style="display: inline;"></td>
										</div>
									</div>
									<!--//col-->
								</div>
								<!--//row-->
							</div>
							<!--//item-->
						</div>
						<!--//app-card-body-->
						<!-- <div class="app-card-footer p-4 mt-auto">
							<a class="btn app-btn-secondary" href="">ดูสัญญาการจำนำ</a>
						</div> -->
						<!--//app-card-footer-->

					</div>
					<!--//app-card-->
				</div>
				<!--//col-->

				<!-- Javascript -->
				<script src="assets/plugins/popper.min.js"></script>
				<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

				<!-- Page Specific JS -->
				<script src="assets/js/app.js"></script>

</body>

</html>
<style>
	.app-card .app-icon-holder {
		display: inline-block;
		background: #9b0e2140;
		color: #9b0e21;
		width: 50px;
		height: 50px;
		padding-top: 10px;
		font-size: 1rem;
		border-bottom: 1px solid #e7e9ed;
		text-align: center;
		border-radius: 50% !important
	}

	.app-auth-wrapper {
		background: #f5f6fd;
		height: 100px !important
	}

	.app-auth-wrapper .app-auth-body {
		width: auto !important
	}
</style>