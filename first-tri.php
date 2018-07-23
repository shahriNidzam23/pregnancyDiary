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

    <title><?php if($_SESSION['type'] == 'patient'){ echo "Pregnancy Diary"; } else { echo $_SESSION["a" . "a" . $_GET['ic']]; }; ?></title>

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
                    <h1><center><b>First Trimester</b></center></h1>
                  </div>
                </div>

                <div class="col-md-15 col-sm-12 col-xs-15">
                 <!-- /edit -->
                    <h3> <font color= "maroon"><center> <i> Healthy tips for first trimester </i></font> </h3></center>
                    <p></p>
                    <br> <font color="black"> &#x25BA Eat small meals throughout the day so you're never too full or too hungry.</font> <br/>
                     <p><font color= "black">&#x25BA Avoid rich, spicy, greasy or fatty foods, and foods whose smells bother you.</font></p> 
                     <p><font color="black">&#x25BA Eat more carbohydrates (plain baked potato, white rice or dry toast).</font></p>
                     <p><font color="black">&#x25BA Eat bland foods when you feel nauseous (saltine crackers, gelatin desserts, popsicles, chicken broth, ginger and pretzels). Keep some crackers by your bed and eat one before you get up.</font></p>
                     <p><font color= "black"> &#x25BA Take additional vitamin B6 (25 mg three times a day), which some studies find can help with nausea.</font></p>
                    <br/>

                    <h2> <b> <center> <font color= "purple"><u> Pregnancy Diet </center></b></u></font></h2>
                    <center><img src="images/buah.jpg" alt="not found "  style="align-self:  center;"></center>
                    <br><h5><center><font color= "black"> <b> Fruits: </center></b></font></h5> <p> <font color="black"> 3-4 servings a day. Choose fresh, frozen, canned (in natural juice, not heavy syrup), and dried fruit or 100-percent fruit juice. Include at least one citrus fruit (orange, grapefruit, tangerine) each day because citrus fruits are rich in vitamin C. Limit fruit juice consumption to no more than 1 cup a day; juice is high in calories compared with whole fruit, and it does not deliver the fiber that whole fruit does. One serving equals one medium piece of fruit such as an apple or orange, or 1/2 of a banana; 1/2 cup of chopped fresh, cooked, or canned fruit; 1/4 cup dried fruit; or 3/4 cup of 100-percent fruit juice. </font> </p>

                    <p>
                    	<h5><center><font color= "black"><b> Vegetables: </b></font></center></h5> 
                    	<font color= "black"> 3-5 servings a day. To get the greatest range of nutrients, think of a rainbow as you fill your plate with vegetables. Choose vegetables that are dark green (broccoli, kale, spinach), orange (carrots, sweet potatoes, pumpkin, winter squash), yellow (corn, yellow peppers), and red (tomatoes, red peppers). One serving equals 1 cup of raw leafy vegetables such as spinach or lettuce, or 1/2 cup chopped vegetables, cooked or raw.</font>
                    </p>
                    <p>
                        <h5><center><font color= "black"><b> Dairy Foods: </font></b></center></h5>
                        	<font color= "black">  3 servings a day. Dairy foods provide the calcium that your baby needs to grow and that you need to keep your bones strong. To get sufficient calcium, drink milk and eat yogurt and cheese. To save on calories and saturated fat, choose low-fat or non-fat dairy products. If you are lactose intolerant and can't digest milk, choose lactose-free milk products, calcium-fortified foods, and beverages such as calcium-fortified soymilk. One serving equals 1 cup of milk or yogurt, 11/2 ounces of natural cheese such as cheddar or mozzarella, or 2 ounces of processed cheese such as American.</font>
                     </p>
                     <h5><center><font color="black"><b> Protein: </font></b></center></h5>
                     <font color="black"> 2-3 servings a day. Select lean meats, poultry, fish, and eggs prepared with minimal amounts of fat. Beans (pinto, kidney, black, garbanzo) are also a good source of protein, as are lentils, split peas, nuts, and seeds. One serving equals2-3 ounces of cooked meat, poultry, or fish, which is about the size of a deck of cards; 1 cup of cooked beans; 2 eggs; 2 tablespoons of peanut butter; or 1 ounce (about 1/4 cup) of nuts. </font>

                     <h5><center><font color="black"><b> Whole Grains: </b></center></h5></font>
                     <font color= "black"> 3 servings a day. It is recommended that you eat a minimum of six servings of grains per day; at least 50 percent of those grains should be whole grains. Whole grain breads, cereals, crackers, and pasta provide fiber, which is very important during pregnancy. Eating a variety of fiber-containing foods helps maintain proper bowel function and can reduce your chances of developing constipation and hemorrhoids. As often as possible, select whole grain foods over those made with white flour. For example, eat whole wheat bread rather than white bread. One serving equals 1 slice of bread, 1 ounce of ready-to-eat cereal (about 1 cup of most cereals), or 1/2 cup cooked cereal, rice, or pasta. </font>

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
