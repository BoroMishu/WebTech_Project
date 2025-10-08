<?php
include 'C:/xampp/htdocs/event_organizer_and_management_portal/model/database.php'; 

$conn = getConnection();
?>

<!DOCTYPE html>
<html>
    <head>
      <title>Booking table</title>

     <meta charset="utf-8"> 
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="/event_organizer_and_management_portal/view/css/external.css">
     <link rel="stylesheet" href="/event_organizer_and_management_portal/view/css/manager.css">
     <link rel="stylesheet" href="../css/table.css">
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

      <?php
        $sql = "SELECT booking_id, customer_id,event_id,booking_date FROM booking_table";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1' class='event-table' style='width:80%; margin:auto; text-align:center; border-collapse:collapse; font-size:16px;'>";
            echo "<tr>
                    <th>Booking ID</th>
                    <th>Customer ID</th>
                    <th>Event ID</th>
                    <th>Booking Date</th>
                  </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['booking_id']}</td>
                        <td>{$row['customer_id']}</td>
                        <td>{$row['event_id']}</td>
                        <td>{$row['booking_date']}</td>
                        
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='text-align:center;'>No booking records found.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>


</body>
</html>

