<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location:login.php");
    if (isset($_COOKIE["username"])) 
    {
    setcookie("username", "", time() - 3600, "/");
    }
    if (isset($_COOKIE["role"])) 
    {
    setcookie("role", "", time() - 3600, "/");
    }

?>