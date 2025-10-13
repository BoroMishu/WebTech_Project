<?php
session_start();
require_once("/event_organizer_and_management_portal/model/serviceproviderModel.php");
$service_provider_id = $_SESSION["user_id"];
$serviceTypeErr = "";
$servicePriceErr = "";
$hasErr = false;

$service_type = "";
$service_price = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty(trim($_POST["service_type"])))
    {
        $serviceTypeErr = "Service type cannot be empty";
        $hasErr = true;
    }
    else
    {
        $service_type = trim($_POST["service_type"]);
    }
    if(empty(trim($_POST["service_price"])))
    {
        $servicePriceErr = "Service price cannot be empty";
        $hasErr = true;
    }
    else if(!is_numeric($service_price))
    {
        $servicePriceErr = "Service price must be a number";
        $hasErr = true;
    }
    else
    {
        $service_price = trim($_POST["service_price"]);
    }
    if(!$hasErr)
    {
        if(addService($service_provider_id, $service_type, $service_price))
            $_SESSION['success'] = "Service added successfully!";
        else
            $_SESSION['error'] = "Failed to add service.";
        header("Location: ../view/serviceProvider.php");
        exit();
    }
       
}
if(isset($_POST['update_service']))
{
    $service_id = $_POST['service_id'];
    $service_type = trim($_POST['service_type']);
    $service_price = trim($_POST['service_price']);

    if(updateService($service_id, $service_type, $service_price))
        $_SESSION['success'] = "Service updated successfully!";
    else
        $_SESSION['error'] = "Failed to update service.";
    header("Location: ../view/serviceProvider.php");
    exit();
}

if(isset($_GET['delete_service']))
{
    $service_id = $_GET['delete_service'];
    if(deleteService($service_id))
        $_SESSION['success'] = "Service deleted successfully!";
    else
        $_SESSION['error'] = "Failed to delete service.";
    header("Location: ../view/serviceProvider.php");
    exit();
}
$services = getServices($service_provider_id);
?>