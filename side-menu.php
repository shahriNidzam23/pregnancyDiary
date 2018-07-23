
            <div class="navbar nav_title" style="border: 0;">
              <a onclick="routePatientPage('profile.php')" class="site_title"><i class="fa fa-female"></i> <span>Pregnancy Diary</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <?php
                  if($_SESSION['type'] == 'patient'){
                ?>
                  <span>Welcome,</span>
                <?php
                  }
                ?>
                <h2><?php echo $_SESSION["a" . $_GET['ic']] ?></h2>
                  <input id="pic" style="display: none" value="<?php echo $_GET['ic']?>">
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a onclick="routePatientPage('profile.php')"><i class="fa fa-user"></i> Profile</a></li>
                  <li><a><i class="fa fa-file-text-o"></i> Medical Records <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a onclick="routePatientPage('past-obstetric.php')">Past Obstetric History</a></li>
                      <li><a onclick="routePatientPage('antenatal-screening.php')">Antenatal Screening Test</a></li>
                      <li><a onclick="routePatientPage('mother-medical.php')">Mother's Medical History</a></li>
                      <li><a onclick="routePatientPage('current-pregnancy.php')">Current Pregnancy History</a></li>
                      <li><a onclick="routePatientPage('delivery-history.php')">Delivery History</a></li>
                    </ul>
                  </li>
                  <?php
                    if($_SESSION['type'] == 'patient'){
                  ?>
                    <li><a><i class="fa fa-lightbulb-o"></i> Pregnancy Tips <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a onclick="routePatientPage('first-tri.php')">First Trimester</a></li>
                        <li><a onclick="routePatientPage('second-tri.php')">Second Trimester</a></li>
                        <li><a onclick="routePatientPage('third-tri.php')">Third Trimester</a></li>
                      </ul>
                    </li>
                    <li><a onclick="routePatientPage('appoinment.php')"><i class="fa fa-calendar"></i> Appoinment</a></li>
                    <li><a onclick="logout('index.php')"><i class="fa fa-sign-out"></i> Logout</a></li>
                  <?php
                    }
                  ?>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->