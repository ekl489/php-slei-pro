<?php
    // require db
    require_once 'db/db_connect.php';

    class User{
        public function __construct(int $id, string $username){
            $this->id = $id;
            $this->username = $username;
        }

        private $id = 0;
        private $username = '';

        public function getId(){ return $this->id; }
        public function getUsername(){ return $this->username; }
    }

    class Session{
        public function __construct(int $id = 0, int $user_id){
            //$this->id = $id;
            $this->user_id = $user_id;
        }

        private $id = 0;
        private $user_id = 0;

        public function getId() { return $this->id; }
        public function getUserId() { return $this->user_id; }
    }

    class ClientSession{
        public function __construct($dbconnection){
            $this->dbconnection = $dbconnection;
            $this->isLoggedIn = FALSE;
        }

        private $dbconnection;
        private $session;
        private $user;
        private $isLoggedIn = FALSE;

        public function getUser(){ return $this->user; }
        public function getSession() { return $this->session; }
        public function isLoggedIn() { return $this->isLoggedIn; }

        public function Login(string $username, string $password){

            $hashedPassword = hash('md5', $password);

            try {
                $sql = "SELECT * FROM Users WHERE username=\"{$username}\" AND password=\"{$hashedPassword}\";";
                $result = $this->dbconnection->Query($sql);

                $users = array();
                while($row = $result->fetch_assoc()) {
                    array_push($users, new User($row["id"], $row["username"]));
                }

                // get session id
                // first insert new session
                
                $sql = "INSERT INTO Sessions (user_id) VALUES ({$users[0]->getId()});";
                $result = $this->dbconnection->Query($sql);
                // now get the autho_incremented session id
                $sql = "SELECT (id) FROM Sessions WHERE user_id={$users[0]->getId()};";
                $result = $this->dbconnection->Query($sql);

                $session_id = 0;
                while($row = $result->fetch_assoc()) {
                    $session_id = $row["id"];
                }

                $this->session = new Session($session_id, $users[0]->getId());

                // get user name
                $sql = "SELECT * FROM Users WHERE id={$users[0]->getId()};";
                $result = $this->dbconnection->Query($sql);
                $username = '';
                while($row = $result->fetch_assoc()) {
                    $username = $row["username"];
                }

                $this->user = new User($users[0]->getId(), $username);

                $this->isLoggedIn = true;

                return TRUE;
            } catch(Exception $e){
                $this->isLoggedIn = FALSE;
                return false;
            }
        }
    }

    class Sessions{
        public function __construct($dbconnection){
            $this->dbconnection = $dbconnection;
        }

        private $dbconnection;
        private $session;  

        public function getUserId() { return $this->session->getUserId(); }

        public function isLoggedIn() { return isset($this->session); }

        public function Create(string $username, string $password){
            $hashedPassword = hash('md5', $password);

            $sql = "SELECT * FROM `Users` WHERE username=\"{$username}\" AND password=\"{$hashedPassword}\";";
            $result = $this->dbconnection->Query($sql);

            $users = array();
            while($row = $result->fetch_assoc()) {
                array_push($users, new User($row["id"], $row["username"], $row["password"]));
            }

            // get session id
            // first insert new session
            $sql = "INSERT INTO Sessions (user_id) VALUES ({$users[0]->getId()});";
            $result = $this->dbconnection->Query($sql);
            // now get the autho_incremented session id
            $sql = "SELECT (id) FROM Sessions WHERE user_id={$users[0]->getId()};";
            $result = $this->dbconnection->Query($sql);

            $session_id = 0;
            while($row = $result->fetch_assoc()) {
                $session_id = $row["id"];
            }

            $this->session = new Session($session_id, $users[0]->getId());

            return $this->session;
        }
    } 
?>