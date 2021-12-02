<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
</head>
<body>
    <form action="../config/auth/Register.php" method="POST">
        User Name : <input type="text" name="user_name" id=""> <br>
        Email     : <input type="email" name="email" id=""> <br>
        Password  : <input type="password" name="password" id="">
        <button type="submit">Submit</button>
    </form> 
    <a href="login.php">Already Registered?</a>

</body>
</html>