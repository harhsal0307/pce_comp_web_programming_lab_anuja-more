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
  <title>Hello Users</title>
</head>
<body>
    <nav class="navbar">
        <div class="navsec">
             <div class="logo"><a href="#">BIOSync</a></div> 
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Researches</a></li>
                <li><div class="create">
  <button onclick="create_window()">Create</button>
</div></li>
                <li>
                    <?php
        if(isset($_SESSION['id']) && isset($_SESSION['name'])) {
            echo "<div><a href='logout.php'><button>Logout</button></a></div>";
        } else {
            echo "<a href='login_temp/login_pg.php'><button>Login</button></a>";
        }
        ?>
                </li>
            </ul>
        </div>
    </nav>
    <div>
        <img src="divbg.jpg" alt="dna structure">
    </div>

   <div class="content">
    <div class="cards">
    <?php 
  $id = $_SESSION['id'];
  $sql = "SELECT * FROM `articles`";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
    echo '<div class="card">
    <div class="header">
     <span class="icon">
         <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" fill-rule="evenodd"></path>
          </svg>
         </span>
        <p class="alert">'
      . $row["title"].
      '</p>
    </div>

    <p class="message">
     '. $row["content"].'
    </p>';

    if($row["author"] == $id) {
      echo '<div class="options">
        <div class="actions">
            <a class="read" href="#">View complete article</a>
        </div>

        <div class="actions1">
            <a class="edit" href="edit.php?id='.$row["aid"].'">Edit</a>
            <a class="delete" href="delete.php?id='.$row["aid"].'">Delete</a>
        </div>
      </div>';
    } else {
      echo '<div class="options">
        <div class="actions">
            <a class="read" href="#">View complete article</a>
        </div>

        <div class="actions1">
            <a class="author" href="author.php?id='.$row["author"].'">Author</a>
        </div>
      </div>';
    }

    echo '</div>';
  }
?>

     </div>
        <div class="table">
          <p>Categories:</p>
          <a href="#">Blogs</a>
          <a href="#">Articles</a>
          <a href="#">Posts</a>
      </div>  
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
    <title>Create an Article</title>
    <head><link rel="stylesheet" href="home.css"></head>
    <div class = "create-form">
    <h1>Create New Article</h1>
    <form action="create.php" method="POST">
      <label for="data">Title:</label><br>
      <input type="text" id="title" name="title"><br>
      <label for="data">Article Content:</label><br>
      <textarea id="data" name="data" rows="11" columns="50"></textarea>
      <input type="submit" value="Submit">
    </form>
    </div>
  `;
}
</script>
<?php 
  } else {
    header("Location: login_pg.php");
    exit();
  }
?>