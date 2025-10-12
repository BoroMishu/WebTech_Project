<?php
require_once 'C:/xampp/htdocs/event_organizer_and_management_portal/model/bookingModel.php';

function processBooking($customer_name, $customer_email, $event_id) {
    
    $customer_id = getCustomerId($customer_name, $customer_email);
    if (!$customer_id) {
        return "Customer not found. Please check your name or email.";
    }

    $event = getEventById($event_id);
    if (!$event) {
        return "Invalid Event ID. Please select a valid event.";
    }

    if ($event['event_status'] !== 'available') {
        return "Sorry, this event is already booked and not available.";
    }

    
    if (insertBooking($customer_id, $event_id)) {
        updateEventStatus($event_id, 'booked');
        return "Booking confirmed successfully!";
    } else {
        return "Error creating booking.";
    }
}
?>
