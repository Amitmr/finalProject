<?php
  class Articles{

    private $id;
    private $title;
    private $subtitle;
    private $content;
    private $writer;
    private $editor;
    private $createdOn;
    private $changed;
    private $readyStatus;
    protected $dbConn;

    function setId($id) {$this->id = $id;}
    function getId() {return $this->id;}
    function setTitle($title) {$this->title = $title;}
    function getTitle() {return $this->title;}
    function setSubtitle($subtitle) {$this->subtitle = $subtitle;}
    function getSubtitle() {return $this->subtitle;}
    function setContent($content) {$this->content = $content;}
    function getContent() {return $this->$content;}
    function setWriter($writer) {$this->writer = $writer;}
    function getWriter() {return $this->writer;}
    function setEditor($editor) {$this->editor = $editor;}
    function getEditor() {return $this->editor;}
    function setCreatedOn($createdOn) {$this->createdOn = $createdOn;}
    function getCreatedOn() {return $this->createdOn;}
    function setChanged($changed) {$this->changed = $changed;}
    function getChanged() {return $this->changed;}
    // function setReadyStatus($readyStatus) {$this->readyStatus = $readyStatus;}
    // function getReadyStatus() {return $this->readyStatus;}

    public function __construct(){
        require_once('DbConnect.php');
        $db = new DbConnect();
        $this->dbConn = $db->connect();
    }

    public function save(){
        $sql = "INSERT INTO `articles`(`id`, `title`, `subtitle`, `content`, `writer`, `editor`, `createdOn`,`changed`) VALUES (null,:title,:subtitle,:content,:writer,:editor,:cdate,:gdate)";
        $stmt = $this->dbConn->prepare($sql);

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':subtitle', $this->subtitle);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':writer', $this->writer);
        $stmt->bindParam(':editor', $this->editor);
        $stmt->bindParam(':cdate', $this->createdOn);
        $stmt->bindParam(':gdate', $this->createdOn);
        // $stmt->bindParam(':ready', $this->readyStatus);

        if($stmt->execute()){
          return true;
        }else{
          return false;
        }
    }

    public function update(){
      $sql = "UPDATE `articles` SET `title` = :title, `subtitle` = :subtitle, `content` = :content, `writer` = :writer, `editor` = :editor, `changed` = :gdate WHERE id = :id";
      $stmt = $this->dbConn->prepare($sql);

      $stmt->bindParam(':title', $this->title);
      $stmt->bindParam(':subtitle', $this->subtitle);
      $stmt->bindParam(':content', $this->content);
      $stmt->bindParam(':writer', $this->writer);
      $stmt->bindParam(':editor', $this->editor);
      $stmt->bindParam(':gdate', $this->changed);
      $stmt->bindParam(':id', $this->id);

      if($stmt->execute()){
        return true;
      }else{
        return false;
      }
    }

    public function getArticleById(){
      $stmt = $this->dbConn->prepare("SELECT * FROM articles WHERE id = :id");
      $stmt->bindParam(':id', $this->id);
      $stmt->execute();
      $article = $stmt->fetch(PDO::FETCH_ASSOC);
      return $article;
    }

    public function getAllArticles(){
      $stmt = $this->dbConn->prepare("SELECT * FROM articles");
      $stmt->execute();
      $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $articles;
    }

    public function getAllUsers(){
      $stmt = $this->dbConn->prepare("SELECT firstName, lastName, Id FROM users");
      $stmt->execute();
      $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $users;
    }

  }

 ?>
