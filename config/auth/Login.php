<?php
    include('../helpers/ErrorReporting.php');
    include('../connection/Database.php');
    include('../helpers/General.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email   = $_POST['email'];
        $password   = $_POST['password'];
        
        $passwordEncrypt = General::passwordEncrypt($password);
        //create db connection and save data
        $database  = new Database;
        $response = $database->selectLimit('users',$email,$passwordEncrypt);

        if($response == FALSE) {
            echo 'Invalid Details';
        }
        session_start();
        $userId    = json_encode($response['id']);
        $email     = json_encode($response['email']);
        $userName  = json_encode($response['user_name']);

        $_SESSION['userId'] = $userId;
        $_SESSION['email']  = $email;
        $_SESSION['userName'] = $userName;

        header('Location: ../../pages/home.php');

        
    }


?>