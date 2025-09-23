<?php
session_start();
    if(isset($_SESSION["userid"]))
    {
        if($_SESSION["role"]==1)
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
      <title>Manager Dashboard</title>

     <meta charset="utf-8"> 
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="/event_organizer_and_management_portal/view/css/external.css">
     <link rel="stylesheet" href="/event_organizer_and_management_portal/view/css/manager.css">
     
     

    </head>

<body>

    <div class="dashboard-container">

     <nav class="sidebar-nav">
            <div class="logo">EventM</div> 
            <h2 style="color:white">Welcome,Manager</h2> 
        <ul>
         
           <li><a href="manager.php">Dashboard</a></li>
           <li><a href="eventhandle.php">Events Handle</a></li>
           <li><a href="manageSp.php">Manage ServiceProvider</a></li>
           <li><a href="paymenthistory.php">Payment History</a></li>
           <li class="logout-item"><a href="../logout.php">Logout</a></li>
        </ul>
           
     </nav>
    
     </div>

</body>
</html>    
