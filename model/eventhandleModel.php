<?php
include 'C:/xampp/htdocs/event_organizer_and_management_portal/model/database.php';

function getAllEvents() {
    $conn = getConnection();
    $sql = "SELECT Event_ID, Event_type, Event_Status, Event_Price FROM event_table";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function addEvent($eventId, $eventType, $status, $price, $managerId) {
    $conn = getConnection();
    $sql = "INSERT INTO event_table (Event_ID, Event_type, Event_Status, Event_Price, Manager_ID) 
            VALUES ('$eventId', '$eventType', '$status', '$price', '$managerId')";
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        echo "Add Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    return $res;
}

function updateEvent($eventId, $eventType, $status, $price, $managerId) {
    $conn = getConnection();
    $sql = "UPDATE event_table 
            SET Event_type='$eventType', Event_Status='$status', Event_Price='$price', Manager_ID='$managerId' 
            WHERE Event_ID='$eventId'";
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        echo "Update Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    return $res;
}

function deleteEvent($eventId) {
    $conn = getConnection();
    $sql = "DELETE FROM event_table WHERE Event_ID='$eventId'";
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        echo "Delete Error: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    return $res;
}
?>