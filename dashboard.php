<?php

    session_start();
    print_r($_SESSION);
   echo "<h1>WELCOME TO THE DASHBOARD email :".$_SESSION['email']." </h1>"


?>