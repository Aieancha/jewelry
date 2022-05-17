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
		    <div class="container-xl ">
			    <h1 class="app-page-title">แบบฟอร์มยื่นจำนำเครื่องประดับ</h1>
                <label>กรุณากรอกข้อมูลให้ถูกต้องครบถ้วน</label>
                <div class="row gy-4">
	                <div class="col-12 ">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                                <h4 class="app-page-title m-4">กรอกข้อมูลเครื่องประดับที่ต้องการยื่นจำนำ</h4>
        <div class="m-4 col-12">
          <div class="mb-2 col-12 center">
            <h5 style="display: inline;">รายละเอียดเครื่องประดับ</h5>
            <h5 class="form-label text-danger" style="display: inline;">*</h5>
            <input type="text" class="form-control " name="s_type" placeholder="สินทรัพย์ที่ใช้จำนำ" autocomplete="off" required>
          </div>
          <div class="mb-2 col-12 center">
            <h5 style="display: inline;">ราคาที่ต้องการจำนำ</h5>
            <h5 class="form-label text-danger" style="display: inline;">*</h5>
            <input type="text" class="form-control " name="s_type" placeholder="กรอกราคาที่ลูกค้าต้องการจำนำ" autocomplete="off" required>
          </div>
          <div class="mb-2 col-10 center">
            <h5 style="display: inline;">ภาพถ่ายสินค้าจริง</h5>
            <h5 class="form-label text-danger " style="display: inline;">*</h5>
            <input type="file" id="myFile" name="s_img" multiple required>
          </div>
        </div>
        <div>
        <div class="app-card-footer p-4 mt-auto">
							   <a class="btn app-btn-secondary" href="#">บันทึก</a>
</div>
						    </div><!--//app-card-footer-->
        </div>
        
                            </div><!--//app-card-header-->
                        </div><!--//app-card-->   
	                </div><!--//col-->
                </div><!--//row gy-->
            </div><!--//container-->
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
    border-radius: 50%;
	!important}
.app-auth-wrapper {
    background: #f5f6fd;
    height: 100px;
	!important}
.app-auth-wrapper .app-auth-body {
    width: auto; !important
}
</style>
