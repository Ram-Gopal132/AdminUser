<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>User Home</title>
</head>
<body>

<center>

<h1>THIS USER HOME PAGE</h1>
<?php 
 $_SESSION["username"];
?>

<a href="logout.php">Click Here! For Logout➡️</a>
</center>
    
</body>
</html>