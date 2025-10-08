<?php
include 'C:/xampp/htdocs/event_organizer_and_management_portal/model/database.php';

function getAllEvents() {
    $conn = getConnection();
    $sql = "SELECT event_id, event_type, event_status, event_price FROM event_table";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function addEvent($eventId, $eventType, $status, $price, $managerId) {
    $conn = getConnection();
    $sql = "INSERT INTO event_table (event_id, event_type, event_status, event_price, manager_id)
            VALUES ('$eventId', '$eventType', '$status', '$price', '$managerId')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return "Add Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    return true;
}

function updateEvent($eventId, $eventType, $status, $price, $managerId) {
    $conn = getConnection();
    $sql = "UPDATE event_table 
            SET event_type='$eventType', event_status='$status', event_price='$price', manager_id='$managerId' 
            WHERE event_id='$eventId'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return "Update Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    return true;
}

function deleteEvent($eventId) {
    $conn = getConnection();
    $sql = "DELETE FROM event_table WHERE event_id='$eventId'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return "Delete Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    return true;
}
?>
