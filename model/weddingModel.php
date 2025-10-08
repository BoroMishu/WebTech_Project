<?php
include 'C:/xampp/htdocs/event_organizer_and_management_portal/model/database.php';

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


    //save booking

function saveBooking($customer_name, $customer_email, $event_id) {
    $conn = getConnection();

    // Check if customer  exists
    $sql = "SELECT customer_id FROM customer_table 
            WHERE customer_email_address = '$customer_email' 
            AND customer_username = '$customer_name'";
    $result = mysqli_query($conn, $sql);

    if (!$result || mysqli_num_rows($result) == 0) {
        mysqli_close($conn);
        return ["message" => " Customer not found. Please check your name or email."];
    }

    $row = mysqli_fetch_assoc($result);
    $customer_id = $row['customer_id'];

    // Check if event exists
    $checkEvent = "SELECT event_id , event_status FROM event_table WHERE event_id = '$event_id' AND event_type='wedding'";
    $eventResult = mysqli_query($conn, $checkEvent);

    if (!$eventResult || mysqli_num_rows($eventResult) == 0) {
        mysqli_close($conn);
        return ["message" => "Invalid Event ID. Please select a valid event."];
    }
     $event = mysqli_fetch_assoc($eventResult);
    //check event status
    if ($event['event_status'] !== 'available') {
        mysqli_close($conn);
        return ["message" => " Sorry, this event is already booked and not available."];
    }


    // Insert booking record
    $insertBooking = "INSERT INTO booking_table (customer_id, event_id,booking_date) 
                      VALUES ('$customer_id', '$event_id',CURDATE())";

    if (mysqli_query($conn, $insertBooking)) {
        $updateStatus = "UPDATE event_table SET event_status = 'booked' WHERE event_id = '$event_id'";
        mysqli_query($conn, $updateStatus);
        $message = "Booking confirmed successfully!";
    } else {
        $message = " Error inserting booking: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    return ["message" => $message];
}
?>