<?php
   include '../db/conect.php';
?>
<?php
  if(isset($_POST['dangnhap'])) {
    $taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];

    if($taikhoan== "" || $matkhau=="") {
      echo '<p>Bạn cần nhập đủ thông tin</p>';
    }
    else {
      $sql_select_admin = mysqli_query($con, "SELECT * FROM tbl_admin WHERE email = '$taikhoan' AND password = '$matkhau' LIMIT 1");
      $count = mysqli_num_rows($sql_select_admin);
      if($count > 0) {
        header('Location: dashboard.php');
      }
      else {
        echo '<p>Tài khoản hoặc mật khẩu sai</p>';
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập Admin</title>
  <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
  <h2 align="center">Đăng nhập Admin</h2>
  <div class="col-md-6">
    <div class="form-group">
      <form action="" method="POST">
        <label for="">Tài khoản</label>
        <input class="form-control" type="text" name="taikhoan" id="" placeholder="Nhập tài khoản...">
        <br>
        <label for="">Mật khẩu</label>
        <input class="form-control" type="password" name="matkhau" id="" placeholder="Nhập mật khẩu...">
        <br>
        <input type="submit" name="dangnhap" class="btn btn-primary" value="Đăng nhập">
      </form>
    </div>
  </div>
</body>
</html>