<?php
  class Event{

    private $id;
    private $type;
    private $tournament;
    private $date;
    private $players;
    private $location;
    private $reporter;
    private $photographer;
    private $article;
    protected $dbConn;

    function setId($id) {$this->id = $id;}
    function getId() {return $this->id;}
    function setType($type) {$this->type = $type;}
    function getType() {return $this->type;}
    function setTournament($tournament) {$this->tournament = $tournament;}
    function getTournament() {return $this->tournament;}
    function setDate($date) {$this->date = $date;}
    function getDate() {return $this->$date;}
    function setPlayers($players) {$this->players = $players;}
    function getPlayers() {return $this->players;}
    function setLocation($location) {$this->location = $location;}
    function getLocation() {return $this->location;}
    function setReporter($reporter) {$this->reporter = $reporter;}
    function getReporter() {return $this->reporter;}
    function setPhotographer($photographer) {$this->photographer = $photographer;}
    function getPhotographer() {return $this->photographer;}
    function setArticle($article) {$this->article = $article;}
    function getArticle() {return $this->article;}

    public function __construct(){
        require_once('DbConnect.php');
        $db = new DbConnect();
        $this->dbConn = $db->connect();
    }

    public function save(){
        $sql = "INSERT INTO `events`(`eventID`, `type`, `tournament`, `date`, `players`, `location`, `reporter`,`photographer`, `article`) VALUES (null,:type,:tournament,:dateOf,:players,:location,:reporter,:photographer,:article)";
        $stmt = $this->dbConn->prepare($sql);

        $stmt->bindParam(':type', $this->type);
        $stmt->bindParam(':tournament', $this->tournament);
        $stmt->bindParam(':dateOf', $this->date);
        $stmt->bindParam(':players', $this->players);
        $stmt->bindParam(':location', $this->location);
        $stmt->bindParam(':reporter', $this->reporter);
        $stmt->bindParam(':photographer', $this->photographer);
        $stmt->bindParam(':article', $this->article);

        if($stmt->execute()){
          return true;
        }else{
          return false;
        }
    }
    public function addFromAPI(){
        $sql = "INSERT INTO `events`(`eventID`, `type`, `date`, `players`) VALUES (null,:type,:dateOf,:players)";
        $stmt = $this->dbConn->prepare($sql);

        $stmt->bindParam(':type', $this->type);
        $stmt->bindParam(':dateOf', $this->date);
        $stmt->bindParam(':players', $this->players);

        if($stmt->execute()){
          return true;
        }else{
          return false;
        }
    }

    public function update(){
      $sql = "UPDATE `events` SET `type` = :type, `tournament` = :tournament, `date` = :date, `players` = :players, `location` = :location, `reporter` = :reporter, `photographer` = :photographer, `article` = :article WHERE eventID = :id";
      $stmt = $this->dbConn->prepare($sql);

      $stmt->bindParam(':type', $this->type);
      $stmt->bindParam(':tournament', $this->tournament);
      $stmt->bindParam(':date', $this->date);
      $stmt->bindParam(':players', $this->players);
      $stmt->bindParam(':location', $this->location);
      $stmt->bindParam(':reporter', $this->reporter);
      $stmt->bindParam(':photographer', $this->photographer);
      $stmt->bindParam(':article', $this->article);
      $stmt->bindParam(':id', $this->id);

      if($stmt->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function updateArticle(){
      $sql = "UPDATE `events` SET `article` = :article WHERE eventID = :id";
      $stmt = $this->dbConn->prepare($sql);

      $stmt->bindParam(':article', $this->article);
      $stmt->bindParam(':id', $this->id);

      if($stmt->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function getEventById(){
      $stmt = $this->dbConn->prepare("SELECT * , DATE_FORMAT(date, '%Y-%m-%dT%H:%i') AS custom_date FROM events WHERE eventID = :id");
      $stmt->bindParam(':id', $this->id);
      $stmt->execute();
      $event = $stmt->fetch(PDO::FETCH_ASSOC);
      return $event;
    }

    public function getAllEvents(){
      $stmt = $this->dbConn->prepare("SELECT * FROM events ORDER BY date");
      $stmt->execute();
      $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $events;
    }

    public function getAllUsers(){
      $stmt = $this->dbConn->prepare("SELECT firstName, lastName, Id FROM users");
      $stmt->execute();
      $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $users;
    }

    public function checkIfEventExists(){
        $stmt = $this->dbConn->prepare("SELECT *  FROM events WHERE (`type` = :type) AND (`date` = :date) AND (`players` = :players)");

        $stmt->bindParam(':type', $this->type);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':players', $this->players);
        $stmt->execute();
        $result = $stmt->fetch();

        if($result){
          return true;
        }else{
          return false;
        }
    }
  }

 ?>
