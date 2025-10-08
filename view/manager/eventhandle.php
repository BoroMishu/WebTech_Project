<?php
include 'C:/xampp/htdocs/event_organizer_and_management_portal/controller/eventhandleController.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manager Event Handle</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/event_organizer_and_management_portal/view/css/external.css">
    <link rel="stylesheet" href="/event_organizer_and_management_portal/view/css/manager.css">
    <link rel="stylesheet" href="/event_organizer_and_management_portal/view/css/table.css">

</head>

<body>
<div class="dashboard-container">

    <nav class="sidebar-nav">
        <div class="logo">EventM</div> 
        <ul>
            <li><a href="manager.php">Dashboard</a></li>
            <li><a href="eventhandle.php">Events Handle</a></li>
            <li><a href="manageSp.php">Manage ServiceProvider</a></li>
            <li><a href="Bookinghistory.php">Booking History</a></li>
            <li class="logout-item"><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>

    <div style="margin-left:250px; padding:20px;">
        <?php if (!empty($message)): ?>
            <p style="color: red; font-weight: bold;"><?= $message ?></p>
        <?php endif; ?>

        <form method="post" action="">
            <label for="eventId">Event ID:</label>
            <input type="text" id="eventId" name="eventId"><br><br>

            <label for="eventType">Event Type:</label>
            <input type="text" id="eventType" name="eventType"><br><br>

            <label for="status">Status:</label>
            <select name="status">
                <option value="available">Available</option>
                <option value="booked">Booked</option>
            </select><br><br>

            <label for="price">Event Price:</label>
            <input type="text" id="price" name="price"><br><br>

            <label for="managerId">Manager ID:</label>
            <input type="text" id="managerId" name="managerId"><br><br>

            <button class="updatebtn" name="update">Update</button>
            <button class="addbtn" name="add">Add</button>
            <button class="deletebtn" name="delete">Delete</button>
        </form><br><br>

        <?php
        if (mysqli_num_rows($events) > 0) {
            echo "<table class='eventhandle-table'>";
            echo "<tr><th>Event ID</th><th>Event Type</th><th>Status</th><th>Price</th></tr>";
            while ($row = mysqli_fetch_assoc($events)) {
                echo "<tr>
                        <td>{$row['event_id']}</td>
                        <td>{$row['event_type']}</td>
                        <td>{$row['event_status']}</td>
                        <td>{$row['event_price']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No events found.";
        }
        ?>
    </div>
</div>
</body>
</html>
