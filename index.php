<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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
                        <!-- <li><a href="#">About Us</a></li> -->
                        <li><a href="#scrollable-section" onclick="scrollToSection()">About Us</a></li>
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
            <p class="second1">Welcome to MedMingle!!</p>
        </div>
        <!-- Content Part Ends Here -->
    </div>
    <div class="audio-1">
          <audio id="autoplayAudio"  >
            <source src="static/welc-audio.mp3" type="audio/mpeg">
            Welcome to MedMingle!
          </audio>
          <script>
            /*document.addEventListener('DOMContentLoaded', function() {
                var audio = document.getElementById('autoplayAudio');
                audio.play();
            }); */   
        //     document.addEventListener('DOMContentLoaded', function() {
        //     var audio = document.getElementById('autoplayAudio');
        //     audio.play().then(function() {
        //         // Autoplay started successfully
        //     }).catch(function(error) {
        //         // Autoplay failed, handle error
        //         console.error("Autoplay failed:", error);
        //     });
        // }); 
            function scrollToSection() {
                var scrollableSection = document.getElementById('scrollable-section');
                scrollableSection.scrollIntoView({ behavior: 'smooth' });
            }
        </script>
        </div>
        <!-- Content Part Ends Here -->
    </div>
    
    <section>
        <div class="scrollable-section" id="scrollable-section">
            <div class="bgimg2"></div>
            <div class="text" style="position: absolute;  vertical-align: middle;">
            <p class="txt-1">About Us</p>
            <p class="txt-2">
                Welcome to MedMingle, a global platform designed to foster collaboration and data sharing among medical researchers worldwide.
                Our mission is to accelerate the pace of medical research and innovation by providing a secure, user-friendly platform where researchers can collaborate, share data, and advance the field of medicine together.
                Our platform is built on the principles of transparency, integrity, and respect for intellectual property. We are committed to maintaining a space where researchers can share their findings confidently and collaborate effectively, all while adhering to the highest ethical standards.
            </p>      
            </div>
            
            <div class="video-1">
              <video width="450.5rem" height="300rem" controls style="border-radius: 15px;">
                <source src="static/The journey of medical research.mp4" type="video/mp4">
                The Journey of Medical Research
              </video>
            </div>

            <table class="features-table">
              <tr><th>Key Features</th></tr>
              <tr>
                  <td style="width: 50px">Secure Data</td>
                  <td style="text-align:center; color:green;">&#10004;</td>
              </tr>
              <tr>
                  <td>Community Support</td>
                  <td style="text-align:center; color:green;">&#10004;</td>

              </tr>
              <tr>
                  <td>Transparency</td>
                  <td style="text-align:center; color:green;">&#10004;</td>
              </tr>
              <tr>
                  <td>Accessibility</td>
                  <td style="text-align:center; color:green;">&#10004;</td>
              </tr>
          </table>
        </div>
        
        
    </section>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="box-1">
         <div class="row">
           <div class="footer-col">
             <h4>company</h4>
             <ul>
               <li><a href="#">about us</a></li>
               <li><a href="#">our services</a></li>
               <li><a href="#">privacy policy</a></li>
               <li><a href="#">affiliate program</a></li>
             </ul>
           </div>
           <div class="footer-col">
             <h4>Contact Us</h4>
             <ul>
               <li><a href="#">+32 188 001 111</a></li>
               <li><a href="#">info.medmi@gmail.com</a></li>
               <li><a href="#">+11 268 001 123</a></li>
               <li><a href="#">info.medmi@yahoo.com</a></li>
             </ul>
           </div>
           <div class="footer-col">
             <h4>Location</h4>
             <ul>
               <li><a href="#">Pillai College of Engineering,<br> New Panvel</a></li>
               
             </ul>
           </div>
           <div class="footer-col" style="margin-top: 20px;">
             <h4>follow us</h4>
             <div class="social-links">
               <a href="#"><i class="fab fa-facebook-f"></i></a>
               <a href="#"><i class="fab fa-twitter"></i></a>
               <a href="#"><i class="fab fa-instagram"></i></a>
               <a href="#"><i class="fab fa-linkedin-in"></i></a>
             </div>
           </div>
         </div>
        </div>
        <p>&copy; 2024 MedMingle. All rights reserved.</p>
     </footer>
        

</body>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

.box-1{
  /* max-width: 1170px; */
  margin:auto;
  line-height: 1.5;
  font-family: 'Poppins', sans-serif;
  /* box-sizing: border-box; */
}
.row{
  display: flex;
  flex-wrap: wrap;
}
ul{
  list-style: none;
}
.footer{
  background-color: #24262b;
  padding: 20px 0;
}
.footer-col{
   width: 23%;
   padding: 0 15px;
}
.footer-col h4{
  font-size: 18px;
  color: #ffffff;
  text-transform: capitalize;
  margin-bottom: 35px;
  font-weight: 500;
  position: relative;
}
.footer-col h4::before{
  content: '';
  position: absolute;
  left:20;
  bottom: -10px;
  background-color: #e91e63;
  height: 2px;
  box-sizing: border-box;
  width: 50px;
}
.footer-col ul li:not(:last-child){
  margin-bottom: 10px;
}
.footer-col ul li a{
  font-size: 16px;
  text-transform: capitalize;
  color: #ffffff;
  text-decoration: none;
  font-weight: 300;
  color: #bbbbbb;
  display: block;
  transition: all 0.3s ease;
}
.footer-col ul li a:hover{
  color: #ffffff;
  padding-left: 8px;
}
.footer-col .social-links a{
  display: inline-block;
  height: 40px;
  width: 40px;
  background-color: rgba(255,255,255,0.2);
  margin:0 10px 10px 0;
  text-align: center;
  line-height: 40px;
  border-radius: 50%;
  color: #ffffff;
  transition: all 0.5s ease;
}
.footer-col .social-links a:hover{
  color: #24262b;
  background-color: #ffffff;
}
@media(max-width: 767px){
    .footer-col{
      width: 50%;
      margin-bottom: 30px;
  }
  }
  @media(max-width: 574px){
    .footer-col{
      width: 100%;
  }
  }
  .scrollable-section {
    margin: 0;
    position: relative;
    align-items: center;
    background-image: url(static/img/Lovepik_com-400116130-science-and-technology-background-of-artificial-intelligence.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    margin-top: 5px;
    height: 100vh;
    color: white;
}
/* Dividing the Page into two parts for navbar and content */
.bgimg2::after {
    content: ' ';
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.55);
    z-index: 0;
}

.txt-1{
    position: relative;
    top: 80px;
    left: 20px;
    font-size: 10vh;
}
.txt-2{
    position: relative;
    width: 55%;
    top: 100px;
    left: 20px;
    font-size: 3vh;
}

.video-1 {
    border-radius: 20px;
    position: absolute;
    left: 60%;
    top: 25%;
    
}


.features-table {
    position: absolute;
    width: 30%;
    height: 30%;
    border-collapse: collapse;
    margin-top: 20px;
    top: 60%;
    left: 2%;
}

.features-table th, .features-table td {
    border: 1px double white;
    width: 10px;
    padding: 10px;
    text-align: left;
}

.tick-icon {
    width: 20px;
    height: 20px;
    fill: white;
    margin-right: 10px;
}


/* Footer Styles */
.footer {
    margin-top: 5px;
    background-color: rgba(0, 0, 0, 0.8);
    padding: 10px;
    text-align: center;
    color: white;
}


    
</style>
</body>
</html>