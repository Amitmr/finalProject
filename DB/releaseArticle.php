<?php

$id = $_GET['id'];
$status = true;
require_once('DbConnect.php');
$db = new DbConnect();
$dbConn = $db->connect();

$sql = "UPDATE `articles` SET `readyStatus` = :status WHERE `id` = :id";
$stmt = $dbConn->prepare($sql);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':id', $id);

if($stmt->execute()){
  header("Location: ../Articles/articles page.php");
}
else{
  echo '<div class="alert alert-warning">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <i class="material-icons">close</i>
                 </button>
                 <span>שגיאה! הכתבה לא נשמרה</span>
        </div>';
}

?>
