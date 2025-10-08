<?php
session_start();
require_once("userController.php");

$usernameErr = "";
$passErr = "";
$hasErr = false;
$username = "";
$password = "";

if($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["submit"]))
    {
        if (empty(trim($_POST["username"])))
        {
            $usernameErr= "User name cannot be empty";
            $hasErr=true;
        }
        else
        {
            $username= ($_POST["username"]);
        }

        if (empty(trim($_POST["password"])))
        {
            $passErr= "Password cannot be empty";
            $hasErr=true;
        }
        else
        {
            $password= ($_POST["password"]);
        }

        if ($hasErr)
        {
            header("Location:/event_organizer_and_management_portal/view/login.php?usernameErr=$usernameErr&passErr=$passErr");
            
        } 

        $returnedValue=validateUser($username, $password);
        if(!$returnedValue)
        {
            header("Location:/event_organizer_and_management_portal/view/login.php?invalidUser=Invalid+User");
            
        }
        else
        {
            $_SESSION["username"]=$returnedValue["username"];
            $_SESSION["role"]=$returnedValue["role"];
            
            if(isset($_POST["remember"]))
            {
                setcookie("username", $returnedValue["username"], time() + (86400 * 7), "/");
                setcookie("role", $returnedValue["role"], time() + (86400 * 7), "/");
            }
            
            

            if($returnedValue["role"] ==1)
            {
                header("Location:/event_organizer_and_management_portal/view/manager/manager.php");
                
            }
            elseif($returnedValue["role"] ==2)
            {
                header("Location:/event_organizer_and_management_portal/view/serviceprovider/serviceprovider.php");
                
            }
            else
            {
                header("Location:/event_organizer_and_management_portal/view/customer/customer.php");
                
            }
            var_dump($returnedValue);
        }
        
    }

?>