<?php
include 'C:/xampp/htdocs/event_organizer_and_management_portal/model/database.php';

function getFestivalEvents() {
    $conn = getConnection();
    $sql = "SELECT event_id, event_type, event_status, event_price 
            FROM event_table 
            WHERE event_type = 'festival'";
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
