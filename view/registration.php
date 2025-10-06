<?php
include("../controller/regController.php")


?>



<!doctype html>

<html>
    <head>
        <title>Registration</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/webTech_project/view/css/external.css">
        <link rel="stylesheet" href="/webTech_project/view/css/login.css">
        <script src="/webTech_project/view/js/login.js" defer></script>

    </head>
    <body>
        <form action="../view/registratio.php" method="POST">
            <div class="container">
                <div class="form-box" id="register-box">
                    <h2>Register</h2>
                    <input type="text" class="input" id="userName" name="username" placeholder="User Name" >
                    <span style="color:red;"><?php echo $usernameErr; ?></span>
                    <input type="text" class="input" id="name" name="fullname" placeholder="Full Name" > 
                    <span style="color:red;"><?php echo $fullnameErr; ?></span>
                    <input type="text" class="input" id="email" name="email" placeholder="Email" >
                    <span style="color:red;"><?php echo $emailErr; ?></span>
                    <input type="text" class="input" id="contact" name="contactno" placeholder="Contact No" ><br>
                    <span style="color:red;"><?php echo $contactErr; ?></span>
                    <select name="gender" class="input">

                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    <span style="color:red;"><?php echo $genderErr; ?></span><br>
                    <input type="password" class="input" id="password" name="npassword" placeholder="New Password" >
                    <span style="color:red;"><?php echo $npasswordErr; ?></span>
                    <input type="password" class="input" id="password" name="cpassword" placeholder="Confirm password" ><br>
                    <span style="color:red;"><?php echo $cpasswordErr; ?></span>
                    <input type="checkbox" class="check-box" id="showpassword">Show Password<br>

                    <button type="submit" class="btn" name="submit">Register</button>

                    <p id="re">Already have an account? <a href="/webTech_project/view/login.php">Login</a></p>

                </div>
                
            </div>
        </form>
    </body>
</html>