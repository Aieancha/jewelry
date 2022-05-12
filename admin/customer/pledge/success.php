<!DOCTYPE html>
<html lang="en">
<style>
    a4 {
        height: 842px;
        width: 595px;
        /* to centre page on screen*/
        margin-left: auto;
        margin-right: auto;
    }
</style>

<body class="g-sidenav-show bg-gray-100">
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid">
            <!-- title -->
            <div class="row justify-content-between">
                <div class="col-auto">
                    <h3 class="font-weight-bolder text-dark text-gradient ">ขั้นตอนการบันทึกข้อมูลการจำนำเครื่องประดับ</h3>
                </div>

            </div>
            <!-- end title -->
            <hr class="mb-4">
            <?php




            //print_r($_POST);
            ?>
            <div class="card-body" id="a4">

                <h5 class="pb-5">ข้อมูลผู้สนใจจำนำเครื่องประดับ</h5>
                <div class="card-text">
                    <p></p>

                </div>
            </div>

            <div class="d-flex flex-row">
                <div class="justify-content-start flex-fill ">
                    <a href="?page=<?= $_GET['page'] ?>" class="btn bg-gradient-dark">ย้อนกลับ</a>
                </div>
                <div class="flex-fill d-flex justify-content-end gap-1">
                    <a href="pdf_contract.php" class="btn btn-color1 bg-gradient-primary theme-btn  pull-right">พิมพ์เอกสาร</a>

                </div>
                </form>
            </div>
        </div>

    </div>
    </div>
</body>

</html>
<style>
    .wrapper-progressBar {
        width: 100%
    }

    .progressBar {
        font-size: 1em;
    }

    .progressBar li {
        list-style-type: none;
        float: left;
        width: 30%;
        position: relative;
        text-align: center;


    }

    .progressBar li:before {
        content: " ";
        line-height: 30px;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        border: 1px solid;
        display: block;
        text-align: center;
        margin: 0 auto 10px;
        background-color: white
    }

    .progressBar li:after {
        content: "";
        position: absolute;
        width: 100%;
        height: 4px;
        background-color: #ddd;
        top: 15px;
        left: -50%;
        z-index: -1;
    }

    .progressBar li:first-child:after {
        content: none;
    }

    .progressBar li.active {
        color: rgb(111, 0, 96);
    }

    .progressBar li.active:before {
        border-color: rgb(111, 0, 96);
        background-color: rgb(111, 0, 96);

    }

    .progressBar .active:after {
        background-color: dodgerblue;
    }
</style>