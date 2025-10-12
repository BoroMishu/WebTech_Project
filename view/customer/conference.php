<?php
include 'C:/xampp/htdocs/event_organizer_and_management_portal/controller/conferenceController.php';
$events = showConferenceEvents();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $customer_name  = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $event_id       = $_POST['event_id'];

    $message = processBooking($customer_name, $customer_email, $event_id);

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Corporate Conference Events</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/external.css">
    <link rel="stylesheet" href="../css/table.css">
</head>

<body>

 <!-- Back Button -->
     <div>
      <button type="button" name="button" class="backButton"
        onclick="window.location.href='customerServices.php'">Back</button>
    </div>
    
    <h1 style="text-align:center;">Corporate Conference Events</h1>

 <!-- For show message -->
    <?php if (!empty($message)): ?>
        <p style="text-align:center; color:red; font-weight:bold;"><?= $message ?></p>
    <?php endif; ?>

 <!-- event table show -->
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
        <p style="text-align:center;">No conference events found.</p>
    <?php endif; ?>
    <!-- booking form -->
    <div class="form-container" style="text-align:center;">
        <form action="" method="post">
            <label for="customer_name">Your User Name:</label><br>
            <input type="text" id="customer_name" name="customer_name" required><br><br>

            <label for="customer_email">Your Email:</label><br>
            <input type="email" id="customer_email" name="customer_email" required><br><br>

            <label for="event_id">Select Event ID:</label><br>
            <input type="text" id="event_id" name="event_id" required><br><br>

            <button type="submit" name="submit" class="confirmbutton"> Confirm Booking</button>  
        </form>
    </div>
</body>
</html>
