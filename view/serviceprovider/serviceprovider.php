<?php
session_start();
    if(isset($_SESSION["username"]))
    {
        if($_SESSION["role"]==2)
        {
            
        }

        else
        {
            header("Location:../login.php");
        }

        

    }

    else
    {
        header("Location:../login.php");
    }


?>
<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <h1>Service Provider Dashboard</h1>
        

    </body>
</html>
