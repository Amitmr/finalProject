<!doctype html>
<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myemail = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $myFname = mysqli_real_escape_string($db,$_POST['firstName']);
      $myLname = mysqli_real_escape_string($db,$_POST['lastName']);
      $fullName = $myFname + " " + $myLname;

      $sql = "SELECT id FROM users WHERE Email = '$myemail' and Password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         // session_register("myusername");
         $_SESSION['login_user'] = $fullName;
         header("location:../Main/main.php");
      }else {
         $error = "מייל או סיסמא לא נכונים";
      }
   }
?>

<html lang="he" dir="rtl">

<head>
  <title>התחברות למערכת</title>
	<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Material Kit CSS -->
	<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet" />

</head>

<body>
<div class="login-wrap">
	<div class="login-html">
		<form class="login-form" action = "" method = "post">
				<div class="group">
					<label class = "label">מייל</label>
					<input type = "email" name = "email" class="input">
				</div>
				<div class="group">
					<label class = "label">סיסמא</label>
					<input type = "password" name = "password"  class="input" data-type="password">
				</div>
				<div class="group">
					<input type="submit" class="button hvr-float-shadow" value="כניסה">
				</div>
        <div style = "font-size:15px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
			</form>
		</div>
	</div>

</body>

</html>
