<?php
    require_once("database.php");

    function validateUsers($name, $pass)
    {
        $con=getConnection();
        $sql="SELECT * FROM users_table WHERE username='$name' AND users_password='$pass'";
        $result=mysqli_query($con, $sql);
        $row=mysqli_fetch_assoc($result);
        return $row;
    }

?>