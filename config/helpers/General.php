<?php
    
include('ErrorReporting.php');

class General {



  public static function passwordEncrypt($value) {
    return md5($value);
  }
  public static function checkSessionStatus($url = false) {
        if(isset($_SESSION['userId']) && !empty($_SESSION['userId'])){
            
            return true;
        }
        header('Location: ../auth/login.php');
  }
}


?>