    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">

          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a class="nav-link <?php echo isset($_GET['page']) && ($_GET['page']) ?: '' ?> " href="?page=myprofile">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none"><?= $_SESSION["user"] ?></span>
              </a>
            </li>

            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a class="nav-link text-body p-0" id="dropdownMenuButton" href="?page=logout">
                <div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center" style="width:16px; height:16px">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                    <path d="M7.5 1v7h1V1h-1z" />
                    <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                  </svg>
                </div>
              </a>

            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->