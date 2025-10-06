<?php
    require_once("../model/userModel.php");

    function validateUser($name, $pass)
    {
        return validateUsers($name, $pass);
    }

?>