<?php
require_once 'C:/xampp/htdocs/event_organizer_and_management_portal/model/bookingCancelModel.php';

function handleCancelBooking($email, $event_id) {
    return cancelBooking($email, $event_id);
}
?>
