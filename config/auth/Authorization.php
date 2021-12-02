<?php
include('../helpers/ErrorReporting.php');

session_start();

class Authorization  {

    public static function checkLoggedUserRedirect() {
        include('../config/helpers/General.php');

        if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
            header('Location: ../pages/home.php');
    
        }
        
    }

    


}