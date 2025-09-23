<?php
session_start();
    if(isset($_SESSION["userid"]))
    {
        if($_SESSION["role"]==3)
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
      <title>Customer</title>

     <meta charset="utf-8"> 
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="/event_organizer_and_management_portal/view/css/external.css">
     <link rel="stylesheet" href="/event_organizer_and_management_portal/view/css/customer.css">
      
    </head>

 <body>
         <h1>Welcome, Customer</h1>

    <nav class="search">
        <label class="logo">EventM</label>
        <input type="text" placeholder="Search..">
    </nav>  

    <nav class ="navbar">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Sevices</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
            <li class="logout-item"><a href="../logout.php">Logout</a></li>
        </ul>
         <button class="appointment-btn">Book Appointment</button>
    </nav>

  </body>
</html>