<?php
    require_once("../model/bookingModel.php");

// Function to handle booking submission
function processBooking($name, $email, $event_id) {
    // 1. Validate customer
    $customer = validateCustomer($name, $email);
    if (!$customer) {
        return ["status" => false, "message" => "Invalid customer name or email."];
    }

    // 2. Check event
    $event = checkEvent($event_id);
    if (!$event) {
        return ["status" => false, "message" => "Invalid event ID."];
    }

    // 3. Insert booking
    $success = createBooking($customer['customer_id'], $event_id);
    if ($success) {
        return ["status" => true, "message" => "Booking successful!"];
    } else {
        return ["status" => false, "message" => "Booking failed. Try again."];
    }
}
?>    

