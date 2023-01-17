<?php

use LDAP\Result;

    class SignupController{

            private $fullName;
            private $email;
            private $password;


            public function __construct($fullName, $email, $password)
            {
                $this->fullName = $fullName;              
                $this->email = $email;              
                $this->password = $password;
                echo "the constructor ran";              
            }

            private function checkInput(){
                $result = false;
                if(empty($this->fullName) ||empty($this->email) || empty($this->password)) {
                    $result = false;
                }
                else{
                    $result = true;
                }
                return $result;
            }
    }

?>