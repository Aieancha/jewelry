<div class="container-fluid py-4">
    <div class="row">
        <div class="card">
        	<div class="card-body p-3">
            <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h1 class="font-weight-bolder text-dark text-gradient ">Jewelry Pawn</h1>
                  <p class="mb-0">กรุณากรอกข้อมูลที่อยู่อีเมลและรหัสผ่านเพื่อเข้าสู่ระบบ</p>
                </div>
                <div class="card-body">
                  <form action="member/sign-in/clogin.php" method="post">
                    <h5>อีเมล*</h5>
                    <div class="mb-3">
                      <input type="email" class="form-control" name="m_email" placeholder="exam@gmail.com" require autocomplete="off">
                    </div>
                    <h5>รหัสผ่าน*</h5>
                    <div class="mb-3">
                      <input type="password" class="form-control" name="m_password" placeholder="กรอกรหัสผ่าน" require>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input " type="checkbox" id="rememberMe" checked="">
                      <h5 class="form-check-label" for="rememberMe">จดจำชื่อบัญชี</h5>
                    </div>
                    <div class="nav-link active text-center" href="../pages/tables.html" >
                      <button type="submit" name="btn-login" class=" btn bg-gradient-dark w-100 mt-4 mb-0" >เข้าสู่ระบบ</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    ต้องการสร้างบัญชีใหม่ ?
                    <h6 class="nav-link  active text-danger" href="../pages/sign-up.html" >สร้างบัญชีใหม่</h6>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('assets/image/jewelry.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
        
        	</div>
        </div>
    </div>

</div> 