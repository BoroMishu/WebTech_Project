<?php
include 'C:/xampp/htdocs/event_organizer_and_management_portal/model/database.php';

// Get all sp
function getAllServiceProviders() {
    $conn = getConnection();
    $sql = "SELECT service_provider_id, service_provider_username, service_provider_name, service_provider_gender, service_provider_email, service_provider_contact_no FROM service_provider_table";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

// Add new sp
function addServiceProvider($spId, $username, $fullname, $gender, $email, $contact, $password, $managerId, $userId) {
    $conn = getConnection();
    $sql = "INSERT INTO service_provider_table 
            (service_provider_id, service_provider_username, service_provider_name, service_provider_gender, service_provider_email, service_provider_contact_no, service_provider_password, manager_id, user_id) 
            VALUES ('$spId', '$username', '$fullname', '$gender', '$email', '$contact', '$password', '$managerId', '$userId')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return "Add Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    return true;
}

// Update sp
function updateServiceProvider($spId, $username, $fullname, $gender, $email, $contact, $password, $managerId, $userId) {
    $conn = getConnection();
    $sql = "UPDATE service_provider_table SET 
            service_provider_username='$username',
            service_provider_name='$fullname',
            service_provider_gender='$gender',
            service_provider_email='$email',
            service_provider_contact_no='$contact',
            service_provider_password='$password',
            manager_id='$managerId',
            user_id='$userId'
            WHERE service_provider_id='$spId'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return "Update Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    return true;
}

// Delete sp
function deleteServiceProvider($spId) {
    $conn = getConnection();
    $sql = "DELETE FROM service_provider_table WHERE service_provider_id='$spId'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return "Delete Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    return true;
}
?>
