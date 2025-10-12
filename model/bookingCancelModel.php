<?php
require_once 'C:/xampp/htdocs/event_organizer_and_management_portal/model/database.php';

function cancelBooking($customer_email, $event_id) {
    $conn = getConnection();

    // Step 1: Get customer ID from email
    $sqlCustomer = "SELECT customer_id FROM customer_table WHERE customer_email_address = '$customer_email'";
    $resCustomer = mysqli_query($conn, $sqlCustomer);

    if (!$resCustomer || mysqli_num_rows($resCustomer) == 0) {
        return " No customer found with this email.";
    }

    $row = mysqli_fetch_assoc($resCustomer);
    $customer_id = $row['customer_id'];

    // Step 2: Check if the booking exists
    $sqlCheck = "SELECT * FROM booking_table WHERE customer_id = '$customer_id' AND event_id = '$event_id'";
    $resCheck = mysqli_query($conn, $sqlCheck);

    if (!$resCheck || mysqli_num_rows($resCheck) == 0) {
        return "No booking found for this event.";
    }

    // Step 3: Delete the booking
    $sqlDelete = "DELETE FROM booking_table WHERE customer_id = '$customer_id' AND event_id = '$event_id'";
    if (mysqli_query($conn, $sqlDelete)) {

     // Step 4: Update event status
        $sqlUpdate = "UPDATE event_table SET event_status = 'available' WHERE event_id = '$event_id'";
        mysqli_query($conn, $sqlUpdate);
        return "Booking canceled successfully!";
    } else {
        return "Error canceling booking.";
    }
}
?>
