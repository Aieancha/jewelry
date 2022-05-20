
	<?php  
	$user = $_SESSION['customer_login']; 
	$sql = "SELECT * FROM tbl_social WHERE c_email = '$user'"; 
	$query = mysqli_query($connection, $sql); 
	$result = mysqli_fetch_assoc($query);   
	
	if (isset($_POST) && !empty($_POST)) {
		$email = $_POST['c_email'];
		$firstname = $_POST['s_name'];
		$lastname = $_POST['s_lastname'];
		//echo sha1(md5($m_pass));
			$sql = "UPDATE tbl_social
					SET c_email='$email', s_name='$firstname', s_lastname='$lastname'
					WHERE c_email = '$user'";

			if (mysqli_query($connection, $sql)) {
			  //echo "เพิ่มข้อมูลสำเร็จ";
			  $alert = '<script type= "text/javascript">';
			  $alert .= 'alert("อัพเดตข้อมูลสำเร็จ");';
			  $alert .= 'window.location.href = "?page=profile";';
			  $alert .= '</script>';
			  echo $alert;
			  exit();
			} else {
			  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
			}

			mysqli_close($connection);
		}
		?>
<body class="app">   	
<div class="row g-0 app-wrapper app-auth-wrapper">
		<div class="app-auth-body mx-auto ">
			<div style="margin-top: 1rem">	
		<div class="app-auth-branding text-center"><a class="app-logo" href="index.html" ><img class="logo-icon me-2" src="assets/images/PW-logo.png" alt="logo"></a></div>
		<label class="mb-3">Jewelry Pawn</label>
		</div>
		</div>
</div>

		<div class="app-wrapper">
<div class="app-content pt-3 p-md-3 p-lg-4"> 
		    <div class="container-xl">
			    <h1 class="app-page-title">ข้อมูลรายการชำระดอกเบี้ย</h1>
				<div class="d-flex flex-row">
                <div class="flex-fill d-flex justify-content-end gap-1 ">
				<a class="btn app-btn-secondary bg-NGG" >รายการที่ชำระเเล้ว</a>
</div>
                <div class="flex-fill d-flex justify-content-start gap-1">
				<div class="btn app-btn-secondary" >
				<a >รายการที่<a href="?page=<?= $_GET['page'] ?>&function=interest2" style="color:#5d6778; text-decoration: underline">ค้าง<a>ชำระ</a>
			</div>
			</div>
						   
						</div><!--//app-card-->
	                </div><!--//col-->
	                <div class="col-11 m-3">
		                <div class="app-card  shadow-sm  align-items-start">
						    <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        <div class="app-icon-holder">
										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
</svg>
									    </div><!--//icon-holder-->
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">รายละเอียดการชำระดอกเบี้ย</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
							
<div class="row g-4">
<div class="m-2 overflow-auto">
<div class="col-6 col-md-4 mb-3 col-xl-3 col-xxl-2 ">
					    <div class="app-card app-card-doc shadow-sm h-100">
						<div class="text-end p-3">
							<span class="badge bg-success">ชำระแล้ว</span>
							<a class="app-card-link-mask" href="#file-link"></a>
						</div>
						    <div class="app-card-body p-3 has-card-actions">							    
							    <h4 class="app-doc-title truncate mb-0"><a href="#file-link">เลขที่สัญญา : </a><?= $result['code_id'] ?></h4>
							    <div class="app-doc-meta">
								    <ul class="list-unstyled mb-0">
									    <li><span class="text-muted">รายละเอียด :</span> ตุ้มหูทอง 1 สลึง</li>
								    </ul>
							    </div><!--//app-doc-meta-->
							    
							    <div class="app-card-actions">
								    <div class="dropdown">
									    <div class="dropdown-toggle no-toggle-arrow" data-bs-toggle="dropdown" aria-expanded="false">
										    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
	  <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
	        </svg>
									    </div><!--//dropdown-toggle-->
									    <ul class="dropdown-menu">
										    <li><a class="dropdown-item" href="?page=<?= $_GET['page'] ?>&function=detailbill&id=<?= $result['s_id'] ?>"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
	  <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
	</svg>ดูรายละเอียด</a></li>		
										</ul>
								    </div><!--//dropdown-->
						        </div><!--//app-card-actions-->
								    
						    </div><!--//app-card-body-->

						</div><!--//app-card-->
				    </div><!--//col-->

					
							


						</div>

						    
						    
			</div><!-- overflow -->
		</divdiv><!--//g-6-->
 
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 

</body>
</html> 
<style>
.app-card .app-icon-holder{
    display: inline-block;
    background: #9b0e2140;
    color: #9b0e21;
    width: 50px;
    height: 50px;
    padding-top: 10px;
    font-size: 1rem;
    text-align: center;
    border-radius: 50%
	!important}
.app-auth-wrapper {
    background: #f5f6fd;
    height: 100px
	!important}
.app-auth-wrapper .app-auth-body {
    width: auto !important
}
.thead-dark{
background-color: #fff;
color: #9b0e21;
border-color: #9b0e21;
}
.btn1{font-weight: 600;
    padding: 1rem 2rem;
    font-size: 0.5rem;
	border: #9b0e21;}

</style>
