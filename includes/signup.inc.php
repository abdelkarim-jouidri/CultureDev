<?php

    //inclusion des différents dépendances
    spl_autoload_register(function ($class_name) {

        if(file_exists('../classes/'.$class_name.'.php')) {
            
            require_once  '../classes/'.$class_name.'.php';
        }
        
    });

    // require_once '../classes/Signup-Controller.php';
    //recupération des infos des champs des inputs à partir la méthode POST
    if(isset($_POST['submit_signup'])){
        $fullName = $_POST['full_name'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
    }

    //instanciation d'un objet signup controller
    $signup = new SignupController($fullName,$email,$pwd);
    spl_autoload_register(function ($class_name) {

        if(file_exists('classes/'.$class_name.'.php')) {
            require_once  'classes/'.$class_name.'.php';

        }
        
        echo "autoload loaded";
    });
    //checking et redirection





?>