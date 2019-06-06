<?php

    // require db
    require_once 'db/db_connect.php';

    // Single ForumnPost Object
    class ForumnPost{
        function __construct(int $id = 0, string $author, string $body){
            $this->id = $id;
            $this->author = $author;
            $this->body = $body;
        }

        private $id;
        private $author;
        private $body;

        public function getId(){
            return $this->id;
        }
        public function getAuthor(){
            return $this->author;
        }
        public function getBody(){
            return $this->body;
        }
    }

    class Forumn {
        function __construct($dbconnection){
            $this->dbconnection = $dbconnection;
        }

        public function getPosts(){

            $posts = Array();

            $result = $this->dbconnection->Query("SELECT * FROM `ForumnPosts`;");
            while($row = $result->fetch_assoc()) {
                array_push($posts, new ForumnPost($row["id"], $row["author"], $row["body"]));
            }

            return $posts;
        }

        public function addPost($forumnpost){
            $author = $forumnpost->getAuthor();
            $body = $forumnpost->getBody();

            //$sql = 'INSERT INTO ForumnPosts (author, body) VALUES ("' . $author . ',"' . $body . '");';
            $sql = "INSERT INTO ForumnPosts (author, body) VALUES (\"{$author}\",\"{$body}\");";

            $result = $this->dbconnection->Query($sql);
        }

        private $dbconnection;
    }

        

    $forumn = new Forumn($dbconnection);
    //$posts = $forumn->getPosts();
?>