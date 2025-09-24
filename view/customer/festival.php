<?php
include 'C:/xampp/htdocs/event_organizer_and_management_portal/controller/festivalController.php';
$events = showFestivalEvents();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Festival Events</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/external.css">
    <link rel="stylesheet" href="../css/table.css">
</head>

<body>
    <h1 style="text-align:center;">Festival Events</h1>

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
        <p style="text-align:center;">No festival events found.</p>
    <?php endif; ?>
</body>
</html>
