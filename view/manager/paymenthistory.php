<?php
include 'C:/xampp/htdocs/event_organizer_and_management_portal/model/database.php'; 

$conn = getConnection();
?>

<!DOCTYPE html>
<html>
    <head>
      <title>Manager SPhandle</title>

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
           <li><a href="paymenthistory.php">Payment History</a></li>
           <li class="logout-item"><a href="../logout.php">Logout</a></li>
        </ul>

     </nav>

      <?php
        $sql = "SELECT customer_id, customer_username,customer_full_name, customer_email_address, customer_gender,customer_contact_no,customer_password FROM customer_table";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1' class='event-table' style='width:80%; margin:auto; text-align:center; border-collapse:collapse; font-size:16px;'>";
            echo "<tr>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                  </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['customer_id']}</td>
                        <td>{$row['customer_full_name']}</td>
                        <td>{$row['customer_email_address']}</td>
                        <td>{$row['customer_contact_no']}</td>
                        
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='text-align:center;'>No customer records found.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>


</body>
</html>

