<?php
    session_start();
    include('../config/helpers/General.php');
    General::checkSessionStatus();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
        <h3><a href="../config/auth/Logout.php">Log out</a></h3>
        <h1>Welcome <?php echo $_SESSION['userName'];  ?>,  Add Some Tasks</h1>

        <h2>Todo App</h2>
        <form action="" method="post">
            <input type="text" name="task" id=""> <br>
            <button type="submit">Add Task</button>
        </form>
</body>
</html>