<?php
require_once 'C:/xampp/htdocs/event_organizer_and_management_portal/model/database.php';

function getCustomerIdByName($customer_name) {
    $conn = getConnection();
    $sql = "SELECT customer_id FROM customer_table WHERE customer_username = '$customer_name'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['customer_id'];
    }
    return null;
}

function bookingExists($customer_id, $event_id) {
    $conn = getConnection();
    $sql = "SELECT * FROM booking_table WHERE customer_id = '$customer_id' AND event_id = '$event_id'";
    $result = mysqli_query($conn, $sql);

    return ($result && mysqli_num_rows($result) > 0);
}

function deleteBooking($customer_id, $event_id) {
    $conn = getConnection();
    $sql = "DELETE FROM booking_table WHERE customer_id = '$customer_id' AND event_id = '$event_id'";
    return mysqli_query($conn, $sql);
}

function updateEventStatusToAvailable($event_id) {
    $conn = getConnection();
    $sql = "UPDATE event_table SET event_status = 'available' WHERE event_id = '$event_id'";
    return mysqli_query($conn, $sql);
}
?>
