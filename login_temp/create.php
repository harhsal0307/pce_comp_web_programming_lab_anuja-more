<?php
    include "db_conn.php";
    session_start();
    // echo $_SESSION['id'];
        if(isset($_POST['data'])){
          if($stmt = $conn->prepare('INSERT INTO articles (title, content, author) VALUES (?, ?, ?)')) {
              $stmt->bind_param('sss',$_POST['title'] ,$_POST['data'], $_SESSION['id']);
              $stmt->execute();
              header("Location: home.php");
          } else {
              echo 'Error Occured2';
          }
          $stmt->close();
        } else {
            echo 'Error Occured2';
        }

?>