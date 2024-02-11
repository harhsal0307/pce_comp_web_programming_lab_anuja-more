<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Please Login</title>
</head>
<body>
    <!--  This is like the login page box where all the entries are   -->
    <div class="container">
        <!-- This the Background Image div for the page -->
        <div class="bgimg"></div>
        <!-- This is the Entries Box -->
        <div class="center">
            <h1>Login</h1>
            <?php 
              if(isset($_GET['error'])) { ?>
                <p class="error" style="font-size: 1.2rem; color: red"> <?php echo $_GET['error']; ?> </p>
            <?php } 
            ?>
            
            <!-- The Login Form starts from here -->
            <form method="post" action="log_ac.php">
              <div class="txt_field">
                <input type="text" id="username" name="username" required>
                <span></span>
                <label>Name</label>
              </div>
              <div class="txt_field">
                <input type="password" id="password" name="password" required>
                <span></span>
                <label>Password</label>
              </div>
              <div class="pass">Forgot Password?</div>
              <input type="submit" value="Login">
              <!-- Signup Link if not already an user -->
              <div class="signup_link">
                Not a member? <a href="/pce_comp_web_programming_lab_anuja-more/signup_temp/signup.html">Signup</a>
              </div>
            </form>
          </div>
    </div>
    
</body>
</html>