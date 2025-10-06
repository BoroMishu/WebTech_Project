<?php
    $host="127.0.0.1";
    $dbname="event_management_portal";
    $user="root";
    $pass="";
<<<<<<< HEAD
    $port="4306";
=======
    $db="event_management_portal";
    $port="3306";
>>>>>>> 5ad9c817df71af0b1a8c7b23159c6600e545abd2


    function getConnection()
    {
        global $host;
        global $user;
        global $pass;
        global $dbname;
        global $port;

        $conn=mysqli_connect($host,$user,$pass,$dbname,$port);
        return $conn;
    }


?>
