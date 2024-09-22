

<?php


session_start();

$conn=mysqli_connect("localhost","root","","mynewdata");

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username=$_POST["username"];
    $password=$_POST["password"];

    $sql="select * from login where username='".$username."' AND password='".$password."'";

    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res);

    if($row["usertype"]=="user")

    {
        $_SESSION["username"]=$username;
        header("location:userhome.php");
    }

   elseif($row["usertype"]=="admin")

    {
        $_SESSION["username"]=$username;
        header("location:adminhome.php");
    }

    else{
        echo "username and password is incorrect";
    }
}



?>









<!DOCTYPE html>
<html>

<head>
      <title>HTML Login Form</title>
      <link rel="stylesheet" href="login.css">
</head>

<body>
      <div class="main">
            <h1>Login Form</h1>
            <h3>Enter your login credentials</h3>
            <form action="login.php" method="post">
                  <label for="first">
                        Username:
                  </label>
                  <input type="text" 
                         id="first" 
                         name="username" 
                         placeholder="Enter your Username" required>

                  <label for="password">
                        Password:
                  </label>
                  <input type="password"
                         id="password" 
                         name="password"
                         placeholder="Enter your Password" required>

                  <div class="wrap">
                        <button type="submit"
                                onclick="solve()" name=btn>
                              Login
                        </button>
                  </div>
            </form>
            <p>Not registered?
                  <a href="#"
                     style="text-decoration: none;">
                        Create an account
                  </a>
            </p>
      </div>




</body>

</html>
