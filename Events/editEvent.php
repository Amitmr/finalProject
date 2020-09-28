<!DOCTYPE html>
<html lang="he" dir="rtl">

<head>
  <title>עריכת אירוע</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <!-- Material Kit CSS -->
  <link href="css/main.css" rel="stylesheet" />
  <!--   Core JS Files   -->
  <script src="js/jquery.min.js" type="text/javascript"></script>
  <script src="js/popper.min.js" type="text/javascript"></script>
  <script src="js/bootstrap-material-design.min.js" type="text/javascript"></script>
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <div class="logo">
        <a href="#" class= "logo-tim logo-normal">
          <img  src="img/logo.jpg" >
        </a>
        <a class="simple-text"><p>ידיעות אחרונות</p></a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item  ">
            <a class="nav-link" href="../Main/main.php">
              <i class="material-icons">dashboard</i>
              <p>דף הבית</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../Users Management/main.php">
              <i class="material-icons">person</i>
              <p>ניהול משתמשים</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../Article/articles page.php">
              <i class="material-icons">content_paste</i>
              <p>כתבות</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="events_page.php">
              <i class="material-icons">event</i>
              <p>אירועים</p>
            </a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link" href="#">
              <i class="material-icons">event</i>
              <p>עריכת אירוע</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">עריכת אירוע</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Log out</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">עריכת אירוע</h4>
                </div>
                <div class="card-body">
                  <?php
                    date_default_timezone_set('Asia/Jerusalem');
                    require "../DB/events.php";
                    $objectEvent = new Event();

                    if(isset($_REQUEST['aid'])){
                        $objectEvent->setId($_REQUEST['aid']);
                    }

                    if(isset($_REQUEST['save'])){
                      $objectEvent->setType($_REQUEST['type']);
                      $objectEvent->setTournament($_REQUEST['tournament']);
                      $objectEvent->setDate($_REQUEST['date']);
                      $objectEvent->setPlayers($_REQUEST['players']);
                      $objectEvent->setLocation($_REQUEST['location']);
                      $objectEvent->setReporter($_REQUEST['reporter']);
                      $objectEvent->setPhotographer($_REQUEST['photographer']);
                      $objectEvent->setArticle($_REQUEST['article']);

                    if($objectEvent->update()){
                      header("Location: events_page.php");
                      } else{
                            echo '<div class="alert alert-warning">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="material-icons">close</i>
                                        </button>
                                        <span>שגיאה! האירוע לא נשמר</span>
                                  </div>';
                          }
                      }

                        $event = $objectEvent->getEventById();
                  ?>
                  <form id="event-frm" role="form" method="post" action="">
                    <input type="hidden" name="aid" id="aid" value="<?php echo isset($_REQUEST['aid']) ? $_REQUEST['aid'] : ''; ?>">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                        </div>
                      </div>
					  	       </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ענף ספורט</label>
                          <input name="type" id="type" type="text" class="form-control" value="<?php echo isset($event['type']) ? $event['type'] : ''; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">טורניר</label>
                          <input name="tournament" id="tournament" type="text" class="form-control" value="<?php echo isset($event['tournament']) ? $event['tournament'] : ''; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">תאריך ושעה</label>
                          <input name="date" id="date" type="datetime-local" class="form-control" value="<?php echo isset($event['custom_date']) ? $event['custom_date'] : ''; ?>" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">קבוצות\שחקנים</label>
                          <input name="players" id="players" type="text" class="form-control" value="<?php echo isset($event['players']) ? $event['players'] : ''; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">מיקום</label>
                          <input name="location" id="location" type="text" class="form-control" value="<?php echo isset($event['location']) ? $event['location'] : ''; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">כתב</label>
                          <?php
                            $mysqli = NEW MySQLi('localhost', 'amitmr_amit', 'Aa123456', 'amitmr_users');
                            mysqli_set_charset($mysqli,"utf8");
                            $resultsSet = $mysqli->query("SELECT firstName, lastName, Id FROM users WHERE Role='כתב'");
                          ?>
                          <select name="reporter" class="form-control">
                            <option></option>
                            <?php
                              while($rows = $resultsSet->FETCH_ASSOC())
                              {
                                $reporter_name = $rows['firstName'] . " " . $rows['lastName'];
                                $reporter_ID = $rows['Id'];
                                if($reporter_ID == $event['reporter']){
                                    echo "<option value='$reporter_ID' selected>$reporter_name</option>";
                                }
                                echo "<option value='$reporter_ID'>$reporter_name</option>";
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">צלם</label>
                          <?php
                            $mysqli = NEW MySQLi('localhost', 'amitmr_amit', 'Aa123456', 'amitmr_users');
                            mysqli_set_charset($mysqli,"utf8");
                            $resultsSet = $mysqli->query("SELECT firstName, lastName, Id FROM users WHERE Role='צלם'");
                          ?>
                          <select name="photographer" class="form-control">
                            <option></option>
                            <?php
                              while($rows = $resultsSet->FETCH_ASSOC())
                              {
                                $photographer_name = $rows['firstName'] . " " . $rows['lastName'];
                                $photographer_ID = $rows['Id'];
                                if($photographer_ID == $event['photographer']){
                                    echo "<option value='$photographer_ID' selected>$photographer_name</option>";
                                }
                                else{
                                    echo "<option value='$photographer_ID'>$photographer_name</option>";
                                }

                              }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
					          <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">כתבה</label>
                          <?php
                            $mysqli = NEW MySQLi('localhost', 'amitmr_amit', 'Aa123456', 'amitmr_users');
                            mysqli_set_charset($mysqli,"utf8");
                            $resultsSet = $mysqli->query("SELECT title, id FROM articles WHERE DATE(createdOn) = CURDATE()");
                          ?>
                          <select name="article" class="form-control">
                            <option></option>
                            <?php
                              while($rows = $resultsSet->FETCH_ASSOC())
                              {
                                $article_name = $rows['title'];
                                $article_id = $rows['id'];
                                if($article_id == $event['article']){
                                    echo "<option value='$article_id' selected>$article_name</option>";
                                }
                                else{
                                    echo "<option value='$article_id'>$article_name</option>";
                                }

                              }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="submit" value="שמור אירוע" class="btn btn-primary pull-right" id="save" name="save">
                        </div>
                      </div>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="#">
                  ידיעות אחרונות
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, Made by
            Amit Markus, Nofar Mazliach and Moria Abuksis
          </div>
        </div>
      </footer>
    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
              <span class="badge filter badge-rose active" data-color="rose"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-4.jpg" alt="">
          </a>
        </li>
        <li class="button-container">
          <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">Free Download</a>
        </li>
        <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> -->
        <li class="button-container">
          <a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
            View Documentation
          </a>
        </li>
        <li class="button-container github-star">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
        </li>
      </ul>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
</body>

</html>
