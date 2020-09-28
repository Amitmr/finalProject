<?php
  class DbConnect{
    private $host = 'localhost';
    private $dbName = 'amitmr_users';
    private $user = 'amitmr_amit';
    private $pass = 'Aa123456';

    public function connect(){
      try{
        $conn = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->dbName, $this->user, $this->pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $utf = $conn->query("SET NAMES 'utf8'");
        return $conn;
      } catch(PDOException $e){
          echo 'Database Error: ' . $e->getMessage();
      }
    }
  }

 ?>
