<?php
require_once("database.php");
function addNewCustomer($user_id, $username, $fullname, $email, $password, $gender, $contact_no)
{
    $conn = getConnection();
    $hashedPass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO customer_table (user_id, customer_username, customer_full_name, customer_email, customer_gender, customer_password, customer_contact_no) VALUES ( '{$user_id}', '{$username}', '{$fullname}', '{$email}', '{$gender}', '{$hashedPass}', '{$contact_no}')";
    $status = mysqli_query($conn, $sql);
    return $status;
    
}
function checkCustomerExists($username)
{
    $conn = getConnection();
    $sql = "SELECT * FROM customer_table WHERE customer_username='{$username}'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

?>