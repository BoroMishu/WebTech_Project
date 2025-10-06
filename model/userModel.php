<?php
    require_once("database.php");

    function validateUsers($name, $pass)
    {
<<<<<<< HEAD
        $con=getConnection();
        $sql="SELECT * FROM users_table WHERE username='$name' AND users_password='$pass'";
        $result=mysqli_query($con, $sql);
=======
        $conn=getConnection();
        $sql="SELECT * FROM users_table WHERE user_id='$id' AND password='$pass'";
        $result=mysqli_query($conn, $sql);
>>>>>>> 5ad9c817df71af0b1a8c7b23159c6600e545abd2
        $row=mysqli_fetch_assoc($result);
        return $row;
    }

?>