<?php
    include "db_conn.php";
    session_start();
    // echo $_SESSION['id'];
        if(isset($_POST['data'])){
          if($stmt = $conn->prepare('INSERT INTO articles (content) VALUES (?)')) {
              $stmt->bind_param('s', $_POST['data']);
              $stmt->execute();
          } else {
              echo 'Error Occured2';
          }
          $stmt->close();
        } else {
            echo 'Error Occured2';
        }

?>