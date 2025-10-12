<?php
require_once 'C:/xampp/htdocs/event_organizer_and_management_portal/model/database.php';

function getCustomerId($customer_name, $customer_email) {
    $conn = getConnection();
    $sql = "SELECT customer_id FROM customer_table 
            WHERE customer_username = '$customer_name' 
            AND customer_email_address = '$customer_email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['customer_id'];
    }
    return null;
}

function getEventById($event_id) {
    $conn = getConnection();
    $sql = "SELECT event_id, event_status FROM event_table WHERE event_id = '$event_id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return null;
}

function insertBooking($customer_id, $event_id) {
    $conn = getConnection();
    $sql = "INSERT INTO booking_table (customer_id, event_id, booking_date)
            VALUES ('$customer_id', '$event_id', CURDATE())";
    $res = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $res;
}

function updateEventStatus($event_id, $status) {
    $conn = getConnection();
    $sql = "UPDATE event_table SET event_status = '$status' WHERE event_id = '$event_id'";
    $res = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $res;
}
?>
