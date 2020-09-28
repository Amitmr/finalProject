<?php

$id = $_GET['id'];
require_once('DbConnect.php');
$db = new DbConnect();
$dbConn = $db->connect();

$sql = "DELETE FROM `events` WHERE `eventID` = :id";
$stmt = $dbConn->prepare($sql);
$stmt->bindParam(':id', $id);

if($stmt->execute()){
  header("Location: ../Events/events_page.php");
}
else{
  echo '<div class="alert alert-warning">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <i class="material-icons">close</i>
                 </button>
                 <span>שגיאה! האירוע לא נמחק</span>
        </div>';
}

?>
