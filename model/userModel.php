<?php
    require_once("database.php");

    function validateUsers($id, $pass)
    {
        $conn=getConnection();
        $sql="SELECT * FROM users_table WHERE Users_ID='$id' AND Users_Password='$pass'";
        $result=mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($result);
        return $row;
    }

?>