<header class="app-header fixed-top">
	<div class="app-header-inner">
		<div class="container-fluid py-2">
			<ul class="navbar-nav  justify-content-end" style="margin-right: 0;">
				<li class="nav-item d-flex align-items-center">
					<a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
						<i class="fa fa-user me-sm-1"></i>
						<span class="d-sm-inline d-none"><?= $_SESSION['user'] ?></span>
					</a>
				</li>
			</ul>
			<div class="app-header-content">
				<div class="row justify-content-between align-items-center">

					<div class="col-auto">
						<a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
							<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img">
								<title>Menu</title>
								<path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
							</svg>
						</a>

					</div>
					<!--//app-user-dropdown-->
				</div>
				<!--//app-utilities-->
			</div>
			<!--//row-->
		</div>
		<!--//app-header-content-->
	</div>
	<!--//container-fluid-->
	</div>
	<!--//app-header-inner-->

</header>
<!--//app-header-->