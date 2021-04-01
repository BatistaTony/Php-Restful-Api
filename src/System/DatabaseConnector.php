<?php 



    namespace Src\System;

    
ini_set('display_errors', 1);
error_reporting(~0);

   

class DatabaseConnector {
        private $dbConnection = null;

        public function __construct()
        {
            $host = getenv('DB_HOST');
            $user = getenv('DB_USERNAME');
            $password = getenv('DB_PASSWORD');
            $db = getenv('DB_DATABASE');

            try {
                
                $this->dbConnection = new \PDO("mysql:host=$host;dbname=$db", $user, $password);
               
            } catch (\PDOException $e) {
                die($e->getMessage());
            }
            
        }

        public function getConnection(){
            return $this->dbConnection;
        }
    }

?>