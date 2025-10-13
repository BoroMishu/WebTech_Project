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
            <h2>Upcoming Events</h2>
            <button id="refresh-btn">Refresh</button>
            <table class="event-table">
                <tr>
                    <th>ID</th>
                    <th>Event Name</th>
                    <th>Status</th>
                    <th>Price</th>
                </tr>
                <?php while($row=$events->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row["event_id"]; ?></td>
                    <td><?php echo $row["event_name"]; ?></td>
                    <td><?php echo $row["event_status"]; ?></td>
                    <td><?php echo $row["event_price"]; ?></td>
                </tr>
                <?php } ?>
            </table>

                 
            
        </div>
    </body>
</html>