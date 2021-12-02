<?php

    include('../helpers/ErrorReporting.php');

    include('../connection/Database.php');
    include('../helpers/General.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $fields =  array_keys($_POST);
        $passwordEncrypt = General::passwordEncrypt($_POST['password']);
        $passwordReplace = array_replace($_POST,['password' => $passwordEncrypt]);
        // $postValues = array_values($_POST);
        // print_r($passwordReplace);
        $values = array_values($passwordReplace);
        //create db connection and save data
        $database  = new Database;
        $database->register('users',$fields,$values);
        // header('Location: auth/login.php');

    } else {

        echo  "Wrong request method";
    }


?>