<?php
include 'C:/xampp/htdocs/event_organizer_and_management_portal/controller/manageSpController.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manager - Manage Service Providers</title>
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
            <p style="color:red; font-weight:bold;"><?= $message ?></p>
        <?php endif; ?>

        <form method="post" action="">
            <label for="spId">Service Provider ID:</label>
            <input type="text" id="spId" name="spId"><br><br>

            <label for="username">User Name:</label>
            <input type="text" id="username" name="username"><br><br>

            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname"><br><br>

            <label for="gender">Gender:</label>
            <select name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select><br><br>

            <label for="email">Email Address:</label>
            <input type="text" id="email" name="email"><br><br>

            <label for="contact">Contact No:</label>
            <input type="text" id="contact" name="contact"><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password"><br><br>

            <label for="managerId">Manager ID:</label>
            <input type="text" id="managerId" name="managerId"><br><br>

            <label for="userId">User ID:</label>
            <input type="text" id="userId" name="userId"><br><br>

            <button class="addbtn" name="add">Add</button>
            <button class="updatebtn" name="update">Update</button>
            <button class="deletebtn" name="delete">Delete</button>
        </form><br><br>

        <?php
        if (mysqli_num_rows($serviceProviders) > 0) {
            echo "<table class='sp-table'>";
            echo "<tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Contact</th>
                  </tr>";
            while ($row = mysqli_fetch_assoc($serviceProviders)) {
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
        ?>
    </div>
</div>
</body>
</html>
