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
                    <h1><center><b>Second Trimester</b></center></h1>
                  </div>
                </div>

                <div class="col-md-15 col-sm-12 col-xs-15">
                 <!-- /edit -->
                    <h3> <font color= "maroon"><center> <i> Healthy tips for second trimester </i></font> </h3></center>
                    <p></p>
                    <br><b><font color= "black"> &#x25BA Eat well </b>: Eating lots of colourful fruits and vegetables will makeusre you get antioxidants, fiber, and other essential components of a healthy pregnancy diet. Make sure you are getting plenty of protein as well. Protein regulates your blood sugars and keeps you from bottoming out and having huge energy highs and lows. <br/> </font>
                    <center><img src="images/eat well.jpg" alt="not found "  style="align-self:  center;"></center>
                    <br> <p><b> <font color= "black"> &#x25BA Up your activity </b>: Take advantage of your renewed energy and get in a little more activity. Exercise during pregnancy helps ease symptoms of constipation, prevent stretch marks, strengthens your core and often leads to easier labors and faster postpartum recoveries. </p></br></font> 
                    <center><img src="images/exercise.jpg" alt="not found "  style="align-self:  center;"></center>
                     <br><p><b><font color= "black"> &#x25BA Add Tea and Magnesium To Your Daily Regimen: </b> You should already be taking a prenatal vitamin with iron and getting a healthy dose of calcium. Red Raspberry leaf tea and other prenatal teas help support your uterine functions during pregnancy and helps tone the uterine muscles to prepare them for labor. It can also help to improve blood circulation and can relieve nausea. Magnesium is a vital nutrient that is particularly helpful in helping you get a good night’s rest, sometimes hard to come by in pregnancy, and relieving leg cramps commonly experienced during the second and third trimesters.</p></font></br>
                     <center><img src="images/vitamin.jpg" alt="not found "  style="align-self:  center;"></center>
                    <br><p><b><font color= "black"> &#x25BA Soothe Heartburn: </b> The majority of pregnant women will experience heartburn during their pregnancy, especially in the second and third trimesters. You can combat this by eating slowly, eating small meals frequently, and trying to avoid foods that seem to give you heartburn. For some reason, with my second pregnancy, anything with tomato sauce did it for me. You can also safely use over the counter remedies, like antacid tablets. </br></p> </font>
                    <center><img src="images/heartburn.jpg" alt="not found "  style="align-self:  center;"></center>
                     <br><p><b><font color="black"> &#x25BA Prevent and Smooth Strecth Marks: </b> You can prevent stretch marks by staying hydrated, moisturizing, gaining weight gradually, staying active and eating a diet rich in foods containing vitamins A and E, lots of Omega 3s and antioxidants. These nutrients nourish and protect skin and will enhance your pregnancy glow. There are lots of creams on the market to help keep pregnant skin moisturized and supple, but plain coconut oil and shea butter work just as well.</font> </p></br>
                     <center><img src="images/stretch.jpg" alt="not found "  style="align-self:  center;"></center>
                     <br><p><b><font color= "black"> &#x25BA Ease Congestion: </b> Increased blood flow and hormonal changes can cause swelling in your nasal passages which can lead to congestion, snoring, and even an increase in nose-bleeds. You can treat this naturally with saline drops and using a home humidifier. This will be especially helpful at night when congestion can make it hard for you to get some rest and snoring may disturb your partner. </font></p></br> 
                     <center><img src="images/ease.jpg" alt="not found "  style="align-self:  center;"></center>
                     <br><b><font color= "black"> &#x25BA Reduce Inflammation: </b> The majority of pregnant women experience inflammation, or swelling, particularly in their legs and ankles. While it is a normal pregnancy condition, it can be an indicator of a problem. If you find that you have a great deal of swelling, the following things can be helpful: putting your feet up, lying on your side for thirty minute periods, staying hydrated, salting your food to taste (with sea salt), getting enough exercise, and sticking to loose, comfortable clothing. There are several yoga poses that can help, particularly with swelling in the legs and ankles. If swelling persists, it is important to speak to your doctor about it.</font></br>
                     <center><img src="images/sleep.jpg" alt="not found "  style="align-self:  center;"></center>
                     <br><b><font color= "black"> &#x25BA Support Your Back: </b> While your belly is blossoming, your back may be aching! This is probably due to weight gain, a shift in your center of gravity, and relaxed ligaments in joints. Some women find this may be helped by wearing a belly bands or, if more support is need, a maternity belt. A belly band can also be helpful in making sure your shirts don’t ride up over your expanding tummy and a maternity belt can be used for support in the postpartum period as well.</font></br> 
                     <center><img src="images/belt.jpg" alt="not found "  style="align-self:  center;"></center>
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
