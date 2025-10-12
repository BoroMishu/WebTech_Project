<?php
require_once 'C:/xampp/htdocs/event_organizer_and_management_portal/model/bookingCancelModel.php';

function handleCancelBooking($customer_name, $event_id) {

    
    $customer_id = getCustomerIdByName($customer_name);
    if (!$customer_id) {
        return "Customer not found. Please check your username.";
    }


    if (!bookingExists($customer_id, $event_id)) {
        return "No booking found .";
    }

    if (deleteBooking($customer_id, $event_id)) {
        updateEventStatusToAvailable($event_id);
        return "Booking canceled successfully!";
    } else {
        return "Error canceling booking.";
    }
}
?>
