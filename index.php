<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pregnancy Diary</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="patient"></a>
      <a class="hiddenanchor" id="doctor"></a>
      <a class="hiddenanchor" id="admin"></a>

      <!-- Patient -->
      <div class="login_wrapper">
        <div class="animate form patient_form">
          <section class="login_content">
            <form>
              <a href="#doctor" class="to_register" style="margin-right: 7%"> Doctor </a> |
              <a href="#admin" class="to_register" style="margin-left: 7%"> Admin </a>
              <div class="clearfix"></div>
              <div class="separator">
              <h1>Patient Login</h1>
              <div>
                <input type="text" class="form-control" placeholder="IC Number" id="pUser" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" id="pPw" />
              </div>
              <div>
                <a class="btn btn-default submit col-md-12" onclick="login('p')">Log in</a>
              </div>
              </div>
            </form>
          </section>
        </div>
      </div>

      <!-- Doctor -->
      <div class="login_wrapper">
        <div class="animate form doctor_form">
          <section class="login_content">
            <form>
              <a href="#patient" class="to_register" style="margin-right: 7%"> Patient </a> |
              <a href="#admin" class="to_register" style="margin-left: 7%"> Admin </a>
              <div class="clearfix"></div>
              <div class="separator">
              <h1>Doctor Login</h1>
              <div>
                <input type="text" class="form-control" placeholder="ID" required="" id="dUser"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" id="dPw"/>
              </div>
              <div>
                <a class="btn btn-default submit col-md-12" onclick="login('d')">Log in</a>
              </div>
              </div>
            </form>
          </section>
        </div>
      </div>

      <!-- Admin -->
      <div class="login_wrapper">
        <div class="animate form admin_form">
          <section class="login_content">
            <form>
              <a href="#patient" class="to_register" style="margin-right: 7%"> Patient </a> |
              <a href="#doctor" class="to_register" style="margin-left: 7%"> Doctor </a>
              <div class="clearfix"></div>
              <div class="separator">
              <h1>Admin Login</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" id="aUser"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" id="aPw"/>
              </div>
              <div>
                <a class="btn btn-default submit col-md-12" onclick="login('a')">Log in</a>
              </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>

            <p id="errText" style="color:red;text-align: center;"></p>

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
                      <button class="btn btn-success" style="float: right;">Save</button>
                </div>
              </div>
              
            </div>
          </div>
          <!-- end modal -->

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="js/function/function.js"></script>
    <script src="js/function/index.js"></script>
  </body>
</html>
