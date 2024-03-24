<?php
  session_start();
  include "db_conn.php";
  
  // include "create.php";
  if(isset($_SESSION['id']) && isset($_SESSION['name'])) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="home.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&display=swap" rel="stylesheet">
  <title>Hello Users</title>
</head>
<body>
<div class="container">
  <div class="first">
    <div class="navbar">
      <div class="logo">
        <h1>BIOSync</h1>
      </div>
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
      if(isset($_SESSION['id']) && isset($_SESSION['name'])) {
        echo "<a href='logout.php'><button>Logout</button></a>";
      } else {
        echo "<a href='login_temp/login_pg.php'><button>Login</button></a>";
      }
      ?>
    </div>
    </div>
    </div>
    <div class="render-info">
      <div class="content">
      <?php 
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM `articles`";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
          echo '<div class="blog-in">
            <div class="head">
            <p class="title">'
            . $row["title"].
            '</p><p class="time">'
            . $row["time"].
            '</p></div><p class="content">'
            . $row["content"].
            '</p>
          </div>';
        }
      ?>
      </div>
      
      <div class="category">
        <div class="cat-n">Cardiology</div>
        <div class="cat-n">Dermatology</div>
        <div class="cat-n">Neurology</div>
        <div class="cat-n">Oncology</div>
        <div class="cat-n">Pediatrics</div>
        <div class="cat-n">Orthopedics</div>
      </div>
      </div>
    </div>
  </div>
</div>

<div class="create">
  <button onclick="create_window()">Create</button>
</div>
</body>
</html>
<script>
  function create_window() {
  var w = 500; // width of the window
  var h = 500; // height of the window
  var left = (screen.width/2)-(w/2);
  var top = (screen.height/2)-(h/2);

  var win = window.open("", "newWin", 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
  
  win.document.body.innerHTML = `
    <h1>Enter Data and Upload PDF</h1>
    <form action="create.php" method="POST">
      <label for="data">Data:</label><br>
      <input type="text" id="data" name="data"><br>
     
      <input type="submit" value="Submit">
      
    </form>
  `;
}

</script>
<?php 
  } else {
    header("Location: /pce_comp_web_programming_lab_anuja-more/index.php");
    exit();
  }
?>