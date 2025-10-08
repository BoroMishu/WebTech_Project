<?php
include 'C:/xampp/htdocs/event_organizer_and_management_portal/model/manageSpModel.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $spId = $_POST['spId'] ?? '';
    $username = $_POST['username'] ?? '';
    $fullname = $_POST['fullname'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $email = $_POST['email'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $password = $_POST['password'] ?? '';
    $managerId = $_POST['managerId'] ?? '';
    $userId = $_POST['userId'] ?? '';

    // add
    if (isset($_POST['add'])) {
        if ($spId && $username && $fullname && $gender && $email && $contact && $password && $managerId && $userId) {
            $result = addServiceProvider($spId, $username, $fullname, $gender, $email, $contact, $password, $managerId, $userId);
            $message = ($result === true) ? "Service Provider added successfully." : $result;
        } else {
            $message = "All fields are required for adding a service provider.";
        }
    }

    // update
    if (isset($_POST['update'])) {
        $result = updateServiceProvider($spId, $username, $fullname, $gender, $email, $contact, $password, $managerId, $userId);
        $message = ($result === true) ? "Service Provider updated successfully." : $result;
    }

    // delete
    if (isset($_POST['delete'])) {
        $result = deleteServiceProvider($spId);
        $message = ($result === true) ? "Service Provider deleted successfully." : $result;
    }
}


$serviceProviders = getAllServiceProviders();
?>
