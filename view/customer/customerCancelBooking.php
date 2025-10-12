<?php
include ('C:/xampp/htdocs/event_organizer_and_management_portal/controller/bookingCancelController.php');
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $customer_name  = $_POST['customer_name'];
    $event_id       = $_POST['event_id'];

    $message =handleCancelBooking($customer_name, $event_id);
     
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
     <link rel="stylesheet" href="../css/table.css">
   
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
         
    </nav><br><br><br><br><br><br>

             <h1 style="text-align:center;">Cancel Your Booking</h1>

             <!--Show message -->
    <?php if (!empty($message)): ?>
        <p style="text-align:center; color:red; font-weight:bold;"><?= $message ?></p>
    <?php endif; ?>
    
     <!-- booking form -->
    <div class="form-container" style="text-align:center;">
        <form action="" method="post">
            <label for="customer_name">Your User Name:</label><br>
            <input type="text" id="customer_name" name="customer_name" required><br><br>

            <label for="event_id">Select Event ID:</label><br>
            <input type="text" id="event_id" name="event_id" required><br><br>

            <button type="submit" name="submit" class="confirmbutton"> Cancel Booking</button>   

        </form>
    </div>
  </body>
</html>