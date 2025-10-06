<?php
include 'C:/xampp/htdocs/event_organizer_and_management_portal/model/eventhandleModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventId = $_POST['eventId'];
    $eventType = $_POST['eventType'];
    $status = $_POST['status'];
    $price = $_POST['price'];
    $managerId = $_POST['managerId'];

    if (isset($_POST['add'])) {
        if ($eventId && $eventType && $status && $price && $managerId) {
            addEvent($eventId, $eventType, $status, $price, $managerId);
        } else {
            echo "All fields are required for adding an event.";
        }
    }

    if (isset($_POST['update'])) {
        updateEvent($eventId, $eventType, $status, $price, $managerId);
    }

    if (isset($_POST['delete'])) {
        deleteEvent($eventId);
    }

    
    header("Location: ../view/eventhandle.php");
    exit;
}
?>