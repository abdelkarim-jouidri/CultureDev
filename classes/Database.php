<?php

    class Database {
        private $host = "localhost";
        private $db = "test";
        private $username = "root";
        private $pwd = "";

        protected function createPDO()
        {
            try{
                return new PDO("mysql:host=".self::$host."dbname=".self::$db,self::$username, self::$pwd);

            }catch(PDOException $e){

                echo "ERROR occured $e";

            }
        }
    }



?>