<!DOCTYPE html>
<html>
    <head>
        <title>Forget Password</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="/event_organizer_and_management_portal/view/css/external.css">
        <link rel="stylesheet" href="/event_organizer_and_management_portal/view/css/login.css">
          
        <script src="/event_organizer_and_management_portal/view/js/login.js" defer></script>
    
    </head>
    <body>
       <form>
        <div class="container">
            <div class="form-box" id="forget-box">
            <h2>Forget Password</h2>
            <input type="text" class="input" id="email" placeholder="Email" required><br>
            <button type="submit" class="btn" onclick="showSubmit()">Submit</button>                   
            <p id="re">Remembered? <a href="/event_organizer_and_management_portal/view/login.php">Login</a></p>
            </div>
        </div>
       </form>
        <form>
            <div class="container">
                <div class="form-box" id="newpass-box"> 
                <h2>Set New Password</h2>
                <input type="password" class="input" id="newpassword" placeholder="New Password" required>
                <input type="password" class="input" id="confirmpassword" placeholder="Confirm Password" required><br>
                <button type="submit" class="btn">Submit</button>   
                </div>
            </div>
                
        </form>
        
   
       
    </body>
</html>