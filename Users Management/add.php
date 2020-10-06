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
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
  ניהול משתמשים
  </title>

  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="css/main.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />


</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">

      <div class="logo">
        <a href="#" class= "logo-tim logo-normal">
          <img  src="img/logo.jpeg" >
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
          <li class="nav-item active ">
            <a class="nav-link" href="main.php">
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
            <a class="navbar-brand" href="javascript:;">ניהול משתמשים</a>
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
                  <a class="dropdown-item" href="profile.php?id=<?php echo $userID ?>">פרופיל</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="..\Login\Logout.php?logout">להתנתק מהמערכת</a>
                </div>
              </li>
            </ul>
          </div>
      </nav>

      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <form method="post">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title">הוספת משתמש</h4>
                    </div>
                    <div class="card-body">
                      <form>
                        <div class="row">
                          <div class="col-md-5">
                            <div class="form-group">
                            </div>
                          </div>
    				    				</div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="bmd-label-floating">שם פרטי</label>
                              <input name="firstname" type="text" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="bmd-label-floating">שם משפחה</label>
                              <input name="lastname" type="text" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="bmd-label-floating">מייל</label>
                              <input name="email" type="text" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">טלפון</label>
                              <input name="phone" type="text" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">תעודת זהות</label>
                              <input name="user_id" type="text" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">תפקיד</label>
                              <input name="role" type="text" class="form-control">
                            </div>
                          </div>
                        </div>
    										<div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="bmd-label-floating">עיר מגורים</label>
                              <input name="city" type="text" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="bmd-label-floating">שינוי סיסמא</label>
                              <input name="password" type="password" class="form-control">
                            </div>
                          </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <button type="submit" name="save" class="btn btn-primary pull-right">שמור משתמש</button>
                            </div>
                          </div>
                        </div>
                    </form>
                          <?php
				                		if(isset($_POST['save'])){
				                			require_once('../DB/DbConnect.php');
				                            $db = new DbConnect();
				                            $dbConn = $db->connect();

				                            $sql = "INSERT INTO `users`(`password`, `firstName`, `lastName`, `Email`, `Phone`, `Role`, `city`,`Id`) VALUES (:password,:firstName,:lastName,:Email,:Phone,:Role,:city,:Id)";
				                            $stmt = $dbConn->prepare($sql);

				                            $stmt->bindParam(':password', $_POST['password']);
				                            $stmt->bindParam(':firstName', $_POST['firstname']);
				                            $stmt->bindParam(':lastName', $_POST['lastname']);
				                            $stmt->bindParam(':Email', $_POST['email']);
				                            $stmt->bindParam(':Phone', $_POST['phone']);
				                            $stmt->bindParam(':Role', $_POST['role']);
				                            $stmt->bindParam(':city', $_POST['city']);
				                            $stmt->bindParam(':Id', $_POST['user_id']);

				                                if($stmt->execute()){
				                                  header("Location: main.php");
				                                }else{
				                                  echo '<div class="alert alert-warning">
				                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				                                                <i class="material-icons">close</i>
				                                                </button>
				                                                <span>שגיאה! המשתמש לא נשמר</span>
				                                        </div>';
				                                }
				                		}
                		?>
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

</html>
