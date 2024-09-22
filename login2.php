



<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Login and Registration Form in HTML & CSS | CodingLab </title>
    <link rel="stylesheet" href="style2.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>



  <div class="container">

  <?php
  
if(isset($_POST['btn']))
{

 $name=$_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['pass'];
  $rpass=$_POST['rpass'];

    $passhash=password_hash($password,PASSWORD_DEFAULT);

    $error=array();
    if(empty($name) OR empty($email) OR empty($password) OR empty($rpass))

    {
        array_push($error,"All field are required");
    }

    //Apply email filter

    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        array_push($error,"Email is not valid");
    }
    if(strlen($password)<8)
    {
         array_push($error,"<font color=red>Password Atleast 8 character</font>");
    }
//check pass and confirm pass


    if($password!==$rpass)
    {
        array_push($error,"<font color=red>Password does not match</font>");
    }

    require_once "database.php";

    //validate email already exist

    $sql="select * from user where Email='$email'";
    $result=mysqli_query($conn,$sql);
    $rowcount=mysqli_num_rows($result);
    if($rowcount>0)
    {
        array_push($error,"<font color=red>Email Already Exist</font>");
    }
// this section



    if(count($error)>0)
    {
        foreach($error as $errors)
        {
            echo "<div class='alert alert-danger'>$errors</div>";
        }
    }
    else{
        
        $sql="insert into user(name,Email,password)values(?,?,?)";
        $stmt=mysqli_stmt_init($conn);
        $preparestmt=mysqli_stmt_prepare($stmt,$sql);

        if($preparestmt)
        {
            mysqli_stmt_bind_param($stmt,"sss",$name,$email,$password);
            mysqli_stmt_execute($stmt);
            echo "<h2><font color=green>Registered Sucessfully!</font></h2>";
        }

        else{
            echo "Somthing went wrong";
        }


    }


}

//login page code

if(isset($_POST['btn1']))
{
    $conn=mysqli_connect("localhost","root","","mynewdata");
   
    $username=$_POST['email'];
    $password=$_POST['pass'];

    $username=stripcslashes($username);
    $password=stripcslashes($password);


    $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select *from user where Email = '$username' and password = '$password'"; 
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><font color=green> Login successful!</font></h1>";  
        }  
        else{  
            echo "<h4><font color=red> Login failed. Invalid username or password!.</font></h4>";  
        }  
        

}

?>
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="f1.jpg" alt="first">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="second.jpg" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form action="login2.php" method=post>
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="pass" placeholder="Enter your password" required>
              </div>
              <div class="text"><a href="#">Forgot password?</a></div>
              <div class="button input-box">
                <input type="submit" name="btn1" value="Login">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
            </div>
        </form>
      </div>
        <div class="signup-form">
          <div class="title">Signup</div>
        <form action="login2.php" method=post>
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="name" placeholder="Enter your name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="pass" placeholder="Enter your password" required>
              </div>


              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="rpass" placeholder="Enter Confirm password" required>
              </div>


              <div class="button input-box">
                <input type="submit" name="btn" value="Register">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
</body>
</html>