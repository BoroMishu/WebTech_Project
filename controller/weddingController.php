<?php
include 'C:/xampp/htdocs/event_organizer_and_management_portal/model/weddingModel.php';

function showWeddingEvents() {
    return getWeddingEvents(); 
}

function processBooking($customer_name, $customer_email, $event_id) {
    return saveBooking($customer_name, $customer_email, $event_id);
}


?>
