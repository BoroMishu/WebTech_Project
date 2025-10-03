<?php
require_once ('C:/xampp/htdocs/event_organizer_and_management_portal/controller/weddingController.php');

$events = showWeddingEvents();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $customer_name  = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $event_id       = $_POST['event_id'];

    $result  = processBooking($customer_name, $customer_email, $event_id);
    $message = $result['message'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Wedding Events</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/external.css">
    <link rel="stylesheet" href="../css/table.css">
</head>

<body>
    <h1 style="text-align:center;">Wedding Events</h1>

    <?php if (!empty($message)): ?>
        <p style="text-align:center; color:red; font-weight:bold;"><?= $message ?></p>
    <?php endif; ?>

    <?php if (!empty($events)): ?>
        <table class="event-table">
            <tr>
                <th>Event ID</th>
                <th>Event Type</th>
                <th>Event Status</th>
                <th>Event Price</th>
            </tr>
            <?php foreach ($events as $row): ?>
                <tr>
                    <td><?= $row['event_id'] ?></td>
                    <td><?= $row['event_type'] ?></td>
                    <td><?= $row['event_status'] ?></td>
                    <td><?= $row['event_price'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p style="text-align:center;">No wedding events found.</p>
    <?php endif; ?><br><br>

    <div class="form-container" style="text-align:center;">
        <form action="" method="post">
            <label for="customer_name">Your Name:</label><br>
            <input type="text" id="customer_name" name="customer_name" required><br><br>

            <label for="customer_email">Your Email:</label><br>
            <input type="email" id="customer_email" name="customer_email" required><br><br>

            <label for="event_id">Select Event ID:</label><br>
            <input type="text" id="event_id" name="event_id" required><br><br>

            <button type="submit" name="submit" 
                style="padding:10px 20px; background:red; color:white; border:none; border-radius:5px; cursor:pointer;">
                Confirm Booking
            </button>
        </form>
    </div>
</body>
</html>
