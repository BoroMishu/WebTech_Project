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
            header("Location:/webTech_project/view/login.php?usernameErr=$usernameErr&passErr=$passErr");
            exit();
        } 

        $returnedValue=validateUser($username, $password);
        if(!$returnedValue)
        {
            header("Location:/webTech_project/view/login.php?invalidUser=Invalid+User");
            exit();
        }
        else
        {
            $_SESSION["username"]=$returnedValue["username"];
            $_SESSION["role"]=$returnedValue["role_id"];
            
            if(isset($_POST["remeber"]))
            {
                setcookie("username", $returnedValue["username"], time() + (86400 * 7), "/");
                setcookie("role", $returnedValue["role_id"], time() + (86400 * 7), "/");
            }

            if($returnedValue["role_id"] ==1)
            {
<<<<<<< HEAD
                header("Location:/webTech_project/view/manager/manager.php");
                exit();
            }
            elseif($returnedValue["role_id"] ==2)
            {
                header("Location:/webTech_project/view/serviceprovider/serviceprovider.php");
                exit();
            }
            else
            {
                header("Location:/webTech_project/view/customer/customer.php");
                exit();
=======
                session_start();
                $_SESSION["userid"]=$returnedValue["user_id"];
                $_SESSION["role"]=$returnedValue["role"];

                if($returnedValue["role"]==1)
                {
                    
                    header("location:../view/manager/manager.php");
                }

                elseif($returnedValue["role"]==2)
                {
                    header("location:../view/serviceprovider/serviceprovider.php");
                }

                else
                {
                    header("location:../view/customer/customer.php");
                }
                
>>>>>>> 5ad9c817df71af0b1a8c7b23159c6600e545abd2
            }
        }
        var_dump($returnedValue);
        exit();
    }




?>
