<?php
session_start();
require_once(__DIR__ . '/../model/serviceproviderModel.php');
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 2) {
    header("Location: ../view/login.php");
    exit();
}
$service_provider_id = $_SESSION["user_id"];
$services = getServices($service_provider_id);
$serviceTypeErr = "";
$servicePriceErr = "";
$hasErr = false;

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register_service"]))
{
    $service_type = trim($_POST["service"]);
    $service_price= trim($_POST["service_price"]);

    if(empty(trim($_POST["service_type"])))
    {
        $serviceTypeErr = "Service type cannot be empty";
        $hasErr = true;
    }

    if(empty(trim($_POST["service_price"]))) 
    {
        $servicePriceErr = "Service price cannot be empty";
        $hasErr = true;
    } 
    else 
    {
        $service_price = trim($_POST["service_price"]);
        if(!is_numeric($service_price)) 
            {
            $servicePriceErr = "Service price must be a number";
            $hasErr = true;
        }
    }

   
    if(!$hasErr)
    {
       $status = addService($service_provider_id, $service_type,$service_price);
       if($status) 
        {
            $_SESSION['success'] = "Service added successfully";
        }
        else { $_SESSION['error'] = "Failed to add service";}
        header("Location:../view/serviceprovider/registerservice.php");
    }
       
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_service"]))
{
    $service_id = $_POST["service_id"];
    $service_type = trim($_POST["service_type"]);
    $service_price = trim($_POST["service_price"]);

    if(empty($service_type) || !is_numeric($service_price))
    {
        $_SESSION['error'] = "Invalid input for update.";
        header("Location: ../view/serviceprovider/registerservice.php");
        
    }
}


if(isset($_GET['delete_service']))
{
    $service_id = $_GET['delete_service'];
    $status = deleteService($service_id);
    if($status) { $_SESSION['success'] = "Service deleted."; }
    else { $_SESSION['error'] = "Failed to delete service."; }
    header("Location: ../view/serviceprovider/registerservice.php");
    exit();
}
$services = getServices($service_provider_id);
$event = getUpcomingEvents();
$tasks = getProviderTasks($service_provider_id);
?>