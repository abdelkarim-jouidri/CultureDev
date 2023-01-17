<?php

    class Signup extends Database{
        
        protected function checkUser($fullname,$email){
            $stmt = $this->createPDO()->prepare('SELECT * FROM city');
            if(!$stmt->execute()){
                $stm = null;
                echo "error occured";
            }
        }
    }



?>