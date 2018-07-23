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

  <body class="nav-md">
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
                  <div class="col-md-15">
                    <h1><center><b>Third Trimester</b></center></h1>
                  </div>
                </div>

                <div class="col-md-15 col-sm-12 col-xs-15">
                 <!-- /edit -->
                    <h3> <font color= "maroon"><center> <i> Healthy tips for third trimester </i></font> </h3></center>
                    <p></p>
                     <center><img src="images/third.jpg" alt="not found "  style="align-self:  center;"></center>
                    <br> <b><font color="black"><h5> Taking Care of Yourself <br/></font></b></h5>
                     <p><font color="black"> &#x25BA These three months are not only vital for your child, but also for you. And luckily, the more you take care of yourself, the more you take care of the baby. Right now, you might not be able to do as much as you used to. If your feet are swollen, put them up. If you need rest, avoid late night plans. Use the weekends to rest, read and take a long warm bath.</font></p>
                     <b><font color="black"><h5> Treat Your Body Like A Temple </font></b></h5>
                      <p><font color="black"> &#x25BA The third trimester is when you see the dramatic changes in your body. The harder it works to nourish and protect your baby, the more it needs to be pampered. So, go get a long massage, pedicures, manicures and the like. If you feel good, so will your baby.</p></font> 
                     <p><b><font color="black"><h5> Practise Your Posture </h5></font></b></p>
                     <p><font color="black"> &#x25BA Because of the extra weight you’re carrying during your third trimester, your back and hips can often ache and feel sore. To ease your pain, make sure your back is straight when you sit; use a chair with good support. At night, sleep with a pillow between your legs. Wear low-heeled shoes with good arch support.</p></font>
                     <p><b><font color ="black"><h5> Stay Hydrated </h5></font></b></p>
                     <p><font color="black"> &#x25BA It’s a good practice to stay hydrated daily, but it’s especially important during your pregnancy. Proper hydration helps your cells regenerate, helps in circulation and maintains a steady blood supply to the baby’s amniotic fluid. Mix it up with healthy fruit juices, coconut water or eating water-rich vegetables like cucumber.</font></p>
                     <p><b><font color= "black"><h5> Watch Out For Heartburn </h5></font></b></p>
                     <p><font color="black"> &#x25BA As your baby grows bigger and bigger it will start to push up your organs, which can lead to heartburn and acid reflux. To combat this, try eating several smaller meals during the day. Leaving your stomach a little emptier than a full meal will calm the acidity down.</p>
                    <p><b><font color= "black"><h5> Exercise Carefully </h5></font></b></p>
                    <p><font color="black"> &#x25BA Exercise is vital during the third trimester of pregnancy – it’s full of benefits like cardiovascular fitness, improved moods and weight control. Indulge in third trimester exercises like jogging (don’t start jogging during your third trimester, but keep it up if it is a long time habit), swimming is another great form of exercise (but make sure you stay hydrated as it can dehydrate you). The important point to remember is to not strain yourself, so go for low-key exercises like Yoga, Pilates or Barre. </font></p>
                    <br/>


                    <p></p>

                </div>

                <div class="clearfix"></div>
              </div>
            </div>

          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
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
  
  </body>
</html>
