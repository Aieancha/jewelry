<?php
$user = $_SESSION['customer_login'];
$sql = "SELECT * FROM tbl_orders INNER JOIN tbl_status ON tbl_orders.o_role=tbl_status.id
INNER JOIN tbl_social ON tbl_social.s_id=tbl_orders.s_id WHERE c_email = '$user'";
$query = mysqli_query($connection, $sql);
$result = mysqli_fetch_assoc($query);

?>

<body class="app">
	<div class="m-2">
		<div class="row g-0 app-wrapper app-auth-wrapper">
			<div class="app-auth-body mx-auto ">
				<div style="margin-top: 1rem">
					<div class="app-auth-branding text-center"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/PW-logo.png" alt="logo"></a></div>
					<label class="mb-3 text-center">Jewelry Pawn</label>
				</div>
			</div>
			<div class="app-content pt-3 p-md-3 p-lg-4">
				<div style="margin-top: 1rem ">
					<h1 class="app-page-title">ข้อมูลการจำนำเครื่องประดับ</h1>
				</div>

				<div class="row g-4">
					<?php 
                  $i = 0;
                  foreach ($query as $result) : ?>
					<div class="col-6 col-md-4 col-xl-3 col-xxl-2">
						<div class="app-card app-card-doc shadow-sm h-100">
							<div class="app-card-thumb-holder p-3">
								<div class="app-card-thumb">
								
									<img class="thumb-image" src="upload/social/<?= $result['img3'] ?>" alt="jewelry">
								</div>
								<span class="badge bg-danger"><?= $result['status_name'] ?></span>
								<a class="app-card-link-mask" href="#file-link"></a>
							</div>
							<div class="app-card-body p-3 has-card-actions">

								<h4 class="app-doc-title truncate mb-0"><a href="#file-link">รหัสสินค้า</a><?= $result['o_code'] ?></h4>
								<div class="app-doc-meta">
									<ul class="list-unstyled mb-0">
										<li><span class="text-muted">รายละเอียด :</span><?= $result['o_type'] ?></li>
									</ul>
								</div>
								<!--//app-doc-meta-->

								<div class="app-card-actions">
									<div class="dropdown">
										<div class="dropdown-toggle no-toggle-arrow" data-bs-toggle="dropdown" aria-expanded="false">
											<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
												<path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
											</svg>
										</div>
										<!--//dropdown-toggle-->
										<ul class="dropdown-menu">
											<li><a class="dropdown-item" href="?page=<?= $_GET['page'] ?>&function=fromdetails&id=<?= $result['o_id'] ?>"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z" />
														<path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
													</svg>ดูรายละเอียด</a></li>
										</ul>
									</div>
									<!--//dropdown-->
								</div>
								<!--//app-card-actions-->

							</div>
							<!--//app-card-body-->

						</div>
						<!--//app-card-->
					</div>


					<?php endforeach; ?>
				</div>
				<!--//container-fluid-->
			</div>
			<!--//app-content-->
		</div>
	</div>
	</div>
	<!--//app-wrapper-->


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

	.bg-dark {
		background: #0000;
	}
</style>