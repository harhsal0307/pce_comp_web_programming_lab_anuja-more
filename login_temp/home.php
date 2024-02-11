<?php
  session_start();
  if(isset($_SESSION['id']) && isset($_SESSION['name'])) {
?>
      
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
    </head>
    <body>
      <h1>Blogs</h1>
      <h1>Articles</h1>
      <h1>Doc Download</h1>
      <h1>Can comment, edit, post, delete, reveiw article</h1>
      <button><a href="logout.php">Logout</a></button>
    </body>
    </html>
<?php 
  } else {
    header("Location: /pce_comp_web_programming_lab_anuja-more/index.php");
    exit();
  }
?>