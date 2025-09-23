<?php
 session_start();
    if(isset($_SESSION["userid"]))
    {
        if($_SESSION["role"]==1)
        {
            header("Location:manager/manager.php");
        }

        elseif($_SESSION["role"]==2)
        {
            header("Location:serviceprovider/serviceprovider.php");
        }

        else
        {
             header("Location:customer/customer.php");   
        }

    }

    else
    {

    }


?>

<!doctype html>
<html>
    <head></head>
    <body>
        <form action="../controller/authController.php" method="POST">
            <label for="userid">User ID</label>
            <input type="text" name="userid"><br>
            <span name="userIderr" style="color:red;"><?php if(isset($_GET["idErr"])){echo $_GET["idErr"]; } ?></span><br>

            <label for="password">Password: </label>
            <input type="text" name="password"><br>
            <span name="passerr" style="color:red;"><?php if(isset($_GET["passErr"])){echo $_GET["passErr"]; } ?></span><br>

            <input type="submit" name="submit" value="login">
            <span name="invalidUser" style="color:red;"><?php if(isset($_GET["invalidUser"])){echo $_GET["invalidUser"]; } ?></span>
        </form>    
    </body>
</html>
