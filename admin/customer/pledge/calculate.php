

<!DOCTYPE html>
<html lang="en">

<body class="g-sidenav-show bg-gray-100">
  <div class="body main-content position-relative bg-white max-height-vh-100 h-100">
    <div class="container-fluid">
      <div class="card-header pb-0 text-left bg-transparent">
        <h3 class="font-weight-bolder text-dark text-dark text-center m-3">คำนวณดอกเบี้ย</h3>
      </div>
      <div class="card-header pb-0 text-left bg-transparent mb-6">
        <h8 class="font-weight-bolder text-dark text-dark text-left m-6 ">กรุณากรอกข้อมูลลูกค้าให้ถูกต้อง เพื่อคำนวณดอกเบี้ยการจำนำเครื่องประดับ</h8>
      </div>

      <div class="card-body">
        <?php
        if (isset($_POST) && !empty($_POST)) {
          $name = $_POST['m_name'];
          $email = $_POST['m_email'];
          $firstname = $_POST['m_firstname'];
          $lastname = $_POST['m_lastname'];
          $status = $_POST['status'];
          $pass = $_POST['m_pass'];
          //echo sha1(md5($m_pass));
          if (!empty($name)) {
            $sql_check = "SELECT * FROM tbl_member WHERE m_name = '$name'";
            $query_check = mysqli_query($connection, $sql_check);
            $row_check = mysqli_num_rows($query_check);
            if ($row_check > 0) {
              //echo 'ชื่อผู้ใช้ซ้ำ กรุณากรอกใหม่อีกครั้ง';
              $alert = '<script type="text/javascript">';
              $alert .= 'alert("ชื่อผู้ใช้ซ้ำ กรุณากรอกใหม่อีกครั้ง");';
              $alert .= 'window.location.href = "?page=' . $_GET['page'] . '&function=insert";';
              $alert .= '</script>';
              echo $alert;
              exit();
            } else {
              $sql = "INSERT INTO tbl_member (m_name, m_email, m_pass, m_firstname, m_lastname, status)
                      VALUES ('$name', '$email', '$pass', '$firstname', '$lastname', '$status')";

              if (mysqli_query($connection, $sql)) {
                //echo "เพิ่มข้อมูลสำเร็จ";
                $alert = '<script type= "text/javascript">';
                $alert .= 'alert("เพิ่มข้อมูลสำเร็จ");';
                $alert .= 'window.location.href = "?page=profile";';
                $alert .= '</script>';
                echo $alert;
                exit();
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
              }

              mysqli_close($connection);
            }
          }
        }
        //print_r($_POST);
        ?>
        <div class ="box">
        <script type="text/javascript" ></script>
        <form  action="" method="post" class="regis">
            <div class="mb-6">
                <h5 class="" style="display: inline;">ราคาที่ตกลงจำนำ</h5>
                <h5 style="display: inline;">100000 บาท</h5>
            </div>
          
        <div class="mb-6">
            <h5 class="" style="display: inline;">จำนวนงวดที่จำนำ</h5><h5 class="form-label text-danger" style="display: inline;">*</h5> 
            <input type="number" class="form-control " name="" pattern="^[0-9\s]+$" minlength="2" placeholder="สูงสุด 24 งวด" autocomplete="off" require>
        </div>
    
          <h5 class="" style="display: inline;">รูปแบบการชำระดอกเบี้ย</h5><h5 class="form-label text-danger" style="display: inline;">*</h5> 
          <div class="mb-6 col-12 ">
            <select name="status" class="form-control w-60" require>
              <option value="" selected="selected">เลือกรูปแบบการชำระ</option>
              <option value="admin">รูปแบบที่ 1</option>
              <option value="staff">รูปแบบที่ 2</option>
              <option value="staff">รูปแบบที่ 3</option>
            </select>
          </div>
          <div class="d-flex flex-row">
                        <div class="justify-content-start flex-fill ">
                            <a href="?page=<?= $_GET['page'] ?>&function=customr" class="btn bg-gradient-dark">ย้อนกลับ</a>
                        </div>
                        <div class="flex-fill d-flex justify-content-end gap-1">
                            <a href="" class="btn btn-color1 bg-gradient-primary theme-btn  pull-right">บันทึก</a>
                        </div>
                    </div>  
         
        </form>
         
      </div>
      </div>
    </div>
  </div>
</body>

</html>

<style>
  .regis {
    width: 70%;
    display: block;
    margin: auto;
  }

  .body {
    width: 50%;
    display: block;
    margin: auto;
    border-radius: 20px;
  }

  .box {
    width: 100%;
    display: block;
    margin: auto;
    border-radius: 20px;
    background-color: rgb(255, 255, 255);
  }
</style>