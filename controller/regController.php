<?php
require_once("../model/newuserModel.php");

$fullnameErr="";
$usernameErr="";
$emailErr="";   
$npasswordErr="";
$cpasswordErr="";
$genderErr="";
$contactErr="";

$hasErr=false;

$fullname="";
$username="";
$email="";
$npassword="";
$cpassword="";
$gender="";
$contactno="";
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
{
    if(empty(trim($_POST["username"])))
    {
        $usernameErr="User name cannot be empty";
        $hasErr=true;

    }
    else
    {
        $username=trim($_POST["username"]);
        if(checkCustomerExists($username))
        {
            $usernameErr="Username already exists";
            $hasErr=true;
        }
    }
    if(empty(trim($_POST["fullname"])))
    {
        $fullnameErr="Full name cannot be empty";
        $hasErr=true;

    }
    else
    {
        $fullname=trim($_POST["fullname"]);
    }
    if(!filter_var(trim($_POST["email"]),FILTER_VALIDATE_EMAIL))
    {
        $emailErr="Email cannot be empty";
        $hasErr=true;  
    }
   
    else
    {
        $email=trim($_POST["email"]);

    }

    if(empty(trim($_POST["contactno"])))
    {
        $contactErr="Contact No cannot be empty";
        $hasErr=true;
    }
    else if(!is_numeric($_POST["contactno"]))
    {
        $contactErr="Contact No must be numeric";
        $hasErr=true;
    }
    else if(strlen($_POST["contactno"])!=11)
    {
        $contactErr="Contact No must be 11 digits";
        $hasErr=true;
    }
    else
    {
        $contactno=trim($_POST["contactno"]);
    }
    if(empty(trim($_POST["npassword"])))
    {
        $npasswordErr="New password cannot be empty";
        $hasErr=true;
    }
    else
    {
        $npassword=trim($_POST["npassword"]);
    }
    if(empty(trim($_POST["cpassword"])))
    {
        $cpasswordErr="Confirm password cannot be empty";
        $hasErr=true;
    }
    else if(trim($_POST["npassword"])!=trim($_POST["cpassword"]))
    {
        $cpasswordErr="New password and Confirm password must be same";
        $hasErr=true;
    }
    else
    {
        $cpassword=trim($_POST["cpassword"]);
    }
    if(empty($_POST["gender"]))
    {
        $genderErr="Select your gender please";
        $hasErr=true;
    }
    else
    {
        $gender=trim($_POST["gender"]);
    }
    if(!$hasErr)
    {
       
    
    
        $user_id=3;
        $result=addNewCustomer($user_id, $username, $fullname, $email, $npassword, $gender, $contactno);
        if($result)
        {   
            header("Location: /webTech_project/view/login.php?success1");
            exit();
        }
        else
        {
            echo "Error while registering";
        }
    
    }

}
?>

