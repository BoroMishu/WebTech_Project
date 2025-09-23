<?php
session_start();
    if(isset($_SESSION["userid"]))
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
