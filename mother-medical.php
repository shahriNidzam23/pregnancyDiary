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

    <link href="css/style.css" rel="stylesheet">
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
                    <h3>Mother's Medical History</h3>
                  </div>
                </div>

                <div class="col-md-12">
                  <form class="form-horizontal">
                      <div class="form-group">
                        <label class="col-md-3">Period (Days) Cycle</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" id="periodCycle" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Blood Type</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" id="bloodType" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">RH</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" id="rh" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Height</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" id="height" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Family Planning Pills</label>
                        <div class="col-md-3">
                          <p>
                            Yes: <input type="radio" class="flat" name="familyPlanning" id="familyPlanningY" value="yes"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/>
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p>
                            No: <input type="radio" class="flat" name="familyPlanning" id="familyPlanningN" value="no" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/>
                          </p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Type</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control" id="type" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-3">
                        <label>(If Yes) Duration</label>
                          <span style="margin-left: 10px;">
                            month:
                            <input type="radio" class="flat" name="duration" id="durationM" value="month"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/> year:
                            <input type="radio" class="flat" name="duration" id="durationY" value="year"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/>
                          </span>
                        </div>
                        <div class="col-md-9">
                          <input type="text" class="form-control" id="durationDesc" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Disease</label>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="disease" id="Mdiabetes"  value="diabetes" required  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/>  Diabetes
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="disease" id="Masthma"  value="asthma"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/> Asthma
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="disease" id="Mblood"  value="blood"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/> High Blood Pressure
                          </p>
                        </div>
                        <label class="col-md-3"></label>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="disease" id="Mheart" value="heart" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/>  Heart Disease
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="disease" id="Mallergy" value="allergy" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?> /> Allergy
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="disease" id="Mtibi" value="tibi" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?> />TIBI
                          </p>
                        </div>
                        <label class="col-md-9"></label>
                        <div class="col-md-3">
                          <form class="form-horizontal">
                        <div class="col-md-3">
                            <label>Other (specify)</label>
                          </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="disease" id="diseaseOther" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>>
                          </div>
                          </form>
                        </div>
                      </div>
                    </form>
                </div>

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Family Past Medical History</h3>
                  </div>
                </div>

                <div class="col-md-12">
                  <form class="form-horizontal">
                      <div class="form-group">
                        <label class="col-md-3">Disease</label>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="diseaseF" id="Fdiabetes" value="diabetes" required  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/>  Diabetes
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="diseaseF" id="Fasthma" value="asthma"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/> Asthma
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="diseaseF" id="Fblood"  value="blood"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/> High Blood Pressure
                          </p>
                        </div>
                        <label class="col-md-3"></label>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="diseaseF" id="Fheart"  value="heart"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/>  Heart Disease
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="diseaseF"  id="Fallergy" value="allergy"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/> Allergy
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="diseaseF"  id="Ftibi" value="tibi" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?> />TIBI
                          </p>
                        </div>
                        <label class="col-md-9"></label>
                        <div class="col-md-3">
                          <form class="form-horizontal">
                        <div class="col-md-3">
                            <label>Other (specify)</label>
                          </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="diseaseFOther" name="diseaseF" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>>
                          </div>
                          </form>
                        </div>
                      </div>
                  </form>
                      <div class="ln_solid"></div>
                      <?php
                        if($_SESSION['type'] == 'doctor'){
                          ?>
                            <button class="btn btn-success" type="reset" style="float: right;" id="saveButton">Save</button>
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
        <!-- footer content -->
          <?php include  "modal.php"; ?>
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
    <script src="js/function/mother-medical.js"></script>
  
  </body>
</html>
