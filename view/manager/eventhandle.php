
<?php
include 'C:/xampp/htdocs/event_organizer_and_management_portal/model/database.php'; 

$conn = getConnection();


  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventId = $_POST['eventId'];
    $eventType = $_POST['eventType'];
    $status = $_POST['status'];
    $price = $_POST['price'];
    $managerId = $_POST['managerId'];


    // ADD
    if (isset($_POST['add'])) {
    if ($eventId && $eventType && $status && $price && $managerId) {
        $sql = "INSERT INTO event_table (event_id, event_type, event_status, event_price, manager_id) 
                VALUES ('$eventId', '$eventType', '$status', '$price', '$managerId')";
        if (!mysqli_query($conn, $sql)) {
            echo "Add Error: " . mysqli_error($conn);
        }
    } else {
        echo "All fields are required for adding an event.";
    }
}


    // UPDATE
    if (isset($_POST['update'])) {
        $sql = "UPDATE event_table SET event_type='$eventType', event_status='$status', event_price='$price', manager_id='$managerId' WHERE event_id='$eventId'";

        if (!mysqli_query($conn, $sql)) {
            echo "Update Error: " . mysqli_error($conn);
        }
    }

    // DELETE
    if (isset($_POST['delete'])) {
        $sql = "DELETE FROM event_table WHERE event_id='$eventId'";
        if (!mysqli_query($conn, $sql)) {
            echo "Delete Error: " . mysqli_error($conn);
        }
    }
}

?>



<!DOCTYPE html>
<html>
    <head>
      <title>Manager eventhandle</title>

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


     <form method="post" action=""><br><br>
     <lable for="eventId"> Event ID:</label>
     <input type="Text" id="eventId" name="eventId"><br><br>
     <lable for="eventType"> Event Type:</label>
     <input type="Text" id="eventType" name="eventType"><br><br>

     <label for="status"> Status: </label>
      <select name="status"> 
         <option id="active" value="active">Active</option> 
         <option id="inactive" value="inactive">Inactive</option> 
      </select><br><br>

     <lable for="price"> Event Price:</label>
     <input type="text" id="price" name="price" ><br><br>

     <label for="managerId">Manager ID:</label>
     <input type="text" id="managerId" name="managerId"><br><br>

     
    
        <button class="updatebtn" name="update">Update</button>
        <button class="addbtn" name="add">Add</button>
        <button class="deletebtn" name="delete">Delete</button>

     </form><br><br>
    
     

<?php
         $sql = "SELECT event_id, event_type, event_status, event_price FROM event_table";
         $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      echo "<table border='1' class='event-table' style='width:300%; margin:auto; text-align:center; border-collapse:collapse; font-size:16px;'>";
      echo "<tr><th>Event ID</th><th>Event Type</th><th>Status</th><th>Price</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . ($row['event_id']) . "</td>
                <td>" . ($row['event_type']) . "</td>
                <td>" . ($row['event_status']) . "</td>
                <td>" . ($row['event_price']) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No events found.";
}

mysqli_close($conn);
?>

     
    </div>

</body>
</html>    
