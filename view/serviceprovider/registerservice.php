<?php

require_once("../../controller/registerserviceController.php")

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Service Provider Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/event_organizer_and_management_portal/view/css/external.css">
        <link rel="stylesheet" href="/event_organizer_and_management_portal/view/css/serviceprovider.css">
        <link rel="stylesheet" href="/event_organizer_and_management_portal/view/css/table.css">
        <script src="/event_organizer_and_management_portal/view/js/serviceprovider.js" defer></script>
        

    </head>
    <body>
        <div class="dashboard-container">
            <nav class="sidebar-nav">
                <div class="logo">EventM</div> 
                <h3 style="color:white" display>Dashboard</h3>
                <ul>
                <li><a href="/event_organizer_and_management_portal/view/serviceprovider/serviceprovider.php">Dashboard</a></li><br>
                <li><a href="/event_organizer_and_management_portal/view/serviceprovider/tasktrack.php">Track Tasks</a></li><br>
                <li><a href="/event_organizer_and_management_portal/view/serviceprovider/upcomingevent.php">View Upcoming Events</a></li><br>
                <li><a href="/event_organizer_and_management_portal/view/serviceprovider/registerservice.php">Register Service</a></li><br>
                <li class="logout-item"><a href="../logout.php">Logout</a></li>
                </ul>  
            </nav>    
            <form action="/event_organizer_and_management_portal/controller/registerserviceController.php" method="POST">
                <h2>Register Service & Set Price</h2>
                <label for="service_type">Service Type:</label>
                <input type="text" id="service_type" name="service_type" required><br><br>
                <label for="service_price">Service Price:</label>
                <input type="number" id="service_price" name="service_price" required><br><br>

                <input type="submit" value="Register Service">
            </form>
            <h3>Your Services</h3>
    <table class="event-table">
    <tr><th>ID</th><th>Type</th><th>Price</th><th>Actions</th></tr>
    <?php foreach($services as $service): ?>
    <tr>
        <td><?php echo $service['service_id']; ?></td>
        <td>
            <form action="../../controller/serviceProviderController.php" method="POST" style="display:inline-block;">
                <input type="hidden" name="service_id" value="<?php echo $service['service_id']; ?>">
                <input type="text" name="service_type" value="<?php echo htmlspecialchars($service['service_type']); ?>" required>
        </td>
        <td>
                <input type="text" name="service_price" value="<?php echo htmlspecialchars($service['service_price']); ?>" required>
        </td>
        <td>
                <button type="submit" name="update_service">Update</button>
            </form>
            <a href="../../controller/serviceProviderController.php?delete_service=<?php echo $service['service_id']; ?>" onclick="return confirm('Delete this service?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
                

            
        </div>
    </body>
</html>