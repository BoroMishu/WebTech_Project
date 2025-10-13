<?php
    $host="127.0.0.1";
    $dbname="event_management_portal";
    $user="root";
    $pass="";
    $port="4306";


    function getConnection()
    {
        global $host;
        global $user;
        global $pass;
        global $dbname;
        global $port;

        $conn=mysqli_connect($host,$user,$pass,$dbname,$port);
        if(!$conn)
        {
            die("Database Connection Error: ".mysqli_connect_error());
        }
        return $conn;
    }


?>
