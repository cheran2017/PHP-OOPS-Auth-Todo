<?php 
    include('../config/auth/Authorization.php'); 
    Authorization::checkLoggedUserRedirect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <form action="../config/auth/Login.php" method="POST">
        Email : <input type="text" name="email" id=""> <br>
        Password  : <input type="password" name="password" id="">
        <button type="submit">Submit</button>
    </form> 
    <a href="register.php">New User?</a>
</body>
</html>