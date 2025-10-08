<?php
session_start();
if(!isset($_SESSION["username"])&&isset($_COOKIE["username"]))
{
    $_SESSION["username"]=$_COOKIE["username"];
    $_SESSION["role"]=$_COOKIE["role"];

    if($_SESSION["role"] == 1)
    {
        header("Location:manager/manager.php");
        
    }
    elseif($_SESSION["role"] == 2)
    {
        header("Location:serviceprovider/serviceprovider.php");
        
    }
    elseif($_SESSION["role"] == 3)
    {
        header("Location:customer/customer.php");
        
    }
    
}
if(isset($_SESSION["username"]))
{
    if($_SESSION["role"] == 1)
    {
        header("Location:manager/manager.php");
        
    }
    elseif($_SESSION["role"] == 2)
    {
        header("Location:serviceprovider/serviceprovider.php");
        
    }
    elseif($_SESSION["role"] == 3)
    {
        header("Location:customer/customer.php");
        
    }
    
}
?>

<!doctype html>
<html>
    <head>
        <title>Login Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/event_organizer_and_management_portal/view/css/external.css">
        <link rel="stylesheet" href="/event_organizer_and_management_portal/view/css/login.css">
        
        <script src="/event_organizer_and_management_portal/view/js/login.js" defer></script>
    </head>
    <body>
        <form action="/event_organizer_and_management_portal/controller/authController.php" method="POST">

        <div class="container">

        <div class="form-box active" id="login-box">

        <h2>Login</h2>
        <input type="text" class="input" id="userName" name="username" placeholder="User Name" ><br>
        <span name="usernameErr" style="color:red;"><?php if(isset($_GET["usernameErr"])){echo $_GET["usernameErr"]; } ?></span><br>

        <input type="password" class="input" id="password" name="password"  placeholder="Password" ><br>
        <span name="passErr" style="color:red;"><?php if(isset($_GET["passErr"])){echo $_GET["passErr"]; } ?></span><br>

        <span name="invalidUser" style="color:red;"><?php if(isset($_GET["invalidUser"])){echo $_GET["invalidUser"]; } ?></span><br>
        <input type="checkbox" class="check-box" id="showpassword" name="showpassword">Show Password<br>

        <button type="submit" class="btn" name="submit">Login</button>

        <input type="checkbox" class="check-box" id="remember" name="remember">Remember me<br>

        <p id="re"><a href="/event_organizer_and_management_portal/view/forgetPass.php">Forgot Password?</a></p>
        <p id="re">Don't have an account? <a href="/event_organizer_and_management_portal/view/registration.php">Register</a></p>
        
            </div>
            </div>  
        </form>    
    </body>
</html>
