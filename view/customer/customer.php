<?php
session_start();
    if(isset($_SESSION["username"]))
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
     <link rel="stylesheet" href="../css/external.css">
     <link rel="stylesheet" href="../css/customer.css">
      
    </head>

 <body>
 

    <nav class ="navbar">
        <label class="logo" style="color:white">EventM</label>
        <ul>
            <li><a href="customer.php">Home</a></li>
            <li><a href="customerServices.php">Sevices</a></li>
            <li><a href="customerCancelBooking.php">Cancel Booking</a></li>
            <li class="logout-item"><a href="../logout.php">Logout</a></li>
        </ul>
         
    </nav><br><br><br><br><br><br><br><br>
          <h1  style="text-align:center;"> Welcome to our website</h1>
  </body>
</html>