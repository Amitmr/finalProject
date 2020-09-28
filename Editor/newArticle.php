<?php
  ob_start();

 ?>

<!doctype html>
<html lang="he" dir="rtl">

<head>
  <title>הוספת כתבה</title>
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
  <!-- editor -->
  <script src="ckeditor/ckeditor.js"></script>
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
          <li class="nav-item   ">
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
          <li class="nav-item active ">
            <a class="nav-link" href="../Articles/articles page.php">
              <i class="material-icons">content_paste</i>
              <p>כתבה חדשה</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../Events/events_page.php">
              <i class="material-icons">event</i>
              <p>אירועים</p>
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
            <a class="navbar-brand" href="javascript:;">הוספת כתבה</a>
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
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div>
            <?php
                date_default_timezone_set('Asia/Jerusalem');
                if(isset($_REQUEST['save'])){
                  require "../DB/articles.php";
                  $objectArticle = new Articles();
                  $objectArticle->setTitle($_REQUEST['title']);
                  $objectArticle->setSubtitle($_REQUEST['subtitle']);
                  $objectArticle->setContent($_REQUEST['content']);
                  $objectArticle->setWriter($_REQUEST['writer']);
                  $objectArticle->setEditor($_REQUEST['editor']);
                  $objectArticle->setCreatedOn(date('Y-m-d H:i:s'));

                  if($objectArticle->save()){
                    echo '<div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                                </button>
                                <span>הכתבה נשמרה</span>
                          </div>';
                    header("Location: ../Articles/articles page.php");
                  } else{
                    echo '<div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                                </button>
                                <span>שגיאה! הכתבה לא נשמרה</span>
                          </div>';
                  }
                }
             ?>
          </div>

          <form id="article-frm" role="form" method="post" action="">
            <div class="row">
              <div class="col-md-6">
                <div class="Input-text">
                  <h4>כתב</h4>
                  <?php
                    $mysqli = NEW MySQLi('localhost', 'amitmr_amit', 'Aa123456', 'amitmr_users');
                    mysqli_set_charset($mysqli,"utf8");
                    $resultsSet = $mysqli->query("SELECT firstName, lastName, Id FROM users WHERE Role='כתב'");
                  ?>
                  <select name="writer" class="form-control">
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
                <div class="Input-text">
                  <h4>עורך</h4>
                  <?php
                    $mysqli = NEW MySQLi('localhost', 'amitmr_amit', 'Aa123456', 'amitmr_users');
                    mysqli_set_charset($mysqli,"utf8");
                    $resultsSet = $mysqli->query("SELECT firstName, lastName, Id FROM users WHERE Role='עורך'");
                  ?>
                  <select name="editor" class="form-control">
                    <option></option>
                    <?php
                      while($rows = $resultsSet->FETCH_ASSOC())
                      {
                        $editor_name = $rows['firstName'] . " " . $rows['lastName'];
                        $editor_ID = $rows['Id'];
                        echo "<option value='$editor_ID'>$editor_name</option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
            </div>
              <div class="Input">
                  <input type="text" name="title" id="title" class="Input-text" placeholder="כותרת">
              </div>
              <div class="Input">
                  <textarea type="text" name="subtitle" id="subtitle" class="Input-text" placeholder="כותרת משנה"></textarea>
              </div>
              <textarea name="content" id="content"></textarea>
              <input type="submit" value="שמור כתבה" class="btn btn-success btn-block" id="save" name="save">
          </form>
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
            Amit Markus, Nofar Matzliach and Moria Abuksis
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>
  <script>
    CKEDITOR.replace('content');
   </script>

</body>

</html>
