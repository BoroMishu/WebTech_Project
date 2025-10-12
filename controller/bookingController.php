<?php
require_once 'C:/xampp/htdocs/event_organizer_and_management_portal/model/bookingModel.php';

function processBooking($customer_name, $customer_email, $event_id) {
    return saveBooking($customer_name, $customer_email, $event_id);
}
?>