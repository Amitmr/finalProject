<?php
require_once('Connection.php');
session_start();
    if(isset($_POST['Login']))
    {
       if(empty($_POST['email']) || empty($_POST['password']))
       {
            header("location:../index.php?Empty= חסר שם משתמש\סיסמא");
       }
       else
       {
            $query="select firstName, lastName from users where Email='".$_POST['email']."' and Password='".$_POST['password']."'";
            $result=mysqli_query($con,$query);

            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['email'];
                header("location: ../Main/main.php");
            }
            else
            {
                header("location:../index.php?Invalid= שם משתמש או סיסמא לא נכונים");
            }
       }
    }
    else
    {
        echo 'Not Working Now Guys';
    }

?>
