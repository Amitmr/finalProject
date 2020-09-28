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

<!doctype html>
<html lang="he" dir="rtl">

<head>
  <title>דף הבית</title>
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
          <li class="nav-item active ">
            <a class="nav-link" href="#">
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
            <a class="navbar-brand" href="javascript:;">דף הבית</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li>
                <div class="navbar-wrapper">
                  <a class="navbar-brand">שלום, <?php  echo $name .'<br/>'; }
                  else
                      {
                          header("location:index.php");
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
	  	 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">spellcheck</i>
                  </div>
                  <p class="card-category">כתבות לאחר עריכה</p>
                  <form id="article-frm" role="form" method="post" action="">
                    <h3 class="card-title">
                      <?php
                      	$sql="SELECT COUNT(id) FROM articles WHERE readyStatus=1 AND (createdOn >= CONCAT(CURDATE(), ' 00:00:00') AND
                          createdOn <= CONCAT(CURDATE(), ' 23:59:59'));";
                      	$result= mysqli_query($conn, $sql);

                          while($row = mysqli_fetch_row($result)){
                              echo $row[0];
                          }
                      ?>
                      </h3>
                    </form>
                </div>
				        <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> מעודכן להיום
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">hourglass_empty</i>
                  </div>
                  <p class="card-category">כתבות לפני עריכה</p>
                  <h3 class="card-title">
                  <?php
                  	$sql="SELECT COUNT(id) FROM articles WHERE readyStatus=0;";
                  	$result= mysqli_query($conn, $sql);

                  	while($row = mysqli_fetch_row($result)){
                      echo $row[0];
                  }

                  ?>
                  </h3>
                </div>
				        <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> מעודכן להיום
                  </div>
                </div>
				       </div>
				    </div>
			      <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">calendar_today</i>
                  </div>
                  <p class="card-category">אירועים לפני הקצאה</p>
                  <h3 class="card-title">
                  <?php
                  	$sql="SELECT COUNT(eventID) FROM events WHERE article = '';";
                  	$result= mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_row($result)){
                          echo $row[0];
                    }
                  ?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> מעודכן להיום
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">event_available</i>
                  </div>
                  <p class="card-category">אירועים מוקצים</p>
                  <h3 class="card-title">
                  <?php
                  	$sql="SELECT COUNT(eventID) FROM events WHERE article != '' AND (updateTime >= CONCAT(CURDATE(), ' 00:00:00') AND updateTime <= CONCAT(CURDATE(), ' 23:59:59'));";
                  	$result= mysqli_query($conn, $sql);

                      while($row = mysqli_fetch_row($result)){
                          echo $row[0];
                      }
                  ?>
                </h3>
                </div>

				        <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> מעודכן להיום
                  </div>
                </div>
				      </div>
				    </div>
				 </div>

              <div class="responsiveCal">
                <iframe src="https://calendar.google.com/calendar/embed?height=450&amp;wkst=1&amp;bgcolor=%234285F4&amp;ctz=Asia%2FJerusalem&amp;src=cXBjMzVpNDFrYjJvYjJlY2VyMWk0dGliZ29AZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=ZW4uamV3aXNoI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;color=%237CB342&amp;color=%230B8043&amp;showCalendars=1&amp;title=%D7%99%D7%93%D7%99%D7%A2%D7%95%D7%AA%20%D7%90%D7%97%D7%A8%D7%95%D7%A0%D7%95%D7%AA%20-%20%D7%9E%D7%93%D7%95%D7%A8%20%D7%94%D7%A1%D7%A4%D7%95%D7%A8%D7%98" style="border-width:0" width="800" height="450" frameborder="0" scrolling="no"></iframe>
              </div>
                <style>
                    .responsiveCal {
                        position: relative; padding-bottom: 75%; height: 0; overflow: hidden;
                    }

                    .responsiveCal iframe {
                        position: absolute; top:0; left:0; width: 100%; height: 100%;
                    }
                </style>

          </div>
        </div>
	  <!--footer -->
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
        </div>
      </footer>
    </div>
  </div>
</body>
</html>
