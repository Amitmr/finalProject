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
  <title>כתבות</title>
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
          <li class="nav-item ">
            <a class="nav-link" href="events_page.php">
              <i class="material-icons">event</i>
              <p>אירועים</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="events_page.php">
              <i class="material-icons">event</i>
              <p>כתבות להקצאה</p>
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
            <a class="navbar-brand" href="javascript:;">כתבות להקצאה</a>
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
          <div>
            <?php
                require "../DB/articles.php";
                $objectArticle = new Articles();
                $articles = $objectArticle->getAllArticles();
								$users = $objectArticle->getAllUsers();

                require "../DB/events.php";
                $objectEvent = new Event();

                if(isset($_REQUEST['aid'])){
                    $objectEvent->setId($_REQUEST['aid']);
                }

                if(isset($_REQUEST['save'])){
                    $objectEvent->setArticle($_REQUEST['article']);

                if($objectEvent->updateArticle()){
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
          </div>
          <div>
             <div class="col-lg-12 col-md-12">
               <div class="card">
                 <div class="card-header card-header-tabs card-header-primary">
                   <div class="nav-tabs-navigation">
                     <div class="nav-tabs-wrapper">
                        <h4 style="display:inline-block"> כתבות להקצאה</h4>
                     </div>
                   </div>
                 </div>
                 <div class="card-body">
                   <div class="tab-content">
                     <div class="tab-pane active" id="profile">
                       <table class="table">
                         <tr style="font-size:19px; color:#ab47bc";>
                           <td></td>
                           <td><strong>כותרת</strong></td>
                           <td><strong>כתב</strong></td>
                           <td><strong>עורך</strong></td>
                           <td><strong>נוצר</strong></td>
                           <td><strong>שונה לאחרונה</strong></td>
                         </tr>
                         <tbody>
                           <?php
                             foreach ($articles as $key => $article) {
															 $editor = $reporter = NULL;
                               $oDate = new DateTime($article['createdOn']);
                               $current_date = new DateTime();
                               if($oDate > $current_date->modify('-1 day')){
                               ?>
                               <form id="event-frm" role="form" method="post" action="">
                               <tr>
                                 <input type="hidden" name="aid" id="aid" value="<?php echo isset($_REQUEST['aid']) ? $_REQUEST['aid'] : ''; ?>">
                                 <input type="hidden" name="article" id="article" value="<?php echo isset($article['id']) ? $article['id'] : ''; ?>">
                                 <td style="width:10%;"><input type="submit" value="הקצאת כתבה" class="btn btn-primary pull-right" id="save" name="save"></td>
                                 <td><?php echo $article['title']; ?></td>
                                 <td><?php
																				foreach ($users as $user) {
			                                    if($user['Id'] == $article['writer']){
			                                      $reporter = $user['firstName'] . " " .$user['lastName'];
																						echo $reporter;
			                                    }
																				}
																		 ?></td>
                                 <td><?php  foreach ($users as $user) {
																 						if($user['Id'] == $article['editor']) {
																							$editor = $user['firstName'] . " " .$user['lastName'];
																							echo $editor;
																						}
																					}
																	?></td>
                                 <td><?php
                                       $oDate = new DateTime($article['createdOn']);
                                       echo $sDate = $oDate->format("d-m-Y H:i");?></td>
                                 <td><?php
                                   $oDate = new DateTime($article['changed']);
                                   echo $sDate = $oDate->format("d-m-Y H:i");?></td>
                               </tr>
                             </form>
                             <?php } }?>
                         </tbody>
                       </table>
                     </div>
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
            Amit Markus, Nofar Matzliach and Moria Abuksis
          </div>
          <!-- your footer here -->
        </div>
      </footer>
  </div>
  <script>
    CKEDITOR.replace('editor');
   </script>

</body>

</html>
