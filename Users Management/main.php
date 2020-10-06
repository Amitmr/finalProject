
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
  <!--   Core JS Files   -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap-material-design.min.js"></script>

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
            <a class="nav-link" href="#">
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
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">

                  <h4 class="card-title ">משתמשים קיימים</h4>

                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">

						<a type="submit" class="btn btn-primary pull-right" href="add.php">הוספה</a>

                        <th>
                          שם מלא

                        </th>
                        <th>
                          תעודת זהות
                        </th>
                        <th>
                          טלפון
                        </th>
                        <th>
                          מייל
                        </th>
                        <th>
                          תפקיד
                        </th>
												<th>
                          עיר מגורים
                        </th>
                        <th></th>
                      </thead>
                      <tbody>
                        <?php
              							$servername = "localhost";
              							$username = "amitmr_user";
              							$password = "Aa123456";
              							$dbname = "amitmr_users";

              							// Create connection
              							$conn = mysqli_connect($servername, $username, $password, $dbname);

              							// Check connection
              							if (!$conn) {
              							  die("Connection failed: " . mysqli_connect_error());
              							}
                            $utf = $conn->query("SET NAMES 'utf8'");
              							$sql = "SELECT * FROM users";
              							$result = mysqli_query($conn, $sql);

              							if (mysqli_num_rows($result) > 0) {
              							  // output data of each row
              							  while($row = mysqli_fetch_assoc($result))
              							  {
              								 echo "<tr>";
              								  echo "<td>". $row["firstName"]. " ". $row["lastName"]. "</td>";
              								  echo "<td>". $row["Id"]. "</td>";
              								  echo "<td>". $row["Phone"]. "</td>";
              								  echo "<td>". $row["Email"]. "</td>";
              								  echo "<td>". $row["Role"]. "</td>";
              								  echo "<td>". $row["city"]. "</td>";
              							?>

								 <td class="td-actions text-left">
									<button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm" onclick="location.href='edit.php?id=<?php echo $row["Id"]; ?>';">
										<i class="material-icons">edit</i>
									</button>
                  <button type="button" rel="tooltip" title="מחיקה" class="btn btn-danger btn-link btn-sm">
                    <i class="material-icons"> <a class="red" href='delete user.php?id=<?php echo $row["Id"]; ?>' </a> close</i>
                  </button>
                  </td>

							<?php
								 echo "</tr>" ;
								 }
							}

				// 			mysqli_close($conn);
							?>
                      </tbody>
                    </table>
                  </div>
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

</body>

</html>
