<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&display=swap" rel="stylesheet">
    <title>Hello Users</title>
</head>
<body>
    <!-- Making the webpage in the grids so the navigation bar can be separated-->
    <div class="container">
        <!-- Navbar starts here -->
        <div class="first">
            <!-- Background image -->
            <div class="bgimg"></div>
            <div class="navbar">
                <div class="logo">
                    <h1>BIOSync</h1>
                </div>
                <!-- Navbar Options to click -->
                <div class="options">
                    <ul class="nav_links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Public Researches</a></li>
                    </ul>
                </div>
                <div class="user_profile">
                    
                    

                    <?php
                    session_start();
                      if(isset($_SESSION['id']) && isset($_SESSION['name'])) {
                        echo "<a href='login_temp/logout.php'><button>Logout</button></a>";
                      } else {
                        echo "<a href='login_temp/login_pg.php'><button>Login</button></a>";
                      }
                    ?>
                </div>
            </div>
        </div>
        <!-- Navbar ends here -->
        <!-- Content Part Starts here -->
        <div class="second">
            <p class="second1">Welcome to BIOSync!!</p>
        </div>
        <!-- Content Part Ends Here -->
    </div>
    <section>
        
    </section>
</body>
</html>