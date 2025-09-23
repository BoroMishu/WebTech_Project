<?php
    require_once("userController.php");
    $IdErr="";
    $passErr="";
    $hasErr=false;

    $userid="";
    $password="";

    if(($_SERVER["REQUEST_METHOD"]=="POST") && isset($_POST["submit"]))
    {
        if(empty($_POST["userid"]))
        {
            $IdErr="User id cannot be empty";
            $hasErr=true;

        }
        else
        {
            $userid=$_POST["userid"];
        }

        if(empty($_POST["password"]))
        {
            $passErr="password cannot be empty";
            $hasErr=true;

        }

        else
        {
            $password=$_POST["password"];
        }

        if($hasErr)
        {
            header("Location:../view/login.php?idErr=$IdErr&passErr=$passErr");
        }
       
        else
        {
            $returnedValue=validateUser($userid, $password);
            if(!$returnedValue)
            {
                header("Location:../view/login.php?invalidUser='Invalid User.'");
            }

             else
            {
                session_start();
                $_SESSION["userid"]=$returnedValue["Users_ID"];
                $_SESSION["role"]=$returnedValue["Users_Role"];

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
                
            }
        }
    }


?>