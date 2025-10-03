<?php
include 'C:/xampp/htdocs/event_organizer_and_management_portal/model/database.php';

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

function saveBooking($customer_name, $customer_email, $event_id) {
    $conn = getConnection();

    // Step 1: Check if customer already exists
    $sql = "SELECT customer_id FROM customer_table WHERE customer_email_address = '$customer_email'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $customer_id = $row['customer_id'];
    } else {
        // Step 2: Insert new customer if not exists
        $insertCustomer = "INSERT INTO customer_table (customer_username, customer_email_address) 
                           VALUES ('$customer_name', '$customer_email')";
        if (mysqli_query($conn, $insertCustomer)) {
            $customer_id = mysqli_insert_id($conn);
        } else {
            return ["message" => " Error inserting customer: " . mysqli_error($conn)];
        }
    }

    // Step 3: Insert booking record
    $insertBooking = "INSERT INTO booking_table (customer_id, event_id) 
                      VALUES ('$customer_id', '$event_id')";
    if (mysqli_query($conn, $insertBooking)) {
        $message = " Booking confirmed successfully!";
    } else {
        $message = " Error inserting booking: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    return ["message" => $message];
}
?>
