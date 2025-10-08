<?php
session_start();
include("../controller/regController.php")


?>
<!doctype html>

<html>
    <head>
        <title>Registration</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/event_organizer_and_management_portal/view/css/external.css">
        <link rel="stylesheet" href="/event_organizer_and_management_portal/view/css/login.css">
        <script src="/event_organizer_and_management_portal/view/js/login.js" defer></script>

    </head>
    <body>
        <form action="/event_organizer_and_management_portal/view/registration.php" method="POST">
            <div class="container">
                <div class="form-box" id="register-box">
                    <h2>Register</h2>
                    <input type="text" class="input" id="userName" name="username" placeholder="User Name" ><br>
                    <span style="color:red;"><?php echo $usernameErr; ?></span><br>
                    <input type="text" class="input" id="name" name="fullname" placeholder="Full Name" > <br>
                    <span style="color:red;"><?php echo $fullnameErr; ?></span><br>
                    <input type="text" class="input" id="email" name="email" placeholder="Email" ><br>
                    <span style="color:red;"><?php echo $emailErr; ?></span><br>
                    <input type="text" class="input" id="contact" name="contactno" placeholder="Contact No" ><br>
                    <span style="color:red;"><?php echo $contactErr; ?></span><br>
                    <select name="gender" class="input">

                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select><br>
                    <span style="color:red;"><?php echo $genderErr; ?></span><br>
                    <input type="password" class="input" id="password" name="npassword" placeholder="New Password" >
                    <span style="color:red;"><?php echo $npasswordErr; ?></span><br>
                    <input type="password" class="input" id="password" name="cpassword" placeholder="Confirm password" ><br>
                    <span style="color:red;"><?php echo $cpasswordErr; ?></span><br>
                    <input type="checkbox" class="check-box" id="showpassword">Show Password<br>

                    <button type="submit" class="btn" name="submit">Register</button><br>

                    <p id="re">Already have an account? <a href="/event_organizer_and_management_portal/view/login.php">Login</a></p>

                </div>
                
            </div>
        </form>
    </body>
</html>