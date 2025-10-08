<?php
    require_once("database.php");

    function validateUsers($name, $pass)
    {
        $conn=getConnection();
        $sql="SELECT * FROM users_table WHERE username='$name' AND password='$pass' ";
        $result=mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

?>