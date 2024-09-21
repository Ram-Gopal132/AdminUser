<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin home</title>
</head>
<body>
    <center>
        <h1>THIS IS ADMIN HOME PAGE</h1>

        <?php 
            $_SESSION["username"];
        ?>
        <a href="logout.php">Click Here! For Logout➡️</a>
    </center>
    
</body>
</html>