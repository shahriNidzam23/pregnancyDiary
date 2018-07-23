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
                    <h3>Delivery History</h3>
                  </div>
                </div>

                <div class="col-md-12">
                  <form class="form-horizontal">
                      <div class="form-group">
                        <label class="col-md-3">Date of Delivery Time</label>
                        <div class="col-md-3">
                          <input type="text" class="form-control" id="dateDelivery" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>>
                        </div>
                        <label class="col-md-3" style="text-indent: 50px">Sex</label>
                        <div class="col-md-3">
                          <input type="text" class="form-control" id="sex" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Place of Birth</label>
                        <div class="col-md-3">
                          <input type="text" class="form-control" id="pob" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>>
                        </div>
                        <label class="col-md-3" style="text-indent: 50px">Weight (kg)</label>
                        <div class="col-md-3">
                          <input type="text" class="form-control" id="weight" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Conducted By</label>
                        <div class="col-md-3">
                          <input type="text" class="form-control" id="conductBy" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>>
                        </div>
                        <label class="col-md-3" style="text-indent: 50px">Placenta</label>
                        <div class="col-md-3">
                          <p>
                            Complete <input type="radio" class="flat" name="placenta" id="placentaC" value="complete"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?> />
                            Incomplete <input type="radio" class="flat" name="placenta" id="placentaI" value="incomplete"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/>
                          </p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Spontaneous</label>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="spontaneous" id="setalicS"  value="setalic"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?> />  Setalic
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="spontaneous" id="breechS"  value="breech"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/> Breech
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="spontaneous" id="assistedS"  value="assisted"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/> Assisted Breech
                          </p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Assisted Delivery</label>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="delivery" id="forcepsD"  value="forceps"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?> />  Forceps
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="delivery" id="ventouseD"  value="ventouse"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/> Ventouse
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="delivery" id="indicationD"  value="indication"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/> Indication
                          </p>
                        </div>
                        <label class="col-md-3"></label>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="delivery" id="normalD"  value="normal" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/>  Normal
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="delivery" id="emergencyD"  value="emergency"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/> Emergency
                          </p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Caesarean</label>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="caesarean" id="electivC"  value="electiv"   <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?> />  Electiv
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="caesarean" id="classiC"  value="classi"   <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/> Classi
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p>
                            <input type="checkbox" class="flat" name="caesarean" id="lscsC"  value="lscs"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/> LSCS
                          </p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Complications</label>
                        <div class="col-md-3">
                          <p>
                            <input type="radio" class="flat" name="complications" id="pphC"  value="pph" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?> />  PPH
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p>
                            <input type="radio" class="flat" name="complications" id="perinealC"  value="perineal"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/> Perineal Tear
                          </p>
                        </div>
                        <div class="col-md-3">
                          <form class="form-horizontal">
                        <div class="col-md-3">
                             <p>
                            <input type="radio" class="flat" name="complications" id="otherC"  value="other"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/> Other 
                          </p>
                          </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="otherComplication" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>>
                          </div>
                          </form>
                        </div>
                      </div>
                    </form>
                </div>

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Baby Record</h3>
                  </div>
                </div>

                <div class="col-md-12">
                  <form class="form-horizontal">
                      <div class="form-group">
                        <label class="col-md-3">Baby Condition</label>
                        <div class="col-md-3">
                          <p>
                            Birth Alive: <input type="radio" class="flat" name="birth" id="aliveB"  value="alive" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/>
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p>
                            Birth Died: <input type="radio" class="flat" name="birth" id="deadB" value="dead"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/>
                          </p>
                        </div>
                        
                        <div class="col-md-3">
                          <form class="form-horizontal">
                        <div class="col-md-3">
                        <label>'Apgar' Score</label>
                          </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="apgar" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>>
                          </div>
                          </form>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3">Abnormally Congenital</label>
                        <div class="col-md-3">
                          <p>
                            <input type="radio" class="flat" name="congenital" id="yesCon"  value="yes"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/> Yes 
                          </p>
                        </div>
                        <div class="col-md-3">
                          <p>
                            <input type="radio" class="flat" name="congenital" id="noCon" value="no"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/> No
                          </p>
                        </div> 
                        <div class="col-md-3">
                            <div class="col-md-3">
                                <p>
                                <input type="radio" class="flat" name="congenital" id="otherCon"  value="other"  <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>/> Other
                              </p>
                            </div>
                            <div class="col-md-9">
                              <input type="text" class="form-control" id="otherCongenital" <?php if($_SESSION['type'] == 'patient'){ ?> disabled <?php } ?>>
                            </div>
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
        <?php include  "modal.php"; ?>
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
    <script src="js/function/delivery-history.js"></script>
  
  </body>
</html>
