
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
                    (Service_Provider_ID, Service_Provider_User_Name, Service_Provider_Full_Name, Service_Provider_Gender, Service_Provider_Email_Address, Service_Provider_Contact_No, Service_Provider_Password, Manager_ID, Users_ID) 
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
                Service_Provider_User_Name='$username', 
                Service_Provider_Full_Name='$fullname', 
                Service_Provider_Gender='$gender', 
                Service_Provider_Email_Address='$email', 
                Service_Provider_Contact_No='$contact', 
                Service_Provider_Password='$password', 
                Manager_ID='$managerId', 
                Users_ID='$userId' 
                WHERE Service_Provider_ID='$spId'";
        if (!mysqli_query($conn, $sql)) {
            echo "Update Error: " . mysqli_error($conn);
        }
    }

    // DELETE
    if (isset($_POST['delete'])) {
        $sql = "DELETE FROM service_provider_table WHERE Service_Provider_ID='$spId'";
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
            $sql = "SELECT Service_Provider_ID, Service_Provider_User_Name, Service_Provider_Full_Name, Service_Provider_Gender, Service_Provider_Email_Address, Service_Provider_Contact_No FROM service_provider_table";
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
                <td>{$row['Service_Provider_ID']}</td>
                <td>{$row['Service_Provider_User_Name']}</td>
                <td>{$row['Service_Provider_Full_Name']}</td>
                <td>{$row['Service_Provider_Gender']}</td>
                <td>{$row['Service_Provider_Email_Address']}</td>
                <td>{$row['Service_Provider_Contact_No']}</td>
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