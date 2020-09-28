<!doctype html>

<html lang="he" dir="rtl">

<head>
  <title>התחברות למערכת</title>
	<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Material Kit CSS -->
	<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="Login/css/main.css" rel="stylesheet" />

</head>

<body>
<div class="login-wrap">
	<div class="login-html">

		<form class="login-form" action = "Login/Process.php" method = "post">
				<div class="group">
					<label class = "label">מייל</label>
					<input type = "email" name = "email" class="input">
				</div>
				<div class="group">
					<label class = "label">סיסמא</label>
					<input type = "password" name = "password"  class="input" data-type="password">
				</div>
        <?php
          if(@$_GET['Empty']==true)
          {
          ?>
          <div style = "font-size:15px; color:#cc0000; margin-top:10px" ><?php echo $_GET['Empty'] ?></div>
          <?php
          }
          ?>
          <?php
          if(@$_GET['Invalid']==true)
          {
          ?>
          <div style = "font-size:15px; color:#cc0000; margin-top:10px" ><?php echo $_GET['Invalid'] ?></div>
          <?php
          }
          ?>
				<div class="group">
					<input type="submit" name="Login" class="button hvr-float-shadow" value="כניסה">
				</div>
        <!-- <div style = "font-size:15px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div> -->
			</form>
		</div>
	</div>

</body>

</html>
