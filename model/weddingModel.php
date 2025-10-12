<?php
include 'C:/xampp/htdocs/event_organizer_and_management_portal/model/database.php';
include 'C:/xampp/htdocs/event_organizer_and_management_portal/controller/bookingController.php';
include 'C:/xampp/htdocs/event_organizer_and_management_portal/controller/bookingCancelController.php';

//fetch wedding events
function getWeddingEvents() {
    $conn = getConnection();
    $sql = "SELECT event_id, event_type, event_status, event_price 
            FROM event_table 
            WHERE event_type = 'wedding'";
    $result = mysqli_query($conn, $sql);

    $events = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $events[] = $row; 
        }
    }

    mysqli_close($conn);
    return $events;
}

?>