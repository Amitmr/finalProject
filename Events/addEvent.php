<?php
	include_once '../Main/connect.php';
  session_start();

    if(isset($_SESSION['User']))
    {
      $sql="SELECT firstName, lastName, Id FROM users WHERE Email='".$_SESSION['User']."';";
      $result= mysqli_query($conn, $sql);
        while($row = mysqli_fetch_row($result)){
            $name = $row[0] . " " . $row[1];
						$userID = $row[2];
        }
?>

<!DOCTYPE html>
<html lang="he" dir="rtl">

<head>
  <title>הוספת אירוע</title>
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
            <a class="nav-link" href="../Articles/articles page.php">
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
              <p>הוספת אירוע</p>
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
            <a class="navbar-brand" href="javascript:;">הוספת אירוע</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li>
                <div class="navbar-wrapper">
                  <a class="navbar-brand">שלום, <?php  echo $name .'<br/>'; }
                  else
                      {
                          header("location:../index.php");
                      }?></a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="../Users Management/profile.php?id=<?php echo $userID ?>">פרופיל</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="..\Login\Logout.php?logout">להתנתק מהמערכת</a>
                </div>
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
                  <h4 class="card-title">הוספת אירוע</h4>
                </div>
                <div class="card-body">
                  <?php
                        date_default_timezone_set('Asia/Jerusalem');
                        if(isset($_REQUEST['save'])){
                          require "../DB/events.php";
                          $objectEvent = new Event();
                          $objectEvent->setType($_REQUEST['type']);
                          $objectEvent->setTournament($_REQUEST['tournament']);
                          $objectEvent->setDate($_REQUEST['date']);
                          $objectEvent->setPlayers($_REQUEST['players']);
                          $objectEvent->setLocation($_REQUEST['location']);
                          $objectEvent->setReporter($_REQUEST['reporter']);
                          $objectEvent->setPhotographer($_REQUEST['photographer']);
                          $objectEvent->setArticle($_REQUEST['article']);

                          if($objectEvent->save()){
                            header("Location: events_page.php");
                            // ob_enf_fluch();
                          } else{
                            echo '<div class="alert alert-warning">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="material-icons">close</i>
                                        </button>
                                        <span>שגיאה! האירוע לא נשמר</span>
                                  </div>';
                          }
                        }
                        ?>
                  <form id="event-frm" role="form" method="post" action="">
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
                          <input name="type" id="type" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">טורניר</label>
                          <input name="tournament" id="tournament" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">תאריך ושעה *</label>
                          <input name="date" id="date" type="datetime-local" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">קבוצות\שחקנים</label>
                          <input name="players" id="players" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">מיקום</label>
                          <input name="location" id="location" type="text" class="form-control">
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
                            $resultsSet = $mysqli->query("SELECT firstName, lastName, Id FROM users WHERE Role = 'צלם'");
                          ?>
                          <select name="photographer" class="form-control">
                            <option></option>
                            <?php
                              while($rows = $resultsSet->FETCH_ASSOC())
                              {
                                $photographer_name = $rows['firstName'] . " " . $rows['lastName'];
                                $photographer_ID = $rows['Id'];
                                echo "<option value='$photographer_ID'>$photographer_name</option>";
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
                                echo "<option value='$article_id'>$article_name</option>";
                              }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="submit" value="הוסף אירוע" class="btn btn-primary pull-right" id="save" name="save">
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

</body>

</html>
