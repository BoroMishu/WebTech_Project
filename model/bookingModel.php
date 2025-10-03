<?php
    require_once("database.php");


    function validateCustomer($name, $email) {
    $conn = getConnection();
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);

    $sql = "SELECT * FROM customer_table WHERE customer_username='$name' AND customer_email_address='$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    mysqli_close($conn);
    return $row;
    }

    function checkEvent($event_id) {
    $conn = getConnection();
    $event_id = (int)$event_id;

    $sql = "SELECT * FROM event_table WHERE event_id=$event_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    mysqli_close($conn);
    return $row; 
    }

    function createBooking($customer_id, $event_id) {
    $conn = getConnection();
    $customer_id = (int)$customer_id;
    $event_id = (int)$event_id;

    $sql = "INSERT INTO booking_table (customer_id, event_id, booking_date) VALUES ($customer_id, $event_id, CURDATE())";
    $success = mysqli_query($conn, $sql);

    mysqli_close($conn);
    return $success;}
?>