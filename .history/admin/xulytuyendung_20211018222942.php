<?php
  include '../db/conect.php';
  include '../admin/2404/incLogin.php'
?>
<?php 
  if(isset($_GET['xoa'])) {
    $id = $_GET['xoa'];

    $sql_delete_cv = mysqli_query($con, "DELETE FROM tbl_cv WHERE cv_id = '$id'");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Tuyển Dụng</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
             <?php
              include("2404/menu.php");
              include("2404/top.php");
              ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
          <div class="container">
    <div class="row">
      <?php 
        if(isset($_GET['quanly'])=='recruiment') {
          ?>
          <select name="gender" id="" class="form-control">
              <option value="1">Nam</option>
              <option value="0">Nữ</option>
            </select>
            <br>
          <?php
        }
      ?>
      <div class="col-md-12 mt-4">
      <h4>Danh sách CV </h4>
      <?php
        $sql_select_cv = mysqli_query($con, "SELECT * FROM tbl_cv ");
      ?>
        <table class="table table-bordered">
          <tr style="text-align:center">
            <th>STT</th>
            <th>Tên </th>
            <th>Email </th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>giới tính</th>
            <th>File CV</th>
            <!-- <th>Phản hồi</th> -->
            <th>Quản lý</th>
          </tr>
          <?php
          $i= 0;
            while($row_cv = mysqli_fetch_array($sql_select_cv)){
              $i++;
          ?>
            <tr style="text-align:center">
              <td><?php echo $i ?></td>
              <td><?php echo $row_cv['cv_ten'] ?></td>
               </td>
              <td><?php echo $row_cv['cv_email'] ?></td>
              <td><?php echo $row_cv['cv_sodienthoai'] ?></td>
              <td><?php echo $row_cv['cv_diachi'] ?></td>
              <!--  -->
              
              <td>
               <?php
                  if($row_cv['cv_gioitinh']==1) {
                      echo 'Nam';
                  }
                  else {
                    echo 'NỮ';
                  }
               ?>
              </td>
              <td>
                <a href="dowload.php?file=<?php $rows['filename'] ?>"><?php echo $row_cv['cv_file'] ?>
               </td>

              <td style="text-align: center;">
              <?php
                $_download = mysqli_query($con,"SELECT * FROM `btl_download_cv_file` ");
               while($rows = mysqli_fetch_array($_download)){ ?>
                
              <?php
             }
             ?>
              <a href="dowload.php?file=<?php $rows['filename'] ?>" style="font-size: 14px;display:block" class="btn btn-primary">Dowload </a>;
              <a href="?xoa=<?php echo $row_cv['cv_id'] ?>" style="font-size: 14px;display:block;" class="btn btn-danger mb-2">Xóa</a> 
              <!-- <a href="?quanly=tuyendung&email=<?php echo $row_cv['email'] ?>" style="font-size: 14px;display:block" class="btn btn-primary">Phản hồi</a> -->
            </td>
          </tr>
            <?php
            }
            ?>
        </table>
      </div>
    </div>
  </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            @coppyright Bản quyền thuộc by <a href="https://colorlib.com">Huy Hoàng</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
</html>
