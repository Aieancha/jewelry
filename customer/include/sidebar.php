<?php
$sql = "SELECT * FROM tbl_social";
$query = mysqli_query($connection,$sql);
$result = mysqli_fetch_assoc($query);
?>
<?= $_SESSION['s_id'] ?>
<div id="app-sidepanel" class="app-sidepanel">
	<div id="sidepanel-drop" class="sidepanel-drop" style="z-index: index 0; "></div>
	<div class="sidepanel-inner d-flex flex-column">
		<a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
		<div class="app-branding">
			<a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"><span class="logo-text">PORTAL</span></a>

		</div>
		<!--//app-branding-->

		<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
			<ul class="app-menu list-unstyled accordion" id="menu-accordion">
				<li class="nav-item">
					<!-- เปลี่ยนสีปุ่ม active -->
					<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					<a class="nav-link <?php echo !isset($_GET['page']) && empty($_GET['page']) ? 'active' : '' ?>" href="?&id=<?= $result['s_id'] ?>">
						<span class="nav-icon">
							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
								<path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
							</svg>
						</span>
						<span class="nav-link-text">ยื่นแบบฟอร์มการจำนำ</span>
					</a>
					<!--//nav-link-->
				</li>
				<!--//nav-item-->
				<li class="nav-item">
					<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					<a class="nav-link <?php echo isset($_GET['page']) && ($_GET['page']) == 'frompledge' ? 'active' : '' ?> " href="?page=frompledge">
						<span class="nav-icon">
							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path d="M9.828 4a3 3 0 0 1-2.12-.879l-.83-.828A1 1 0 0 0 6.173 2H2.5a1 1 0 0 0-1 .981L1.546 4h-1L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3v1z" />
								<path fill-rule="evenodd" d="M13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4zM2.19 3A2 2 0 0 0 .198 5.181l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H2.19z" />
							</svg>
						</span>
						<span class="nav-link-text">ติดตามสถานะการจำนำ</span>
					</a>
					<!--//nav-link-->
				</li>
				<!--//nav-item-->
				<li class="nav-item">
					<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					<a class="nav-link <?php echo isset($_GET['page']) && ($_GET['page']) == 'interest' ? 'active' : '' ?> " href="?page=interest">
						<span class="nav-icon">
							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z" />
								<path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
							</svg>
							<path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
							<path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
							<circle cx="3.5" cy="5.5" r=".5" />
							<circle cx="3.5" cy="8" r=".5" />
							<circle cx="3.5" cy="10.5" r=".5" />
							</svg>
						</span>
						<span class="nav-link-text">รายการชำระดอกเบี้ย</span>
					</a>
					<!--//nav-link-->
				</li>
				<!--//nav-item-->
				<li class="nav-item">
					<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					<a class="nav-link <?php echo isset($_GET['page']) && ($_GET['page']) == 'profile' ? 'active' : '' ?> " href="?page=profile">

						<span class="nav-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
								<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
								<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
							</svg>
							<circle cx="3.5" cy="5.5" r=".5" />
							<circle cx="3.5" cy="8" r=".5" />
							<circle cx="3.5" cy="10.5" r=".5" />
							</svg>
						</span>
						<span class="nav-link-text">ข้อมูลส่วนตัว</span>
					</a>
					<!--//nav-link-->
				</li>
				<!--//nav-item-->





				</a>
				<!--//nav-link-->
				</li>
				<!--//nav-item-->
			</ul>
			<!--//app-menu-->
		</nav>
		<!--//app-nav-->

	</div>
	<!--//app-sidepanel-footer-->

</div>
<!--//sidepanel-inner-->
</div>
<!--//app-sidepanel-->
<style>
	.app-sidepanel.sidepanel-visible {
		display: block;
		z-index: 2;
	}

	.app-card .app-card-body .app-card-actions {
		display: inline-block;
		width: 30px;
		height: 30px;
		text-align: center;
		border-radius: 50%;
		position: absolute;
		z-index: 1;
		right: 0.75rem;
		top: 0.75rem;
	}
</style>