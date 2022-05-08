<?php
if (isset($_POST['submit'])) {
    $uploadDirectory = "upload/customer/";
    $valueExtensions = array('jpg','jpeg','png');

    $message = $errorType = $errorSize = $errorImage = "";
    $ref_img = rand();
    $sqlValues = "";

    foreach ($_FILES['c_img']['tmp_name'] as $imageKey => $imageValue) {
        $image = $_FILES['c_img']['name'][$imageKey];
        $imageSize = $_FILES['c_img']['size'][$imageKey];
        $imageTmp = $_FILES['c_img']['tmp_name'][$imageKey];
        $imageType = pathinfo($uploadDirectory.$image,PATHINFO_EXTENSION);

        //print_r($image); ตรวจสอบ

        if ($image != ''){
            $imageNewName = uniqid().".".$imageType;
        }
        else{
            $imageNewName = "";
            $errorImage .="<span>oooo</span>";
        }
        if ($imageSize > 1024000) {
            $errorSize .= "ooooo";
        }
        elseif (!empty($image) && !in_array($imageType,$valueExtensions)) {
            $errorType .="333";
        }
        elseif (empty($message)) {
            $sqlValues = "('".$imageNewName."','".$ref_img."'),";
            $store = move_uploaded_file($imageTmp, $uploadDirectory.$imageNewName);
        }
    }
    if(empty($_POST['s_name'])) {
        $message .= "222";
    }
    elseif (!empty($errorType) || !empty($errorSize) || !empty($errorImage)) {
        $message .= $errorType . $errorSize . $errorImage;
    }
    else {
        $sqlIns = "INSERT INTO tbl_social (s_name, ref_img) VALUES ('".$_POST['s_name']."','".$ref_img."');";
        $sqlIns .= "INSERT INTO tbl_customer (c_img, ref_img) VALUES $sqlValues";
        $sqlIns = rtrim($sqlIns,",");
        $result = mysqli_multi_query($connection, $sqlIns);

        if($result) {
            echo "เพิ่มข้อมูลสำเร็จ";
        }
        else{
            echo "Error: " . $sqlIns . "<br>" . mysqli_error($connection);
        }
    }
    mysqli_close($connection);
    //print_r($sqlIns);
}
?>

<body class="g-sidenav-show bg-gray-100">
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid">

            <hr class="mb-4">

            <form action="" method="POST" enctype="multipart/form-data">
                <legend>ภาพถ่ายสินค้าจริง</legend>

                <div class="form-group">
                    <label for="">ภาพถ่ายสินค้าจริง</label>
                    <input type="file" class="form-control" name="c_img[]" id="" multiple>
                </div>
                <div class="form-group">
                    <label for="">ภาพถ่ายสินค้าจริง</label>
                    <input type="text" class="form-control" name="s_name" id="" multiple>
                </div>



                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>

<?php
if(isset($message)) {
    echo $message;
}
elseif(isset($_GET['message'])){
    echo "555";
}
?>

        </div>


    </div>
    </div>
</body>

</html>