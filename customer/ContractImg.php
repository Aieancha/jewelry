<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_orders INNER JOIN tbl_social ON tbl_social.s_id=tbl_orders.s_id
	INNER JOIN tbl_bill ON tbl_bill.s_id=tbl_orders.s_id WHERE o_id = '$id'";
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
    $wait = $result['r_mount'] - $Num_Rows; //งวดที่รอชำระ
}
?>

<body class="app">

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <label class="mb-3">ข้อมูลการจำนำเครื่องประดับของ คุณ <?= $_SESSION['username'] ?></label>
                <div class="row gy-4">
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start mb-2">
                            <div class="app-card-header p-3 border-bottom">
                                <div class="row align-items-center gx-3">
                                    <div class="col-auto">
                                        
                                    <div class="col-auto">
                                        <h4 class="app-card-title">สัญญาการจำนำ</h4>
                                    </div>
                                    </div>
                                    <!--//col-->
                                    
                                    <div class="app-card-footer p-4 mt-auto">

                                        <img src="../images/bill/<?= $result['bill_img'] ?>" alt="contract" style="width:200px; height:auto;">
                                    </div>
                                    <!--//col-->
                                </div>
                                <!--//row-->
                            </div>




                        </div>
                        <!--//app-card-->
                    </div>
                </div>
            </div>

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