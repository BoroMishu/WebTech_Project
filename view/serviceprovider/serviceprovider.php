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


    echo "<h1>Welcome Service Provider.</h1><br>";

    echo "<a href='../logout.php'>logout</a>";

?>

<doctype html>
    <html>
        <head>
            <title>Service Provider</title>
        </head>

        <body>
            <h3>Service Provider Page</h3>
        </body>
    </html>