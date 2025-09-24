<?php
    require_once("database.php");

    function validateUsers($id, $pass)
    {
        $conn=getConnection();
        $sql="SELECT * FROM users_table WHERE user_id='$id' AND password='$pass'";
        $result=mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($result);
        return $row;
    }

?>