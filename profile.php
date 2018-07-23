<?php
  session_start(); 
  if($_SESSION['type'] == 'patient'){
    if($_SESSION['pic'] != $_GET['ic']){
      $url = basename($_SERVER['PHP_SELF']);
      echo $url;
      header("Location: " . $url ."?ic=" . $_SESSION['pic']);
    }
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

    <title><?php if($_SESSION['type'] == 'patient'){ echo "Pregnancy Diary"; } else { echo $_SESSION["a" . $_GET['ic']]; }; ?></title>

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

  <body class="nav-md" onload="init()">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <?php include "side-menu.php" ?>
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle" style="padding-bottom: 10px ">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Profile</h3>
                  </div>
                </div>

                <div class="col-md-12">
                  <form class="form-horizontal">
                      <div class="form-group">
                        <label class="col-md-3">Registration Number</label>
                        <div class="col-md-3">
                          <input type="text" class="form-control" id="regNum" <?php if($_SESSION['type'] != 'patient'){ ?> disabled <?php } ?>>
                        </div>
                        <label class="col-md-3" style="text-indent: 50px">First Date Of Pregnant</label>
                        <div class="col-md-3">
                          <input type="text" class="form-control" id="datePregnant" <?php if($_SESSION['type'] != 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">IC Number</label>
                        <div class="col-md-3">
                          <input type="text" class="form-control" id="ic" <?php if($_SESSION['type'] != 'patient'){ ?> disabled <?php } ?>>
                        </div>
                        <label class="col-md-3" style="text-indent: 50px">Due Date</label>
                        <div class="col-md-3">
                          <input type="text" class="form-control" id="dueDate" <?php if($_SESSION['type'] != 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Email</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" id="email" <?php if($_SESSION['type'] != 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Clinic Address</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" id="cAddress" <?php if($_SESSION['type'] != 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Mother's Name</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" id="mName" <?php if($_SESSION['type'] != 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Race</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" id="race" <?php if($_SESSION['type'] != 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Education Level</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" id="eduLevel" <?php if($_SESSION['type'] != 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Occupation</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" id="occupation" <?php if($_SESSION['type'] != 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Address</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" id="address" <?php if($_SESSION['type'] != 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Date Of Birth</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" id="dob" <?php if($_SESSION['type'] != 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Age</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" id="age" <?php if($_SESSION['type'] != 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Phone Number (Home)</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" id="phoneHome" <?php if($_SESSION['type'] != 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Phone Number (H/P)</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" id="phoneMobile" <?php if($_SESSION['type'] != 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Husband's Name</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" id="hName" <?php if($_SESSION['type'] != 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Husband's IC Number</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" id="hic" <?php if($_SESSION['type'] != 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Husband's Workplace</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" id="hWorkplace" <?php if($_SESSION['type'] != 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Husband's Phone Number</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" id="hPhone" <?php if($_SESSION['type'] != 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                    <?php
                      if($_SESSION['type'] == 'patient') {
                    ?>
                      <div class="form-group">
                        <label class="col-md-3">Old Password</label>
                        <div class="col-md-9">
                          <input type="password" class="form-control" id="oldPassword">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">New Password</label>
                        <div class="col-md-9">
                          <input type="password" class="form-control" id="password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Re-Type New Password</label>
                        <div class="col-md-9">
                          <input type="password" class="form-control" id="retypePassword">
                        </div>
                      </div>
                    </form>
                    <button class="btn btn-success" type="reset" style="float: right;" onclick="update()">Update</button>

                  <?php
                    }
                  ?>
                </div>

                <div class="clearfix"></div>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->

        <!-- Modal -->
        <div class="modal fade" id="modal-id" role="dialog">
          <div class="modal-dialog">
         <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title" id="modal-title"></h4>
                </div>
                <div class="modal-body">
                  <p id="modal-body"></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
              
            </div>
          </div>
          <!-- end modal -->
        <!-- footer content -->
        <footer>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
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
	
    <script src="js/function/function.js"></script>
    <script src="js/function/profile.js"></script>
  </body>
</html>
