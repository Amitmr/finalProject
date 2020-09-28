<?php

$id = $_GET['id'];
require_once('DB/DbConnect.php');
$db = new DbConnect();
$dbConn = $db->connect();

$sql = "DELETE FROM `users` WHERE `id` = :id";
$stmt = $dbConn->prepare($sql);
$stmt->bindParam(':id', $id);

if($stmt->execute()){
  header("Location: main.php");
}
else{
  echo '<div class="alert alert-warning">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <i class="material-icons">close</i>
                 </button>
                 <span>שגיאה! המשתמש לא נמחק</span>
        </div>';
}

?>
