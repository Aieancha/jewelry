<!DOCTYPE html>
<html lang="en"> 
    <?php include('include/head.php') ?> 
    <?php include('include/nav.php') ?> 
    <?php include('include/sidebar.php') ?> 

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
				<a class="btn app-btn-secondary " href="interest_table.php">รายการที่ชำระเเล้ว</a>
</div>
                <div class="flex-fill d-flex justify-content-start gap-1"> 
				<a class="btn app-btn-secondary bg-NGG" href="#">รายการที่ค้างชำระ</a>
				<div>
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
								        <h4 class="app-card-title">ตารางแสดงรายละเอียดการชำระดอกเบี้ย</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
<div class="col-11 m-5 overflow-auto">
<table class="table">
	<thead class="thead-dark">
    <tr>
      <th scope="col">ลำดับ</th>
      <th scope="col">เลขที่สัญญา</th>
      <th scope="col">จำนวนเดอกเบี้ยที่ต้องชำระ</th>
      <th scope="col">สถานะ</th>
      <th scope="col">แนบหลักฐานการชำระดอกเบี้ย</th>

	  
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
	<td><a class="btn1 app-btn-secondary" href="update_bill.php">ชำระ</a></td>
	  
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
						</div>

						    
						    </div><!--//app-card-body-->
						    
						   
						</div><!--//app-card-->
	                </div><!--//col-->
 
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
