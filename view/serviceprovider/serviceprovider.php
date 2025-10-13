<?php
require_once("../../controller/registerserviceController.php");
session_start();
    if(isset($_SESSION["username"]))
    {
        if($_SESSION["role"]==2)
        {
            
        }

        else
        {
            header("Location:../login.php");
        }

        

    }

    else
    {
        header("Location:../login.php");
    }


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Service Provider Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/event_organizer_and_management_portal/view/css/external.css">
        <link rel="stylesheet" href="/event_organizer_and_management_portal/view/css/serviceprovider.css">
        <script src="/event_organizer_and_management_portal/view/js/serviceprovider.js" defer></script>

    </head>
    <body>
      <div class="dashboard-container">
        <nav class="sidebar-nav">
            <div class="logo">EventM</div> 
            <h3 style="color:white" display>Dashboard</h3>
            <ul>
            <li><a href="/event_organizer_and_management_portal/view/serviceprovider/seviceprovider.php">Track Tasks</a></li><br>
            <li><a href="/event_organizer_and_management_portal/view/serviceprovider/upcomingevent.php">View Upcoming Events</a></li><br>
            <li><a href="/event_organizer_and_management_portal/view/serviceprovider/registerservice.php">Register Service</a></li><br>
            <li class="logout-item"><a href="../logout.php">Logout</a></li>
            </ul>  
        </nav>   
     </div>
    </body>
</html>
