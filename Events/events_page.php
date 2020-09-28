<!doctype html>
<html lang="he" dir="rtl">

<head>
  <title>אירועים</title>
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
          <li class="nav-item active ">
            <a class="nav-link" href="#">
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
            <a class="navbar-brand" href="javascript:;">אירועים</a>
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
                require "../DB/events.php";
                $objectEvent = new Event();
                $events = $objectEvent->getAllEvents();
                $users = $objectEvent->getAllUsers();
             ?>
          </div>
          <div>
             <div class="col-lg-12 col-md-12">
               <div class="card">
                 <div class="card-header card-header-tabs card-header-primary">
                   <div class="nav-tabs-navigation">
                     <div class="nav-tabs-wrapper">
                       <ul class="nav nav-tabs" data-tabs="tabs">
                         <li class="nav-item">
                           <a class="nav-link active" href="#upcoming" data-toggle="tab">
                             <i class="material-icons">today</i>
                             <h4 style="display:inline-block">אירועים מהיום</h4>
                             <div class="ripple-container"></div>
                           </a>
                         </li>
                         <li class="nav-item">
                           <a class="nav-link" href="#lastWeek" data-toggle="tab">
                             <i class="material-icons">event</i>
                             <h4 style="display:inline-block">אירועים מהשבוע האחרון</h4>
                             <div class="ripple-container"></div>
                           </a>
                         </li>
                         <li class="nav-item">
                           <a class="nav-link" href="#lastMonth" data-toggle="tab">
                             <i class="material-icons">event</i>
                             <h4 style="display:inline-block">אירועים מהחודש האחרון</h4>
                             <div class="ripple-container"></div>
                           </a>
                         </li>
                         <li class="nav-item">
                           <a class="nav-link" href="addEvent.php">
                             <i class="material-icons">add</i>
                             <h4 style="display:inline-block">הוספת אירוע</h4>
                           </a>
                         </li>
                         <li class="nav-item">
                           <a class="nav-link" href="API.php">
                             <i class="material-icons">sync</i>
                             <h4 style="display:inline-block">טעינת אירועים</h4>
                           </a>
                         </li>
                       </ul>
                     </div>
                   </div>
                 </div>
                 <div class="card-body">
                   <div class="tab-content">
                     <div class="tab-pane active" id="upcoming">
                       <table class="table">
                         <tr style="font-size:19px; color:#ab47bc";>
                           <td><strong>ענף</strong></td>
                           <td><strong>תחרות</strong></td>
                           <td><strong>תאריך</strong></td>
                           <td><strong>שעה (IST)</strong></td>
                           <td><strong>קבוצות\שחקנים</strong></td>
                           <td><strong>מיקום</strong></td>
                           <td><strong>כתב</strong></td>
                           <td><strong>צלם</strong></td>
                           <td><strong>סיקור</strong></td>
                           <td></td>
                         </tr>
                         <tbody>
                           <?php
                             date_default_timezone_set('Asia/Jerusalem');
                             foreach ($events as $key => $event) {
                               $reporter = $photographer = NULL;
                               $today = (new DateTime())->format('Y-m-d');
                               $date = (new DateTime($event['date']))->format('Y-m-d');
                               if($today == $date){
                                 $id = $event['article'];
                                 foreach ($users as $key2 => $user) {
                                   if($user['Id'] == $event['reporter']){
                                     $reporter = $user['firstName'] . " " .$user['lastName'];
                                   }

                                   if ($user['Id'] == $event['photographer']) {
                                     $photographer = $user['firstName'] . " " .$user['lastName'];
                                   }
                                 }
                                 $eventID = $event["eventID"];
                              ?>
                                 <tr>
                                   <td><?php echo $event['type']; ?></td>
                                   <td><?php echo $event['tournament']; ?></td>
                                   <td><?php $oDate = new DateTime($event['date']);
                                   echo $sDate = $oDate->format("d.m");?></td>
                                   <td><?php $oDate = new DateTime($event['date']);
                                   echo $sDate = $oDate->format("H:i");?></td>
                                   <td><?php echo $event['players']; ?></td>
                                   <td><?php echo $event['location']; ?></td>
                                   <td><?php echo $reporter; ?></td>
                                   <td><?php echo $photographer; ?></td>
                                   <td style="width:10%;"><?php if($event['article']==null){
                                     echo "<div class=\"btn btn btn-sm btn-block\" onclick=\"window.location.href=&quot;articles_for_events.php?aid=$eventID&quot;\">שיוך לכתבה</div>"
                                   ;} else{ echo("<div class=\"btn btn-primary btn-sm btn-block\" onclick=\"window.location.href='../Editor/editArticle.php?aid=$id'\">כתבה</div>")
                                     ;}?>
                                   </td>
                                   <td class="td-actions">
                                     <button type="button" rel="tooltip" title="עריכה" class="btn btn-primary btn-link btn-sm">
                                       <a href='editEvent.php?aid=<?php echo $event["eventID"]; ?>' <i class="material-icons">edit</i></a>
                                     </button>
                                     <button type="button" rel="tooltip" title="מחיקה" class="btn btn-danger btn-link btn-sm">
                                         <i class="material-icons"> <a class="red" href='../../DB/deleteEvent.php?id=<?php echo $event["eventID"]; ?>' </a> close</i>
                                    </button>
                                   </td>
                                 </tr>
                               <?php }}?>
                           </tbody>
                         </table>
                       </div>
                     <div class="tab-pane" id="lastWeek">
                       <table class="table">
                         <tr style="font-size:19px; color:#ab47bc;">
                           <td><strong>ענף</strong></td>
                           <td><strong>תחרות</strong></td>
                           <td><strong>תאריך</strong></td>
                           <td><strong>שעה (IST)</strong></td>
                           <td><strong>קבוצות\שחקנים</strong></td>
                           <td><strong>מיקום</strong></td>
                           <td><strong>כתב</strong></td>
                           <td><strong>צלם</strong></td>
                           <td><strong>סיקור</strong></td>
                           <td></td>
                         </tr>
                         <tbody>
                           <?php
                             foreach ($events as $key => $event) {
                               $photographer = $reporter = NULL;
                               $oDate = new DateTime($event['date']);
                               $current_date = new DateTime();
                               if($oDate->format('Y-m-d') < $current_date->format('Y-m-d') && $oDate > $current_date->modify('-7 day')){
                                 $id = $event['article'];
                                 foreach ($users as $key2 => $user) {
                                   if($user['Id'] == $event['reporter']){
                                     $reporter = $user['firstName'] . " " .$user['lastName'];
                                   }
                                   if ($user['Id'] == $event['photographer']) {
                                     $photographer = $user['firstName'] . " " .$user['lastName'];
                                   }
                                 }
                              ?>
                                 <tr>
                                   <td><?php echo $event['type']; ?></td>
                                   <td><?php echo $event['tournament']; ?></td>
                                   <td><?php $oDate = new DateTime($event['date']);
                                   echo $sDate = $oDate->format("d.m");?></td>
                                   <td><?php $oDate = new DateTime($event['date']);
                                   echo $sDate = $oDate->format("H:i");?></td>
                                   <td><?php echo $event['players']; ?></td>
                                   <td><?php echo $event['location']; ?></td>
                                   <td><?php echo $reporter; ?></td>
                                   <td><?php echo $photographer; ?></td>
                                   <td style="width:10%;"><?php if($event['article']==null){
                                     echo '<div class="btn btn btn-sm btn-block" onclick="window.location.href=&quot;articles_for_events.php&quot;">שיוך לכתבה</div>'
                                   ;} else{ echo("<div class=\"btn btn-primary btn-sm btn-block\" onclick=\"window.location.href='../Editor/editArticle.php?aid=$id'\">כתבה</div>")
                                     ;}?>
                                   </td>
                                   <td class="td-actions">
                                     <button type="button" rel="tooltip" title="עריכה" class="btn btn-primary btn-link btn-sm">
                                       <a href='editEvent.php?aid=<?php echo $event["eventID"]; ?>' <i class="material-icons">edit</i></a>
                                     </button>
                                     <button type="button" rel="tooltip" title="מחיקה" class="btn btn-danger btn-link btn-sm">
                                         <i class="material-icons"> <a class="red" href='../DB/deleteEvent.php?id=<?php echo $event["eventID"]; ?>' </a> close</i>
                                    </button>
                                   </td>
                                 </tr>
                               <?php }}?>
                         </tbody>
                       </table>
                     </div>
                     <div class="tab-pane" id="lastMonth">
                       <table class="table">
                         <tr style="font-size:19px; color:#ab47bc;">
                           <td><strong>ענף</strong></td>
                           <td><strong>תחרות</strong></td>
                           <td><strong>תאריך</strong></td>
                           <td><strong>שעה (IST)</strong></td>
                           <td><strong>קבוצות\שחקנים</strong></td>
                           <td><strong>מיקום</strong></td>
                           <td><strong>כתב</strong></td>
                           <td><strong>צלם</strong></td>
                           <td><strong>סיקור</strong></td>
                           <td></td>
                         </tr>
                         <tbody>
                           <?php
                             foreach ($events as $key => $event) {
                               $photographer = $reporter = NULL;
                               $oDate = new DateTime($event['date']);
                               $current_date = new DateTime();
                               if($oDate < $current_date && $oDate > $current_date->modify('-30 day')){
                                 $id = $event['article'];
                                 foreach ($users as $key2 => $user) {
                                   if($user['Id'] == $event['reporter']){
                                     $reporter = $user['firstName'] . " " .$user['lastName'];
                                   }
                                   if ($user['Id'] == $event['photographer']) {
                                     $photographer = $user['firstName'] . " " .$user['lastName'];
                                   }
                                 }
                              ?>
                                 <tr>
                                   <td><?php echo $event['type']; ?></td>
                                   <td><?php echo $event['tournament']; ?></td>
                                   <td><?php $oDate = new DateTime($event['date']);
                                   echo $sDate = $oDate->format("d.m");?></td>
                                   <td><?php $oDate = new DateTime($event['date']);
                                   echo $sDate = $oDate->format("H:i");?></td>
                                   <td><?php echo $event['players']; ?></td>
                                   <td><?php echo $event['location']; ?></td>
                                   <td><?php echo $reporter; ?></td>
                                   <td><?php echo $photographer; ?></td>
                                   <td style="width:10%;"><?php if($event['article']==null){
                                     echo '<div class="btn btn btn-sm btn-block" onclick="window.location.href=&quot;articles_for_events.php">שיוך לכתבה</div>'
                                   ;} else{ echo("<div class=\"btn btn-primary btn-sm btn-block\" onclick=\"window.location.href='../Editor/editArticle.php?aid=$id'\">כתבה</div>")
                                     ;}?>
                                   </td>
                                   <td class="td-actions">
                                     <button type="button" rel="tooltip" title="עריכה" class="btn btn-primary btn-link btn-sm">
                                       <a href='editEvent.php?aid=<?php echo $event["eventID"]; ?>' <i class="material-icons">edit</i></a>
                                     </button>
                                     <button type="button" rel="tooltip" title="מחיקה" class="btn btn-danger btn-link btn-sm">
                                         <i class="material-icons"> <a class="red" href='../DB/deleteEvent.php?id=<?php echo $event["eventID"]; ?>' </a> close</i>
                                    </button>
                                   </td>
                                 </tr>
                               <?php }}?>
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
