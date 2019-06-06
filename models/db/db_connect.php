<?php

    class DBConnection{
        function __construct(string $servername, string $username, string $password, string $dbname){
            $this->servername = $servername;
            $this->username = $username;
            $this->password = $password;
            $this->dbname = $dbname;
        }

        public function Query(string $sql){

            // open connection
            $connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

            if ($connection->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // query & check for errro
            $result = $connection->query($sql);
            if (!$result) {
                die("Query failed: " . $connection->error);
            }

            $connection->close();

            return $result;
        }

        private $servername = '', $username ='', $password = '', $dbname = '';
    }
    
    // logic
    $dbconnection = new DBConnection("remotemysql.com", "bABPIco91Y", "mxuXas0bfk", "bABPIco91Y"); 
?>