<?php
include 'C:/xampp/htdocs/event_organizer_and_management_portal/model/eventhandleModel.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventId = $_POST['eventId'] ?? '';
    $eventType = $_POST['eventType'] ?? '';
    $status = $_POST['status'] ?? '';
    $price = $_POST['price'] ?? '';
    $managerId = $_POST['managerId'] ?? '';

    // ADD
    if (isset($_POST['add'])) {
        if ($eventId && $eventType && $status && $price && $managerId) {
            $result = addEvent($eventId, $eventType, $status, $price, $managerId);
            $message = ($result === true) ? "Event added successfully." : $result;
        } else {
            $message = "All fields are required for adding an event.";
        }
    }

    // UPDATE
    if (isset($_POST['update'])) {
        $result = updateEvent($eventId, $eventType, $status, $price, $managerId);
        $message = ($result === true) ? "Event updated successfully." : $result;
    }

    // DELETE
    if (isset($_POST['delete'])) {
        $result = deleteEvent($eventId);
        $message = ($result === true) ? "Event deleted successfully." : $result;
    }
}

$events = getAllEvents();
?>
