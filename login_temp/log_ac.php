<?php
session_start();
include "db_conn.php";

if(isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  }

  $username = validate($_POST['username']);
  $password = validate($_POST['password']);
  // hash problem occurs here 

  if(empty($username)) {
    header("Location: /pce_comp_web_programming_lab_anuja-more/index.php?error=Username is Required!");
    exit();
  } else if(empty($password)) {
    header("Location: /pce_comp_web_programming_lab_anuja-more/index.php?error=Password is Required!");
    exit();
  }

    $sql = 'SELECT * FROM register WHERE id=?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();


    // echo "SQL Query: " . $sql . "<br>";
    // echo "Bound Parameters: username = " . $username . ", password = " . $password . "<br>";


if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // echo 'Found a matching user in the database'; // debugging -23
        
        //username need not be checked again as it is checked already in the query, but can add additional outer if stmt if double username checking is required

        if (password_verify($password, $row['password'])) {
            //proper hashed comparison
            // echo 'Password match'; //  debugging -45
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            // header("Location: home.php");
            header("Location: /pce_comp_web_programming_lab_anuja-more/index.php");
            exit();
        } else {
            // echo 'Incorrect password'; debug1
            header("Location: login_pg.php?error=Incorrect User Name or Password!");
            exit();
        }
    } else {
        // echo "Number of rows: " . $result->num_rows; //  debugging 13
        // echo 'No matching user found in the database'; //  debugging 14
        header("Location: index.php?error=No matching user found!");
        exit();
    }
    $stmt->close();
} else {
    header("Location: index.php"); //prbly redirection is implicit?
    exit();
}
?>



