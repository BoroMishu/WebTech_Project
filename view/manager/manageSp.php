
<?php
include 'C:/xampp/htdocs/event_organizer_and_management_portal/model/database.php'; 

$conn = getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $spId = $_POST['spId'];
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $managerId = $_POST['managerId'];
    $userId = $_POST['userId'];

    // ADD
    if (isset($_POST['add'])) {
        if ($spId && $username && $fullname && $gender && $email && $contact && $password && $managerId && $userId) {
            $sql = "INSERT INTO service_provider_table 
                    (service_provider_id, service_provider_username, service_provider_name,service_provider_gender, service_provider_email, service_provider_contact_no, service_provider_password, manager_id, user_id) 
                    VALUES ('$spId', '$username', '$fullname', '$gender', '$email', '$contact', '$password', '$managerId', '$userId')";
            if (!mysqli_query($conn, $sql)) {
                echo "Add Error: " . mysqli_error($conn);
            }
        } else {
            echo "All fields are required for adding a service provider.";
        }
    }

    // UPDATE
    if (isset($_POST['update'])) {
        $sql = "UPDATE service_provider_table SET 
                service_provider_username='$username', 
                service_provider_name='$fullname', 
                service_provider_gender='$gender', 
                service_provider_email='$email', 
                service_provider_contact_no='$contact', 
                service_provider_password='$password', 
                manager_id='$managerId', 
                user_id='$userId' 
                WHERE service_provider_id='$spId'";
        if (!mysqli_query($conn, $sql)) {
            echo "Update Error: " . mysqli_error($conn);
        }
    }

    // DELETE
    if (isset($_POST['delete'])) {
        $sql = "DELETE FROM service_provider_table WHERE service_provider_id='$spId'";
        if (!mysqli_query($conn, $sql)) {
            echo "Delete Error: " . mysqli_error($conn);
        }
    }
}
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

      <form method="post" action="">
      <label for="spId">Service Provider ID:</label>
      <input type="text" id="spId" name="spId"><br>

      <label for="username">User Name:</label>
      <input type="text" id="username" name="username"><br>

      <label for="fullname">Full Name:</label>
      <input type="text" id="fullname" name="fullname"><br>

      <label for="gender">Gender:</label>
       <select name="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
       </select><br><br>

      <label for="email">Email Address:</label>
      <input type="text" id="email" name="email"><br>
  
      <label for="contact">Contact No:</label>
      <input type="text" id="contact" name="contact"><br>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password"><br>

      <label for="managerId">Manager ID:</label>
      <input type="text" id="managerId" name="managerId"><br>

      <label for="userId">Users ID:</label>
      <input type="text" id="userId" name="userId"><br>

      <button name="add">Add</button>
      <button name="update">Update</button>
      <button name="delete">Delete</button>
      </form><br><br><br>


          <?php
            $sql = "SELECT service_provider_id, service_provider_username, service_provider_name, service_provider_gender, service_provider_email, service_provider_contact_no FROM service_provider_table";
            $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
            echo "<table border='1' class='event-table' style='width:60%; margin:auto; text-align:center; border-collapse:collapse; font-size:16px;'>";
         echo "<tr>
            <th>ID</th>
            <th>User Name</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Contact</th>
          </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['service_provider_id']}</td>
                <td>{$row['service_provider_username']}</td>
                <td>{$row['service_provider_name']}</td>
                <td>{$row['service_provider_gender']}</td>
                <td>{$row['service_provider_email']}</td>
                <td>{$row['service_provider_contact_no']}</td>
              </tr>";
        }
        echo "</table>";
       } else {
          echo "No service providers found.";
       }

      mysqli_close($conn);
       ?>
    
    </div>

</body>
</html>  